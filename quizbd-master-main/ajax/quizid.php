<?php
require "../database.php";
if(isset($_POST['tid'])){
    $html = "<option value='-1'>Select QuizId</option>";
    $cid = $conn->escape_string($_POST['cid']);
    $sid = $conn->escape_string($_POST['sid']);
    $tid = $conn->escape_string($_POST['tid']);
    $scat = "select id from quizes where tid = {$tid}";
        $scat_result = $conn->query($scat);
        while($row = $scat_result->fetch_assoc()){
            //echo "<option value='{$row['id']}'>{$row['name']}</option>";
            $html .= "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        echo $html;
}
