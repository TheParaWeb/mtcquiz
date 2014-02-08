<?php
class Auth
{
    public static function handleLogin($admin = false)
    {
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            Session::destroy();
            if ($admin) {
                header('location: ../admin/login');
            } else {
                //$visitorId = Session::get('visitorId');
                //setcookie('visitorId',$visitorId,time()+60*60*24,'/');
                header('location: ../login');
            }
            exit;
        }
    }
}