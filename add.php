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