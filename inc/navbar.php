<?php
use App\Cart;
require __DIR__ . '/../vendor/autoload.php';
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php"><img width="120px" src="assets/images/Untitled-66.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active fw-bold" aria-current="page" href="index.php">Home</a>
        </li>
        
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="user_profile1.php">Profile</a>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="category.php">Category</a>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="faq.php">FAQ</a>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="review.php">Review</a>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="leader_board.php">Leaderboard</a>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="addQuiz.php">Add Quiz</a>
        </li>
        <?php } ?>
       
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['user_role']== '1') { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="contact.php">Contact</a>
        </li>
        <?php } ?>
       
       
        <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == '2'){ ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname'] ?>/admin/">Dashboard</a>
        </li>
        <?php } ?>
        <?php 
        /*
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        */
        ?>
        
      </ul>
      <form class="d-flex" action="" method="post">
        <input name="search" class="form-control me-2 rounded-pill" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light btn-sm " type="submit"><i class="fa fa-search "></i></button>
      </form>
      <ul class="navbar-nav mb-2 mb-lg-0">
     
      
  
    
   
  
        <?php
if(isset($_SESSION['user_name'])){
  echo "<span class='navbar-text text-light px-3'>".$_SESSION['user_name']."</span>";
  echo "<li class='nav-item'><a class='nav-link fw-bold' href='logout.php'>Logout</a></li>";
}
else{
    echo "<li class='nav-item'><a class='nav-link fw-bold' href='login.php'>Login</a></li>";
    echo "<li class='nav-item'><a class='nav-link fw-bold' href='register.php'>Registration</a></li>";

}
        ?>
      </ul>
    </div>
  </div>
</nav>