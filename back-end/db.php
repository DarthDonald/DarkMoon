<?php
require_once "config.php";
class Database{
	public static $link;

	public static $errorMsg  = "dbError";

	public static function error(){
		echo self::$errorMsg;
		die();
	}

	public static function connect(){
		self::$link = mysqli_connect(DBhost,DBuser,DBpass,DBname);
	}

	public static function close(){
		mysqli_close(self::$link);
	}
}

Class Request{
	public static function insert($tblName, $attributes, $values){
		$n = count($attributes);
		$sql = "INSERT INTO " . $tblName . "(";
		for ($i = 0; $i < $n; $i++){
			$sql .= $attributes[$i] . ($i == $n - 1 ? ")" : ",");
		}
		$sql .= "VALUES(";
		for ($i = 0; $i < $n; $i++){
			$sql .= "'" . Protect::noSqlInjection($values[$i]) . "'" . ($i == $n - 1 ? ")" : ",");
		}
		return $sql;
	}

	public static function select($what, $tblName, $attributes, $values){
		$n = count($attributes);
		$sql = "SELECT " . $what . " FROM " . $tblName;
		if ($n != 0) $sql .= " WHERE ";
		for ($i = 0; $i < $n; $i++){
			$sql .= $attributes[$i] . " = " . "'" . Protect::noSqlInjection($values[$i]) . "'" . ($i == $n - 1 ? "" : " AND ");
		}
		return $sql;
	}
}

class Protect{
	public static function noSqlInjection($input){
		//$input = mysqli_real_escape_string($input);
		return $input;
	}

	public static function xssAttack(){
	}
}
?>