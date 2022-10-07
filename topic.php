<?php
session_start();

use App\Admin\Login;
use App\User;

require __DIR__ . '/vendor/autoload.php';
require "configuration.php";
require "database.php";
?>
<?php require "inc/header.php"; ?>

<div class="container-fluid text-center">

  <div class="row pt-5 pb-5 bg-light">
    <div class="pt-5 pb-5">
      <h1>TOPICS</h1>
    </div>