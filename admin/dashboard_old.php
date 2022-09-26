<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != '2'){
    header("location:../index.php");
}
?>
<h1>User role: <?php echo $_SESSION['user_role']; ?></h1>
<h1>User email: <?php echo $_SESSION['user_email']; ?></h1>
