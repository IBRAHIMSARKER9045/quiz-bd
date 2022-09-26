<?php
session_start();

if(isset($_POST["action"])){
	require "database.php";
	
//productid=&pname=A&psku=B&pdesc=CCC&pqty=12&punit=piece&pprice=123&pvat=5
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];


	if($name == "" || $email== ""){
		echo "Please fill all the fields";
		exit;
	}

	$insertQuery = "INSERT INTO `contact`(`id`,`uid`, `name`,`email`,`message`) VALUES (null,'".$_SESSION['user_id']."','$name','$email','$msg')";
	// echo $insertQuery;
	// exit;
	$conn->query($insertQuery);
	if($conn->affected_rows == 1){
		
		$message = "Message Inserted";
		}
	else $message = "Message Insertion Failed";	
	echo $message;
	
	}
else { echo "something wrong";}