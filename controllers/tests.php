<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/22/14
 * Time: 9:27 PM
 */

class Tests extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        Session::sessionStart('MTC_STUDENT');
        Session::handleCookie();
    }

    function index()
    {
        header('Location: '.URL.'error/');
    }

    function resetCookie(){
        if(isset($_COOKIE['visitorId'])){
            setcookie('visitorId', $_COOKIE['visitorId'], time()-3600);
        }
        Session::kill('visitorId');
        Session::destroy();
        header('Location: '.URL);
    }

    function generateSalary(){

    }

    function sayHello($name){
        Session::set('message','This is a session value.');
        $this->view->message = $this->model->getMessage($name);
        $this->view->secondMessage = $this->model->getSecondMessage();
        $this->view->render('header');
        $this->view->render('tests/sayHello');
        $this->view->render('footer');
    }

}