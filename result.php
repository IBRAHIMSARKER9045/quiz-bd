<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
  }
require __DIR__ . '/vendor/autoload.php';
require "configuration.php";
require "database.php";
?>
<?php require "inc/header.php"; ?>
<br><br><br><br><br>
<?php
if(isset($_POST['sbtn']) && isset($_POST['q'])){
	//var_dump($_POST['q']);
	$setid = $conn->escape_string($_POST['setid']);
	$q = "select * from quizset where id=".$setid." limit 1";
	$quizes  = $conn->query($q);
	$sets = $quizes->fetch_assoc();
	$totalQuestions =count(explode(",",$sets['quizset']));
	$score = 0;
$allAnswers = $_POST['q'];

foreach ($allAnswers as $key => $value) {
	$quizid = $key;
	$ans = $value;
	$q = "select * from quizes where id=".$quizid." limit 1";
	$quizes  = $conn->query($q);
	$conn->begin_transaction();
	if($quizes->num_rows > 0){
		$quizes = $quizes->fetch_assoc();
		$correctAns = $quizes['ans'];
		if($ans == $correctAns){
			$score += 1;
			$insertResut = "insert into results (uid,qsetid,qid,uans,correct,points) values (".$_SESSION['user_id'].",".$setid.",'".$quizid."','".$ans."','1','1')";
		}
		else{
			$insertResut = "insert into results (uid,qsetid,qid,uans,correct,points) values (".$_SESSION['user_id'].",".$setid.",'".$quizid."','".$ans."','0','0')";
		}
		$conn->query($insertResut);
	}

}
if($score > 0){
	$uid = $_SESSION['user_id'];
	$uname = $_SESSION['user_name'];
	$insert = "insert into leaderboard(uid,name,qsetid,score,comment,parcentile) values('$uid','$uname','$setid','$score','comment','0')";
	//echo $insert;
	$conn->query($insert);
	if($conn->affected_rows > 0 ){
		echo "<h3  class = 'text-center text-info pt-5 pb-5 fw-bolder'>Your Score is ".$score." out of ".$totalQuestions.", saved!!</h3>";
		$selectQuery = "SELECT quizes.question AS ques, quizes.ans AS cans, results.uans AS userans 
		                FROM quizes LEFT JOIN results ON results.qid=quizes.id 
						WHERE results.uid=$uid AND results.qsetid=$setid;";
	 //echo $selectQuery;
	 $showDetails  = $conn->query($selectQuery);
	 $sl = 1;
	 if($showDetails ->num_rows > 0){
		echo'<h1 class="text-center pb-3 text-primary">Question Details<h1/>';
        echo '<table class="table table-light table-responsive text-info table-borderless table-border-less center text-start" style="width:70%">
        
            <tr>
			    
                <th class="ps-5 "> Question </th>
                <th class="ps-5"> Correct Answer</th>
				<th class="ps-5"> User Answer</th>
               
                
                
            </tr>';
        
     
        while($row = $showDetails ->fetch_assoc()){
           
            echo '
            <tr>
            <td class="fw-bold ps-5">Q'.$sl++.' . '.$row['ques'].'</td>
                <td class="ps-5 text-success fw-bold">'.$row['cans'].'</td>
				<td class="ps-5">'.$row['userans'].'</td>
               
               
                
               
            </tr>';
        }
        echo '</table>';
        
    }
	 
	  

        

	}
	else{
		echo "<h3  class='text-center text-danger pt-5 pb-5 fw-bolder'>Already attempted. <br> Your Score is ".$score." out of ".$totalQuestions." not saved.</h3>";
		
	}
	$conn->commit();
}
}
else{
	$conn->rollback();
	echo "<h3 class='text-center text-warning pt-5 pb-5 fw-bolder'>Without answering a single question not possible counting result</h3>";
}



?>





<?php require "inc/footer.php"; ?>


</body>


</html>cxn