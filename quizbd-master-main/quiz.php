<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
use App\Admin\Login;
use App\User;
require __DIR__ . '/vendor/autoload.php';
require "configuration.php";
require "database.php";
?>
<?php require "inc/header.php"; ?>
  <div class="container-fluid text-center">
  <div class="row pt-5 pb-5 bg-light">

<div class="col-md-12 pt-5 pb-5">
<?php 

if(isset($_GET['quizset'])){
  $setid = $conn->escape_string($_GET['quizset']);
  $q = "select * from quizset where id=".$setid." limit 1";
    $quizes  = $conn->query($q);
    if($quizes->num_rows > 0){
        $quizes = $quizes->fetch_assoc();
        $quizids = $quizes['quizset'];
        //var_dump($quizids);
        $quizes1 = "select * from quizes where id in (".$quizids.")";
        $allsetQuizes = $conn->query($quizes1);
        $totalQuestions = $allsetQuizes->num_rows;
        echo "<h3>".$quizes['setname']." (".$totalQuestions.")</h3>";
         //var_dump($allsetQuizes);

        $html = "<form action='result.php' method='post'>";
        $html .= "<input type='hidden' name='setid' value='".$setid."'>";
        $html .= "<table id='tableContainer'>";
        $sl=1;
        
        foreach ($allsetQuizes as $q) {
        // var_dump($q);
       // echo($q['id']);
           $html .= ' <tr> <td colspan="2">Q'.$sl++.'. '.$q['question'].'</td></tr>
           <tr><td> <input type="radio" class="rdo" name="q['.$q['id'].']" id="q'.$q['id'].'a" value="'.$q['op1'].'"> </td><td> <label for="q'.$q['id'].'a">'.$q['op1'].'</label></td></tr>
           <tr> <td> <input type="radio" class="rdo" name="q['.$q['id'].']" id="q'.$q['id'].'b" value="'.$q['op2'].'"> </td><td> <label for="q'.$q['id'].'b">'.$q['op2'].'</label></td></tr>
           <tr> <td> <input type="radio" class="rdo" name="q['.$q['id'].']" id="q'.$q['id'].'c" value="'.$q['op3'].'"> </td><td> <label for="q'.$q['id'].'c">'.$q['op3'].'</label></td></tr>
           <tr> <td> <input type="radio" class="rdo" name="q['.$q['id'].']" id="q'.$q['id'].'d" value="'.$q['op4'].'"> </td><td> <label for="q'.$q['id'].'d">'.$q['op4'].'</label></td></tr>
           <tr> <td> <input type="radio" class="rdo" name="q['.$q['id'].']" id="q1e" value="'.$q['op4'].'" style="display:none"> </td><td> <label for="q1e" style="display:none">'.$q['ans'].'</label></td></tr>
           <tr> <td colspan="2" style="border-bottom: 2px solid gray;">&nbsp;</td></tr>'; 
        }
        $html .= "</table>
        <input type='submit' class='btn btn-success' name='sbtn' id='sbtn' >
        </form>";
    }
    echo $html;

  }
  

  
?>




</div>
  </div>
</div>


<?php require "inc/footer.php"; ?>

<script>
 $(document).ready(function(){

// code to read selected table row cell data (values).

});
</script>
</body>
               </html>
