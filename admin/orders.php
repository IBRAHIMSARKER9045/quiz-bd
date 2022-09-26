
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logged_in'])){
    header("location:../index.php");
}
if(isset($_SESSION['logged_in']) && $_SESSION['user_role'] != '2'){
    header("location:../index.php");
}
require __DIR__ . '/../vendor/autoload.php';
require "../database.php";
?>
<?php require "partial_header.php"; ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Orders Management</h1>
               <?php
               $orders = "SELECT * FROM `orders`";
               $result = $conn->query($orders);
               if($result->num_rows > 0){
                   echo '<table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Order ID</th>
                           <th>Order Date</th>
                           <th>Order Status</th>
                           <th>Order Total</th>
                           <th>Delivery Address</th>
                           <th>Payment Method</th>
                           <th>Payment Status</th>
                           <th>Transaction ID</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>';
                   while($row = $result->fetch_assoc()){
                       if($row['ostatus'] == '1'){
                           $status = '<span class="text-info">Pending</span>';
                       }
                          elseif($row['ostatus'] == '2'){
                            $status = '<span class="text-warning">Processing</span>';
                          }
                            elseif($row['ostatus'] == '3'){
                                $status = '<span class="text-success">Shipped</span>';
                            }
                            elseif($row['ostatus'] == '4'){
                                $status = '<span class="text-primary">Delivered</span>';
                            }
                            elseif($row['ostatus'] == '5'){
                                $status = '<span class="text-danger">Cancelled</span>';
                            }
                            else {
                                $status = 'Unknown';
                            }
                            if($row['payment_status'] == '0'){
                                $payment_status = '<span class="text-info">Pending</span>';
                            }
                            elseif($row['payment_status'] == '1'){
                                $payment_status = '<span class="text-success">Paid</span>';
                            }
                            else{
                                $payment_status = '<span class="text-danger">Failed</span>';
                            }
                       echo '<tr>
                           <td>'.$row['id'].'</td>
                           <td>'.$row['odate'].'</td>
                           <td>'.$status.'</td>
                           <td>'.$row['ototal'].'</td>
                           <td>'.$row['delivery'].'</td>
                           <td>'.$row['method'].'</td>
                           <td>'.$payment_status.'</td>
                           <td>'.$row['trxid'].'</td>
                           <td><a href="orderdetails.php?id='.$row['id'].'">View</a>
                           <a href="editorders.php?id='.$row['id'].'">EDIT</a></td>
                       </tr>';
                   }
                   echo '</tbody></table>';
               }
               else{
                   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong>No orders found!</strong>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
               }
               ?>

                </div>
            <?php require "partial_footer.php"; ?>
    </body>
</html>
