<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>
<div class="container-fluid text-center mt-5">
  <div class="row bg-light">
    <div class="pt-5">
      <h1 class="text-info">ALL CATEGORIES</h1>
    </div>
    <div class="col-md-12 mt-5">
      <div class="card pt-5 pb-5 bg-light">
      <?php
        $cat = "SELECT * FROM `categories` WHERE 1";
        $result = $conn->query($cat);
        if (isset($_SESSION['message'])) {
          echo '<div class="alert card alert-warning alert-dismissible fade show" role="alert">
    <strong>Message:!</strong> ' . $_SESSION['message'] . '.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
          unset($_SESSION['message']);
        }
        if ($result->num_rows > 0) {
            echo '<div class="owl-carousel owl-theme">';
          while ($row = $result->fetch_assoc()) {
            echo '<a href="subcategory.php?cat=' . $row['id'] . '"><div class="item"><img src="assets/images/icons/' . $row['icon'] . '.png" title="' . $row['name'] . '" width="250" height="200"/><h4 class="text-center">' . $row['name'] . '</h4></div></a>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
