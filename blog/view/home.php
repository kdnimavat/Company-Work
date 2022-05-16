<?php


// session_start();
include('../view/partials/header.php');
include('../view/partials/navbar.php');
include('containt.php');
if (!isset($_SESSION['email'])) {
    header("Location:/jasmin/blog/view/authentication/login.php");
}
?>

<?php
// include('../view/partials/footer.php');
?>