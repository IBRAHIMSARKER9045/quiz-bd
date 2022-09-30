<?php
require __DIR__ . '/vendor/autoload.php';
// echo __DIR__;
// exit;
$message = "";
if(isset($_POST['submit'])){    
    require __DIR__ . '/database.php';
    $agree = "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if(isset($_POST['agree']))
    $agree = $_POST['agree'];
    if($name != "" && $email != "" && $phone != "" && $pass1 != "" && $pass2 != "" && $agree == "yes"){
        if($pass1 == $pass2){
            $p = password_hash($pass1,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$p')";
            // echo $sql;
            // exit;
            $conn->query($sql);
            if($conn->affected_rows > 0){
                $message =  "Successfully registered";
            }
            else{
                $message =  "Error";
            }
        }
        else{
            $message =  "Password does not match";
        }
    }
    else{
        $message =  "Please fill all the fields";
    }

}
//insert into users values(NULL,"test","test@gmail.com","sdkfjheriuydsfjsadfkjhasdkfhvcj",null,null,null);
// role and created cannot be null
//insert into users values(NULL,"test","test@gmail.com","sdkfjheriuydsfjsadfkjhasdkfhvcj",'1',CURRENT_TIMESTAMP,null);
//insert into users values(NULL,"test1","test1@gmail.com","dsfjhfdg",'1',CURRENT_TIMESTAMP,null);
    ?>
    <?php $page = "Register"; ?>
    <?php require "configuration.php"; ?>
<?php require "inc/header.php";?>

    <div class="container-fluid">
        <!-- registration form -->
        
        <div id="registrationcontainer" class="formcontainer">
 <!-- registration start -->
 <section class="vh-80 bg-primary" >
  <div class="mask d-flex align-items-center h-80 gradient-custom-3">
    <div class="container vh-80">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>
              <h3 class="text-info text-center"><?php echo $message??""; ?></h3>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" value="<?php if(isset($name)) echo $name; ?>" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" value="<?php if(isset($email)) echo $email; ?>" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" name="phone" id="form3Example1cg" class="form-control form-control-lg" value="<?php if(isset($phone)) echo $phone; ?>" />
                  <label class="form-label" for="form3Example1cg">Your Phone</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="pass1" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="pass2" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    name="agree"
                    value="yes"
                    id="form2Example3cg"
                  />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button id="regBtn" type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 <!-- registration end -->
 </div> 
    </div>
    <?php require "inc/footer.php"; ?>
    </body>
               </html>