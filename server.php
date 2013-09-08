<?php
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
require_once "inc/mysql.inc.php";

$db = connect();
$query = $db->prepare("SELECT * FROM questions");
$query->execute();
$questions = $query->fetchAll();

$request = $_GET['device'];
$action = $_GET['action'];


if($request == "client") { 
	switch ($action) {
	  case "getQuestions":
	    echo json_encode($questions);
	    break;		
		case "sendAnswers":
      session_destroy();
			$query = $db->prepare("INSERT into user (name, score) VALUES (?, ?)");
			$query->execute(array($_POST['name'], $_POST['rightAnswers']));
			break;
	}
	
	
}

?>
