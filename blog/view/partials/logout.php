<?php
session_start();
if (isset($_SESSION['email'])) {
    echo "dsdf"; exit;
    session_unset();
    session_destroy();
    echo "test"; exit; 
   // header("Location:/jasmin/blog/view/authentication/login.php");
} else {
    //header("Location:/jasmin/blog/view/authentication/login.php");
}
