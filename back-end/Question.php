<?php
require_once "config.php";
require_once "db.php";
class Question{
	private $text;
	private $firstVariant;
	private $secondVariant;
	private $thirdVariant;
	private $correctVariant;

	public function Question($text, $firstVariant, $secondVariant, $thirdVariant){
		$this->text = $text;
		$this->firstVariant = $firstVariant;
		$this->secondVariant = $secondVariant;
		$this->thirdVariant = $thirdVariant;
		$this->correctVariant = $firstVariant;
		$this->randomShuffle();
	}

	public function add(){
		$sql = $this->getSqlAdd();
		mysqli_query(Database::$link, $sql);
	}

	private function getSqlAdd(){
		$tblName = "question";
		$attributes = array("text", "firstVariant", "secondVariant", "thirdVariant", "correctVariant");
		$values = array($this->text, $this->firstVariant, $this->secondVariant, 
						$this->thirdVariant, $this->correctVariant);
		return Request::insert($tblName, $attributes, $values);
	}

	public static function getWhatById($what, $id){
		$tblName = "question";
		$attributes = array("id");
		$values = array($id);
		$sql = Request::select($what, $tblName, $attributes, $values);
		$data = mysqli_query(Database::$link, $sql);
		$row = mysqli_fetch_assoc($data);
		mysqli_free_result($data);
		return $row[$what];
	}

	private function randomShuffle(){
		for ($step = 0; $step < 20; $step++){
			$a = rand() % 3 + 1;
			$b = rand() % 3 + 1;
			if ($a == 1 && $b == 2){
				self::swap($this->firstVariant, $this->secondVariant);
			}
			if ($a == 1 && $b == 3){
				self::swap($this->firstVariant, $this->thirdVariant);
			}
			if ($a == 2 && $b == 3){
				self::swap($this->secondVariant, $this->thirdVariant);
			}
		}
	}

	private static function swap(&$a, &$b){
		$c = $a;
		$a = $b;
		$b = $c;
	}

	public static function getAll(){
		$what = "*";
		$tblName = "question";
		$attributes = array();
		$values = array();
		$sql = Request::select($what, $tblName, $attributes, $values);
		$data = mysqli_query(Database::$link, $sql);
		$ret = array();
		while ($row = mysqli_fetch_assoc($data)){
			$ret[] = $row;
		}
		return $ret;
	}
}
?>