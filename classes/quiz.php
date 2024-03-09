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

        foreach ($questionsData as $questionIndex => $questionData) {
            if (is_array($questionData) && array_key_exists('title', $questionData)) {
                $questionTitle = $questionData['title'];
                $options = isset($questionData['options']) ? $questionData['options'] : [];
                $results = isset($questionData['results']) ? $questionData['results'] : [];


                $questionArray = [
                    'title' => $questionTitle,
                    'options' => $options,
                    'results' => $results,
                ];

                $questionsArray[] = $questionArray;
            } else {
                // Handle the case where $questionData is not an array or doesn't have a 'title' key
                echo "Error: Invalid data structure for a question.";
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
     * @return int|string
     */
    public function getQuestions()
    {
        return $this->_questions;
    }





    /**
     * Adds a quiz to the database
     * @return void
     */
    /**
     * Adds a quiz to the database
     * @return void
     */
    function addQuizToFile($questionsData)
    {
        // Check if any of the fields are blank
        if (empty($this->_quiz_title) || empty($this->_quiz_desc) || empty($questionsData)) {
            // Handle error or return an error message
            // For example, you might throw an exception or set an error flag.
            // For simplicity, I'm echoing an error message.
            echo "Error: Quiz title, description, and questions must be provided.";
            return;
        }

        try {
            // Create an array to store SQL statements
            $sqlStatements = [];

            // Insert quiz into t_quiz table
            $sqlStatements[] = "INSERT INTO t_quiz (title, description) VALUES ('{$this->_quiz_title}', '{$this->_quiz_desc}')";

            // Get the last inserted quiz ID
            $quizId = count($sqlStatements);

            // Loop through each question
            foreach ($questionsData as $question) {
                // Insert question into t_questions table
                if (array_key_exists('title', $question)) {
                    // Access the 'title' key if it exists
                    // TODO:
                    $questionTitle = $question['title'];
                    $sqlStatements[] = "INSERT INTO t_questions (quiz_id, title) VALUES ($quizId, '{$questionTitle}')";

                    // Get the last inserted question ID
                    $questionId = count($sqlStatements);

                    // Loop through each option
                    foreach ($question['options'] as $optionIndex => $optionTitle) {
                        $result = $question['results'][$optionIndex] ? 1 : 0;
                        $sqlStatements[] = "INSERT INTO t_options (id, name, result) VALUES ($questionId, '{$optionTitle}', $result)";
                    }
                } else {
                    // Handle the case where 'title' key is not present
                    echo "Error: 'title' key not found in a question data.";
                }
            }

            // Write SQL statements to a file
            foreach ($sqlStatements as $sqlStatement) {
                $this->writeSqlToFile($sqlStatement);
            }

            echo "SQL statements written to trivia.sql successfully!";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }





    function writeSqlToFile($sqlStatement)
    {

        try {
            // Open the file in append mode (creates the file if it doesn't exist)
            $fileHandle = fopen('trivia.sql', 'a');

            if ($fileHandle === false) {
                throw new Exception("Unable to open file: trivia.sql");
            }

            // Write the SQL statement to the file
            fwrite($fileHandle, $sqlStatement . ";\n");

            // Close the file handle
            fclose($fileHandle);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

//        $fileContent = file_get_contents('trivia.sql');
//        echo $fileContent;

    }



}