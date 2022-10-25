<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>



<div class="container-fluid bg-light text-info text-center" id="contact">


   <div class="row align-items-center pt-5 pb-5">
      <div class="pt-5 pb-5">
         <h1>CONTACTS</h1>
      </div>
      <div class="col-lg-8 pt-5 text-info">
         <img src="assets/images/contact3.png" alt="" class=" img-fluid img-responsive">
      </div>
      <div class="col-lg-4 text-info">
         <form>
            <div class="mb-3">
               <small>Name</small>
               <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>