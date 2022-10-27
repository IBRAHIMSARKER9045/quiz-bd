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
         </div>
      <div class="accordion pb-5 " id="accordionExample">
         <div class="accordion-item pb-5 text-white bg-info">
            <?php
            $query = "SELECT message,reply FROM `contact` limit 3";
            $queryResult = $conn->query($query);
            $q = $queryResult->num_rows;

            while ($row = $queryResult->fetch_assoc()) {
            ?>
               <?php echo '<div class="accordion-header" id="faq">
          <button class="accordion-button text-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h6>' . $row['message'] . '</h6>