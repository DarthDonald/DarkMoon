<?php
require_once "User.php";
require_once "db.php";
@Database::connect();
if (!Database::$link){
	Database::error();
}

if (!isset($_POST["email"]) || !isset($_POST["password"])){
	die();
}

$email = $_POST["email"];
$password = $_POST["password"];

$newUser = new User($email, $password);
$result = $newUser->signIn();
if (!$result){
	die();
}
session_start();
$_SESSION["id"] = $result;
header("Location: ../front-end/home.php");
Database::close();
?>