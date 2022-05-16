<?php
session_start();
if (isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    header("Location:/jasmin/blog/view/authentication/login.php");
} else {
    header("Location:/jasmin/blog/view/authentication/login.php");
}
