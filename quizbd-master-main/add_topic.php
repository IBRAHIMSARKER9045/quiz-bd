<?php
require 'database.php';
if (isset($_POST['id'])){    
    $id = $conn->escape_string($_POST['id']);
    $sql = "SELECT * FROM topics WHERE id = " . $id . " LIMIT 1";    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $return_arr = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'icon' => $row['icon'],
        
    );
    echo json_encode($return_arr);
}
       