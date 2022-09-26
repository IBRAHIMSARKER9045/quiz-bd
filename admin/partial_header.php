<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . "/../configuration.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo isset($page)?$site." - ". $page : $site; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo $adminsiteurl; ?>assets/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo $adminsiteurl; ?>css/styles.css" rel="stylesheet" />
        <style>
            
            
              .well{
                  background-color: #bcf2f7;
                  
                  
                 
              }
             
            
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-light" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom border-primary bg-info"><img width="100px" src="<?php echo $siteurl; ?>assets/images/Untitled-66.png" alt=""></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="users/users.php"><i class="fa-regular fa-user"></i> User Panel</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="category.php"><i class="fa-solid fa-angle-right"></i> Category</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="subcategory.php"><i class="fa-solid fa-angles-right"></i> Subcategory</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="topics.php"><i class="fa-solid fa-hurricane"></i> Topics</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="quiz.php"><i class="fa-brands fa-quinscape"></i> Quiz</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="quizset.php"><i class="fa-brands fa-quinscape"></i> Quiz Set</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="query.php"><i class="fa-solid fa-circle-question"></i> Query</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="userquiz.php"><i class="fa-solid fa-circle-question"></i> User Quiz</a>
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="schedule.php"><i class="fa-solid fa-circle-question"></i>Exam Schedule</a>
                    
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-info border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-info" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link text-light" href="../index.php">Home</a></li>
                               
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-user"></i> <?php echo $_SESSION['user_name'] ?></a>
                                    <div class="dropdown-menu dropdown-menu-end bg-info " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item bg-info text-light" href="#!"><i class="fa-solid fa-gear"></i> Settings</a>
                                        
                                        <div class="dropdown-divider bg-info"></div>
                                        <a class="dropdown-item bg-info text-light" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
