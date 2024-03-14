<?php

//Require the file that contains DB config
require ($_SERVER['DOCUMENT_ROOT'].'/../config.php');


/**
 * Able to pull and add data from/to the database
 * @author Lois Lanctot, Noah Lanctot
 * @version 1.0
 */
class QuizDataLayer
{

    /**
     * @var PDO the database connection object
     */
    private $_dbh;


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


    }


    /**
     * getter for the trivia quiz titles in the database
     * @return array|false
     */
    function getTriviaQuizTitles()
    {

        //SELECT Query
        //1.
        $sql = "SELECT title, description FROM t_quiz";

        //2.
        $statement = $this->_dbh->prepare($sql);

        //4.
        $statement->execute();

        //5.
        // Return the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}
