<?php
$host ="localhost";
$username = "root";
$password = "";
$database = "blog";

$conn = mysqli_connect("$host","$username","$password","$database");

if(!$conn)
{
    header("location: ../errors/dberror.php");
    die();
}
?>