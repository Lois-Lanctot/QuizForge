<?php
class QuizController
{
    private $_f3; // Fat-Free instance

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    // Default route
    function home()
    {
        // Display the home view page
        $view = new Template();
        echo $view->render('views/home.php');
    }

    // Route to add choice
    function addChoice()
    {
        // Display the add choice view page
        $view = new Template();
        echo $view->render('views/add/choice.php');
    }

    // Route to add trivia title
    function addTriviaTitle()
    {
        // Handle POST request to add trivia title
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate
            if (!validQuizTitle($_POST['title'])) {
                $this->_f3->set('errors["quiz_title"]', "Invalid Quiz Title");
            }

            if (!validDesc($_POST['desc'])) {
                $this->_f3->set('errors["quiz_desc"]', "Invalid Quiz Description");
            }

            // Connect to the database
            $dbh = connectToDB();

            // Send title and desc to data-layer to add data to the database
            addQuiz($_POST['title'], $_POST['desc']);

            if (empty($this->_f3->get('errors'))) {
                // If there are no errors, reroute
                $this->_f3->reroute('/addChoice');
            }
        }

        // Display the add trivia title view page
        $view = new Template();
        echo $view->render('views/add/trivia/trivia_title.php');
    }

    // Route to add personality title
    function addPersonalityTitle()
    {
        // Handle POST request to add personality title
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate
            if (!validQuizTitle($_POST['title'])) {
                $this->_f3->set('errors["quiz_title"]', "Invalid Quiz Title");
            }

            if (!validDesc($_POST['desc'])) {
                $this->_f3->set('errors["quiz_desc"]', "Invalid Quiz Description");
            }

            // Connect to the database
            $dbh = connectToDB();

            // Send title and desc to data-layer to add data to the database
            addQuiz($_POST['title'], $_POST['desc']);

            if (empty($this->_f3->get('errors'))) {
                // If there are no errors, reroute
                $this->_f3->reroute('/addChoice');
            }
        }

        // Display the add personality title view page
        $view = new Template();
        echo $view->render('views/add/personality/personality_title.php');
    }
}