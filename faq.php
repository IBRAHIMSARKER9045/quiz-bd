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
            </button>
        </div>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body" id="reply">
          ' . $row['reply'] . '
          </div>' ?>
            <?php } ?>
         </div>
      </div>



   </div>
</div>
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


   $("#sbtn").click(function() {
      var name = $("#name").val();
      var email = $("#email").val();
      var msg = $("#msg").val();

      alert(name + ":" + email + ":" + msg);
      $.ajax({
         type: "post",
         url: "contact_msg.php",
         data: {
            name: name,
            email: email,
            msg: msg,
            action: "add"
         },

         success: function(response) {
            alert(response);
            clearform();

         }
      });
   });
</script>

</body>

</html>