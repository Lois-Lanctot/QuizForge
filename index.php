<?php
/*
 * Authors: Noah Lanctot, Lois Lanctot
 * Date: February 2024
 * Description: This is our CONTROLLER for the QuizForge app
 * Website: https://lois.greenriverdev.com/328/QuizForge/
 */

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validate.php');

// Instantiate F3
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {

    // Display the home view page
    $view = new Template();
    echo $view->render('views/home.html');
});


$f3->route('GET /addChoice', function() {

    // Display the add choice view page
    $view = new Template();
    echo $view->render('views/add/choice.html');
});


$f3->route('GET|POST /addTriviaTitle', function($f3) {

    // Handle POST request to add trivia title
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //validate
        if (!validQuizTitle($_POST['title'])) {
            $f3->set('errors["quiz_title"]', "Invalid Quiz Title");
        }

        if (!validDesc($_POST['desc'])) {
            $f3->set('errors["quiz_desc"]', "Invalid Quiz Description");
        }

        //send title and desc to data-layer to add data to the database
        addQuiz($_POST['title'], $_POST['desc']);


        if (empty($f3->get('errors'))) {
            //if there are no errors
            $f3->reroute('/addChoice');
        }

    }

    // Display the add trivia title view page
    $view = new Template();
    echo $view->render('views/add/trivia/trivia_title.html');
});


$f3->route('GET|POST /addPersonalityTitle', function($f3) {

    // Handle POST request to add personality title
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //validate
        if (!validQuizTitle($_POST['title'])) {
            $f3->set('errors["quiz_title"]', "Invalid Quiz Title");
        }

        if (!validDesc($_POST['desc'])) {
            $f3->set('errors["quiz_desc"]', "Invalid Quiz Description");
        }


        //send title and desc to data-layer to add data to the database
        addQuiz($_POST['title'], $_POST['desc']);


        if (empty($f3->get('errors'))) {
            //if there are no errors
            $f3->reroute('/addChoice');
        }
    }

    // Display the add personality title view page
    $view = new Template();
    echo $view->render('views/add/personality/personality_title.html');
});


// Run Fat-Free
$f3->run();
?>