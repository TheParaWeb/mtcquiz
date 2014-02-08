<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:07 PM
 */

class Email extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->model->sendEmail();
    }

}