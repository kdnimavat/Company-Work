<?php
// session_start();
require ('../model/UserModel.php');
require('../../config/configure.php') ;
// echo "hii";
// exit;
$userModel = new UserModel();
$data = $userModel->getEmail();

include('header.php');
?>
<style>

</style>
<nav class=" navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container">
    <?php
    if (count($data) > 0) {
      foreach ($data as $key => $value) {
    ?>
        <a class="navbar-brand" href="#">Welcome <?php echo $value['first_name']; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <?php
      }
    } else {
      echo "Data not found";
    }
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_PATH .'authentication/addBlogDetail.php'; ?>">Blog</a>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <form action="allcode.php" method="POST">
                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>

            </form>
          </ul>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="<?php  echo BASE_PATH .'user/profile.php' ; ?>">Profile</a>
        </li>
        <li class="nav-item">

          <a class="nav-link" href="/jasmin/home/logout.php">Log Out</a>
        </li>


      </ul>

    </div>
  </div>
</nav>