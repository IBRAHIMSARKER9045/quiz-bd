<?php
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] != 2){
    echo "You dont have permission in this page";
    exit;
}
else{
  require __DIR__ . '/../../database.php';;
    if(isset($_GET['id'])){
        //echo "show user record in form  " .$_GET['id'] ;
        $query = "select * from users where id=".$_GET['id']." limit 1";
        $result = $conn->query($query);
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
        }
        else{
            echo "User not found";
            exit;
        }
    }
    //if post request is set
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $query = "update users set name='$name', email='$email', role='$role' where id=".$_POST['id']." limit 1";
        $conn->query($query);
        if($conn->affected_rows == 1){
            $_SESSION['message'] = "User updated successfully";
            header("location:users.php");
        }
        else{
            echo "Error";
        }
    }
}
?>
<?php require "../../configuration.php";
 require "../partial_header.php";?>

<section class="vh-100 bg-image" style="background-image: url('../assets/images/img4.jpg');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container-fluid h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Edit an account</h2>
              <h3 class="text-info text-center"><?php echo $message??""; ?></h3>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" value="<?php echo $user['name'] ?>" class="form-control form-control-lg" value="<?php if(isset($name)) echo $name; ?>" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" value="<?php echo $user['email'] ?>" class="form-control form-control-lg" value="<?php if(isset($email)) echo $email; ?>" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>
                <div class="form-outline mb-4">
                  
                  <label class="form-label" for="form3Example3cg">Role</label>
                  <select name="role" id="" class="form-control">
                      <option value="-1">Select</option>
                      <option value="1" <?php if($user['role'] == 1) echo "selected"; ?>>1(user)</option>
                      <option value="2" <?php if($user['role'] == 2) echo "selected"; ?>>2(Admin)</option>
                  </select>
                </div>

                <div class="d-flex justify-content-center">
                  <button id="regBtn" type="submit" name="update" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Update</button>
                </div>


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require "../partial_footer.php";?>
</body>
               </html>
