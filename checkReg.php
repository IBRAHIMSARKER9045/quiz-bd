<?php
session_start();

use App\Cart;
require __DIR__."/vendor/autoload.php";
require "inc/header.php"; ?>
<?php
$error = false;
$message = "";
//check user authentication
if(!isset($_SESSION['logged_in'])){
    $error = true;
    $message = "Please login to continue";
}
//check session

//auth user
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != true){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Please login to continue 1.</a>';
}

require "database.php"; ?>
<div class="container-fluid text-center">



   

</div>



<?php require "inc/footer.php"; ?>
<script>
    function addbag(id) {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onload = function() {
         document.getElementById("cartitemtotal").innerHTML = this.responseText;
         console.log(this.responseText);
      }
      xmlhttp.open("GET", "ajax/addcart.php?id=" + id);
      xmlhttp.send();
   };


    function showhidetrx(){
        var pmethod = document.getElementById('pmethod').value;
        if(pmethod == 'bKash' || pmethod == 'nogod' || pmethod == 'upay'){
            document.getElementById('trxdiv').style.display = 'block';
        }
        else{
            document.getElementById('trxdiv').style.display = 'none';
        }
    }
</script>
</body>
</html>
