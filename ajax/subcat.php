<?php
require "../database.php";
if(isset($_POST['cid'])){
    $html = "<option value='-1'>Select </option>";
    $cid = $conn->escape_string($_POST['cid']);
    $scat = "select id,cid,name,icon from subcategories where cid = {$cid}";
        $scat_result = $conn->query($scat);
        while($row = $scat_result->fetch_assoc()){
            //echo "<option value='{$row['id']}'>{$row['name']}</option>";
            $html .= "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        echo $html;
}
