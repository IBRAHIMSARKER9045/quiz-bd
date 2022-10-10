<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>
<div class="container-fluid  mt-5">
<div class="row bg-light ">
    <div class="pt-5 text-center">
    <h1 class="text-info">Add Quiz</h1>
    <a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary mt-3">Click here</a>
<a href="index.php"  class="btn btn-primary mt-3">Back</a>
   </div>
        <div class="col-md-12 mt-5 pb-5  bg-light center" style="width:80%">