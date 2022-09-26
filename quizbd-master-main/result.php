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
			$insertResut = "insert into results (uid,qsetid,qid,ans,correct,points) values (".$_SESSION['user_id'].",".$setid.",'".$quizid."','".$ans."','1','1')";
		}
		else{
			$insertResut = "insert into results (uid,qsetid,qid,ans,correct,points) values (".$_SESSION['user_id'].",".$setid.",'".$quizid."','".$ans."','0','0')";
		}
		$conn->query($insertResut);
	}

}
if($score > 0){
	$uid = $_SESSION['user_id'];
	$insert = "insert into leaderboard(uid,qsetid,score,comment,parcentile) values('$uid','$setid','$score','comment','0')";
	echo $insert;
	$conn->query($insert);
	if($conn->affected_rows > 0 ){
		echo "<h3>Your Score is ".$score." out of ".$totalQuestions.", saved!!</h3>";
	}
	else{
		echo "<h3>Your Score is ".$score." out of ".$totalQuestions." not saved</h3>";
	}
	$conn->commit();
}
else{
	$conn->rollback();
	echo "Without answering question not possible. blah blah blah";
}
}

?>





<?php require "inc/footer.php"; ?>


</body>


</html>