<?php
require_once "User.php";
require_once "db.php";
@Database::connect();
if (!Database::$link){
	Database::error();
}

if (!isset($_POST["firstName"]) || !isset($_POST["lastName"]) || !isset($_POST["email"]) ||
	!isset($_POST["password"])  || !isset($_POST["confirmPassword"])){
	die();
}

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$imgLink = basename($_FILES["photo"]["name"]);
copy($_FILES["photo"]["tmp_name"],"avatars/". $imgLink);

$newUser = new User($email, $password, $firstName, $lastName, null, null, 0, $imgLink);
$newUser->signUp();
header("Location: ../front-end/signIn.html");
Database::close();
?>