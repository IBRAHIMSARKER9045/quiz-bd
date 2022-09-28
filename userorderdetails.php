<?php
session_start();
use App\Admin\Login;
use App\User;
use App\Cart;
require __DIR__ . '/vendor/autoload.php';
?>
<?php require "inc/header.php"; ?>
<h1>Orders of <?php if(isset($_SESSION['user_name'])) echo "{$_SESSION['user_name']}";?></h1>
<a href="userorders.php" class="btn btn-primary">Back</a>
<?php 
if(isset($_GET['id'])){
    
  require "database.php";
  $id = $conn->escape_string($_GET['id']);
/*   SELECT column_name(s)
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name; */
//   $orders = "SELECT * FROM `order_items` WHERE order_id = {$id}";
  $orders = "select order_items.* , products.title as pname from order_items inner join products on order_items.item_id = products.id where order_items.order_id = {$id}";
    $result = $conn->query($orders);
    if($result->num_rows > 0){
        echo '<table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Product Total</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>
                <td>'.$row['order_id'].'</td>
                <td>'.$row['pname'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.($row['price'] * $row['quantity']).'</td>
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
}  

?>

<!-- category bikroy -->


<!-- category bikroy end -->
<?php require "inc/footer.php"; ?>

</body>
</html>