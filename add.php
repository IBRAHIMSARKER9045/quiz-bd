<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require "database.php";
?>
<?php require "configuration.php"; ?>
<?php require "inc/header.php"; ?>
<div class="container-fluid  mt-5">
<div class="row bg-light ">
    <div class="pt-5 text-center">
    <h1 class="text-info">Add Quiz</h1>
    <a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary mt-3">Click here</a>
<a href="index.php"  class="btn btn-primary mt-3">Back</a>
   </div>
        <div class="col-md-12 mt-5 pb-5  bg-light center" style="width:80%">
        <div id="formContainer" class="formContainer pt-5 pb-5"  >
    <form action="" id="form_category">
        <div class="mb-3">
            <label for="category" class="form-label fw-bolder text-info ">Category</label>
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
        <div class="mb-3">
            <label for="subcategory" class="form-label fw-bolder text-info">SubCategory</label>
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
            <div class="mb-3">
                <label for="topic" class="form-label fw-bolder text-info">Topics</label>
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
            <div class="form-group ">
                <input type="hidden" id="quizid" name="quizid" value="" />
                <label for="ques" class="form-label fw-bolder text-info">Question</label>
                <textarea type="text" class="form-control" name="ques" id="ques"></textarea>
            </div>
            <div class="form-group">
                <label for="op1" class="form-label fw-bolder text-info">Option 1</label>
                <input class="form-control" type="text" id="op1" name="op1">
            </div>
            <div class="form-group">
                <label for="op2" class="form-label fw-bolder text-info">Option 2</label>
                <input class="form-control" type="text" id="op2" name="op2">
            </div>
            <div class="form-group">
                <label for="op3" class="form-label fw-bolder text-info">Option 3</label>
                <input class="form-control" type="text" id="op3" name="op3">
            </div>
            <div class="form-group">
                <label for="op4" class="form-label fw-bolder text-info">Option 4</label>
                <input class="form-control" type="text" id="op4" name="op4">
            </div>
            <div class="form-group">
                <label for="ans" class="form-label fw-bolder text-info">Answer</label>
                <input class="form-control" type="text" id="ans" name="ans">
            </div>

            <div class="form-group mt-5 text-center">
                <input type="reset" class="btn btn-sm btn-info" value="Clear" id="clrform">
                <input type="button" class="btn btn-sm btn-success" value="Add" id="AddBtn" name="add">
                
                <input type="button" id="Closebtn" class="btn btn-sm btn-danger" value="Close">
            </div>
        </div>

    </form>
</div>

        </div>
    </div>
</div>
<?php require "inc/footer.php"; ?>
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
            
        });
function clearform(){
