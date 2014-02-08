<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:07 PM
 */

class Lifestyle extends Controller
{
    // Move this to the model.
    function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        Session::handleCookie();
        $this->student=new Student();
    }

    function index($questionIndex = 0)
    {
        $questionData = $this->model->getQuestions();
        if ($questionIndex >= count($questionData)) {
            header('location: ' . URL . 'dashboard');
        }
        else {
            if($questionIndex < 0){
                $questionIndex=0;
            }
            if($questionIndex == 0){$this->statistics->insertPageView('lifestyle/');}
            $serial = $this->model->getAnswers($questionIndex);
            $serial = unserialize($serial[0]['answer']);
            $this->view->answers = $serial;

            $this->view->questionData = $questionData[$questionIndex];
            $this->view->currentIndex = $questionIndex;
            $this->view->title = 'Midlands Technical College LifeStyle Quiz | Lifestyle Quiz';
            $this->view->render('header');
            $this->view->render('lifestyle/index');
            $this->view->render('footer');
        }
    }

    function update($questionId = 0)
    {
        $this->model->update($questionId);
    }

    function save(){
        $this->model->save();
        header('Location: '.URL);
    }

    function startOver(){
        $this->model->clearAnswers();
        header('Location: '.URL.'lifestyle/');
    }

    function savedQuiz(){
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Saved';
        $this->view->render('header');
        $this->view->render('lifestyle/savedQuiz');
        $this->view->render('footer');
    }
}