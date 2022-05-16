<?php
session_start();
if (isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
    header("Location:/jasmin/home");
} else {
    header("Location:/jasmin/blog/view/authentication/login.php");
}
