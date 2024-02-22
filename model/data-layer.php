<?php
// able to pull and add data from/to the database

//Require the file that contains DB config
require ($_SERVER['DOCUMENT_ROOT'].'/../config.php');

class QuizDataLayer {

    /**
     * @var PDO the database connection object
     */
    private $_dbh;
    private $_quiz_title;
    private $_quiz_desc;
    private $_questions;

    /**
     * @param PDO $_dbh
     * @param $_quiz_title
     * @param $_quiz_desc
     * @param $_questions
     */
    function __construct()
    {
        try {
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->_quiz_title = "";
        $this->_quiz_desc = "";
        $this->_questions = [];

    }

    /**
     * @param string $quiz_title
     */
    function setQuizTitle($quiz_title)
    {
        $this->_quiz_title = $quiz_title;
    }

    /**
     * @param string $quiz_desc
     */
    function setQuizDesc($quiz_desc)
    {
        $this->_quiz_desc = $quiz_desc;
    }





//$title = "Sample Question?";

//$options = [
//1 => [
//'title' => "Option 1.",
//'result' => true,
//],
//2 => [
//'title' => "Option 2.",
//'result' => false,
//],
    // Add more options as needed
//];
// Call the setQuestions method with the provided title and options array
//setQuestions($title, $options);

    /**
     * @param string $title question title
     * @param mixed $options associative array of option names and results
     */
    function setQuestions($title, $options)
    {
        // Create a new associative array for the questions
        $this->_questions = [
            'title' => $title,
            'options' => [],
        ];

        foreach ($options as $key => $value) {
            // Add each option as an associative array to the 'options' array
            $this->_questions['options'][$key] = [
                'name' => $value['string'], // Assuming 'string' is the key for the string in the $options array
                'value' => $value['boolean'], // Assuming 'boolean' is the key for the boolean in the $options array
            ];
        }
    }




    function addQuiz($title, $desc) {
        // the method also generates a unique key and saves it to an array in data-layer

        //  you'll eventually send the array to the getTriviaQuiz page method
        //      there's a part in the html display pages that will 'include' a php page (A)
        //       (A) will use echo statements to display the data...
        //               using a method in data-layer that somehow sends the data


        //check if any of the fields are blank, if they are you can't add the Quiz
        //if there's stuff in the variables, add a new quiz to the database

    }
}
