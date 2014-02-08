<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/7/13
 * Time: 2:23 AM
 */

class Share extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->statistics->insertPageView('share/');
        $this->view->js = array(
            'share/js/js.js'
        );
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Share';
        $this->view->render('header');
        $this->view->render('share/index');
        $this->view->render('footer');
    }

    function sendMail(){
        $this->statistics->insertPageView('share/mailSent');
        if($this->model->sendShareMail()){
            header('Location: '.URL.'share/thankYou/');
        }else{
            header('Location: '.URL.'share/error/');
        }
    }

    function thankYou(){
        $this->statistics->insertPageView('share/thankYou');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Share';
        $this->view->render('header');
        $this->view->render('share/thankYou');
        $this->view->render('footer');
    }

    function error(){
        $this->statistics->insertPageView('share/error');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Error';
        $this->view->render('header');
        $this->view->render('share/error');
        $this->view->render('footer');
    }

}