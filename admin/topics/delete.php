<?php
    if(isset($_GET["recid"])){
        require "../../database.php";
    $deleteQuery = "DELETE from topics where id='".$_GET["recid"]."' limit 1";
    $conn->query($deleteQuery);
    if($conn->affected_rows == 1){
        echo "Record deleted";
        }
    else {
        echo "Problem deleting record";
        }	
    }