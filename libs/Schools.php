<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/11/13
 * Time: 1:54 PM
 */
class Schools
{

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function getSchoolCategories()
    {
        return $this->db->select("SELECT * FROM schools WHERE active = '1' GROUP BY district ORDER BY district", array());
    }

    public function getSchools()
    {
        return $this->db->select("SELECT * FROM schools WHERE active = '1' ORDER BY district, name", array());
    }

    public function getSchoolDistricts(){
        return $this->db->select("SELECT district FROM schools GROUP BY district ORDER BY district",array());
    }

    public function getActiveDistricts(){
        return $this->db->select("SELECT district FROM schools WHERE active = :active
        GROUP BY district ORDER BY district",array(':active'=>1));
    }

    public function getSchool(){
        $result = $this->db->select("SELECT * FROM schools WHERE id = :id",array(':id'=>$_POST['id']));
        $result=$result[0];
        echo json_encode($result);
    }

    public function getSchoolByName($name){
        $result = $this->db->select("SELECT * FROM schools WHERE name = :name",array(':name'=>$name));
        return $result[0];
    }

}