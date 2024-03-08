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
 * Validates the quiz questions form fields array
 * @param $questions array an array of questions, options, and results
 * Example structure:
 * [
 *     [1 => ['title' => 'title 1', 'options' => ['Option 1', 'Option 2'], 'results' => [true, false]]],
 *     [2 => ['title' => 'title 2', 'options' => ['Option A', 'Option B'], 'results' => [false, true]]],
 * ]
 * @return array [bool, string, mixed] Returns an array with the first element indicating validity,
 *                                     the second element containing an error message if invalid,
 *                                     and the third element containing the specific invalid data.
 */
function validQuestions($questions) {
    foreach ($questions as $question) {
        foreach ($question as $questionIndex => $questionData) {
            // validate question title
            if (!validTitle($questionData['title'])) {
                return [false, "Invalid Question Title", $questionData['title']];
            }

            // validate options
            foreach ($questionData['options'] as $option) {
                if (!validTitle($option)) {
                    return [false, "Invalid Option Title", $option];
                }
            }

            // validate results
            if (!in_array(true, $questionData['results'])) {
                return [false, "At least one correct result must be selected", $questionData['results']];
            }

        }
    }

    return [true, "Valid Questions", "Valid Questions"];
}


