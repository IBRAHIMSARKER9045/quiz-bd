<?php
require "../database.php";
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select * from productS where id = {$_GET['id']}";
    $result = $conn->query($query);
if($result->num_rows > 0){
        $product = $result->fetch_assoc();
        //add product to cart session
        $itemArray = array(
            $product['id']=> array(
                'p'=>$product["dprice"], 
                'q'=> 1                
            ),
        );
        if(!empty($_SESSION["cart_item"])) {
            if(array_key_exists($product['id'],$_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($product['id'] == $k)
                            $_SESSION["cart_item"][$k]["q"] = $_SESSION["cart_item"][$k]["q"] + 1;
                }
            } else {
                $_SESSION["cart_item"][$product['id']] = [
                    'p'=>$product["dprice"], 
                    'q'=> 1                
                ];
            }
        }
        else{
            $_SESSION["cart_item"] = $itemArray;
        }
        $total_items = 0;
        foreach($_SESSION["cart_item"] as $k => $v) {
            $total_items += $v["q"];
        } 
        echo $total_items;
}
}
