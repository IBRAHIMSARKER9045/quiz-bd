<?php
require_once "database.php";
function categoryInList(){
	global $conn;
	$categorylistQuery = "SELECT * FROM `categories` ORDER by `name` asc";
	$categorylistQueryResult=$conn->query($categorylistQuery);
	$option="";
	while($row = $categorylistQueryResult->fetch_array()){
		$option.="<option value=".$row['id'].">".$row['name']."</option>";
		}	
	return $option;
	}
