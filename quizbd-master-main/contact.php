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
            <div class="mb-3">
               <small>Email</small>
               <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
               <small>Message</small>
               <textarea name="msg" id="msg" cols="30" rows="4" class="form-control"></textarea>
            </div>
            <button type="submit" id="sbtn" name="sbtn" class="btn btn-success">Submit</button>
         </form>
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