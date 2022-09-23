<?php
session_start();
$message = ""; 
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once("database.php");
    $selectQuery = "select * from users where email = '$email' limit 1";
    $result = $conn->query($selectQuery);
    if($result->num_rows){
        $userinfo = $result->fetch_assoc();
        if(password_verify($password, $userinfo['password'])){
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $userinfo['id'];
            $_SESSION['user_name'] = $userinfo['name'];
            $_SESSION['user_email'] = $userinfo['email'];
            $_SESSION['user_role'] = $userinfo['role'];
            if($userinfo['role'] == "2"){
                header("Location: admin/index.php");
            }else{
                header("Location: index.php");
            }            
    }
    else{
        $message = "Invalid email or password";
    }
}
else{
  $message = "Invalid email or password";
}
}
?>
<?php
$page = "login";
require "configuration.php";
?>
<?php require "inc/header.php";?>

<section class="vh-80" id="loginImage">
  <div class="container-fluid py-5 h-80">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            <?php if($message != "") echo "<div class='alert alert-danger'>$message</div>"; ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control form-control-lg" required />
              <label class="form-label" for="typeEmailX-2">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control form-control-lg" required />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
              />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
            <a href="register.php">Register if new</a>

            

            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require "inc/footer.php";?>
</body>
               </html>

