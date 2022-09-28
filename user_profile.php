<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";

require "configuration.php";
?>
<?php require "inc/header.php"; ?>
<div class="container-fluid bg-light ">
<div class="row mt-5">
<div clsss="col-12 ">


<h4 class="text-primary text-center mt-3">Profile of <?php if(isset($_SESSION['user_name'])) echo "{$_SESSION['user_name']}";?></h4>

<?php 
  
  $data = "SELECT * FROM `users` WHERE id = {$_SESSION['user_id']}";
    $result = $conn->query($data);
    if($result->num_rows > 0){
        echo '<table class="table table-primary text-primary table-border-less">
        
            <tr>
                <th class="ps-5"> Key</th>
                <th class="ps-5"> Information</th>
               
                
                
            </tr>';
        
     
        while($row = $result->fetch_assoc()){
           
            echo '<tr>
            <td class="fw-bold ps-5">Users Image :</td>
                
               
               <td class="ps-5"><img src="assets/images/icons/'.$row['images'].'.png" width="100" height="100"/></td>
                
               
            </tr>
            <tr>
            <td class="fw-bold ps-5">ID :</td>
                <td class="ps-5">'.$row['id'].'</td>
               
               
                
               
            </tr>
            <tr>
            <td class="fw-bold ps-5">Name :</td>
            <td class="ps-5">'.$row['name'].'</td>
           
           
           
        </tr>
        <tr>
            <td class="fw-bold ps-5">Address :</td>
            <td class="ps-5">'.$row['address'].'</td>
           
           
           
        </tr>
        <tr>
        
            <td class="fw-bold ps-5">Email :</td>
       
            <td class="ps-5">'.$row['email'].'</td>
        
       
        </tr>
        <tr>
    
   
            <td class="fw-bold ps-5">Phone :</td>
            <td class="ps-5">'.$row['phone'].'</td>
    
   
        </tr>
        <tr>

            <td class="fw-bold ps-5">Role :</td>
            <td class="ps-5">'.$row['role'].'</td>


        </tr>
        <tr>

            <td class="fw-bold ps-5">Account Created :</td>
            <td class="ps-5">'.$row['created'].'</td>

         </tr>
        <tr>
    
            <td class="fw-bold text-center"><a href="user_profile_edit2.php?id='.$_SESSION['user_id'].'"><button type="button" class="btn btn-primary text-light">Edit Profile</button></td>
            <td class="fw-bold text-center"><a href="change_password.php"><button type="button" class="btn btn-primary text-light">Change Password</button></td>
    
            

        </tr>';
        }
        echo '</table>';
        
    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>No data found!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }


?>
</div>
</div>
</div>
<!-- category bikroy -->


<!-- category bikroy end -->
<?php require "inc/footer.php"; ?>

</body>
</html>