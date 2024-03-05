<?php


class Quiz
{

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
     * constructor for the Quiz object
     */
    function __construct($_quiz_title, $_quiz_desc)
    {
        $this->_quiz_title = $_quiz_title;
        $this->_quiz_desc = $_quiz_desc;
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



    /**
     * Setter for the quiz questions
     * @param array $questionsData an array of questions with titles, options, and results
     *                              Example structure:
     *                              [
     *                                  [1 => ['title' => 'title 1', 'options' => ['Option 1', 'Option 2'], 'results' => [true, false]]],
     *                                  [2 => ['title' => 'title 2', 'options' => ['Option A', 'Option B'], 'results' => [false, true]]],
     *                                  // etc
     *                              ]
     */
    function setQuestions($questionsData)
    {
        $questionsArray = [];

        foreach ($questionsData as $questionItem) {
            foreach ($questionItem as $questionIndex => $questionData) {
                $questionTitle = $questionData['title'];
                $options = $questionData['options'];
                $results = $questionData['results'];

                $questionArray = [
                    $questionIndex => [
                        'title' => $questionTitle,
                        'options' => $options,
                        'results' => $results,
                    ],
                ];

                $questionsArray[] = $questionArray;
            }
        }

        $this->_questions = $questionsArray;
    }



    /**
     * @return string
     */
    public function getQuizTitle()
    {
        return $this->_quiz_title;
    }

    /**
     * @return string
     */
    public function getQuizDesc()
    {
        return $this->_quiz_desc;
    }

    /**
     * @return array
     */
    public function getQuestions()
    {
        return $this->_questions;
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