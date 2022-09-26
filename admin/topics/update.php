<?php
if(isset($_POST["action"])){
	require "../../database.php";
	$cid = $_POST['category'];
	$sid = $_POST['subcategory'];
	$tid = $_POST['tid'];
	$tname = $_POST['tn'];
	
	$updateQuery = "UPDATE `topics` SET `name` = '{$tname}' where `id`='{$tid}' limit 1";
	$conn->query($updateQuery);
	if($conn->affected_rows == 1){
		$message = "topic: ".$tname." Updated";		
		}
	else {$message = "topic Update Failed";}
		echo $message;	
	}	