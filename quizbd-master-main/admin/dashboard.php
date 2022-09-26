<?php
require "partial_check_admin.php";
require __DIR__ . '/../database.php';
$page = "dashboard";
require "../configuration.php";
require "partial_header.php";
?>
<!-- Page content-->
<div class="container-fluid">
  <div class="row text-secondary pt-2 pb-5">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header fw-bold bg-light">
          <h4>Dashboard</h4>
        </div>
        <div class="card-body ">


        </div>
        <div class="row text-secondary">
          <div class="col-md-4 mb-3 ">
            <div class="card h-100 well">
              <div class="card-header text-center fw-bold">Total Categories</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `categories` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?> </h1>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card  h-100 well">
              <div class="card-header text-center fw-bold">Total Subcategories</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `subcategories` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?> </h1>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card h-100 well">
              <div class="card-header text-center fw-bold">Total Topics</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `topics` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?> </h1>
              </div>
            </div>
          </div>

        </div>
        <div class="row text-secondary">
          <div class="col-md-4 mb-3">
            <div class="card h-100 well">
              <div class="card-header text-center fw-bold">Total Quizes</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `quizes` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?> </h1>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card h-100 well">
              <div class="card-header text-center fw-bold">Total FAQ</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `contact` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?></h1>
              </div>
            </div>

          </div>
          <div class="col-md-4 mb-3">
            <div class="card h-100 well">
              <div class="card-header text-center fw-bold">Total User Quiz</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `userquiz` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?></h1>
              </div>
            </div>

          </div>
          <div class="col-md-4 mb-3">
            <div class="card h-100 well">
              <div class="card-header text-center fw-bold"> Total Users</div>
              <div class="card-body text-center">
                <h1><?php
                    $query = "SELECT * FROM `users` WHERE 1";
                    $queryResult = $conn->query($query);
                    echo $queryResult->num_rows;
                    ?> </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="container-fluid">
  <div class="row pt-5 pb-5">
    <div class="col-12">
      <div class="accordion">
        <div class="accordion-item">
          <div class="accordion-header">
            <button class="accordion-button text-secondary bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h4>Users Details</h4>
            </button>
          </div>
          <div id="collapseOne" class="accordion-collapse collapse show " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table table-info text-secondary" style="width: 100%">

                  <tr class="text-secondary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th>Action</th>
                  </tr>


                  <?php

                  $query = "SELECT * FROM `users` WHERE 1";
                  $queryResult = $conn->query($query);
                  $q = $queryResult->num_rows;


                  while ($row = $queryResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['role']}</td>";
                    echo "<td>{$row['created']}</td>";
                    echo "<td> <a href='users/usersedit.php?id=" . $row['id'] . "'><i class='fas fa-edit'></i></a> 
            <a href='users/usersdelete.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a>  </td>";
                    echo "</tr>";
                  }
                  ?>


                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row pt-5 pb-5">
    <div class="col-12">
      <div class="accordion">
        <div class="accordion-item">
          <div class="accordion-header">
            <button class="accordion-button text-secondary bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h4>Messages</h4>
            </button>
          </div>
          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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

                  $query = "SELECT * FROM `contact` WHERE 1";
                  $queryResult = $conn->query($query);
                  $q = $queryResult->num_rows;

                  while ($row = $queryResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['message']}</td>";

                    echo "<td>  
            <a href='contact/contactdelete.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a>  </td>";
                    echo "</tr>";
                  }
                  ?>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row pt-5 pb-5">
    <div class="col-12">
      <div class="accordion">
        <div class="accordion-item">
          <div class="accordion-header">
            <button class="accordion-button text-secondary bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h4>User Quizes</h4>
            </button>
          </div>
          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table table-info text-secondary" style="width: 100%">

                  <tr class="text-secondary">
                    <th>ID</th>
                    <th>Qusetion</th>
                    <th>Option1</th>
                    <th>Option2</th>
                    <th>Option3</th>
                    <th>Option4</th>
                    <th>Answer</th>
                    <th>Created</th>

                    <th>Action</th>
                  </tr>


                  <?php

                  $query = "SELECT * FROM `userquiz` WHERE 1";
                  $queryResult = $conn->query($query);
                  $q = $queryResult->num_rows;

                  while ($row = $queryResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['question']}</td>";
                    echo "<td>{$row['op1']}</td>";
                    echo "<td>{$row['op2']}</td>";
                    echo "<td>{$row['op3']}</td>";

                    echo "<td>{$row['op4']}</td>";
                    echo "<td>{$row['ans']}</td>";
                    echo "<td>{$row['created']}</td>";


                    echo "<td>  
            <a href='userquiz/delete.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a>  </td>";
                    echo "</tr>";
                  }
                  ?>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php require "partial_footer.php"; ?>
</body>

</html>