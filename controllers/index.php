<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:07 PM
 */

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        Session::handleCookie();
    }

    function index()
    {
        $this->statistics->insertPageView();
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Home';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}