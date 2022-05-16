<?php
include_once('../partials/header.php');
include "../../model/UserModel.php";

$userModel = new UserModel();
$data = $userModel->getData();

?>

<div class="container rounded bg-white mt-5 mb-5">
  <?php
    if (count($data)) {
        foreach ($data as $key => $value) {
    ?>
  <form action="../../controller/UserController.php?userProfile" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center">
      <div class="col-md-3 border-right">

        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
            width="150px" height="150px" src="../../assets/images/<?php echo $value['image'] ?>"><span
            class="font-weight-bold"><?php echo $value['first_name'] ?></span><span
            class="text-black-50"><?php echo $value['email'] ?></span><span> </span></div>
      </div>
      <div class="col-md-5 border-right">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">User Profile</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-6"><label class="labels">First Name</label><input type="text" name="first_name"
                class="form-control" placeholder="First name" value="<?php echo $value['first_name'] ?>"></div>
            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" name="last_name"
                class="form-control" value="<?php echo $value['last_name'] ?>" placeholder="Last name"></div>
          </div>
          <div class="row mt-3">

            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email"
                class="form-control" placeholder="Email id" value="<?php echo $value['email'] ?>"></div>
            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="mobile_no"
                class="form-control" placeholder="Mobile Number" value="<?php echo $value['mobile_no'] ?>"></div>
          </div>
          <!-- <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control"
                name="password" placeholder="Password" ></div>

          </div> -->
          <?php
                }
            }
                    ?>
          <div class="mt-3 text-center">
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary" value="Update Profile"></input>
              <input type="submit" class="btn btn-danger" value="Back"></input>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>
</div>
</form>
</div>