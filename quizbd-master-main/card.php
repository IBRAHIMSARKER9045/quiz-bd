<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>

<?php if(isset($_SESSION['user_name'])) echo "<h1>Welcome {$_SESSION['user_name']}</h1>"; ?>

<section id="home">
      <div class="container  text-center">
         <div class="row justify-content-center">
            <div class="col-md-10">
               <h1 class="text-white display-1"><span class="text-danger fw-bold display-1">Play and win</span></h1>
               <h1 class="text-info display-4 "><span>cash rewards</span></h1>
               <p class="text-white"><h6 class="text-white "> Play 2 Win online quiz contest. Regularly we start a contest here. <br> Some are for practice and some are for winning Prizes! <br>There are different winning amount for each contest.</h6></p>
               <button class="btn btn-info"><a href="register.php">Play</a></button>
            </div>
         </div>
      </div>
   </section>

<?php 



  $cat = "SELECT * FROM `categories` WHERE 1";
  $result = $conn->query($cat);
  if(isset($_SESSION['message'])){
      echo'<div class="card">';
    echo '<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <strong>Message:!</strong> '.$_SESSION['message'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['message']);
  }
  if($result->num_rows > 0){
      echo '<div class="owl-carousel owl-theme">';
    while($row = $result->fetch_assoc()){
        echo '<a href="subcategory.php?cat='.$row['id'].'"><div class="item"><img src="assets/images/icons/'.$row['icon'].'.png" title="'.$row['name'].'"/><h4 class="text-center">'.$row['name'].'</h4></div></a>';
    }
    echo '</div>';
    echo '</div>';
  }
?>

<?php require "inc/footer.php"; ?>
<script>
function addbag(id){
  const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("cartitemtotal").innerHTML = this.responseText;
      console.log(this.responseText);
    }
  xmlhttp.open("GET", "ajax/addcart.php?id=" + id);
  xmlhttp.send();
}
</script>
</body>
</html>