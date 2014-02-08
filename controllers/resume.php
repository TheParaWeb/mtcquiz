<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/23/14
 * Time: 9:40 AM
 */

class Resume extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->statistics->insertPageView('resume/');
        $this->view->questionIndex = $this->model->getQuestionIndex()+1;
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Resume Quiz';
        $this->view->render('header');
        $this->view->render('resume/index');
        $this->view->render('footer');
    }

    function startOver(){
        //$this->model->clearAnswers();
        header('Location: '.URL.'lifestyle/');
    }

}