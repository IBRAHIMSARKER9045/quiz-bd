<?php
// echo __DIR__;
// exit;
if(isset($_POST['submit'])){
    require __DIR__ . '/vendor/autoload.php';
    require __DIR__ . '/database.php';
    $agree = "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if(isset($_POST['agree']))
    $agree = $_POST['agree'];
    // echo "Name: ".$name."<br>";
    // echo "Email: ".$email."<br>";
    // echo "Password: ".$pass1."<br>";
    // echo "Repeat Password: ".$pass2."<br>";
    // echo "Agree: ".$agree."<br>";
    if($name != "" && $email != "" && $pass1 != "" && $pass2 != "" && $agree == "yes"){
        if($pass1 == $pass2){
            $p = password_hash($pass1,PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (name,email,password) VALUES (\''.$name.'\',\''.$email.'\',\''.$p.'\');';
            // echo $sql;
            // exit;
            $conn->query($sql);
            if($conn->affected_rows > 0){
                echo "Successfully registered";
            }
            else{
                echo "Error";
            }
        }
        else{
            echo "Password does not match";
        }
    }
    else{
        echo "Please fill all the fields";
    }

}
//insert into users values(NULL,"test","test@gmail.com","sdkfjheriuydsfjsadfkjhasdkfhvcj",null,null,null);
// role and created cannot be null
//insert into users values(NULL,"test","test@gmail.com","sdkfjheriuydsfjsadfkjhasdkfhvcj",'1',CURRENT_TIMESTAMP,null);
//insert into users values(NULL,"test1","test1@gmail.com","dsfjhfdg",'1',CURRENT_TIMESTAMP,null);
    ?>