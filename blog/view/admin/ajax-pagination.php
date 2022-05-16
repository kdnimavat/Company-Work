<?php

include '../../model/Connection.php';
include '../partials/header.php';
include_once '../../model/UserModel.php';

$userModel = new UserModel();
$data = $userModel->getBlogs();

?>

<form action="" method="POST">
  <div class="page-content page-container" id="pagination_data">
    <div class="padding row justify-content-center">
      <div class="row container d-flex justify-content-center">
        <div class="col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">All Active Blogs</h4>
              <p class="card-description"> </p>
              <div class="table-responsive">

                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">Article ID</th>
                      <th class="text-center">Article Title</th>
                      <th class="text-center">Article Category</th>
                      <th class="text-center">Article Description</th>
                      <th class="text-center">Article Date</th>
                      <th class="text-center">Article Image</th>
                      <th class="text-center">Action</th>
                      <th class="text-center">Status</th>

                    </tr>
                  </thead>

                  <?php
                  if (count($data) > 0) {

                    foreach ($data as $key => $value) {
                  ?>
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $value['articleId'] ?></td>
                      <td class="text-center"><?php echo $value['articleTitle'] ?></td>
                      <td class="text-center"><?php echo $value['articleCategory'] ?></td>
                      <td class="text-center"><a class="btn btn-info btn-sm text-white"
                          href="../blogDetail/blogDiscription.php?showBlog&id=<?php echo $value['articleId']; ?>">Read
                          More</a></td>
                      <td class="text-center"><?php echo $value['articleDate'] ?></td>
                      <td><img src="../../assets/images/<?php echo $value['articleImage'] ?>" height="100" width="150">
                      </td>
                      <td class="text-center"><a class="btn btn-secondary text-decoration-none text-white"
                          href="<?php   ?>../../controller/UserController.php?getBlog&id=<?php echo $value['articleId'] ?>">Edit</a>
                        <a class="btn btn-danger text-decoration-none text-white"
                          href="../../controller/UserController.php?deleteBlog&id=<?php echo $value['articleId'] ?>">
                          Delete</a>
                      </td>
                      <td>
                        <?php
                            if ($value['status'] == 1) {
                              echo '<p><a type="button" class="btn btn-success" href="blogStatus.php?id=' . $value['articleId'] . '&status=0" >Enable</a></p>';
                              } else {
                              echo '<p><a type="button"  class="btn btn-primary" href="blogStatus.php?id=' . $value['articleId'] . '&status=1or0">Disable</a></p>';
                            }
                            ?>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  }
                  ?>
                </table>
                <div class="text-center">
                  <a class="btn btn-dark text-decoration-none" href="../../admin/index.php">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

  <script>
  $(document).ready(function() {
    load_data();

    function load_data(page) {
      $.ajax({
        url: "pagination.php",
        method: "POST",
        data: {
          page: page
        },
        success: function(data) {
          $('#pagination_data').html(data);
        }
      })
    }
    $(document).on('click', '.pagination_link', function() {
      var page = $(this).attr("articleId");
      load_data(page);
    });
  });
  </script>
</form>