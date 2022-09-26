<?php
namespace App;
require __DIR__."/../database.php";
class Cart{
    //start session in constructor
    public static $conn = null;
    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        Cart::$conn  = Cart::connect();
    }

    public static function connect(){
        $conn = new \mysqli("localhost", "root", "", "polyweb2");
        
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        return $conn;
    }

    public static function total(){
        $total = 0;
        if(isset($_SESSION['cart_item'])){
            foreach($_SESSION['cart_item'] as $item){
                $total += $item['p']*$item['q'];
            }
        }
        return $total;        
    }
    public static function count(){
        $count = 0;
        if(isset($_SESSION['cart_item'])){
            foreach($_SESSION['cart_item'] as $item){
                $count += $item['q'];
            }
        }
        return $count;        
    }
    public function cartitems(){
        $cart_item = [];
        if(isset($_SESSION['cart_item'])){
            foreach($_SESSION['cart_item'] as $k=>$item){
                $cart_item[$k] = $item;
            }
        }
        return $cart_item;
    }
    public static function addtocart($id){
        $query = "select * from productS where id = {$id}";
        $result = self::$conn->query($query);
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
}