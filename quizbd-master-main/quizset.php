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
   <h1>Quiz Set</h1>
  </div>
 <div class="col-md-12 pt-5 pb-5">
 <?php 
 
 $topicid = $conn->escape_string($_GET['topic']);
  $quizset = "SELECT * FROM `quizset` WHERE tid=".$topicid;
  $result = $conn->query($quizset);
  if(isset($_SESSION['message'])){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Message:!</strong> '.$_SESSION['message'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['message']);
  }
  if($result->num_rows > 0){
      echo '<div>';
    while($row = $result->fetch_assoc()){
        echo '<div><h4 class="text-center">'.$row['setname'].'</h4><a class="d-block text-center" href="quiz.php?quizset='.$row['id'].'">Start Quiz</a></div>';
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
