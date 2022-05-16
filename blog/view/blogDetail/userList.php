<?php
include_once '../partials/header.php';
include "../../model/UserModel.php";
require '../../../config/configure.php';

$userModel = new UserModel();
$data = $userModel->getUsers();

?>

<form action="" method="POST">
    <div class="page-content page-container" id="page-content">
        <div class="padding row justify-content-center">
            <div class="row container d-flex mt-3 justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center bg-dark text-white bg-opacity-50 p-2">All Active Users</h4>
                            <p class="card-description"> </p>
                            <div class="table-responsive">
                            <div style="margin-bottom:30px;"><input type="text" class="form-control" id="search_param" placeholder="Search" /></div>
                            <div id="searchresult"></div>
                                <table class="table table-hover">
                                    <thead class="table-dark text-white-50">
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">First Name</th>
                                            <th class="text-center">Last Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Mobile No</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>

                                    <?php
                                    $number = 1;
                                    if (count($data) > 0) {
                                        foreach ($data as $key => $value) {
                                            // echo $value['id'];
                                            // exit;
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center table-dark text-white-50"><?php echo $number ?></td>
                                                    <td class="text-center text-opacity-75"><?php echo $value['first_name'] ?></td>
                                                    <td class="text-center text-opacity-75"><?php echo $value['last_name'] ?></td>
                                                    <td class="text-center text-opacity-75"><?php echo $value['email'] ?></td>
                                                    <td class="text-center text-opacity-75"><?php echo $value['mobile_no'] ?></td>
                                                    <td class="text-center text-opacity-75"><img src="../../assets/images/<?php echo $value['image'] ?>" height="70" width="100"></td>
                                                    <td class="text-center table-dark text-opacity-75">
                                                        <a class="btn btn-outline-danger text-decoration-none" href="<?php echo DEFAULT_CONTROLLER . 'UserController.php?deleteUser&id=';echo $value['id'] ?>"> Delete</a>
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
            url:"usersearch.php",
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