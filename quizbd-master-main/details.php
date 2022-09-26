<?php
session_start();
use App\Admin\Login;
use App\User;
require __DIR__ . '/vendor/autoload.php';
?>
<?php require "inc/header.php"; ?>
<?php 
  require "database.php";
  $cat = "SELECT * FROM `category` WHERE 1";
  $result = $conn->query($cat);
  if(isset($_SESSION['message'])){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Message:!</strong> '.$_SESSION['message'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['message']);
  }
  if($result->num_rows > 0){
      echo '<div class="owl-carousel owl-theme">';
    while($row = $result->fetch_assoc()){
        echo '<a href="subcategory.php?cat='.$row['id'].'"><div class="item"><img src="assets/images/icons/'.$row['icon'].'.png" title="'.$row['name'].'"/><h4 class="text-center">'.$row['name'].'</h4></div></a>';
    }
    echo '</div>';
  }
?>
<?php
if(isset($_GET['id'])){
    $id = $conn->escape_string($_GET['id']);
    $sql = "SELECT * FROM `products` WHERE id = '$id' limit 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $details = $result->fetch_assoc();
?>
<section id="services" class="services section-bg">
   <div class="container-fluid">
      <div class="row row-sm">
         <div class="col-md-6 _boxzoom">
            <div class="zoom-thumb">
               <ul class="piclist">
                   <?php
                    $images = $details['image'];
                    $images = explode(",", $images);
                    foreach($images as $image){
                        echo '<li><img src="assets/products/'.$image.'" alt="'.$details['title'].'" onerror="imgError(this);"/></li>';
                    }
                   ?>
               </ul>
            </div>
            <div class="_product-images">
               <div class="picZoomer">
                  <img class="my_img" src="assets/products/<?php echo $images[0]; ?>" alt="">
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="_product-detail-content">
               <p class="_p-name"> <?php echo $details['title'] ?> </p>
               <div class="_p-price-box">
                  <div class="p-list">
                     <span> M.R.P. : <i class="fa fa-inr"></i> <del> <?php echo $details['price']; ?> Tk  </del>   </span>
                     <span class="price"> <?php echo $details['dprice']; ?> Tk </span>
                  </div>
                  <div class="_p-add-cart">
                     <div class="_p-qty">
                        <span>Add Quantity</span>
                        <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                        <input type="number" name="qty" id="number" value="1" />
                        <div class="value-button increase_" id="" value="Increase Value">+</div>
                     </div>
                  </div>
                  <div class="_p-features">
                     <?php echo $details['details']; ?>                       
                  </div>
                  <form action="" method="post" accept-charset="utf-8">
                     <ul class="spe_ul"></ul>
                     <div class="_p-qty-and-cart">
                        <div class="_p-add-cart">
                           <button class="btn-theme btn buy-btn" tabindex="0">
                           <i class="fa fa-shopping-cart"></i> Buy Now
                           </button>
                           <button type="button" onclick="addbag(<?php echo $details['id']; ?>)" class="btn-theme btn btn-success" tabindex="0">
                           <i class="fa fa-shopping-cart"></i> Add to Cart
                           </button>
                           <input type="hidden" name="pid" value="18" />
                           <input type="hidden" name="price" value="850" />
                           <input type="hidden" name="url" value="" />    
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
    }
}

?>
<!-- details bikroy -->

<section class="sec bg-light">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 title_bx">
            <h3 class="title"> Recent Post   </h3>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 list-slider mt-4">
            <div class="owl-carousel common_wd  owl-theme" id="recent_post">
                <?php
                $relatedSQL = "SELECT * FROM `products` WHERE cid='{$details['cid']}' and hot='1' and id !={$id}  ORDER BY created DESC LIMIT 7";
                $relatedResult = $conn->query($relatedSQL);
                if($relatedResult->num_rows > 0){
                    while($relatedRow = $relatedResult->fetch_assoc()){
                    $images = $relatedRow['image'];
                    $images = explode(",", $images);
                        ?>
                    <div class="item">
                  <div class="sq_box shadow">
                     <div class="pdis_img"> 
                        <span class="wishlist">
                        <a alt="Add to Wish List" title="Add to Wish List" href="javascript:void(0);"> <i class="fa fa-heart"></i></a>
                        </span>
                        <a href="#">
                        <img src="assets/products/<?php echo $images[0]; ?>"> 
                        </a>
                     </div>
                     <h4 class="mb-1"> <a href="details.php?id=<?php echo $relatedRow['id']; ?>"> <?php echo $relatedRow['title']; ?> </a> </h4>
                     <div class="price-box mb-2">
                        <span class="price"> Price <i class="fa fa-inr"></i> <?php echo $relatedRow['price']; ?> </span>
                        <span class="offer-price"> Offer Price <i class="fa fa-inr"></i> <?php echo $relatedRow['dprice']; ?> </span>
                     </div>
                     <div class="btn-box text-center">
                        <a class="btn btn-sm" href="javascript:void(0);"> <i class="fa fa-shopping-cart"></i> Add to Cart </a>
                     </div>
                  </div>
               </div>
                        <?php
                    }
                }
                else{
                    echo '<h3>No products to show</h3>';
                }
                ?>

            </div>
         </div>
      </div>
   </div>
</section>
<!-- details end -->
<?php require "inc/footer.php"; ?>
<script src="assets/js/details.js"></script>
<script>
function addbag(id){
  const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("cartitemtotal").innerHTML = this.responseText;
      console.log(this.responseText);
    }
  xmlhttp.open("GET", "ajax/addcart.php?id=" + id);
  xmlhttp.send();
}

</script>
               </body>
               </html>
