<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != '1') {
    header("location:../index.php");
}
require __DIR__ . '/vendor/autoload.php';
require "configuration.php";
require "database.php";

if (isset($_POST['update'])) {
    $id = $_SESSION['user_id'];
    $address = $conn->escape_string($_POST['address']);
    $name = $conn->escape_string($_POST['name']);
    $email = $conn->escape_string($_POST['email']);
    $phone = $conn->escape_string($_POST['phone']);

    if (isset($_FILES['pimages'])) {
        $images = $_FILES['pimages'];
        $images_name = $images['name'];
        $images_tmp = $images['tmp_name'];
        $images_size = $images['size'];
        $images_error = $images['error'];
        $images_type = $images['type'];
        $iname = strtolower($images_name);
        $images_ext = explode('.', $iname);
        $iext = strtolower(end($images_ext));
        $iname = time() . "_" . uniqid('', true) . '.' . $iext;
        $images_destination = 'assets/products/' . $iname;
        if (move_uploaded_file($images_tmp, $images_destination)) {
            $updateQuery =  "UPDATE `users` SET `name`='{$name}',`address`='{$address}',
        `email`='{$email}',`phone`='{$phone}',`images`='{$iname}' WHERE `id`={$id}";
        }
        
     
    } else {
        $updateQuery =  "UPDATE `users` SET `name`='{$name}',`address`='{$address}',
        `email`='{$email}',`phone`='{$phone}' WHERE `id`={$id}";
    }
    // echo $updateQuery;

    $conn->query($updateQuery);
    if ($conn->affected_rows > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Profile has been updated.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
}

if (isset($_GET['id'])) {
    $id = $conn->escape_string($_GET['id']);
    $user_details = "SELECT * FROM `users` WHERE id = {$_SESSION['user_id']}";
    $result = $conn->query($user_details);
}


?>
<?php require "inc/header.php"; ?>



<?php if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

    <div class="container-fluid rounded bg-light mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 pt-5">
                <form action="" class="border border-2 center" method="post" enctype="multipart/form-data" style="width:70%; font-weight: bold;">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><label class="labels pt-5 mt-3">Profile Image</label><img class="rounded-circle " width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><input class="form-control text-primary p-2" type="file" name="pimages" id="formFile" accept=".jpg, .jpeg, .png" capture></div>
                        </div>
                        <div class="col-md-8 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right" style="font-size: 30px;">Profile Settings</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control"  name="name"  value="<?php echo $row['name']; ?>"></div>

                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-12"><label class="labels">Address </label><input type="text" class="form-control"  name="address" value="<?php echo $row['address']; ?>"></div>
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>"></div>
                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>"></div>
                                    <div class="col-md-12"><label class="labels">Created</label><input type="text" class="form-control" name="created" value="<?php echo $row['created']; ?>"></div>

                                </div>

                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="update" type="button">Save Profile</button></div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php
}


?>


<?php require "inc/footer.php"; ?>
</body>

</html>