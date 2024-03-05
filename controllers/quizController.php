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

                //instantiate new Quiz object
                $quiz = new Quiz($_POST['title'], $_POST['desc']);
                $this->_f3->set('SESSION.quiz', $quiz);

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
        // Handle POST request to add trivia questions
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // get the quiz object from the session
            $quiz = $this->_f3->get('SESSION.quiz');

            // prepare questions to be sent to the data-layer to set questions
            $questionsData = [];

            $questionIndex = 1;
            while (isset($_POST['question_title' . $questionIndex])) {
                $questionTitle = $_POST['question_title' . $questionIndex];
                $options = [];
                $results = [];

                $optionIndex = 1;
                while (isset($_POST['question' . $questionIndex . '_text' . $optionIndex])) {
                    $optionTitle = $_POST['question' . $questionIndex . '_text' . $optionIndex];
                    $options[] = $optionTitle;

                    $results[] = isset($_POST['question' . $questionIndex . '_radio' . $optionIndex]);

                    $optionIndex++;
                }

                // add the question to the questionsData array
                $questionsData[] = [
                    $questionIndex => [
                        'title' => $questionTitle,
                        'options' => $options,
                        'results' => $results,
                    ],
                ];

                $questionIndex++;
            }

                // TODO: Validate questions


            if (empty($this->_f3->get('errors'))) {
                // put questions in the quiz object
                $quiz->setQuestions($questionsData);

                echo "<pre>";
                var_dump($quiz->getQuizTitle());
                var_dump($quiz->getQuizDesc());
                var_dump($quiz->getQuestions());
                echo "</pre>";

//                $this->_f3->reroute('/selectTrivia');
            }
        }

        // Display the add trivia questions view page
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