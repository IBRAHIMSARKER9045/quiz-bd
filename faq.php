<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>
<div class="container-fluid bg-light" id="welcome">
   <?php if (isset($_SESSION['user_name'])) echo "<h6 class='text-primary'>Welcome {$_SESSION['user_name']}</h6>"; ?>
</div>



<div class="container-fluid bg-light text-center" id="team">
   <div class="row pt-5 pb-5">
      <div class="pt-5 pb-5">
         <h1 class="text-info">FAQ</h1>