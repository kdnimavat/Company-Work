<?php
include '../../model/Connection.php';
include_once '../../model/UserModel.php';

$userModel = new UserModel();
$data = $userModel->userSearch();

?>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile No</th>
</tr>
            </thead>
            <tbody>
                <?php
                if(count($data)>0){
                   foreach($data as $key=>$value){
                       ?>
                       <tr>
                            <td><?php  echo  $value['id']; ?></td>
                            <td><?php  echo  $value['first_name']; ?></td>
                            <td><?php  echo  $value['last_name']; ?></td>
                            <td><?php  echo  $value['email']; ?></td>
                            <td><?php  echo  $value['mobile_no']; ?></td>
                        </tr>
                       
                       <?php
                   }
                }else{
                    echo "<h4 class='text-danger text-center text-large mt-3' > No Data Found  </h4>";
                  }

                ?>
            </tbody>
        </table>

       