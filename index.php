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
<<<<<<< HEAD
require_once 'vendor/autoload.php';
require_once 'controllers/quizController.php';
=======
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validate.php');

//connect to database
echo $_SERVER['DOCUMENT_ROOT'];
require ($_SERVER['DOCUMENT_ROOT'].'/../config.php');


try {
    //instantiate a PDO database connection object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'Connected to database!';
}
catch (PDOException $e) {
//    if ($_SESSION['user'] instanceof Admin) echo $e->getMessage(); #temporary
//    else echo 'oh no!';
    echo $e->getMessage(); #temporary
}


>>>>>>> 8391ac603e5f6699be87f5585c6db24308a2ded2

// Instantiate F3
$f3 = Base::instance();

// Instantiate the Controller
$controller = new QuizController($f3);

// Define routes using the controller functions
$f3->route('GET /', 'QuizController->home');
$f3->route('GET /addChoice', 'QuizController->addChoice');
$f3->route('GET|POST /addTriviaTitle', 'QuizController->addTriviaTitle');
$f3->route('GET|POST /addPersonalityTitle', 'QuizController->addPersonalityTitle');

// Run Fat-Free
$f3->run();