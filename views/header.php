<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="<?php echo URL; ?>public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo URL; ?>public/favicon.ico" type="image/x-icon">

    <title><?= (isset($this->title)) ? $this->title : 'Midlands Technical College | Lifestyle Quiz'; ?></title>

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/normal ize.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
    <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:300,700' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/js/vendor/custom.modernizr.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.menuFlip.js"></script>
    <script src="<?php echo URL; ?>public/js/custom.js"></script>

    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>
</head>

<body class="home">
<nav class="top-bar">
    <ul class="title-area">
        <li class="name"><h1><a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/images/logo.png"
                                                               alt="Midlands Technical College"></a></h1></li>
        <li class="toggle-topbar menu-icon"><a href><span></span></a></li>
    </ul>

    <section class="top-bar-section">
        <ul class="right">
            <li><a href="<?php echo URL; ?>dashboard" class="red">Dashboard</a></li>
            <li class="has-dropdown"><a href="<?php echo URL; ?>/quizzes" class="blue">Quizzes</a>
                <ul class="dropdown">
                    <li><a href="<?php echo URL; ?>lifestyle" class="blue">Lifestyle</a></li>
                    <!--<li><a href="<?php echo URL; ?>career" class="blue disabled">Career</a></li>-->
                </ul>
            </li>
            <li><a href="<?php echo URL; ?>results/jobs/1" class="orange">Careers</a></li>
            <?php if (Session::get('loggedIn') == false): ?>
                <li><a href="<?php echo URL; ?>login" class="green">Login</a></li>
            <?php else: ?>
                <li><a href="<?php echo URL; ?>login/logout" class="green">Logout</a></li>
            <?php endif; ?>
        </ul>
    </section>
</nav>

<div class="colors show-for-small hide-for-medium-up">
    <span class="yellow"></span>
    <span class="red"></span>
    <span class="blue"></span>
    <span class="orange"></span>
    <span class="green"></span>
</div>