<?php
// validate form data


/**
 * validates quiz title
 * @param $title
 * @return bool
 */
function validTitle($title)
{
    // Check if the title is not empty, is not longer than 255 characters,
    // and contains only alphanumeric characters, spaces, and common punctuation marks
    return !empty($title) && strlen($title) <= 255 && preg_match('/^[a-zA-Z0-9\s.,?!\'"-]+$/', $title);
}


/**
 * validates quiz description
 * @param $desc
 * @return bool
 */
function validDesc($desc)
{
    // Check if the description is not longer than 255 characters
    // and contains only alphanumeric characters, spaces, and common punctuation marks
    return strlen($desc) <= 255 && preg_match('/^[a-zA-Z0-9\s.,?!\'"-]+$/', $desc);
}


/**
 * validates the quiz questions form fields array
 * @param $questions array an array of questions, options, and results
 * Example structure:
 *                               [
 *                                   [1 => ['title' => 'title 1', 'options' => ['Option 1', 'Option 2'], 'results' => [true, false]]],
 *                                   [2 => ['title' => 'title 2', 'options' => ['Option A', 'Option B'], 'results' => [false, true]]],
 *                                   // etc
 *                               ]
 * @return array
 */
function validQuestions($questions) {
    // cycle through q options - check the results while you're cycling through the options
    // call validTitle on the option text
    foreach ($questions as $question) {
//        if (!validTitle($question['title'])) {
//            return [false, "Invalid Question Title", $question["title"]];
//        }

    }

    return [true, "Valid Questions", "Valid Questions"];
}