<?php
namespace App;
class User{
    //constructor
    public function __construct(){
        echo "User Class constructor";
    }
    //destructor
    public function __destruct(){
        echo "User Class destructor";
    }
}