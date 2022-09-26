<?php
session_start();
//echo $_POST['add'];
if(isset($_POST["action"])){
	require "../../database.php";
	// require "../classes/imageResize.php";
//productid=&pname=A&psku=B&pdesc=CCC&pqty=12&punit=piece&pprice=123&pvat=5

	$cid = $_POST['cid'];
	$sid = $_POST['scid'];
	$tid = $_POST['tid'];
	$quizid = $_POST['quizid'];
	

	//$insertQuery = "INSERT INTO `topics`(`id`, `name`,`cid`,`scid`,`icon`, `uid`, `created`) VALUES (null,'$tname','$cid',,`$sid`,'$icon','".$_SESSION['user_id']."',CURRENT_TIMESTAMP)";
	$insertQuery = "INSERT INTO `quizset` (`id`,`cid`,`scid`,`tid`,`setname`, `quizset`, `status`) VALUES (null,'$cid','$sid','$tid','$quizid', '$op1', '$op2', '$op3', '$op4', '$ans', '".$_SESSION['user_id']."')";
	//var_dump($insertQuery);
	// echo $insertQuery;
	// exit;

	$quizes  = $conn->query($insertQuery);
	$sets = $quizes->fetch_assoc();
	

	
	if($conn->affected_rows == 1){
		$message = "Quiz Inserted";
		}
	else $message = "Quiz Insertion Failed";	
	echo $message;
	
	}
else { echo "something wrong";}