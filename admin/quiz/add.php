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
	$ques = $_POST['ques'];
	$op1 = $_POST['op1'];
	$op2 = $_POST['op2'];
	$op3 = $_POST['op3'];
	$op4 = $_POST['op4'];
	$ans = $_POST['ans'];
	

	//$insertQuery = "INSERT INTO `topics`(`id`, `name`,`cid`,`scid`,`icon`, `uid`, `created`) VALUES (null,'$tname','$cid',,`$sid`,'$icon','".$_SESSION['user_id']."',CURRENT_TIMESTAMP)";
	$insertQuery = "INSERT INTO `quizes` (`id`,`cid`,`scid`,`tid`,`question`, `op1`, `op2`, `op3`, `op4`, `ans`, `uid`) VALUES (null,'$cid','$sid','$tid','$ques', '$op1', '$op2', '$op3', '$op4', '$ans', '".$_SESSION['user_id']."')";
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