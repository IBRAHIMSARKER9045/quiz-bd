<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != '1'){
    header("location:../index.php");
}
require __DIR__ . '/vendor/autoload.php';
require "database.php";

if(isset($_POST['update'])){
$currentPassword = $conn->escape_string($_POST['currentPassword']);
$newPassword = $conn->escape_string($_POST['newPassword']);
$confirmPassword = $conn->escape_string($_POST['confirmPassword']);
$passquery = "SELECT password FROM users WHERE id={$_SESSION['user_id']}";
$result = $conn->query($passquery);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){