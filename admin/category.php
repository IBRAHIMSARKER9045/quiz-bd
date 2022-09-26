<?php
require "partial_check_admin.php";
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';
$query = "SELECT * FROM `categories` WHERE 1";
$queryResult = $conn->query($query);
?>
<?php
$page = "Category";
require "../configuration.php";
require "partial_header.php"; ?>
<h3>All Categories(<?php echo $queryResult->num_rows; ?>)</h3>
<a href="javascript:void(0)" id="CreateBtn" class="btn btn-primary">Create</a>
<a href="dashboard.php" id="CreateBtn" class="btn btn-primary">Back</a>

<div id="formContainer" class="formContainer">
    <form action="" id="form_category" method="get" enctype="multipart/form-data">
        <div class="formContainer"></div>
        <div class="form-group">
            <input type="hidden" id="categoryid" name="categoryid" value=""/>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="cname" id="name">
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" class="form-control" accept=".jpg, .jpeg, .png" id="icon" name="icon">
        </div>
        <div class="form-group mt-3">
            <input type="reset" class="btn btn-sm btn-info" value="Clear" id="clrform">
            <input type="submit" class="btn btn-sm btn-success" value="Add" id="AddBtn" name=add>
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
        $("#CreateBtn").click(function () {
            console.log("Create Button : Clicked");
            $("#formContainer").toggle();
        });

        $("#CreateBtn").click(function (e) {
            clearform();
            $("#form_category").show(200);
            $("#AddBtn").show();
            $("#Updatebtn").hide();
        });

        $("#Closebtn").click(function (e) {
            $("#formContainer").hide(200);
            $("#AddBtn").show();
            $("#Updatebtn").hide();
            clearform();
        });
        //add
        $("#AddBtn").click(function () {
            var name = $("#name").val();
            var icon = $("icon").val();
            
            
            $.ajax({
                url: "categories/add.php",
                method: "POST",
                data: {
                    cname: name,
                    icon: icon
                  
                },
                success: function (data) {
                    console.log(data);
                    console.log('success');
                    $("#formContainer").toggle();
                    
                }
            });
        });
        //edit
        $("#tableContainer").on("click", "a.editbtn", function () {
            setTimeout(function () {
                $('#name').focus()
            }, 200);
            
            $("#AddBtn").hide();
            $("#Updatebtn").show();
            $("#formContainer").show(200);
            var recordtoedit = $(this).attr('data-editid');
            //alert(recordtoedit);
            var editCname = $(this).parent().parent().find("td.clscn").html();
            //alert(editPname);


            //insert data to the form start
            $("#categoryid").val(recordtoedit);
            console.log(recordtoedit);
            $("#name").val(editCname);
            //insert data to the form end

        });
        //update start
        $("#Updatebtn").click(function (e) {
            var cid = $("#categoryid").val();
            var name = $("#name").val();
           
            if (name == "") {
                alert("Fill the form value first");
                return;
            }
            $.post("categories/update.php", {
                cid: cid,
                cn: name,
               
                action: 'updatecategory'
            }, function (data) {
                alert(data);
                clearform();
                //searchtable();
                showCategory(0);
            });

        });
        //update record end

        $("#AddBtn").click(function (e) {
            var name = $("#name").val();


            if (name == "") {
                alert("Fill the form value first");
                return;
            }
        
            $('#form_category').ajaxSubmit({ //FormID - id of the form.
                type: "POST",
                url: "categories/add.php",
                data: $('#form_category').serialize(),
                cache: false,
                success: function (response) {
                    alert(response);
                    clearform();
                    showCategory(0);
                }
            });

            //end
        });

        $("#clrform").click(function (e) {
            clearform();
        });

        function clearform() {
            $("#categoryid").val("");
            $("#name").val("");

          
        }

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


//


//delete start
        $("#tableContainer").on("click", "a.delbtn", function () {
            var confresult = confirm("Are you sure?");
            if (!confresult) return;
            var rectodelete = $(this).attr('data-cid');
            $.get("categories/delete.php", {
                    recid: rectodelete
                },
                function (data) {
                    alert(data);
                    showCategory(0);
                });
        });
        //delete end

        //show
        function loadTable() {
            $.ajax({
                url: "categories/table.php",
                method: "GET",
                success: function (data) {
                    $("#tableContainer").html(data);
                }
            });
        }

        loadTable();
    });


</script>
</body>

</html>