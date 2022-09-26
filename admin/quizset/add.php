<?php
session_start();
//echo $_POST["action"];
if(isset($_POST["action"])){
	require "../../database.php";
	// require "../classes/imageResize.php";
//productid=&pname=A&psku=B&pdesc=CCC&pqty=12&punit=piece&pprice=123&pvat=5

	$cid = $_POST['cid'];
	$sid = $_POST['scid'];
	$tid = $_POST['tid'];
	$setname = $_POST['setname'];
	
	$quizid = $_POST['quizid'];
	
	$status = $_POST['status'];
	

	//$insertQuery = "INSERT INTO `topics`(`id`, `name`,`cid`,`scid`,`icon`, `uid`, `created`) VALUES (null,'$tname','$cid',,`$sid`,'$icon','".$_SESSION['user_id']."',CURRENT_TIMESTAMP)";
	$insertQuery = "INSERT INTO `quizset` (`id`, `cid`, `scid`, `tid`, `setname`, `quizset`, `status`, `created`) VALUES (NULL, '$cid', '$sid', '$tid', '$setname', '$quizid', '$status', current_timestamp())";
	
	//echo $insertQuery;
	// exit;
	$conn->query($insertQuery);
	if($conn->affected_rows == 1){
		$message = "Quiz Inserted";
		}
	else $message = "Quiz Insertion Failed";	
	echo $message;
	
	}
else { echo "something wrong";}