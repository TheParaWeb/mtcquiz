<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/5/13
 * Time: 11:50 AM
 */

class Admin_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->nsEncrypt = new NsEncrypt(AES_KEY, "OFB", AES_IV);
        $this->statistics = new Statistics();
        $this->lifestyle = new Lifestyle();
    }

    public function adminLogin()
    {
        // TODO: VALIDATION!!!!! ENCRYPT.
        $result = $this->db->select("SELECT * FROM admin WHERE login = :email AND password = :password LIMIT 1",
            array(':email'=>$_POST['email'],':password'=>$this->nsEncrypt->encrypt($_POST['password'])));
        $result=$result[0];
        if(count($result)>0){
            Session::sessionStart('MTC_ADMIN');
            Session::set('role', $result['role']);
            Session::set('loggedIn', true);
            Session::set('userid', $result['userid']);
            Session::set('email', $result['login']);
            if ($_POST['password'] == 'admin') {
                header('location: '.URL.'admin/updateRequired');
            } else {
                header('location: '.URL.'admin');
            }
        }else{
            // TODO: Add ip logging and count timeout.
            Session::set('msg','Username or password incorrect.');
            header('location: '.URL.'admin/login');
        }
    }

    public function logout()
    {
        Session::destroy();
        header('location: ' . URL);
    }

    public function updateProfile($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => $this->nsEncrypt->encrypt($data['password']),
            'questionid' => $data['question'],
            'questiona' => $data['answer']
        );
        return $this->db->update('admin', $postData, "`userid` = {$data['userid']}");
    }

    public function updateAdministrator($userId){
        $postData = array(
            'login' => $_POST['email'],
            'questionid' => $_POST['question'],
            'questiona' => $_POST['answer']
        );
        if(isset($_POST['resetPassword']) && $_POST['resetPassword']=='1'){
            $postData['password'] = $this->nsEncrypt->encrypt('admin');
        }
        //TODO: Add error handling.
        return $this->db->update('admin', $postData, "`userid` = {$userId}");
    }

    public function getAdmin($id)
    {
        return $this->db->select("SELECT * FROM admin WHERE userid = :userid", array(':userid' => $id));
    }

    public function deleteAdmin($userId){
        $this->db->delete("admin","userid = {$userId}");
    }

    public function getAllAdmins()
    {
        return $this->db->select("SELECT * FROM admin");
    }

    public function getSecQuestions()
    {
        return $this->db->select("SELECT * FROM sec_q");
    }

    public function createAdmin()
    {
        // Check username.
        // If not a username, create one with 'admin' password.
        $data = array(
            'login' => $_POST['email'],
            'role' => $_POST['role'],
            'password' => $this->nsEncrypt->encrypt('admin')
        );
        $result = $this->db->select("SELECT userid, login FROM admin WHERE login = :login", array(':login' => $data['login']));

        if (count($result) > 0) {
            return array('error' => 'Oops! This email is already in the system!');
        } else {
            if ($this->db->insert('admin', array('login' => $data['login'], 'role' => $data['role'], 'password' => $data['password']))) {
                return array('success' => 'Successfully added administrator.');
            } else {
                return array('error' => 'Hmm...There was an error with the database.');
            }
        }
    }

    public function getQuizStats(){
        /*
         * $data = array(
         *      'school'=>string,
         *      'students'=>int,
         *      'completedQuizzes'=>int
         * );
         */
        $data = array();

        $schools = $this->statistics->getSchools(1);
        $i=0;
        foreach ($schools AS $school){
            $students = $this->statistics->getStudentsBySchool($school['name']);

            if(count($students)>=1){
                $data[$i]['school']=$school['name'];
                $data[$i]['students'] = count($students);

                $completedQuizzes = 0;
                foreach($students AS $student){
                    $questionsTotal = $this->lifestyle->getQuestionsTotal() -1;
                    $questionsAnswered = $this->lifestyle->getAnsweredQuestions($student['visitorId']);
                    if($questionsTotal==$questionsAnswered){$completedQuizzes++;}
                }
                $data[$i]['completedQuizzes'] = $completedQuizzes;
                $i++;
            }

        }
        echo json_encode($data);
    }

    public function getPageStats(){

        for($i=1;$i<=12;$i++){
            $data[$i]['pageViews']=$this->pageViews = $this->statistics->getPageViewsByMonth($i);
            $data[$i]['registeredUsers']=$this->registeredUsers = $this->statistics->getRegisteredUsersMonth($i);
            $data[$i]['uniqueVisitors']=$this->uniqueVisitors = $this->statistics->getUniqueVisitorsByMonth($i);
        }
        echo json_encode($data);
    }

    public function getSalaryStats(){
        $salaries = $this->db->select("SELECT * FROM lifestyle_results",array());
        $data = array(
            '40'=>0,
            '50'=>0,
            '75'=>0,
            '100'=>0,
            '125'=>0,
            '150'=>0
        );
        $total = count($salaries);
        foreach($salaries AS $salary){
            $salary = $salary['salary'];
            if($salary >= 40000 && $salary < 50000){$data['40']++;}
            if($salary >= 50000 && $salary < 75000){$data['50']++;}
            if($salary >= 75000 && $salary < 100000){$data['75']++;}
            if($salary >= 100000 && $salary < 125000){$data['125']++;}
            if($salary >= 125000 && $salary < 150000){$data['150']++;}
            if($salary >= 150000){$data['40']++;}
        }

        foreach($data AS $key=>$value){
            $percentage = ($value/$total)*100;
            $data[$key]=$percentage;
        }
       echo json_encode($data);
    }

    public function getJob(){
        $result = $this->db->select("SELECT * FROM jobs WHERE id = :id",array(':id'=>$_POST['id']));
        $result=$result[0];
        echo json_encode($result);
    }

}