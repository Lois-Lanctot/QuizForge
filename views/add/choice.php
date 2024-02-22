<!--
    Authors: Noah Lanctot, Lois Lanctot
    File: choice.php
    Description: Choose a quiz to create
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QuizForge</title>
    <link rel="icon" href="images/donut_icon.ico" type="image/x-con">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<!-- Top Navigation -->
<header>
    <div class="d-flex justify-content-center">
        <img class="img-logo" src="images/sloth_donut.jpg" alt="sloth donut pic">
    </div>
</header>

<nav class="navbar"></nav>

<!-- Main Content -->
<div class="row mt-4">
    <!-- Create a Personality Quiz -->
    <div class="col-md-6">
        <a href="addPersonalityTitle">
            <div class="box box1">Create a Personality Quiz</div>
        </a>
    </div>
    <!-- Create a Trivia Quiz -->
    <div class="col-md-6">
        <a href="addTriviaTitle">
            <div class="box box2">Create a Trivia Quiz</div>
        </a>
    </div>
</div>

</body>
</html>