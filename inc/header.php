<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page)?$site." - ". $page : $site; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owl/assets/owl.theme.green.min.css">
    <style>

        a{
            text-decoration: none;
        }
        
        .owl-carousel .item img{
            width:160px;
            display: block;
            margin: auto;
        }
        #welcome{
            margin-top: 70px;
        }
    </style>
        <style>

#category {
 
  background-color:#bae5f7 ;
}   

#home {
    background-image: url("assets/images/image1.webp");

 background-color: #bae5f7 ;
 background-repeat: no-repeat;
  background-size: 1600px 600px;

}   


#loginImage{
    background-image: url("assets/images/img1.jpg");
    background-color: #17a2b8;

 
}
        .product-grid{
    font-family: 'Montserrat', serif;
    text-align: center;
}
.product-grid .product-image{
    background-color: #000;
    overflow: hidden;
    position: relative;
}
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: 100%;
    height: auto;
}
.product-grid .product-image .pic-1{ transition: all 0.5s ease 0s; }
.product-grid:hover .product-image .pic-1{ opacity: 0; }
.product-grid .product-image .pic-2{
    width: 100%;
    height: 100%;
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.5s ease 0s;
}
.product-grid:hover .product-image .pic-2{ opacity: 0.75; }
.product-grid .product-links{
    width: 150px;
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 1;
    transform: translateY(-50%) translateX(-50%) scale(0);
    position: absolute;
    top: 50%;
    left: 50%;
    transition: all .3s ease;
}
.product-grid:hover .product-links{ transform: translateY(-50%) translateX(-50%) scale(1); }
.product-grid .product-links li{
    margin: 0 3px;
    display: inline-block;
}

.product-grid .product-links li a{
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    line-height: 36px;
    height: 40px;
    width: 40px;
    margin: 0;
    border: 2px solid #fff;
    display: block;
    overflow: hidden;
    transition: all 0.3s ease 0.1s;
}
.product-grid .product-links li:first-child{
    margin: 0 0 8px;
    display: block;
}
.product-grid .product-links li:first-child a{
    line-height: 30px;
    width: auto;
    border-width: 4px;
    border-style: double;
    border-left: none;
    border-right: none;
}
.product-grid .product-links li a:hover{
    color: #ff2db9;
    border-color: #ff2db9;
}
.product-grid .product-content{
    text-align: left;
    padding: 15px 0 0;
}
.product-grid .title{
    font-size: 16px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 10px;
}
.product-grid .title a{
    color: #666;
    transition: all 0.3s ease 0s;
}
.product-grid .title a:hover{ color: #ff2db9; }
.product-grid .price{
    color: #ff2db9;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    width: calc(100% - 89px);
    display: inline-block;
}
.product-grid .rating{
    color: #777777;
    font-size: 12px;
    width: 85px;
    padding: 0;
    margin: 0;
    list-style: none;
    display: inline-block;
}  

#review{
    background-color: #d4f6fc;
}
#testimonials img {
   width: 65px;
   height: 65px;
   border-radius: 100px;
   transition: all 0.4s ease;
}

#testimonials .nav-pills .nav-link.active {
   background-color: transparent;
}

#testimonials .nav-pills .nav-link.active img {
   transform: scale(1.3);
}

.review .stars {
   color: #E93B81;
}

.review p {
   max-width: 720px;
   margin: 24px auto;
   font-style: italic;
}

#clients img {
   height: 35px;
}

form .form-control {
   border-radius: 0;
}

form .form-control:focus {
   box-shadow: none;
   border-color: #E93B81;
}

#cta {
   background-color: #E93B81;
}
 
.center{
    margin-left: auto;
    margin-right: auto;
    font-size: larger;
}

.the-most {
    position: fixed;
    z-index: 1;
    bottom: 0;
    left: 0;
    width: 50vw;
    max-width: 200px;
    padding: 10px;
}

.the-most img {
    max-width: 100%;
}



@media screen and (max-width: 990px){
    .product-grid{ margin-bottom: 30px; }
}



    </style>
</head>
<body>
    <div class="container-fluid">
<?php include "navbar.php" ?>