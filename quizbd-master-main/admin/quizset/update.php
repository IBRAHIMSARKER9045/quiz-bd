<?php

if(isset($_POST["action"])){
	require "../../database.php";
	$cid = $_POST['cid'];
	$sid = $_POST['sid'];
	$tid = $_POST['tid'];
	$id = $_POST['quizid'];
	$ques = $_POST['ques'];
	$op1 = $_POST['op1'];
	$op2 = $_POST['op2'];
	$op3 = $_POST['op3'];
	$op4 = $_POST['op4'];
	$ans = $_POST['ans'];
	
	
	$updateQuery = "UPDATE `quizes` SET `question` = '{$ques}' where `id`='{$id}' limit 1";
	$conn->query($updateQuery);
	if($conn->affected_rows == 1){
		$message = "Quiz: ".$id." Updated";		
		}
	else {$message = "Quiz Update Failed";}
		echo $message;	
	}
	
?>