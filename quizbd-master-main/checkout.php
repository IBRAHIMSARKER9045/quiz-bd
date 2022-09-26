<?php

use App\Cart;
require __DIR__."/vendor/autoload.php";
require "inc/header.php"; ?>
<?php
$error = false;
$message = "";
//check user authentication
if(!isset($_SESSION['logged_in'])){
    $error = true;
    $message = "Please login to continue";
}
//check session
if(!isset($_SESSION['cart_item'])){
    //$_SESSION['cart_item'] = array();
}
//auth user
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != true){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Please login to continue 1.</a>';
}

require "database.php";
if(isset($_POST['checkout'])){
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    if($payment != "cod"){
        $trxid = $_POST['trxid'];
    }
    else{
        $trxid = "";
    }
    $shipping = $_POST['shipping'];
    $comment = $_POST['comment'];
    $user = $_SESSION['user_id'];
    $total = Cart::total();
    //order status 1 means pending, 2 means processing, 3 means shipped, 4 means delivered
    $query = "INSERT INTO `orders` (`id`, `user_id`, `odate`, `ostatus`, `ototal`,`usercomment`,`delivery`,`method`,`trxid`) VALUES (NULL, '".$user."', CURRENT_TIMESTAMP, '1', '".$total."', '".$comment."', '".$address."', '".$payment."', '".$trxid."')";
    //echo $query;
    $conn->query($query);
    if($conn->affected_rows > 0){
        $order_id = $conn->insert_id;
        foreach($_SESSION['cart_item'] as $k=>$item){
            $query = "INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `price`) VALUES (NULL, '".$order_id."', '".$k."', '".$item['q']."', '".$item['p']."')";
            $result = $conn->query($query);
        }
        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your order has been placed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['cart_item']);
            //unset($_SESSION['cart_total']);
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Your order could not be placed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}

?>
<?php if($error){ 
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Error!</strong> '.$message.'.
<a href="login.php">You can login from here</a><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } else { ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group">
        <label for="">Phone</label>
        <input type="text" name="phone" class="form-control" placeholder="Enter phone no">
    </div>
    <div class="form-group">
        <label for="">Delivery Address</label>
        <input type="text" name="address" class="form-control" placeholder="Enter address">
    </div>
    <div class="form-group">
        <label for="">Payment Method</label>
        <select id="pmethod" name="payment" class="form-control" onchange="showhidetrx()">
            <option value="cod">Cash on delivery</option>
            <option value="bKash">bKash</option>
            <option value="nogod">Nagad</option>
            <option value="upay">Upay</option>
        </select>
    </div>
    <div class="form-group" id="trxdiv" style="display: none;">
        <label for="">Transaction ID</label>
        <input type="text" name="trxid" class="form-control" placeholder="transaction id">
    </div>
    <div class="form-group">
        <label for="">Shipping Method</label>
        <select name="shipping" class="form-control">
            <option value="free">Free</option>
            <option value="standard">Standard(20)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Comment</label>
        <textarea name="comment" class="form-control" placeholder="Enter comment"></textarea>
    </div>
    <button type="submit" name="checkout" class="btn btn-primary">Submit</button>
</form>
<?php } ?>
<?php require "inc/footer.php"; ?>
<script>
    function showhidetrx(){
        var pmethod = document.getElementById('pmethod').value;
        if(pmethod == 'bKash' || pmethod == 'nogod' || pmethod == 'upay'){
            document.getElementById('trxdiv').style.display = 'block';
        }
        else{
            document.getElementById('trxdiv').style.display = 'none';
        }
    }
</script>
</body>
</html>
