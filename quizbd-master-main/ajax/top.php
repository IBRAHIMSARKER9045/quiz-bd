<?php
require "../database.php";
if(isset($_POST['sid'])){
    $html = "<option value='-1'>Select topic</option>";
    $cid = $conn->escape_string($_POST['cid']);
    $sid = $conn->escape_string($_POST['sid']);
    $scat = "select id,cid,scid,name,icon from topics where scid = {$sid}";
        $scat_result = $conn->query($scat);
        while($row = $scat_result->fetch_assoc()){
            //echo "<option value='{$row['id']}'>{$row['name']}</option>";
            $html .= "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        echo $html;
}
