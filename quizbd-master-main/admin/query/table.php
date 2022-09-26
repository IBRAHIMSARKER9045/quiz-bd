<?php
require "../partial_check_admin.php";
require "../../database.php";
require "../../configuration.php";
$pagesize = $items_per_page;
$recordstart = (isset($_GET['recordstart'])) ? $_GET['recordstart'] : 0;
// Create the query
if(isset($_GET['searchdata'])){
	$sd = $_GET['searchdata'];
$selectQuery = "SELECT * FROM contact where name like '%".$sd."%' ORDER by id desc limit $recordstart,$pagesize";
	}
else {
$selectQuery = "SELECT * FROM contact  ORDER by id desc limit $recordstart,$pagesize";
}

if(isset($_GET['searchdata'])){
	$sd = $_GET['searchdata'];
$totalrecord = "select count(*) from contact  where name like '%".$sd."%'";
	}
else {
	$totalrecord = "select count(*) from contact ";
	}
$totalrecordQuery = $conn->query($totalrecord);
$totalrecordQueryRow = $totalrecordQuery->fetch_row(); 
$totalrecord = $totalrecordQueryRow[0];
//total record end
$numberofpages = ceil($totalrecord/$pagesize);
// Send the query to MySQL
$selectQueryResult = $conn->query($selectQuery);
$totalRows = $selectQueryResult->num_rows;
$table = "<table class='table table-hover'> <caption>Query Table</caption> <tr><th>Sl</th><th>Query</th><th>Reply</th></tr>";
$sl =($recordstart+1) ;
while($row = $selectQueryResult->fetch_array()){
	//echo $row['price']."<br>";
	$table .= "<tr><td>".$sl++."</td><td class='clspn'>".$row['message']."</td><td>".$row['reply']."</td><td><a href='#form_category' class='editbtn' data-editid='".$row['id']."'><i class='fas fa-edit'></i></a><a class='delbtn' data-id='".$row['id']."'><i class='fas fa-trash'></i></a></td></tr>";
	}
$table .= "</table>";
if($totalRows > 0 ){
$table .= "<h4>Total ".$totalRows." records</h4>";}
else {
$table .= "<h4 class='text-danger'>No Records found</h4>";	
	}

echo $table;	
?>
<ul class="pagination">
<?php
for($i = 0; $i <$numberofpages;$i++){
	$pagestartvalue = $i*$pagesize;
	$pageendvalue = $pagestartvalue + $pagesize;
	//if($pagestartvalue == $recordstart){
	if(	$recordstart >=$pagestartvalue && $recordstart <$pageendvalue){
	echo "<li class='active page-item'><a class='pageanchor page-link' data-recid='".$pagestartvalue."'>".($i+1)."</a></li>";
	}
	else {
		echo "<li class='page-item'><a class='pageanchor page-link' data-recid='".$pagestartvalue."'>".($i+1)."</a></li>";
		}
	} 
$selectQueryResult->free();
$conn->close();
?>
</ul>