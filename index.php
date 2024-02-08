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


$f3->route('GET /addChoice', function() {

    //Display a view page
    $view = new Template();
    echo $view->render('views/add/choice.html');
});


$f3->route('GET|POST /addTriviaTitle', function($f3) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $desc = $_POST['desc'];
        $title = $_POST['title'];

        $f3->set('SESSION.desc', $desc);
        $f3->set('SESSION.title', $title);

//        $f3->reroute('order2');
    }

    $view = new Template();
    echo $view->render('views/add/trivia/trivia_title.html');
});




$f3->route('GET|POST /addPersonalityTitle', function($f3) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $desc = $_POST['desc'];
        $title = $_POST['title'];

        $f3->set('SESSION.desc', $desc);
        $f3->set('SESSION.title', $title);

//        $f3->reroute('order2');
    }

    $view = new Template();
    echo $view->render('views/add/personality/personality_title.html');
});





//Run Fat-Free
$f3->run();
