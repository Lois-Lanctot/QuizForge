<?php
/*
 * Authors: Noah Lanctot, Lois Lanctot
 * Date: February 2024
 * Description: This is our CONTROLLER for the QuizForge app
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

//connect to database
require ($_SERVER['DOCUMENT_ROOT'].'/../config.php');


//SELECT Query
//1.
$sql = "SELECT title, description FROM t_quiz";

//2.
$statement = $this->_dbh->prepare($sql);

//4.
$statement->execute();

//5.
// Return the results
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($statement->rowCount() == 0) {
    echo "<p>No match found</p>";
}
else {
    $title = $result['title'];
    $desc = $result['description'];

    echo "<p>Pet ID: $title</p>";
    echo "<p>Name: $desc</p>";

}