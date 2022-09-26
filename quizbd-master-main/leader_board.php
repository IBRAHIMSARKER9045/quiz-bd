<?php
session_start();

use App\Admin\Login;
use App\User;
use App\Cart;

require __DIR__ . '/vendor/autoload.php';
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>

<div class="container-fluid text-center">

    <div class="row  bg-light pt-5">

        <div class="col-md-12">

            <div class="leaderboard pt-5 pb-3">
                <h1 class = "text-info pb-3">Leaderboard : QuizBD</h1>

                <table class="table table-info table-striped text-primary">
                    <thead>
                        <tr>
                            <th >Rank</th>
                            <th >Name</th>
                            <th >Points</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                          
                        </tr>

                    </tbody>
                </table>
            </div>


        </div>

    </div>

</div>




<!-- category bikroy -->


<!-- category bikroy end -->


</body>

</html>