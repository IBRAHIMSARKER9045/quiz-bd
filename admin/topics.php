<?php
require "partial_check_admin.php";
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';
$query = "SELECT * FROM `topics` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "Category";
require "../configuration.php";
require "partial_header.php"; ?>
<h3>All topics(<?php echo $queryResult->num_rows;  ?>)</h3>
<a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary">Create</a>
<a href="dashboard.php" id="CreateBtn" class="btn btn-primary">Back</a>

<div id="formContainer" class="formContainer">
    <form action=""id="form_category" method="get" enctype="multipart/form-data">
        <div class="formContainer"></div>
        <div class="form-group">
    <label for="category" class="form-label">Category</label>
    <select name="category" id="category" class="form-control">
        <option value="-1">Select Category</option>
        <?php
        $cat = "select id,name,icon from categories";
        $cat_result = $conn->query($cat);
        while($row = $cat_result->fetch_assoc()){
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
        while($row = $cat_result->fetch_assoc()){
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }        
        ?>
    </select>
    </div>
        <div class="form-group">
        <input type="hidden" id="topicid" name="topicid" value="" />
            <label for="name">Name</label>
            <input type="text" class="form-control" name="tname" id="name">
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" class="form-control" id="icon" name="icon">
        </div>
        <div class="form-group mt-3">
        <input type="reset" class="btn btn-sm btn-info" value="Clear" id="clrform">
            <input type="button" class="btn btn-sm btn-success" value="Add" id="AddBtn" name=add>
            <input type="button" class="btn btn-sm btn-success" value="Update" id="Updatebtn">
            <input type="button" id="Closebtn" class="btn btn-sm btn-danger" value="Close">
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
        $("#CreateBtn").click(function() {
            $("#formContainer").toggle();
        });
        $("#CreateBtn").click(function (e) {
            clearform();
            $("#form_category").show(200);
            $("#AddBtn").show();
            $("#Updatebtn").hide();
            $('#subcategory').prop('disabled',false);
            $('#category').prop('disabled',false);
        });
        
        $("#Closebtn").click(function (e) {
            $("#formContainer").hide(200);
            $("#AddBtn").show();
            $("#Updatebtn").hide();
            clearform();
        });
        //add
        $("#AddBtn").click(function() {
            var category = $("#category").val();
            var subcategory = $("#subcategory").val();
            var name = $("#name").val();
            var icon = $("#icon").val();
            //alert(category + ":" + subcategory + ":" +  name);
            $.ajax({
                url: "topics/add.php",
                method: "POST",
                data: {
                    tname: name,
                    category: category,
                    subcategory: subcategory,
                    icon: icon

                },
                
                success: function(data) {   
                    alert(data);                 
                    $("#formContainer").toggle();
                    clearform();
                    loadTable();
                    $("#tableContainer").html(data);
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

        /*$("#subcategory").change(function(){
            
            var sid = $(this).val();
            $.ajax({
                url: "../ajax/top.php",
                method: "POST",
                data: {sid:sid},
                success: function(data){
                    $("#topicid").html(data);
                }
            });
        });
        */
        //edit
       
        $("#tableContainer").on("click", "a.editbtn", function () {
            setTimeout(function () {
                $('#name').focus()
            }, 200);
            $('#category').prop('disabled',true);
            $('#subcategory').prop('disabled',true);
            
            $("#AddBtn").hide();
            $("#Updatebtn").show();
            $("#formContainer").show(200);
            var recordtoedit = $(this).attr('data-id');
            var cid = $(this).attr('data-cid');
            var sid = $(this).attr('data-sid');
            var editTname = $(this).parent().parent().find("td.clspn").html();
            
            alert(recordtoedit + " : " + cid + " : " + sid + " : " + editTname);            
            $("#topicid").val(recordtoedit);
            $("#category").val(cid);
            $("#subcategory").val(sid);
            $("#name").val(editTname);
        });
        //update start
        $("#Updatebtn").click(function (e) {
            
            var category = $("#category").val();
            var subcategory = $("#subcategory").val();
            var name = $("#name").val();
            var icon = $("#icon").val();
            var id = $("#topicid").val();
            alert(category + ":" + subcategory + ":" +  name + ":" + id);
            if (name == "") {
                alert("Fill the form value first");
                return;
            }
            $.post("topics/update.php", {
                category:category,
                subcategory:subcategory,
                tid: id,
                tn: name,               
                action: 'updateTopics'
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
            $("#subcategoryid").val("");
            $("#name").val("");

          
        }

        function showCategory(s) {
            $.get("categories/table.php", {
                    recordstart: s,
                    rand: Math.random()
                },
                function (data) {
                    $("#tableContainer").html(data);
                });
        }

//when the page loads call showProducts
        showCategory(0);

//pagination start
        $("#tableContainer").on(
            "click",
            "ul.pagination a.pageanchor",
            function () {
                var startfrom = $(this).data('recid');
                //alert(startfrom);
                searchtable($("#inputSuccess4").val(), startfrom);
                //showProducts(startfrom);
            });

//pagination end

// The function to insert a fallback image
        var imgNotFound = function () {
            $(this).unbind("error").attr("src", "assets/images/icons/not-found.png");
        };
// Bind image error on document load
        $("img").on("error", imgNotFound);
//wait cursor
        $(document).ajaxStart(function () {
            $(document.body).css({
                'cursor': 'wait'
            })
        });
        $(document).ajaxComplete(function () {
            // Bind image error after ajax complete
            $("img").on("error", imgNotFound);
            $(document.body).css({
                'cursor': 'default'
            })
        });

//



        //delete start
        $("#tableContainer").on("click", "a.delbtn", function () {
            var confresult = confirm("Are you sure?");
            if (!confresult) return;
            var rectodelete = $(this).attr('data-id');
            $.get("topics/delete.php", {
                    recid: rectodelete
                },
                function (data) {
                    alert(data);
                   // showSubcategory(0);
                });
        });
        //delete end



        //show
        function loadTable(){
        $.ajax({
            url: "topics/table.php",
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