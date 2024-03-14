# QuizForge
A website that allows users to create and participate in quizzes. 
They can choose to create or take a trivia quiz. 

Authors: Lois Lanctot and Noah Lanctot 

Requirements:
1. model/, views/, controllers/ 
2. index.php, QuizController.php 
3. data-layer.php (getTriviaQuizTitles function) 
4. quiz.php, views/ (the data can't be viewed until the admin updates the SQL) 
5. Yes. 
6. We have a class for the QuizDataLayer (data-layer.php), QuizController (quizController.php), and Quiz (quiz.php), but we do not have an inheritance relationship. 
7. Yes. 
8. validate.php 
9. Mostly. There is a section in trivia_questions.html js function: addOptionContainers where two options are added that are virtually the same aside from the numbers (id, name, etc).
10. Yes. 
11. No. 

Quiz 
- $_quiz_title 
- $_quiz_desc 
- $_questions 
+ __construct
+ setQuizTitle
+ setQuizDesc
+ setQuestions
+ getQuizTitle
+ getQuizDesc
+ getQuestions
+ addQuizToFile
+ writeSqlToFile
+ getNewQuizIndex
+ getNewQuestionIndex
+ displayResultsAndOptions