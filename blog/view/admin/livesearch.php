<?php
include '../../model/Connection.php';
include_once '../../model/UserModel.php';

$userModel = new UserModel();
$data = $userModel->liveSearch();

?>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Article Title</th>
                    <th>Artical Category</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($data)>0){
                   foreach($data as $key=>$value){
                       ?>
                       <tr>
                            <td><?php  echo  $value['articleId']; ?></td>
                            <td><?php  echo  $value['articleTitle']; ?></td>
                            <td><?php  echo  $value['articleCategory']; ?></td>
                        </tr>
                       
                       <?php
                   }
                }else{
                    echo "<h4 class='text-danger text-center text-large mt-3' > No Data Found  </h4>";
                  }

                ?>
            </tbody>
        </table>

       