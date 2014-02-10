<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/20/14
 * Time: 12:55 PM
 */

class Student
{

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function getStudentInfo($visitorId)
    {
        return $this->db->select("SELECT * FROM students WHERE visitorId = :visitorId LIMIT 1", array(':visitorId'=>$visitorId));
    }

    public function getStudent()
    {
        return $this->db->select("SELECT * FROM students WHERE id = :id LIMIT 1", array(':id'=>$_POST['id']));
    }

    public function getStudents(){

        return $this->db->select("SELECT * FROM students ORDER BY school, name", array());
    }

}