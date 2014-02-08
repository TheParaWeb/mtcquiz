<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/23/14
 * Time: 2:17 PM
 */

class Results_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getJob($id){
        return $this->db->select("SELECT * FROM jobs WHERE id=:id LIMIT 1",array(':id'=>$id));
    }

    public function getJobs($salary = 0){

        $result = $this->db->select("SELECT * FROM jobs GROUP BY category",array());
        $i=0;
        foreach($result AS $value){
            $categories[$i] = $value['category'];
            $i++;
        }


        foreach($categories AS $category){
            $currentJobs = $this->db->select("SELECT * FROM jobs WHERE salary >= :salary AND category = :category
            ORDER BY salary DESC",array(':salary'=>$salary,':category'=>$category));

            $i=0;
            foreach($currentJobs AS $thisJob){
                $jobs[$category][$i]=$thisJob;
                $i++;
            }
        }
        return $jobs;
    }

    public function getJobsByCategory($category){
        return $this->db->select("SELECT * FROM jobs WHERE category = :category ORDER BY salary DESC",array(':category'=>$category));
    }

    public function lifestyleComplete(){
        $this->lifestyle = new Lifestyle();
        $questionsTotal = $this->lifestyle->getQuestionsTotal()-1;
        $questionsAnswered = $this->lifestyle->resumeLifestyleQuiz();
        if($questionsAnswered==$questionsTotal){
            return true;
        }else{
            return false;
        }
    }
}