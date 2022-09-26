<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logged_in'])){
    header("location:../index.php");
}
if(isset($_SESSION['logged_in']) && $_SESSION['user_role'] != 2){
    header("location:login.php");
}