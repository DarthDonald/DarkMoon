<?php
require_once "config.php";
require_once "db.php";
class User{
	private $firstName;
	private $lastName;
	private $class;
	private $email;
	private $password;
	private $imgLink;
	private $aboutMe;
	private $experience;

	public function User($email, $password, $firstName = null, $lastName = null, 
						 $class = null, $aboutMe = null, $experience = null, $imgLink = null){
		$this->email = $email;
		$this->password = $password;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->class = $class;
		$this->aboutMe = $aboutMe;
		$this->experience = $experience;
		$this->imgLink = $imgLink;
		$evilSpirits = array("Vampire", "Ghost", "Zombie", "Warlock");
		$this->class = $evilSpirits[rand() % 4];
	}

	public function signUp(){
		$sql = $this->getSqlSignUp();
		mysqli_query(Database::$link, $sql);
	}

	public function signIn(){
		$sql = $this->getSqlSignIn();
		$data = mysqli_query(Database::$link, $sql);
		$row = mysqli_fetch_assoc($data);
		mysqli_free_result($data);
		if (!$row){
			return false;
		}
		return self::getIdByEmail($this->email);
	}

	private function getSqlSignUp(){
		$tblName = "user";
		$attributes = array("firstName", "lastName", "class", "email", "password", "imgLink", "aboutMe", "experience");
		$values = array($this->firstName, $this->lastName, $this->class, $this->email, 
					    $this->password, $this->imgLink, $this->aboutMe, $this->experience);
		return Request::insert($tblName, $attributes, $values);
	}

	private function getSqlSignIn(){
		$what = "id";
		$tblName = "user";
		$attributes = array("email", "password");
		$values = array($this->email, $this->password);
		return Request::select($what, $tblName, $attributes, $values);
	}

	public static function getWhatById($what, $id){
		$tblName = "user";
		$attributes = array("id");
		$values = array($id);
		$sql = Request::select($what, $tblName, $attributes, $values);
		$data = mysqli_query(Database::$link, $sql);
		$row = mysqli_fetch_assoc($data);
		mysqli_free_result($data);
		return $row[$what];
	}

	private static function getIdByEmail($email){
		$what = "id";
		$tblName = "user";
		$attributes = array("email");
		$values = array($email);
		$sql = Request::select($what, $tblName, $attributes, $values);
		$data = mysqli_query(Database::$link, $sql);
		$row = mysqli_fetch_assoc($data);
		mysqli_free_result($data);
		return $row[$what];
	}
}
?>