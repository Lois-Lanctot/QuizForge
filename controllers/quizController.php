<?php

/**
 * Controller object to define routes
 */
class QuizController
{
    private $_f3; // Fat-Free instance


    /**
     * constructor for the QuizController object
     * @param $f3
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * sets up the default route
     * @return void
     */
    function home()
    {
        // Display the home view page
        $view = new Template();
        echo $view->render('views/home.php');
    }


    /**
     * sets up the route for the select quiz page
     * @return void
     */
    function selectTrivia()
    {

        $title = $GLOBALS['dataLayer']->getTriviaQuizTitles();
        $this->_f3->set('titles', $title);


        // Display the add choice view page
        $view = new Template();
        echo $view->render('views/select/select_trivia.html');
    }


    /**
     * sets up the route for the add choice page
     * @return void
     */
    function addChoice()
    {
        // Display the add choice view page
        $view = new Template();
        echo $view->render('views/add/choice.php');
    }


    /**
     * sets up the route for the add quiz title page
     * @return void
     */
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
        echo $view->render('views/add/trivia/trivia_title.html');
    }


    /**
     * sets up the route for the add quiz questions page
     * @return void
     */
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

//                $this->_f3->reroute('/addChoice');

//                var_dump($_POST['question1_text1']);
//                var_dump($_POST['question_title1']);

                // radio button stuff
//                if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                    if (isset($_POST['question1_radio1'])) {
//                        $selectedOption = $_POST['question1_radio1'];
//
//                        if ($selectedOption == 'option1') {
//                            echo "Option 1 (question1Radio1) was selected.";
//                        } elseif ($selectedOption == 'option2') {
//                            echo "Option 2 (question1Radio2) was selected.";
//                        } else {
//                            echo "Unknown option selected.";
//                        }
//                    } else {
//                        echo "No option selected.";
//                    }
//                }



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





    function selectPersonality()
    {
        // Display the add choice view page
        $view = new Template();
        echo $view->render('views/select/select_personality.html');

    }
}