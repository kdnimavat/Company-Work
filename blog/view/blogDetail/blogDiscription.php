<?php

include '../partials/header.php';
include '../../model/UserModel.php';

$userModel = new UserModel();
$id = $_GET['id'];
$data = $userModel->getBlog($id);
?>
<body class="bg-primary bg-opacity-50">
<div class="container mt-4" align="center">
    <?php
    if (count($data) > 0) {
        foreach ($data as $key => $value) {
    ?>
            <div class="col-lg-4 mb-4 p-3 bg-dark text-white-50">
                <img height="200" width="150" src="../../assets/images/<?php echo $value['articleImage']; ?>" class="card-img">
                <h3 align="center" class="card-title"><?php echo $value['articleTitle']; ?></h3>
                <br>
                        <h4 align="left"><?php echo $value['articleCategory']; ?></h4><br>
                        <p class="card-text text-wrap" style="text-align:justify;"><?php echo $value['articleDescrip']; ?></p>
                </div>
            </div>
</div>

<?php
        }
    }
?>
</div>
</body>