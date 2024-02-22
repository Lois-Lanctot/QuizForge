<!--
    Authors: Noah Lanctot, Lois Lanctot
    File: trivia_title.php
    Description: Create a trivia quiz
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
    <div class="col-md-12">
        <div class="create">
            <h1>Create Trivia Quiz</h1><hr>

            <!-- Trivia Quiz Form -->
            <form action="#" method="post">
                <div class="row">

                    <div class="form-group col-4">
                        <!-- Quiz title -->
                        <div class="form-group">
                            <label for="title" class="bold col-sm-4 control-label">Quiz Title</label>
                            <input class="form-control" type="text" name="title" id="title" value="">
                        </div>

                        <!-- Button to Submit -->
                        <button class="rounded-3" type="submit">Next</button>
                    </div>

                    <!-- Textarea for Quiz Description -->
                    <div class="form-group col-8">
                        <label for="desc" class="bold control-label">Description</label>
                        <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>