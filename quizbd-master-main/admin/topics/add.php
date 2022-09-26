<?php
session_start();
echo $_POST['tname'];
if(isset($_POST["tname"])){
	require "../../database.php";
	require "../classes/imageResize.php";
//productid=&pname=A&psku=B&pdesc=CCC&pqty=12&punit=piece&pprice=123&pvat=5
	$tname = $_POST['tname'];
	$cid = $_POST['category'];
	$sid = $_POST['subcategory'];
	$icon = $_POST['icon'];

	if($tname == ""){
		echo "Please fill all the fields";
		exit;
	}

	//$insertQuery = "INSERT INTO `topics`(`id`, `name`,`cid`,`scid`,`icon`, `uid`, `created`) VALUES (null,'$tname','$cid',,`$sid`,'$icon','".$_SESSION['user_id']."',CURRENT_TIMESTAMP)";
	$insertQuery = "INSERT INTO `topics` (`id`, `cid`, `scid`, `name`, `icon`, `uid`, `created`) VALUES (NULL, '$cid', '$sid', '$tname', '$icon', '".$_SESSION['user_id']."', current_timestamp())";
	//var_dump($insertQuery);
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
		$message = "Topic Inserted";
		}
	else $message = "Topic Insertion Failed";	
	echo $message;
	
	}
else { echo "something wrong";}