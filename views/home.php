<!--
    Authors: Noah Lanctot, Lois Lanctot
    File: home.php
    Description: QuizForge home page
-->
<include href="views/header_template.html"></include>

<!-- Main Content -->
<div class="container-fluid mt-5">
    <!-- Title and Description -->
    <div class="row justify-content-center">
        <div class="col-12 text-center" id="color-box">
            <h1>QuizForge</h1>
            <p>Take or create a fun quiz!</p>
            <img id="arrow-img" src="images/white_arrow.png" alt="down arrow pic">
        </div>
    </div>

    <div class="row mt-4">
        <!-- Create a Quiz -->
        <div class="col-md-4">
            <a href="addChoice" class="d-block">
                <div class="box text-center box2">
                    <p>Create a Quiz</p>
                    <img id="plus-img" src="images/white_plus.png" alt="plus sign pic">
                </div>
            </a>
        </div>
        <!-- Trivia Quizzes -->
        <div class="col-md-4">
            <a href="#" class="d-block">
                <div class="box text-center box1">Trivia Quizzes</div>
            </a>
        </div>
    </div>
</div>
</body>
</html>
