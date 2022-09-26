
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != '2'){
    header("location:../index.php");
}
require __DIR__ . '/../vendor/autoload.php';
require "../database.php";

if(isset($_POST['update'])){
  $id = $conn->escape_string($_POST['order_id']);
$order_status = $conn->escape_string($_POST['order_status']);
$payment_status = $conn->escape_string($_POST['payment_status']);
$updateQuery = "UPDATE `orders` SET `ostatus`='{$order_status}',`payment_status`='{$payment_status}' WHERE `id`={$id}";
$conn->query($updateQuery);
if($conn->affected_rows > 0){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your order status has been updated.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
}

if(isset($_GET['id'])){
    $id = $conn->escape_string($_GET['id']);
    $order_details = "SELECT * FROM `orders` WHERE `id`={$id} limit 1";
    $result = $conn->query($order_details);
}


?>
<?php require "partial_header.php"; ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Orders Details Management</h1>
                    <a href="orders.php" class="btn btn-primary">BACK</a>
<?php if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    

<form action="user_profile.php" method="post">
    <div class="form-group">
        <label for="">Order ID</label>
        <input type="text" class="form-control" name="order_id" value="<?php echo $row['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="">Order Date</label>
        <input type="text" class="form-control" name="order_date" value="<?php echo $row['created']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="">Order Status</label>
        <select name="order_status" id="" class="form-control">
            <option value="1" <?php echo ($row['ostatus'] == 1) ? 'selected' : ''; ?>>Pending</option>
            <option value="2" <?php echo ($row['ostatus'] == 2) ? 'selected' : ''; ?>>Processing</option>
            <option value="3" <?php echo ($row['ostatus'] == 3) ? 'selected' : ''; ?>>Delivered/Shipped</option>
            <option value="4" <?php echo ($row['ostatus'] == 4) ? 'selected' : ''; ?>>Completed</option>
            <option value="5" <?php echo ($row['ostatus'] == 4) ? 'selected' : ''; ?>>Cancelled</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Customer ID</label>
        <input type="text" class="form-control" name="customer_id" value="<?php echo $row['user_id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="">Payment Method</label>
        <input type="text" class="form-control" name="payment_method" value="<?php echo $row['method']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="payment_status">Payment Status</label>
        <select name="payment_status" id="payment_status" class="form-control">
            <option value="0" <?php echo ($row['payment_status'] == 0) ? 'selected' : ''; ?>>Not Paid</option>
            <option value="1" <?php echo ($row['payment_status'] == 1) ? 'selected' : ''; ?>>Paid</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Update" name="update">
    </div>
</form>
    <?php
}
 

?>


                </div>
            <?php require "partial_footer.php"; ?>
    </body>
</html>
