<?php
require "partial_check_admin.php";
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';
$query = "SELECT * FROM `quizes` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "Category";
require "../configuration.php";
require "partial_header.php"; ?>
<h3>All quizes(<?php echo $queryResult->num_rows; ?>)</h3>
<a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary">Create</a>
<a href="dashboard.php"  class="btn btn-primary">Back</a>

<div id="formContainer" class="formContainer">
    <form action="" id="form_category">
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="-1">Select Category</option>
                <?php
                $cat = "select id,name,icon from categories";
                $cat_result = $conn->query($cat);
                while ($row = $cat_result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory" class="form-label">SubCategory</label>
            <select name="subcategory" id="subcategory" class="form-control">
                <option value="-1">Select SubCategory</option>
                <?php
                $cat = "select id,name,icon from subcategories";
                $cat_result = $conn->query($cat);
                while ($row = $cat_result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
            <div class="form-group">
                <label for="topic" class="form-label">Topics</label>
                <select name="topic" id="topic" class="form-control">
                    <option value="-1">Select Topic</option>
                    <?php
                    $cat = "select id,name,icon from topics";
                    $cat_result = $conn->query($cat);
                    while ($row = $cat_result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" id="quizid" name="quizid" value="" />
                <label for="ques">Question</label>
                <textarea type="text" class="form-control" name="ques" id="ques"></textarea>
            </div>
            <div class="form-group">
                <label for="op1" class="form-label">Option 1</label>
                <input class="form-control" type="text" id="op1" name="op1">
            </div>
            <div class="form-group">
                <label for="op2" class="form-label">Option 2</label>
                <input class="form-control" type="text" id="op2" name="op2">
            </div>
            <div class="form-group">
                <label for="op3" class="form-label">Option 3</label>
                <input class="form-control" type="text" id="op3" name="op3">
            </div>
            <div class="form-group">
                <label for="op4" class="form-label">Option 4</label>
                <input class="form-control" type="text" id="op4" name="op4">
            </div>
            <div class="form-group">
                <label for="ans" class="form-label">Answer</label>
                <input class="form-control" type="text" id="ans" name="ans">
            </div>

            <div class="form-group mt-3">
                <input type="reset" class="btn btn-sm btn-info" value="Clear" id="clrform">
                <input type="button" class="btn btn-sm btn-success" value="Add" id="AddBtn" name="add">
                <input type="button" class="btn btn-sm btn-success" value="Update" id="Updatebtn">
                <input type="button" id="Closebtn" class="btn btn-sm btn-danger" value="Close">
            </div>
        </div>

    </form>
</div>
<hr>
<div id="tableContainer">

</div>

<?php
require "partial_flashmessage.php";

?>
<?php require "partial_footer.php"; ?>
<script>
    $(document).ready(function() {
        $("#formContainer").hide();
        $("#CreateBtn").click(function(e) {
            // alert(5);
            $("#formContainer").toggle();
            clearform();
            $("#form_category").show(200);
            $("#AddBtn").show();
            $("#Updatebtn").hide();
            $('#category').prop('disabled',false);
            $('#subcategory').prop('disabled',false);
            $('#topic').prop('disabled',false);
        });
function clearform(){

}
        $("#Closebtn").click(function(e) {
            $("#formContainer").hide(200);
            $("#AddBtn").show();
            $("#Updatebtn").hide();
            clearform();
        });
        //add
        $("#AddBtn").click(function() {
            var cid = $("#category").val();
            var sid= $("#subcategory").val();
            var tid = $("#topic").val();
            var ques = $("#ques").val();
            var op1 = $("#op1").val();
            var op2 = $("#op2").val();
            var op3 = $("#op3").val();
            var op4 = $("#op4").val();
            var ans = $("#ans").val();
            alert(cid + ":" + sid + ":" + tid + ":"  + ques + ":" + op1+ ":" + op2+ ":" + op3+ ":" + op4+ ":" + ans);
            $.ajax({
                type: "post",
                url: "quiz/add.php",
                data: {  cid:cid,scid: sid, tid: tid, ques:ques,op1: op1,op2: op2,op3: op3,op4: op4,ans: ans,action:"add"},
    
                 success: function (response) {
                 alert(response);
                  clearform();
                   loadTable();
                  }
});
        });

        $("#category").change(function( cid,sid){
            var cid = $(this).val();
            $.ajax({
                url: "../ajax/subcat.php",
                method: "POST",
                data: {cid:cid},
                success: function(data){
                   
                    $("#subcategory").html(data);
                }
            });
        });

        $("#subcategory").change(function(cid,sid){
            var cid = $(this).val();
            var sid = $(this).val();
            $.ajax({
                url: "../ajax/top.php",
                method: "POST",
                data: {sid:sid,
                        cid:cid
                      },
                success: function(data){
                    $("#topic").html(data);
                }
            });
        });

        //add end
        //edit start

        $("#tableContainer").on("click", "a.editbtn", function () {
            setTimeout(function () {
                $('#ques').focus()
            }, 200);
            $('#category').prop('disabled',true);
            $('#subcategory').prop('disabled',true);
            $('#topic').prop('disabled',true);



            $("#AddBtn").hide();
            $("#Updatebtn").show();
            $("#formContainer").show(200);
            var recordtoedit = $(this).attr('data-id');
            var cid = $(this).attr('data-cid');
            var sid = $(this).attr('data-sid');
            var tid = $(this).attr('data-tid');
            var op1 = $(this).attr('data-op1');
            var op2 = $(this).attr('data-op2');
            var op3 = $(this).attr('data-op3');
            var op4 = $(this).attr('data-op4');
            var ans = $(this).attr('data-ans');
            var editQname = $(this).parent().parent().find("td.clspn").html();
            
            //alert(recordtoedit + ":" + cid +":" + sid +":"+ tid + ":" + editQname); 
            
            $("#quizid").val(recordtoedit);
            $("#category").val(cid);
            $("#subcategory").val(sid);
            $("#topic").val(tid);
            $("#ques").val(editQname);
            $("#op1").val(op1);
            $("#op2").val(op2);
            $("#op3").val(op3);
            $("#op4").val(op4);
            $("#ans").val(ans);

                      
           
        });
        //update start
       $("#Updatebtn").click(function (e) {
            
            var category = $("#category").val();
            var subcategory = $("#subcategory").val();
            var topic = $("#topic").val();
            var id = $("#quizid").val();
            var ques = $("#ques").val();
            var op1 = $("#op1").val();
            var op2= $("#op2").val();
            var op3 = $("#op3").val();
            var op4 = $("#op4").val();
            var ans = $("#ans").val();
            
           
            //alert(category + ":" + subcategory + ":" +  ques + ":" + id);
            if (ques == "") {
                alert("Fill the form value first");
                return;
            }
            $.post("quiz/update.php", {
                cid:category,
                sid:subcategory,
                tid:topic,
                ques:ques,
                op1:op1,
                op2:op2,
                op3:op3,
                op4:op4,
                quizid: id,
                ans: ans,              
                action: 'updatequiz'
            }, function (data) {
                alert(data);
                clearform();
                loadTable();
                //searchtable();
               // showSubcategory(0);
            });

        });
        
        
            //end
       
         $("#clrform").click(function (e) {
            clearform();
        });

        function clearform() {
            $("#quizid").val("");
            $("#ques").val("");

          
        }

        
        //edit end

        //show
        function loadTable() {
            $.ajax({
                url: "quiz/table.php",
                method: "GET",
                success: function(data) {
                    $("#tableContainer").html(data);
                }
            });
        }
        loadTable();

      

    });
</script>
</body>

</html>