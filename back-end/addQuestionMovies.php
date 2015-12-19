<?php
require_once "Question.php";
require_once "db.php";
@Database::connect();
if (!Database::$link){
	Database::error();
}

if (!isset($_POST["text"]) || !isset($_POST["trueAnswer"]) || 
	!isset($_POST["falseAnswer1"]) || !isset($_POST["falseAnswer2"])){
	die();
}

$text = $_POST["text"];
$trueAnswer = $_POST["trueAnswer"];
$falseAnswer1 = $_POST["falseAnswer1"];
$falseAnswer2 = $_POST["falseAnswer2"];

$question = new Question($text, $trueAnswer, $falseAnswer1, $falseAnswer2);
$question->add();
header("Location: ../front-end/moviesChallenge.html")
?>