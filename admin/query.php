<?php
require "partial_check_admin.php";
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';
$query = "SELECT * FROM `contact` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "Contact";
require "../configuration.php";
require "partial_header.php"; ?>
<h3>All Queries(<?php echo $queryResult->num_rows; ?>)</h3>
<a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary">Reply</a>
<a href="dashboard.php" id="CreateBtn" class="btn btn-primary">Back</a>

<div id="formContainer" class="formContainer">
    <form action="" id="form_category" method="get" enctype="multipart/form-data">
        <div class="formContainer"></div>
        
            <div class="form-group">
                <input type="hidden" id="qid" name="qid" value="" />
                <label for="ques">Query</label>
                <textarea type="text" class="form-control" name="query" id="query"></textarea>
            </div>
            <div class="form-group">
                <label for="reply" class="form-label">Reply</label>
                <textarea type="text" class="form-control" name="reply" id="reply"></textarea>
                
            </div>
            

        <div class="form-group mt-3">
            <input type="reset" class="btn btn-sm btn-info" value="Clear" id="clrform">
            <input type="button" class="btn btn-sm btn-success" value="Update" id="Updatebtn">
            <input type="button" id="Closebtn" class="btn btn-sm btn-danger" value="Close">
        </div>
    </form>
</div>
<hr>
<div id="tableContainer" class="table-responsive">

</div>

<?php
require "partial_flashmessage.php";
?>


<?php require "partial_footer.php"; ?>
<script>
    $(document).ready(function () {
        $("#formContainer").hide();
        
        //edit start

        $("#tableContainer").on("click", "a.editbtn", function () {
            setTimeout(function () {
                $('#query').focus()
            }, 200);
            $("#Updatebtn").show();
            $("#formContainer").show(200);
            var recordtoedit = $(this).attr('data-editid');
           
            var editQname = $(this).parent().parent().find("td.clspn").html();
            
            alert(recordtoedit + editQname); 
            
            $("#qid").val(recordtoedit);
            
            $("#query").val(editQname);
               
        });
        //update start
       $("#Updatebtn").click(function (e) {
            
           
            var id = $("#qid").val();
            var query = $("#query").val();
            
            var reply = $("#reply").val();
            
           
            if (query == "") {
                alert("Fill the form value first");
                return;
            }
            $.post("query/update.php", {
                
                query:query,
                qid: id,
                reply: reply,              
                action: 'updatequery'
            }, function (data) {
                alert(data);
                clearform();
                loadTable();
               
            });

        });
        
        
            //end
       
         $("#clrform").click(function (e) {
            clearform();
        });

        function clearform() {
            $("#qid").val("");
            $("#query").val("");
            $("#reply").val("");
          
        }

        
       

   //show
   function loadTable() {
            $.ajax({
                url: "query/table.php",
                method: "GET",
                success: function (data) {
                    $("#tableContainer").html(data);
                }
            });
        }

        loadTable();
    })
</script>

</script>
</body>

</html>