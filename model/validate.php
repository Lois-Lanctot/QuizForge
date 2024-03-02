<?php
// validate form data


/**
 * validates quiz title
 * @param $title
 * @return bool
 */
function validQuizTitle($title)
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

