<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['logged_in'])){
    if($_SESSION['logged_in'] != true)
    header("location:../login.php");
}
else{
    header("location: ../login.php");  
}
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != '2'){
    header("location:../index.php");
}
header("location: dashboard.php");
require __DIR__ . '/../vendor/autoload.php';