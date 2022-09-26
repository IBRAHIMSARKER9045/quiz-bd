<?php
//mysqli(hostname,username,password,database)
$conn = new mysqli("localhost","root","","quizbd") or die("Connection failed: " . $conn->connect_error);
$conn->set_charset("utf8");