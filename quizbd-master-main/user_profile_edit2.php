
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != '1'){
    header("location:../index.php");
}
require __DIR__ . '/vendor/autoload.php';
require "database.php";

if(isset($_POST['update'])){
  $id = $conn->escape_string($_POST['id']);
$address = $conn->escape_string($_POST['address']);
$name = $conn->escape_string($_POST['name']);
$email = $conn->escape_string($_POST['email']);
$phone = $conn->escape_string($_POST['phone']);

if(isset($_FILES['pimages'])){
    $images = $_FILES['pimages'];
    $images_name = $images['name'];
    $images_tmp = $images['tmp_name'];
    $images_size = $images['size'];
    $images_error = $images['error'];
    $images_type = $images['type']; 
    $iname = strtolower($images_name);
    $images_ext = explode('.',$iname);
    $iext = strtolower(end($images_ext));
    $iname =time()."_". uniqid('',true).'.'.$iext;
    $images_destination = 'assets/products/'.$iname;
    if(move_uploaded_file($images_tmp,$images_destination)){
        $updateQuery =  "UPDATE `users` SET `name`='{$name}',`address`='{$address}',
        `email`='{$email}',`phone`='{$phone}',`images`='{$iname}' WHERE `id`={$id}";
    } 
}
else{
    $updateQuery =  "UPDATE `users` SET `name`='{$name}',`address`='{$address}',
        `email`='{$email}',`phone`='{$phone}' WHERE `id`={$id}";
}
// echo $updateQuery;

$conn->query($updateQuery);
if($conn->affected_rows > 0){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Profile has been updated.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
}

if(isset($_GET['id'])){
    $id = $conn->escape_string($_GET['id']);
    $user_details = "SELECT * FROM `users` WHERE id = {$_SESSION['user_id']}";
    $result = $conn->query($user_details);
}


?>
<?php require "inc/header.php"; ?>
                <!-- Page content-->
                <div class="container-fluid taxt-primary  mt-5 bg-light ">
                    <div class="row mt-1">
                        <div class="col-6 offset-md-3">
                    <h4 class="mt-3 text-primary text-center" >Edit Your Profile</h4>
                    
                   
<?php if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    

<form action="" class="border border-2" method="post" enctype="multipart/form-data">
    <div class="form-group text-primary fw-bold p-2">
        <label for="">User ID</label>
        <input type="text" class="form-control text-primary p-2" name="id" value="<?php echo $row['id']; ?>" readonly>
    </div>
    <div class="form-group text-primary fw-bold p-2">
        <label for="">Name</label>
        <input type="text" class="form-control text-primary p-2" name="name" value="<?php echo $row['name']; ?>" >
    </div>
    <div class="form-group text-primary fw-bold p-2">
        <label for="">Address</label>
        <textarea  class="form-control text-primary p-2" name="address"><?php echo $row['address']; ?></textarea>
    </div>
    <div class="form-group text-primary fw-bold p-2">
        <label for="">Email</label>
        <input type="text" class="form-control text-primary p-2" name="email" value="<?php echo $row['email']; ?>" readonly>
    </div>
    <div class="form-group text-primary fw-bold p-2">
        <label for="">Contact</label>
        <input type="text" class="form-control text-primary p-2" name="phone" value="<?php echo $row['phone']; ?>">
    </div>
    <div class="form-group text-primary fw-bold p-2">
        <label for="">Account Created</label>
        <input type="text" class="form-control text-primary p-2" name="created" value="<?php echo $row['created']; ?>" readonly>
    </div>
    <div class="form-group text-primary fw-bold p-2">
    
    <label for="formFile" class="form-label p-2">Image</label>
    <input class="form-control text-primary p-2" type="file" name="pimages" id="formFile" accept=".jpg, .jpeg, .png" capture>
    </div>
    </div>
    
    <div class="text-center">
        <input type="submit" value="UPDATE" class="btn btn-success mt-3 mb-3" name="update">
    </div>
</form>

    <?php
}
 

?>

</div>
</div>
                </div>
            <?php require "inc/footer.php"; ?>
    </body>
</html>
