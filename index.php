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

// Instantiate the Controller
$controller = new QuizController($f3);

// Define routes using the controller functions
$f3->route('GET /', 'QuizController->home');
$f3->route('GET /addChoice', 'QuizController->addChoice');
$f3->route('GET|POST /addTriviaTitle', 'QuizController->addTriviaTitle');
$f3->route('GET|POST /addTriviaQuestions', 'QuizController->addTriviaQuestions');
$f3->route('GET|POST /addPersonalityTitle', 'QuizController->addPersonalityTitle');
$f3->route('GET|POST /addPersonalityQuestions', 'QuizController->addPersonalityQuestions');

$f3->route('GET /selectTrivia', 'QuizController->selectTrivia');
$f3->route('GET /selectPersonality', 'QuizController->selectPersonality');



// Run Fat-Free
$f3->run();