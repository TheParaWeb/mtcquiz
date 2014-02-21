<?php

class Share_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->email = new Email();
    }

    public function sendShareMail(){
        $this->student = new Student();
        $this->schools = new Schools();
        $student = $this->student->getStudentInfo(Session::get('visitorId'));
        $school = $this->schools->getSchoolByName($student[0]['school']);
        $to = "";
        if(isset($_POST['parents'])){
            $to .= $_POST['email'];
        }
        if(isset($_POST['counselor'])){
            $to.=','.$school['contact_email'];
        }
        if(isset($_POST['admissions'])){
            $to.=','.'admissions@midlandstech.com';
        }
        $to = trim(rtrim($to,','),',');
        return $this->email->sendShareMail($to);
    }

}