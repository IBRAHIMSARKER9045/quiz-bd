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
$currentPassword = $conn->escape_string($_POST['currentPassword']);
$newPassword = $conn->escape_string($_POST['newPassword']);
$confirmPassword = $conn->escape_string($_POST['confirmPassword']);
$passquery = "SELECT password FROM users WHERE id={$_SESSION['user_id']}";
$result = $conn->query($passquery);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($currentPassword == $row["password"] && $newPassword == $confirmPassword ) {
            $updatePass="UPDATE users set password='" . $newPassword . "' WHERE id={$_SESSION['user_id']}";
            
            $message = "Password Changed Sucessfully";
            } else{
             $message = "Password is not correct";
            }
            
            }
            }
            }
            ?>
            <!DOCTYPE html>
            <html>
            <head>
            <title>Password Change</title>
            
            </head>
            <body>
<h3 align="center">CHANGE PASSWORD</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit" name="update" value="Update">
</form>
<br>=
<br>
</body>
</html>