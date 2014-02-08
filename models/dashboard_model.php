<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:11 PM
 */

class Dashboard_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        $this->visitorId = Session::get('visitorId');
        $this->student = new Student();
        $this->lifestyle = new Lifestyle();
    }

    public function test(){
       $questions = $this->db->select("SELECT * FROM lifestyle_questions");
       $questionId = 0;
       $questionsArray=array();
       foreach($questions AS $question){
           $unserialized=(unserialize($question['question']));
           $questionsArray[$questionId]=$unserialized;
           $questionId++;
       }

       foreach($questionsArray AS $question){
           echo $question['type'];
           echo "<br/><hr/>";
       }
    }

    public function getStudentInfo(){
        $visitorId = Session::get('visitorId');
        return $this->student->getStudentInfo($visitorId);
    }

    public function calculateSalary(){
        $salary = 0;
        $answers = $this->lifestyle->getAllAnswers();
        $questions = $this->lifestyle->getQuestions();

        foreach($answers AS $answer){
            //Get questions from the DB.
            $question = $questions[$answer['questionId']];
            //Convert associative array from $question['answers'] to access numerically.
            $numericalArray = array();$i=0;
            foreach($question['answers'] AS $key=>$value){
                $numericalArray[$i]=$value;
                $i++;
            }
            //Convert $answer back into array();
            $unserialized = unserialize($answer['answer']);

            //Calulate price based on answer type.
            switch($question['type']){
                case 'single':

                    //Switch based off of answer.
                    switch($unserialized[0]){
                        case 'answer1':
                              $salary = $salary+$numericalArray[0]['price'];
                            break;

                        case 'answer2':
                              $salary = $salary+$numericalArray[1]['price'];
                            break;

                        case 'answer3':
                              $salary = $salary+$numericalArray[2]['price'];
                            break;

                        case 'answer4':
                              $salary = $salary+$numericalArray[3]['price'];
                            break;

                        case 'answer5':
                              $salary = $salary+$numericalArray[4]['price'];
                            break;

                        default:
                            $salary = $salary;
                    }
                    break;

                case 'multiple':

                    // Loop through all answers and get price.
                    $answerIndex = 0;
                    foreach($unserialized AS $thisAnswer){
                        $salary = $salary+$numericalArray[$answerIndex]['price'];
                        $answerIndex ++;
                    }
                    break;

                default:
                    $salary = $salary;
            }

        }

        return ceil($salary);
    }

    public function getAnswers($questionId){
        return $this->lifestyle->getAnswers($questionId);
    }

    public function getRecommendedJobs($salary){
        return $this->lifestyle->getJobs($salary,5);
    }

    public function updateStudent($salary){
        if(isset($_SESSION['loggedIn'])){
            // Update Database->update();
            $sql = "UPDATE students SET salary=:salary WHERE visitorId = :visitorId";
            $query = $this->db->prepare($sql);
            $query->execute(array(':salary'=>$salary,':visitorId'=>$this->visitorId));
        }
    }

    public function lifestyleCompleted(){
        $total = $this->lifestyle->getQuestionsTotal()-1;
        $currentIndex = $this->lifestyle->resumeLifestyleQuiz();
        if($currentIndex < $total){
            if($currentIndex <= 0){
                header('Location: '.URL.'lifestyle/');
            }else{
                header('Location: '.URL.'resume/');
            }
        }
        return true;
    }

}