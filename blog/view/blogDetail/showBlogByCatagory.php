<?php

include '../../model/Connection.php';
include '../partials/header.php';
include_once '../../model/UserModel.php';

$userModel = new UserModel();
$catagory = $userModel->catagoryByBlog();

?>
<form action="" method="POST">
    <div class="page-content page-container" id="page-content">
        <div class="padding row justify-content-center">
            <div class="row container d-flex justify-content-center">
                <div class="col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Catagory wise Blog</h4>
                            <p class="card-description"> </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Article ID</th>
                                            <th class="text-center">Article Title</th>
                                            <th class="text-center">Article Category</th>
                                            <th class="text-center">Article Description</th>
                                            <th class="text-center">Article Date</th>
                                            <th class="text-center">Article Image</th>

                                        </tr>
                                    </thead>

                                    <?php
                                    if (count($catagory) > 0) {

                                        foreach ($catagory as $key => $value) {
                                    ?>
                                            <tbody id="tbl_body">
                                                <tr>
                                                    <td class="text-center"><?php echo $value['articleId'] ?></td>
                                                    <td class="text-center"><?php echo $value['articleTitle'] ?></td>
                                                    <td class="text-center"><?php echo $value['articleCategory'] ?></td>
                                                    <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="../blogDetail/blogDiscription.php?showBlog&id=<?php echo $value['articleId']; ?>">Read
                                                            More</a></td>
                                                    <td class="text-center"><?php echo $value['articleDate'] ?></td>
                                                    <td><img src="../../assets/images/<?php echo $value['articleImage'] ?>" height="100" width="150">
                                                    </td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        }
                                    }
                                    ?>
                                </table>

                                <div class="text-center">
                                    <a class="btn btn-outline-primary text-decoration-none" href="http://localhost/jasmin/blog/admin/index.php">Home</a>
                                    <a class="btn btn-outline-dark text-decoration-none" href="/jasmin/blog/view/blogDetail/catagoryBlog.php">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>