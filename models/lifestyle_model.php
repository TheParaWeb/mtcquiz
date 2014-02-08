<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/12/13
 * Time: 12:53 PM
 */

class Lifestyle_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        $this->visitorId = Session::get('visitorId');
        $this->lifestyle = new Lifestyle();
    }

    public function update($questionId)
    {

        $postData[0] = isset($_POST['answer1']) ? $_POST['answer1'] : null;
        $postData[1] = isset($_POST['answer2']) ? $_POST['answer2'] : null;
        $postData[2] = isset($_POST['answer3']) ? $_POST['answer3'] : null;
        $postData[3] = isset($_POST['answer4']) ? $_POST['answer4'] : null;
        $postData[4] = isset($_POST['answer5']) ? $_POST['answer5'] : null;

        $serial = serialize($postData);

        $result = $answers = $this->getAnswers($questionId);

        if (count($result) >= 1) {
            $this->db->update('lifestyle_answers', array('answer' => $serial), "id = {$result[0]['id']}");
        } else {
            $this->db->insert('lifestyle_answers', array('visitorId' => $this->visitorId, 'questionId' => $questionId, 'answer' => $serial));
        }

        $nextQuestion = $questionId + 1;
        header('location: ' . URL . 'lifestyle/index/' . $nextQuestion);
    }

    public function getAnswers($questionId)
    {
        $result = $this->db->select("SELECT * FROM lifestyle_answers WHERE visitorId = :visitorId
            AND questionId = :questionId", array(':visitorId' => $this->visitorId, ':questionId' => $questionId));
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

    public function save(){
        Cookie::setCookie();
    }

    public function clearAnswers(){
        $this->db->delete('lifestyle_answers','visitorId = {$this->visitorId}',999);
    }
}