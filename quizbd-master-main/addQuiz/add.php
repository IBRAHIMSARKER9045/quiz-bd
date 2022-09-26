<?php
session_start();

if(isset($_POST["action"])){
	require "../database.php";
	


	$cid = $_POST['cid'];
	$sid = $_POST['scid'];
	$tid = $_POST['tid'];
	$ques = $_POST['ques'];
	$op1 = $_POST['op1'];
	$op2 = $_POST['op2'];
	$op3 = $_POST['op3'];
	$op4 = $_POST['op4'];
	$ans = $_POST['ans'];
	

	//$insertQuery = "INSERT INTO `topics`(`id`, `name`,`cid`,`scid`,`icon`, `uid`, `created`) VALUES (null,'$tname','$cid',,`$sid`,'$icon','".$_SESSION['user_id']."',CURRENT_TIMESTAMP)";
	$insertQuery = "INSERT INTO `userquiz` (`id`, `uid`,`cid`,`scid`,`tid`,`question`, `op1`, `op2`, `op3`, `op4`, `ans`) VALUES (null, '".$_SESSION['user_id']."' ,'$cid','$sid','$tid','$ques', '$op1', '$op2', '$op3', '$op4', '$ans')";
	//var_dump($insertQuery);
	// echo $insertQuery;
	// exit;
	$conn->query($insertQuery);
	if($conn->affected_rows == 1){
		$message = "Quiz Inserted";
		}
	else $message = "Quiz Insertion Failed";	
	echo $message;
	
	}
else { echo "something wrong";}