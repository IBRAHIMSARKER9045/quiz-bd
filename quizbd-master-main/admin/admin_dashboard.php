<?php
require "partial_check_admin.php";
require __DIR__ . '/../database.php';
$page = "dashboard";
require "../configuration.php";
require "partial_header.php";
?>
                <!-- Page content-->
                <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card bg-success h-100">
            <div class="card-header text-center fw-bold">Total Categories</div>
            <div class="card-body text-center"><h1><?php 
                $query = "SELECT * FROM `categories` WHERE 1";
                $queryResult = $conn->query($query);
                echo $queryResult->num_rows; 
                ?> </h1></div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success h-100">
            <div class="card-header text-center fw-bold">Total Subcategories</div>
            <div class="card-body text-center"><h1><?php 
                $query = "SELECT * FROM `subcategories` WHERE 1";
                $queryResult = $conn->query($query);
                echo $queryResult->num_rows; 
                ?> </h1></div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success h-100">
            <div class="card-header text-center fw-bold">Total Topics</div>
            <div class="card-body text-center"><h1><?php 
                $query = "SELECT * FROM `topics` WHERE 1";
                $queryResult = $conn->query($query);
                echo $queryResult->num_rows; 
                ?> </h1></div>
          </div>
        </div>
        
      </div>
      <div class=row>
      <div class="col-md-4 mb-3">
          <div class="card bg-success h-100">
            <div class="card-header text-center fw-bold">Total Quizes</div>
            <div class="card-body text-center"><h1><?php 
                $query = "SELECT * FROM `quizes` WHERE 1";
                $queryResult = $conn->query($query);
                echo $queryResult->num_rows; 
                ?> </h1></div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success h-100">
            <div class="card-header text-center fw-bold">Total Users</div>
            <div class="card-body text-center"><h1><?php 
                $query = "SELECT * FROM `users` WHERE 1";
                $queryResult = $conn->query($query);
                echo $queryResult->num_rows; 
                ?> </h1></div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success h-100">
            <div class="card-header text-center fw-bold">Total Weeks</div>
            <div class="card-body text-center"><h1>2</h1></div>
          </div>
        </div>
      </div>

     
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Data Table
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>uname</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Quzzess</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
                
            <?php require "partial_footer.php"; ?>
    </body>
</html>
