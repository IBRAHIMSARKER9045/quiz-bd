<?php
session_start();
if (isset($_POST["cname"])) {
    require "../../database.php";
    require "../classes/imageResize.php";
//productid=&pname=A&psku=B&pdesc=CCC&pqty=12&punit=piece&pprice=123&pvat=5
    $cname = $_POST['cname'];
    $icon = $_POST['icon'];

   

    if ($cname == "") {
        echo "Please fill all the fields";
        exit;
    }

    $insertQuery = "INSERT INTO `categories`(`id`, `name`,`icon`, `uid`, `created`) VALUES (null,'$cname','$icon','" . $_SESSION['user_id'] . "',CURRENT_TIMESTAMP)";
    // echo $insertQuery;
    // exit;
    $conn->query($insertQuery);
    if ($conn->affected_rows == 1) {
        $id = $conn->insert_id;
        if (isset($_FILES['icon'])) {
            $allfiles = $_FILES['icon'];
            $imageName = "../assets/images/icons/" . $id . ".png";
            move_uploaded_file($allfiles['tmp_name'], $imageName);
            //use image  to resize image
            $image = new ImageResize($imageName);
            $image->resizeToWidth(800);
            $image->save($imageName);
        }
        //
        $message = "category Inserted";
    } else {
        $message = "category Insertion Failed";
        echo $message;
    }

} else {
    echo "something wrong...";
}