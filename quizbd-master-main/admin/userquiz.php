<?php
require "partial_check_admin.php";
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';
$query = "SELECT * FROM `userquiz` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "User Quiz";
require "../configuration.php";
require "partial_header.php"; ?>
<h3>All User Quizes(<?php echo $queryResult->num_rows;  ?>)</h3>
<a href="dashboard.php" id="CreateBtn" class="btn btn-primary">Back</a>

<div id="tableContainer">

</div>
<?php
require "partial_flashmessage.php";
?>


<?php require "partial_footer.php"; ?>
<script>
    $(document).ready(function() {
        //add
        $("#tableContainer").on("click", "a.addbtn", function() {
            var rectoadd = $(this).attr('data-editid');
            var cid = $(this).attr('data-cid');
            var sid = $(this).attr('data-sid');
            var tid = $(this).attr('data-tid');
            var op1 = $(this).attr('data-op1');
            var op2 = $(this).attr('data-op2');
            var op3 = $(this).attr('data-op3');
            var op4 = $(this).attr('data-op4');
            var ans = $(this).attr('data-ans');
            var editQname = $(this).parent().parent().find("td.clspn").html();
            alert(rectoadd + ":" + cid + ":" + sid + ":" + tid + ":" + editQname);
            $.post("userquiz/add.php", {
                    cid: cid,
                    sid: sid,
                    tid: tid,
                    ques: editQname,
                    op1: op1,
                    op2: op2,
                    op3: op3,
                    op4: op4,
                    quizid: rectoadd,
                    ans: ans,
                    action: rectoadd
                },
                function(data) {
                    alert(data);

                });
        });



    });

    //show
    function loadTable() {
        $.ajax({
            url: "userquiz/table.php",
            method: "GET",
            success: function(data) {
                $("#tableContainer").html(data);
            }
        });
    }
    loadTable();
</script>
</body>

</html>