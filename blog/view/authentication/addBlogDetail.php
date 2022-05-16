<?php

include '../../model/Connection.php';
include '../partials/header.php';
?>

<div class="container">
<div class="row justify-content-center">
    <div class="container m-100">
        <h1 align="center">Blog Creation</h1>
        <form action="../../controller/UserController.php?addBlog" method="POST" enctype="multipart/form-data" id="myform">
            <div class="mb-3 mt-3">
                <label for="" class="form-label">Enter Your Blog Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="" name="articleTitle" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Enter Blog Category</label>
                <input type="text" class="form-control" id="title" aria-describedby="" name="articleCategory" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter Blog Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="articleDecscrip" required></textarea>
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="exampleFormControlFile1">Uplod Blog Image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="articleImage" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Terms of service</label>
            </div>
            <button type="submit" class="btn btn-primary" id="savebtn">Submit</button>
        </form>
    </div>
</div>
</div>
</div>