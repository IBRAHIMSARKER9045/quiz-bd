<?php
require "../partial_check_admin.php";
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../database.php';
$query = "SELECT * FROM `users` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "Users";
require "../../configuration.php";
require "../partial_header.php"; ?>
<?php
require "../partial_flashmessage.php";
?>
<div class="container-fluid vh-100 ">
    <div class="row"> <div class="col-md-12"><h3 class="text-secondary mt-3 ">Total Users(<?php echo $queryResult->num_rows; ?>)</h3>

<a href="../dashboard.php" id="CreateBtn" class="btn btn-primary  btn-sm text-light mt-3">Back</a>

</div></div>


<!-- <label for="">Only users with role 2 can edit or delete records</label> -->

<div class="row text-secondary mt-5">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header fw-bold">
              <h4>Messages</h4> 
            </div>
            <div class="card-body ">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table table-info text-secondary" style="width: 100%">

   
    <tr class="text-secondary">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Messages</th>
        
        <th>Action</th>
    </tr>
  
    <?php
    while ($row = $queryResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['message']}</td>";
       
        echo "<td>  
            <a href='usersdelete.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a>  </td>";
        echo "</tr>";

    }
    ?>
    
</table>
</div>
</div>
</div>
</div>
</div>
<?php require "../partial_footer.php"; ?>
</body>
</html>