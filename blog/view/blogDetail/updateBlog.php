<?php
include_once('../partials/header.php');
include "../../model/UserModel.php";

$userModel = new UserModel();
$id = $_GET['id'];
$data = $userModel->getBlog($id);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="container m-100">
      <h1 align="center">Blog Update</h1>
      <?php
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
            ?>
      <form action="../../controller/UserController.php?updateBlog&id=<?php echo $value['articleId'] ?>" method="post"
        enctype="multipart/form-data" id="myform">
        <div class="mb-3 mt-3">
          <label for="" class="form-label">Blog Title</label>
          <input type="text" class="form-control" name="articleTitle" value="<?php echo $value['articleTitle']; ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Blog Category</label>
          <input type="text" class="form-control" name="articleCategory"
            value="<?php echo $value['articleCategory']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Blog Description</label>
          <input class="form-control" name="articleDescrip" value="<?php echo $value['articleDescrip']; ?>"></input>
        </div>
        <div class="form-group mt-3 mb-3">
          <img src="../../assets/images/<?php echo $value['articleImage'] ?>" height="100" width="150"><br><br>
          <label for="exampleFormControlFile1">Update Blog Image</label>
          <input type="file" class="form-control-file" name="articleImage">
        </div>
        <?php
                }
            }
                ?>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
          <label class="form-check-label" for="exampleCheck1">Terms of service</label>
        </div>
        <button type="submit" class="btn btn-primary" id="savebtn">Submit</button>
    </div>
  </div>
</div>
</form>
</div>