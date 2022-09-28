<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";

require "configuration.php";
?>
<?php require "inc/header.php"; ?>
<div class="container pt-5 bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row pt-5">
    <?php 
  
  $data = "SELECT * FROM `users` WHERE id = {$_SESSION['user_id']}";
    $result = $conn->query($data);
    if($result->num_rows > 0){
        
        
     
        while($row = $result->fetch_assoc()){
           
            echo'
        <div class="col-md-4">
            <img alt="" style="width:300px;" title="" class="img-circle img-thumbnail isTooltip" src="assets/images/icons/'.$row['images'].'.png" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6 text-info">
            <strong style="font-size:30px">Information</strong><br>
             <div class="table-responsive ">
            <table class="table table-user-information table-borderless table-responsive-md table-hover center">
                <tbody>
                    
                    <tr>    
                        <td class="text-info">
                            <strong>
                                <span class="glyphicon glyphicon-user  text-info"></span>    
                                Name                                                
                            </strong>
                        </td>
                        <td class="text-info">
                         '.$row['name'].'
                        </td>
                    </tr>
                    
                    <tr>        
                        <td class="text-info">
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-info"></span> 
                               Address                                               
                            </strong>
                        </td>
                        <td class="text-info">
                        '.$row['address'].'
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-info">
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-info"></span> 
                               Phone                                             
                            </strong>
                        </td>
                        <td class="text-info">
                        '.$row['phone'].'
                        </td>
                    </tr>


                    
                    <tr>        
                        <td class="text-info">
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-info"></span> 
                                Email                                                
                            </strong>
                        </td>
                        <td class="text-info">
                        '.$row['email']. ' 
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-info">
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-info"></span>
                                Created                                                
                            </strong>
                        </td>
                        <td class="text-info">
                        '.$row['created'].'
                        </td>
                    </tr>
                    <tr>        
                        
                    <td class="fw-bold text-center">
                    <a href="user_profile_edit.php?id='.$_SESSION['user_id'].'">
                    <button type="button" class="btn btn-primary text-light mt-5">
                    Edit Profile
                    </button>
                    </td>
                                                  
                </tbody>
            </table>
            </div>';
        }
        
        
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
</div>                                        
<?php require "inc/footer.php"; ?>

</body>
</html>