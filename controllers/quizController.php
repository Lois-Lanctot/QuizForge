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
            if (strlen($_POST['title']) > 255) {
                $this->_f3->set('errors["quiz_title"]', "Quiz Title must be 255 characters or less");
            }

            if (!validDesc($_POST['desc'])) {
                $this->_f3->set('errors["quiz_desc"]', "Invalid Quiz Description");
            }
            if (strlen($_POST['desc']) > 500) {
                $this->_f3->set('errors["quiz_desc"]', "Quiz Description must be 500 characters or less");
            }

            // If there are no errors
            if (empty($this->_f3->get('errors'))) {

                //instantiate DataLayer object
                $data_layer = new QuizDataLayer();

                // Send title and desc to data-layer to add data to the database
                $data_layer->setQuizTitle($_POST['title']);
                $data_layer->setQuizDesc($_POST['desc']);

                $this->_f3->reroute('/addTriviaQuestions');
            }
        }

        // Display the add trivia title view page
        $view = new Template();
        echo $view->render('views/add/trivia/trivia_title.php');
    }



    function addTriviaQuestions()
    {
        // Handle POST request to add personality title
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // TODO: Validate questions

            // If there are no errors
            if (empty($this->_f3->get('errors'))) {

                // Instantiate DataLayer object
                $data_layer = new QuizDataLayer();

                // TODO: prepare questions to be sent to the data-layer to set questions


                // set questions
//                $data_layer->setQuestions($_POST['question']);

                $this->_f3->reroute('/addChoice');
            }
        }

        // Display the add personality title view page
        $view = new Template();
        echo $view->render('views/add/trivia/trivia_questions.html');
    }


    // Route to add personality title
    function addPersonalityTitle()
    {
        // Handle POST request to add trivia title
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate
            if (!validQuizTitle($_POST['title'])) {
                $this->_f3->set('errors["quiz_title"]', "Invalid Quiz Title");
            }
            if (strlen($_POST['title']) > 255) {
                $this->_f3->set('errors["quiz_title"]', "Quiz Title must be 255 characters or less");
            }

            if (!validDesc($_POST['desc'])) {
                $this->_f3->set('errors["quiz_desc"]', "Invalid Quiz Description");
            }
            if (strlen($_POST['desc']) > 500) {
                $this->_f3->set('errors["quiz_desc"]', "Quiz Description must be 500 characters or less");
            }

            // If there are no errors
            if (empty($this->_f3->get('errors'))) {

                //instantiate DataLayer object
                $data_layer = new QuizDataLayer();

                // Send title and desc to data-layer to add data to the database
                $data_layer->setQuizTitle($_POST['title']);
                $data_layer->setQuizDesc($_POST['desc']);

                $this->_f3->reroute('/addPersonalityQuestions');
            }
        }

        // Display the add personality title view page
        $view = new Template();
        echo $view->render('views/add/personality/personality_title.html');
    }

    function addPersonalityQuestions()
    {
        // Handle POST request to add personality title
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // TODO: Validate questions

            // If there are no errors
            if (empty($this->_f3->get('errors'))) {

                // Instantiate DataLayer object
                $data_layer = new QuizDataLayer();

                // TODO: prepare questions to be sent to the data-layer to set questions


                // set questions
//                $data_layer->setQuestions($_POST['question']);

                $this->_f3->reroute('/addChoice');
            }
        }

        // Display the add personality title view page
        $view = new Template();
        echo $view->render('views/add/personality/personality_questions.html');
    }





    function selectTrivia()
    {
        // Display the add choice view page
        $view = new Template();
        echo $view->render('views/select/select_trivia.html');
    }

    function selectPersonality()
    {
        // Display the add choice view page
        $view = new Template();
        echo $view->render('views/select/select_personality.html');

    }
}