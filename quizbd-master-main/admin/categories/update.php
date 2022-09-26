<?php
if(isset($_POST["action"])){
	require "../../database.php";
	$cid = $_POST['cid'];
	$cname = $_POST['cn'];
	
	$updateQuery = "UPDATE `categories` SET `name` = '{$cname}' where `id`='{$cid}' limit 1";
	$conn->query($updateQuery);
	if($conn->affected_rows == 1){
		$message = "Category: ".$cname." Updated";		
		}
	else {$message = "Category Update Failed";}
		echo $message;	
	}	