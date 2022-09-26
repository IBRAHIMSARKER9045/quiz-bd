<?php

if(isset($_POST["action"])){
	require "../../database.php";
	$qid = $_POST['qid'];
	$r = $_POST['reply'];
	
	
	
	$updateQuery = "UPDATE `contact` SET `reply` = '{$r}' where `id`='{$qid}' limit 1";
	$conn->query($updateQuery);
	if($conn->affected_rows == 1){
		$message = "Reply : ".$qid." Updated";		
		}
	else {$message = "Reply Update Failed";}
		echo $message;	
	}
	
?>