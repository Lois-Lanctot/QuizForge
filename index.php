<?php
/*
 * Lois Lanctot, Noah Lanctot
 * February 2024
 * https://lois.greenriverdev.com/328/QuizForge/
 * This is my CONTROLLER for the QuizForge app
 */

//Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Require the autoload file
require_once ('vendor/autoload.php');

//Instantiate F3
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {

    //Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run Fat-Free
$f3->run();
