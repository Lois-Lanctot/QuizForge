<?php

//Require the file that contains DB config
require ($_SERVER['DOCUMENT_ROOT'].'/../config.php');


/**
 * Able to pull and add data from/to the database
 */
class QuizDataLayer
{

    /**
     * @var PDO the database connection object
     */
    private $_dbh;

    /**
     * @var string current quiz title
     */
    private $_quiz_title;

    /**
     * @var string current quiz description
     */
    private $_quiz_desc;

    /**
     * @var array-key current quiz questions
     */
    private $_questions;

    /**
     * constructor for the QuizDataLayer
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
     * Setter for the quiz title
     * @param string $quiz_title
     */
    function setQuizTitle($quiz_title)
    {
        $this->_quiz_title = $quiz_title;
    }

    /**
     * Setter for the quiz description
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
     * Setter for the quiz questions
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


    /**
     * getter for the trivia quiz titles in the database
     * @return array|false
     */
    function getTriviaQuizTitles()
    {

        //SELECT Query
        //1.
        $sql = "SELECT title FROM t_quiz";

        //2.
        $statement = $this->_dbh->prepare($sql);

        //4.
        $statement->execute();

        //5.
        // Return the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }


    /**
     * Adds a quiz to the database
     * @return void
     */
    function addQuiz()
    {
        // the method also generates a unique key and saves it to an array in data-layer

        //  you'll eventually send the array to the getTriviaQuiz page method
        //      there's a part in the html display pages that will 'include' a php page (A)
        //       (A) will use echo statements to display the data...
        //               using a method in data-layer that somehow sends the data


        //check if any of the fields are blank, if they are you can't add the Quiz
        //if there's stuff in the variables, add a new quiz to the database
    }

}
