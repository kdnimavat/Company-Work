<?php
include_once '../view/partials/header.php';
include_once '../model/UserModel.php';
$userModel = new UserModel();
$data = $userModel->activeBlog();

?>
<link rel="stylesheet" href="../assets/css/grid.css">

<body class="bg-secondary bg-opacity-25">
  <div class="container mt-4">
    <?php
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
        ?>
    <div class="card mb-3 " style="width:500px">
      <h4 class="card-title text-center bg-dark bg-opacity-75 text-white"><?php echo $value['articleTitle']; ?></h4>
      <div class="card-body">
        Created at <?php echo $value['articleDate']; ?>
        <h5 class="card-text"><?php echo $value['articleCategory']; ?></h5>
        <div align="right">
          <a class="btn btn-outline-secondary"
            href="<?php  echo BASE_PATH . 'blogDetail/blogDiscription.php?showBlog&id=' ; echo $value['articleId'] ?>"
            class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    <?php
            }
        }
        ?>
  </div>
</body>
<?php

include '../view/partials/footer.php';

?>