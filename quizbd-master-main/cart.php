<?php require "inc/header.php"; ?>
<?php //unset($_SESSION['cart_item']); ?>
<?php
require "database.php";
?>
<h1>Your Shopping Cart</h1>
<style>
    body {
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold
}

.title {
    margin-bottom: 5vh
}

.card {
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent
}

@media(max-width:767px) {
    .card {
        margin: 3vh auto
    }
}

.cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem
}

@media(max-width:767px) {
    .cart {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65)
}

@media(max-width:767px) {
    .summary {
        border-top-right-radius: unset;
        border-bottom-left-radius: 1rem
    }
}

.summary .col-2 {
    padding: 0
}

.summary .col-10 {
    padding: 0
}

.row {
    margin: 0
}

.title b {
    font-size: 1.5rem
}

.main {
    margin: 0;
    padding: 2vh 0;
    width: 100%
}

.col-2,
.col {
    padding: 0 1vh
}

a {
    padding: 0 1vh
}

.close {
    margin-left: auto;
    font-size: 0.7rem
}

img {
    width: 3.5rem
}

.back-to-shop {
    margin-top: 4.5rem
}

h5 {
    margin-top: 4vh
}

hr {
    margin-top: 1.25rem
}

form {
    padding: 2vh 0
}

select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}


input:focus::-webkit-input-placeholder {
    color: transparent
}



#code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}
</style>
<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">3 items</div>
                </div>
            </div>
            <?php if(!empty($_SESSION['cart_item']))
            {
               $ids = implode(",",array_keys($_SESSION['cart_item']));
                $sql = "select products.*,category.name as category_name FROM products INNER JOIN category ON products.cid = category.id WHERE products.id IN ($ids)";
                //SELECT Orders.OrderID, Customers.CustomerName FROM Orders INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;
                //select products.*,categories.name as category_name FROM products INNER JOIN categories ON products.cid = categories.id WHERE products.id IN ($ids)";
                $result = $conn->query($sql);
                $total = 0;
                $totalitems = 0;
                while($row = $result->fetch_assoc())
                {
                    $total += $_SESSION['cart_item'][$row['id']]['q'] * $row['dprice'];
                    $totalitems += $_SESSION['cart_item'][$row['id']]['q'];
                    $images = $row['image'];
                    $images = explode(",", $images);
                    ?>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="assets/products/<?php echo $images[0]; ?>"></div>
                    <div class="col">
                        <div class="row text-muted"><?php echo $row['category_name']; ?></div>
                        <div class="row"><?php echo $row['title']; ?></div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border"><?php echo $_SESSION['cart_item'][$row['id']]['q'] ?></a><a href="#">+</a> </div>
                    <div class="col">Tk <?php echo $row['dprice'] * $_SESSION['cart_item'][$row['id']]['q']; ?> <span class="close">&#10005;</span></div>
                </div>
            </div>
                    <?php
                }
               
            }
            ?>
            <!-- <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                    <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                </div>
            </div>
            <div class="row">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                    <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                    <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                </div>
            </div> -->
            <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS (<?php echo $totalitems??""; ?>) </div>
                <div class="col text-right">Tk  <?php echo $total??""; ?></div>
            </div>
            <form>
                <p>SHIPPING</p> <select class="form-control">
                    <option class="text-muted">Standard-Delivery- Tk 20.00</option>
                </select>
                <p>GIVE CODE</p> <input id="code" class="form-control" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right" id="totalgrandprice"> Tk <?php echo $total + 20; ?></div>
            </div> <button class="btn btn-success" onclick="go('checkout.php')">CHECKOUT</button>
        </div>
    </div>
</div>
<hr>
<!-- <pre>
    <code>
        <?php //var_dump($_SESSION['cart_item']); ?>
    </code>
</pre> -->
<?php require "inc/footer.php"; ?>
<script>
    function go(url) {
        window.location.href = url;
    }
</script>
</body>
               </html>