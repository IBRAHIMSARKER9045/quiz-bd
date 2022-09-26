<?php
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] != 2){
    echo "You dont have permission in this page";
    exit;
}
else{
    require __DIR__ . '/../../database.php';;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM `contact` WHERE `id` = $id limit 1";
        $conn->query($query);
        //affected rows works with insert, update and delete
        //num_rows works with only select
        if($conn->affected_rows == 1){
            $_SESSION['message'] = "Message deleted successfully";
            header("location:../dashboard.php");
        }
        else{
            echo "Error";
        }
    }
}