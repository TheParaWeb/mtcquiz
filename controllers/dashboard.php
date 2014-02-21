<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/7/13
 * Time: 2:23 AM
 */

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
    }

    function index()
    {
        $visitorId = Session::get('visitorId');
        $salary = $this->model->calculateSalary();
        $this->statistics->insertPageView('dashboard/');
        $this->statistics->insertLifestyleResult($visitorId,$salary);

        $this->model->lifestyleCompleted();
        $student = $this->model->getStudentInfo($visitorId);
        $this->model->updateStudent($salary);

        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Home';
        $this->view->student = $student[0];
        $this->view->salary->annual = $salary;
        $this->view->salary->hourly = ceil($salary/52/40);
        $this->view->jobs = $this->model->getRecommendedJobs($salary);

        $this->view->render('header');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }


}