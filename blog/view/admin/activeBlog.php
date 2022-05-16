<?php

include '../../model/Connection.php';
include '../partials/header.php';
include_once '../../model/UserModel.php';
require '../../../config/configure.php';

$userModel = new UserModel();
$data = $userModel->getBlogs();

?>

<form action="" method="POST">
  <div class="page-content page-container" id="page-content">
    <div class="padding row justify-content-center">
      <div class="row container d-flex justify-content-center">
        <div class="col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">All Active Blogs</h4>
              <p class="card-description"> </p>
              <div class="table-responsive">
                <div style="margin-bottom:30px;"><input type="text" class="form-control" id="search_param" placeholder="Search" /></div>
                <div id="searchresult"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <table class="table table-dark table-hover">
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
                    $number=1;
                    foreach ($data as $key => $value) {
                  ?>
                      <tbody id="tbl_body">
                        <tr>
                          <td class="text-center"><?php echo $number ?></td>
                          <td class="text-center"><?php echo $value['articleTitle'] ?></td>
                          <td class="text-center"><?php echo $value['articleCategory'] ?></td>
                          <td class="text-center"><a class="btn btn-info btn-sm text-white" href="<?php echo BASE_PATH . 'blogDetail/blogDiscription.php?showBlog&id='; echo $value['articleId']; ?>">Read
                              More</a></td>
                          <td class="text-center"><?php echo $value['articleDate'] ?></td>
                          <td><img src="../../assets/images/<?php echo $value['articleImage'] ?>" height="100" width="150">
                          </td>
                          <td class="text-center"><a class="btn btn-secondary text-decoration-none text-white" href="<?php  echo DEFAULT_CONTROLLER . 'UserController.php?getBlog&id=';echo $value['articleId'] ?>">Edit</a>
                            <a class="btn btn-danger text-decoration-none text-white" href="<?php echo DEFAULT_CONTROLLER .'UserController.php?deleteBlog&id='; echo $value['articleId']?>">
                              Delete</a>
                          </td>
                          <td>
                            <?php
                            if ($value['status'] == 1) {
                              echo '<p><a type="button" class="btn btn-success" href="blogStatus.php?id=' . $value['articleId'] . '&status=0" >Enable</a></p>';
                            } else {
                              echo '<p><a type="button"  class="btn btn-primary" href="blogStatus.php?id=' . $value['articleId'] . '&status=1">Disable</a></p>';
                            }
                            ?>
                          </td>
                        </tr>
                      </tbody>
                  <?php
                    $number++;
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

  
  <script type="text/javascript">
    $(document).ready(function(){
      $("#search_param").keyup(function(){
        
        var input = $(this).val();
    
        if(input != ""){
          $.ajax({
            url:"livesearch.php",
            method:"POST",
            data:{ input:input },
            success:function(data){
              $("#searchresult").html(data);  
              $("#searchresult").css("display","block");
            }
          });
        }else{
          $("#searchresult").css("display","none");
        }
      });
    });
    </script>
</form>