<?php
session_start();
if(isset($_POST["sname"])){
	require "../../database.php";
	require "../classes/imageResize.php";
//productid=&pname=A&psku=B&pdesc=CCC&pqty=12&punit=piece&pprice=123&pvat=5
	$sname = $_POST['sname'];
	$cid = $_POST['category'];
	$icon = $_POST['icon'];

	if($sname == ""){
		echo "Please fill all the fields";
		exit;
	}

	$insertQuery = "INSERT INTO `subcategories`(`id`, `name`,`cid`,`icon`, `uid`, `created`) VALUES (null,'$sname','$cid','$icon','".$_SESSION['user_id']."',CURRENT_TIMESTAMP)";
	// echo $insertQuery;
	// exit;
	$conn->query($insertQuery);
	if($conn->affected_rows == 1){
		$id = $conn->insert_id;
		if(isset($_FILES['icon']))	{
		$allfiles = $_FILES['icon'];
		$imageName = "../../assets/images/icons/".$id.".jpg";
		move_uploaded_file($allfiles['tmp_name'],$imageName);
		//use image  to resize image
		$image = new ImageResize($imageName);
		$image->resizeToWidth(800);
		$image->save($imageName);
		}
		//
		$message = "Subcategory Inserted";
		}
	else $message = "Subcategory Insertion Failed";	
	echo $message;
	
	}
else { echo "something wrong";}