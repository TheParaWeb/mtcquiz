<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/5/13
 * Time: 11:48 AM
 */

class Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_ADMIN');
    }

    // Page generation.
    function index()
    {
        Auth::handleLogin(true);
        $this->view->js = array(
            'admin/js/js.js'
        );
        $this->view->js = array('admin/js/admin.js');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Admin';
        $this->view->render('admin/header');
        $this->view->render('admin/index');
        $this->view->render('footer');
    }

    function login()
    {
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Admin Login';
        $this->view->render('admin/header');
        $this->view->render('admin/login');
        $this->view->render('footer');
    }

    function profile($msg = null)
    {
        Auth::handleLogin(true);
        $this->view->secQuestions = $this->model->getSecQuestions();
        $this->view->admin = $this->model->getAdmin(Session::get('userid'));
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | My Profile';
        $this->view->render('admin/header');
        $this->view->render('admin/profile');
        $this->view->render('footer');
    }

    function administrators()
    {
        Auth::handleLogin(true);
        $this->view->js = array(
            'admin/js/administrators.js'
        );
        $this->view->msg1 = Session::get('msg');
        Session::kill('msg1');
        $this->view->msg2 = Session::get('msg');
        Session::kill('msg2');
        $this->view->users = $this->model->getAllAdmins();
        $this->view->role = Session::get('role');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Add Administrator';
        $this->view->render('admin/header');
        $this->view->render('admin/administrators');
        $this->view->render('footer');
    }

    function editAdmin($userId)
    {
        Auth::handleLogin(true);
        $this->view->title="Midlands Technical College | Admin | Add Student";
        $this->view->admin = $this->model->getAdmin($userId);
        $this->view->secQuestions = $this->model->getSecQuestions();
        $this->view->render('admin/header');
        $this->view->render('admin/editAdmin');
        $this->view->render('footer');
    }

    function editJobs(){
        Auth::handleLogin(true);
        $this->view->js = array(
            'admin/js/editJobs.js'
        );
        $this->jobs = new Jobs();
        $this->view->jobCategories = $this->jobs->getJobCategories();
        $this->view->jobs=$this->jobs->getAllJobs();
        $this->view->role = Session::get('role');
        $this->view->title="Midlands Technical College | Admin | Edit Jobs";
        $this->view->render('admin/header');
        $this->view->render('admin/editJobs');
        $this->view->render('footer');
    }

    function editSchools(){
        Auth::handleLogin(true);
        $this->view->js = array(
            'admin/js/editSchools.js'
        );
        $this->schools = new Schools();
        $this->view->activeDistricts = $this->schools->getActiveDistricts();
        $this->view->schoolDistricts = $this->schools->getSchoolDistricts();
        $this->view->role = Session::get('role');
        $this->view->title="Midlands Technical College | Admin | Edit Schools";
        $this->view->render('admin/header');
        $this->view->render('admin/editSchools');
        $this->view->render('footer');
    }

    function editCategory($category){
        Auth::handleLogin(true);
        $this->view->category = $category;
        $this->view->title="Midlands Technical College | Admin | Edit Category";
        $this->view->render('admin/header');
        $this->view->render('admin/editCategory');
        $this->view->render('footer');
    }

    function students()
    {
        Auth::handleLogin(true);
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Admin | Edit Students';
        $this->view->render('admin/header');
        $this->view->render('admin/students');
        $this->view->render('footer');
    }

    function updateRequired()
    {
        Auth::handleLogin(true);
        $this->view->secQuestions = $this->model->getSecQuestions();
        $this->view->admin = $this->model->getAdmin(Session::get('userid'));
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | My Profile';
        $this->view->render('admin/header');
        $this->view->render('admin/updateRequired');
        $this->view->render('footer');
    }

    function statistics()
    {
        Auth::handleLogin(true);
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Statistics';
        $this->view->render('admin/header');
        $this->view->render('admin/statistics');
        $this->view->render('footer');
    }



    // Functions
    function adminLogin()
    {
        $this->model->adminLogin();
    }

    function logout()
    {
        $this->model->logout();
    }

    function createAdmin()
    {
        $message = $this->model->createAdmin();
        Session::set('msg', $message);
        header('location: ' . URL . 'admin/administrators');
    }

    function updateAdministrator($userId){
        $this->model->updateAdministrator($userId);
        header('Location: '.URL.'admin/administrators/');
    }


    // Edit Jobs

    // CRUD Jobs -> Categories
    function updateCategory($category){
        $this->model->updateCategory($category);
        header('Location: '.URL.'admin/editJobs/');
    }

    function deleteCategory($category){
        $this->model->deleteCategory($category);
        header('Location: '.URL.'admin/editJobs/');
    }

    function createCategory(){
        $this->model->createCategory();
        header('Location: '.URL.'admin/editJobs/');
    }

    // CRUD Jobs -> Jobs

    function updateJob($id){
        $this->model->updateJob($id);
        header('Location: '.URL.'admin/editJobs/');
    }

    function deleteJob($id){
        $this->model->deleteJob($id);
        header('Location: '.URL.'admin/editJobs/');
    }

    function createJob(){
        $this->model->createJob();
        header('Location: '.URL.'admin/editJobs/');
    }

    // CRUD Admin
    function deleteAdmin($userId){
        $this->model->deleteAdmin($userId);
        header('Location: '.URL.'admin/administrators/');
    }

    function createStudent()
    {
        $this->model->createStudent();
        header('location: ' . URL . 'admin/addStudent');
    }

    // TODO: Remove Logic Code from controller.
    function updateProfile($id, $returnPage = 'profile')
    {
        Auth::handleLogin(true);
        if ($_POST['password1'] != $_POST['password2']) {
            $admin = $this->model->getAdmin(Session::get('userid'));
            $password = $this->model->nsEncrypt->decrypt($admin[0]['password']);
            if ($_POST['password1'] != $password || strlen($_POST['password2']) != 0) {
                Session::set('msg', array('error' => 'Oops! Your passwords do not match!'));
                header('location: ' . URL . 'admin/profile');
            }
        }
        $data = array();
        $data['userid'] = Session::get('userid');
        $data['login'] = $_POST['email'];
        $data['password'] = $_POST['password1'];
        $data['question'] = $_POST['question'];
        $data['answer'] = $_POST['answer'];
        if ($this->model->updateProfile($data)) {
            Session::set('msg', array('success' => 'Successfully updated your profile!'));
            header('location: ' . URL . 'admin/' . $returnPage);
        } else {
            header('location: ' . URL . 'error/index');
        }
    }


    // AJAX
    function xhrGetQuizStats()
    {
        $this->model->getQuizStats();
    }

    function xhrGetPageStats(){
        $this->model->getPageStats();
    }

    function xhrGetSalaryStats(){
        $this->model->getSalaryStats();
    }

    function xhrGetJob(){
        $this->model->getJob();
    }

}