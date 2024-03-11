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
    function addQuizToFile($questionsData)
    {
        if (empty($this->_quiz_title) || empty($this->_quiz_desc) || empty($questionsData)) {
            // If any of the fields are blank
            echo "One of the fields is blank.";
            return;
        }

        try {
            // Array for SQL statements
            $sqlStatements = [];

            // Get the new quiz index
            $quizId = $this->getNewQuizIndex();
            $questionId = $this->getNewQuestionIndex();


            // Insert SQL statement for quiz title + description
            $sqlStatements[] = "INSERT INTO t_quiz (id, title, description) VALUES ('$quizId', '{$this->_quiz_title}', '{$this->_quiz_desc}')";

            // Count of questions
            $questionCount = $questionId;

            // Iterate through each question
            foreach ($questionsData as $questionIndex => $question) {


                // Insert SQL statement for each question
                $questionTitle = $question[$questionIndex + 1]['title'];
                $sqlStatements[] = "INSERT INTO t_questions (quiz_id, title, options_id) VALUES ('$quizId', '{$questionTitle}', " . $questionCount. ")";

                // Loop through each option and result to add to the table
                foreach ($question[$questionIndex + 1]['options'] as $optionIndex => $optionTitle) {

                    // Check if the option is selected in results
                    $resultValue = isset($question[$questionIndex + 1]['results'][$optionIndex]) ? $question[$questionIndex + 1]['results'][$optionIndex] : null;

                    // Debugging output
                    echo "Option: $optionTitle, Result: $resultValue<br>";

                    // Check if the result is set and not empty
                    if ($resultValue !== null && $resultValue !== '') {
                        $isCorrect = ($resultValue == "1") ? 1 : 0; // Existing logic

                        // If there should be only one correct answer, update the logic
                        if ($isCorrect) {
                            $sqlStatements[] = "INSERT INTO t_options (id, name, result) VALUES ('$questionCount', '{$optionTitle}', 1)";
                        } else {
                            $sqlStatements[] = "INSERT INTO t_options (id, name, result) VALUES ('$questionCount', '{$optionTitle}', 0)";
                        }

                    }


                }
                $questionCount++;

            }

            // Write SQL statements to trivia.sql to be run manually
            foreach ($sqlStatements as $sqlStatement) {
                $this->writeSqlToFile($sqlStatement);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }








    /**
     * Write the given SQL statement to trivia.sql
     * @param $sqlStatement string and SQL statement to be written to a file
     * @return void
     */
    function writeSqlToFile($sqlStatement)
    {

        try {
            // open the file (and create the file if it doesn't exist)
            $fileHandle = fopen('trivia.sql', 'a');

            if ($fileHandle === false) {
                // if the file wasn't opened
                throw new Exception("Unable to open file");
            }

            // put the SQL statement in the file
            fwrite($fileHandle, $sqlStatement . ";\n");

            fclose($fileHandle);

        }
        catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }


    }


    function getNewQuizIndex() {
        $file = 'trivia.sql';
        $index = 0;

        $sqlStatements = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($sqlStatements as $sqlStatement) {
            // Check if the line starts with the desired pattern
            if (strpos($sqlStatement, 'INSERT INTO t_quiz') === 0) {
                $index++;
            }

        }

        return $index; // Return 0 if no match is found
    }

    function getNewQuestionIndex() {
        $file = 'trivia.sql';
        $index = 0;

        $sqlStatements = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($sqlStatements as $sqlStatement) {
            // Check if the line starts with the desired pattern
            if (strpos($sqlStatement, 'INSERT INTO t_questions') === 0) {
                $index++;
            }

        }
        return $index; // Return 0 if no match is found
    }


    public function displayResultsAndOptions()
    {
        if (empty($this->_questions)) {
            echo "No questions available.";
            return;
        }

        foreach ($this->_questions as $questionIndex => $question) {
            echo "Question " . ($questionIndex + 1) . ":\n";
            echo "Title: " . $question['title'] . "\n";

            if (!empty($question['options'])) {
                echo "Options:\n";
                foreach ($question['options'] as $optionIndex => $option) {
                    $result = isset($question['results'][$optionIndex]) ? $question['results'][$optionIndex] : false;
                    echo "  - Option " . ($optionIndex + 1) . ": " . $option . " (Result: " . ($result ? 'Correct' : 'Incorrect') . ")\n";
                }
            } else {
                echo "No options available for this question.\n";
            }

            echo "\n";
        }
    }







}