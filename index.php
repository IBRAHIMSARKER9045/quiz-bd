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

<div class="container-fluid text-center" id="home">
   <div class="row justify-content-center">
      <div class="col-md-12 mt-5">
         <h1 class="text-white display-1"><span class="text-danger fw-bold display-1">Play and win</span></h1>
         <h1 class="text-info display-4 m-5"><span>cash rewards</span></h1>
         <p class="text-white m-5">
         <h6 class="text-white "> Play 2 Win online quiz contest. Regularly we start a contest here. <br> Some are for practice and some are for winning Prizes! <br>There are different winning amount for each contest.</h6>
         </p>
         <button class="btn btn-light  m-5"><a href="register.php" class="link-primary">Play</a></button>
      </div>
   </div>
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



<div class="container-fluid text-center text-info" id="review">
   <div class="row pt-5 pb-5" id="testimonials">
      <div class="pt-5 pb-5">
         <h1>REVIEWS</h1>

      </div>
      <div class="col-12 pt-5 pb-5">
         <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
               <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                  <img src="assets/images/reviewer1.jpg" alt="">
               </button>
            </li>
            <li class="nav-item" role="presentation">
               <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                  <img src="assets/images/reviewer-2.jpg" alt="">
               </button>
            </li>
            <li class="nav-item" role="presentation">
               <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                  <img src="assets/images/reviewer-3.jpg" alt="">
               </button>
            </li>
         </ul>
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               <div class="review">
                  <div class="stars">
                     <i class="bx bxs-star"></i>
                     <i class="bx bxs-star"></i>
                     <i class="bx bxs-star"></i>
                     <i class="bx bxs-star"></i>
                     <i class="bx bx-star"></i>
                  </div>
                  <p class="lead text-info">This web site are awosome, I Win 3000 TK per month</p>
                  <h5 class="title-sm mb-0 text-info">Rohim Islam</h5>
                  <small>Student</small>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
               <div class="review">
                  <div class="stars">
                     <i class="bx bxs-star"></i>
                     <i class="bx bxs-star"></i>
                     <i class="bx bxs-star"></i>
                     <i class="bx bxs-star"></i>
                     <i class="bx bx-star"></i>
                  </div>
                  <p class="lead text-info">Greate searvice for learning anything, I used it , now I'm back again to this site as I started school. I love the ability to study anywhere. You have 5 minutes - you can study!</p>
                  <h5 class="title-sm mb-0 text-info">Josim Uddin</h5>
                  <small>Student</small>
               </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
               <div class="review">
                  <div class="stars">
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                  </div>
                  <p class="lead text-info">Ultimately, Unscholar is a great study tool that can also be used in study. I would recommend it to anyone looking to train study quickly and effectively.</p>
                  <h5 class="title-sm mb-0 text-info">Mizan Rohman</h5>
                  <small>Student</small>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

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