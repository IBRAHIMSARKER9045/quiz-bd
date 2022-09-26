<?php
require "partial_check_admin.php";
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';
$query = "SELECT * FROM `quizset` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "Schedule";
require "../configuration.php";
require "partial_header.php"; ?>
<h3>All quizsets(<?php echo $queryResult->num_rows; ?>)</h3>
<a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary">Create</a>
<a href="dashboard.php" class="btn btn-primary">Back</a>

<div id="formContainer" class="formContainer">
    <form action="" id="form_category">
    <div class="form-group">
                <label for="exam_start" class="form-label">Exam Start</label>
                <input class="form-control" type="date" id="exam_start" name="exam_start">
            </div>
            <div class="form-group">
                <label for="exam_end" class="form-label">Exam End</label>
                <input class="form-control" type="date" id="exam_end" name="exam_end">
            </div>
           
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
                <label for="setname" class="form-label">Set Name</label>
                <input class="form-control" type="text" id="setname" name="setname">
            </div>
            
            <div class="form-group">
                <input type="hidden" id="quizsetid" name="quizsetid" value="" />
                <label for="quizid">QuizId</label>
                <select name="quizid" id="quizid" class="form-control" multiple="multiple">
                    <option value="-1">Select Quizid</option>
                    <?php
                    $cat = "select id from quizes";
                    $cat_result = $conn->query($cat);
                    while ($row = $cat_result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['question']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <input class="form-control" type="text" id="status" name="status">
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
            $("#AddBtn").show();
            $("#Updatebtn").hide();
            
        });
        $("#Closebtn").click(function(e) {
            $("#formContainer").hide(200);
            clearform();
        });
        //add
       

    });
</script>
</body>

</html>