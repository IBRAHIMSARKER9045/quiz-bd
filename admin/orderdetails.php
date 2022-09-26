
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != '2'){
    header("location:../index.php");
}
require __DIR__ . '/../vendor/autoload.php';
require "../database.php";
?>
<?php require "partial_header.php"; ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Orders Details Management</h1>
                    <a href="orders.php" class="btn btn-primary">BACK</a>
                    <?php 
if(isset($_GET['id'])){
    

  $id = $conn->escape_string($_GET['id']);
/*   SELECT column_name(s)
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name; */
//   $orders = "SELECT * FROM `order_items` WHERE order_id = {$id}";
  $orders = "select order_items.* , products.title as pname,products.image as image  from order_items inner join products on order_items.item_id = products.id where order_items.order_id = {$id}";
    $result = $conn->query($orders);
    if($result->num_rows > 0){
        echo '<table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Product Total</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
            $image = $row['image'];
            $first_image = explode(',',$image)[0];
            echo '<tr>
                <td>'.$row['order_id'].'</td>
                <td>'.$row['pname'].'</td>
                <td><img class="img-thumb" src="../assets/products/'.$first_image.'"/></td>
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


                </div>
            <?php require "partial_footer.php"; ?>
    </body>
</html>
