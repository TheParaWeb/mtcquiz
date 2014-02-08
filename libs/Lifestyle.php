<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/20/14
 * Time: 12:55 PM
 */

class Lifestyle
{

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        Session::sessionStart('MTC_STUDENT');
        Session::handleCookie();
        $this->visitorId = Session::get('visitorId');
    }

    public function getAnswers($questionId)
    {
        $result = $this->db->select("SELECT * FROM lifestyle_answers WHERE visitorId = :visitorId
            AND questionId = :questionId", array(':visitorId' => $this->visitorId, ':questionId' => $questionId));
        return $result;
    }

    public function getAllAnswers()
    {
        $result = $this->db->select("SELECT * FROM lifestyle_answers WHERE visitorId = :visitorId",
            array(':visitorId' => $this->visitorId));
        return $result;
    }

    public function getQuestions()
    {
        $questions = $this->db->select("SELECT * FROM lifestyle_questions");
        $questionId = 0;
        $questionsArray=array();
        foreach($questions AS $question){
            $unserialized=(unserialize($question['question']));
            $questionsArray[$questionId]=$unserialized;
            $questionId++;
        }
        return $questionsArray;
    }

    public function resumeLifestyleQuiz(){
        $answers = $this->db->select("SELECT * FROM lifestyle_answers WHERE visitorId = :visitorId ORDER BY questionId DESC",
            array(':visitorId' => $this->visitorId));
        return $answers[0]['questionId'];
    }

    public function getQuestionsTotal(){
        $result = $this->db->select("SELECT * FROM lifestyle_questions",array());
        return count($result);
    }

    //TODO: merge this with resumeLifestyleQuiz.
    public function getAnsweredQuestions($visitorId){
        $answers = $this->db->select("SELECT * FROM lifestyle_answers WHERE visitorId = :visitorId ORDER BY questionId DESC",
            array(':visitorId' => $visitorId));
        return $answers[0]['questionId'];
    }

    public function getJobs($salary,$num = false){
        $result = $this->db->select("SELECT * FROM jobs WHERE salary >= :salary ORDER BY salary ASC",array(':salary'=>$salary));
        if(!$num){
            return $result;
        }else{
            $jobs = array();
            for($i=0;$i<$num;$i++){
                $jobs[$i]=$result[$i];
            }
            return $jobs;
        }

    }
}