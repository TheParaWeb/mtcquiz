<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/11/13
 * Time: 1:54 PM
 */
class Jobs
{

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function getJobCategories()
    {
        return $this->db->select("SELECT category FROM jobs GROUP BY category ORDER BY category", array());
    }

    public function getAllJobs()
    {
        return $this->db->select("SELECT * FROM jobs ORDER BY category, jobTitle", array());
    }

}