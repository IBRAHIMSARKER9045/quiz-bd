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
    <div class="col-md-12 pt-5 pb-5">
      <div class="card pt-5 pb-5 bg-light">
        <?php

        $subcatid = $conn->escape_string($_GET['subcat']);
        $subcat = "SELECT * FROM `topics` WHERE scid=" . $subcatid;
        $result = $conn->query($subcat);
        if (isset($_SESSION['message'])) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Message:!</strong> ' . $_SESSION['message'] . '.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
          unset($_SESSION['message']);
        }
        if ($result->num_rows > 0) {
          echo '<div class="owl-carousel owl-theme">';
          while ($row = $result->fetch_assoc()) {
            echo '<a href="quizset.php?topic=' . $row['id'] . '"><div class="item"><img src="assets/images/icons/' . $row['icon'] . '.png" title="' . $row['name'] . '" width="300" height="200"/><h4 class="text-center">' . $row['name'] . '</h4></div></a>';
          }
          echo '</div>';
        }
        ?>
      </div>
      </div>
  </div>
  <!-- category bikroy -->

<!-- category bikroy end -->
<?php require "inc/footer.php"; ?>
</body>

</html>