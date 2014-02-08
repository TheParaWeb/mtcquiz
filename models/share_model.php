<?php

class Share_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->email = new Email();
    }

    public function sendShareMail(){

        $to = "";
        if(isset($_POST['parents'])){
            $to .= $_POST['email'];
        }
        if(isset($_POST['counselor'])){
            $this->student = new Student();
            $this->schools = new Schools();
            $student = $this->student->getStudentInfo(Session::get('visitorId'));
            $school = $this->schools->getSchoolByName($student[0]['school']);
            $to.=','.$school['contact_email'];
        }

        $to = trim(rtrim($to,','),',');
        return $this->email->sendShareMail($to);
    }

}