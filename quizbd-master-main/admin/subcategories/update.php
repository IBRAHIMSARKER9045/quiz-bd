<?php
if(isset($_POST["action"])){
	require "../../database.php";
	$cid = $_POST['category'];
	$sid = $_POST['sid'];
	$sname = $_POST['sn'];
	
	$updateQuery = "UPDATE `subcategories` SET `name` = '{$sname}' where `id`='{$sid}' limit 1";
	$conn->query($updateQuery);
	if($conn->affected_rows == 1){
		$message = "Subcategory: ".$sname." Updated";		
		}
	else {$message = "Subcategory Update Failed";}
		echo $message;	
	}	