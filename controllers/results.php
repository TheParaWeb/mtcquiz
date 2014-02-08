<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/9/13
 * Time: 4:38 PM
 */

class Results extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->statistics->insertPageView('results/');
        $this->view->headerText = "View All Jobs";
        $this->view->categories = $this->model->getJobs(1);
        $this->view->render('header');
        $this->view->render('results/index');
        $this->view->render('footer');
    }

    function job($id = 1,$salary = 0)
    {
        $this->statistics->insertPageView('results/job/');
        $job = $this->model->getJob($id);
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Jobs'.$job;
        $this->view->job=$job;
        $this->view->salary = $salary;
        $this->view->render('header');
        $this->view->render('results/job');
        $this->view->render('footer');
    }

    function jobs($salary = 0){
        $this->statistics->insertPageView('results/jobs/');
        $this->view->headerText = "View Jobs By Category";
        $this->view->categories = $this->model->getJobs($salary);
        $this->view->render('header');
        $this->view->render('results/index');
        $this->view->render('footer');
    }

    function category($category){
        $this->statistics->insertPageView('results/category/');
        $category = base64_decode($category);
        $this->view->lifestyleComplete = $this->model->lifestyleComplete();
        $this->view->category = $category;
        $this->view->jobs = $this->model->getJobsByCategory($category);
        $this->view->render('header');
        $this->view->render('results/category');
        $this->view->render('footer');
    }

}