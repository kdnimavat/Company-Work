<?php

include '../../model/Connection.php';

$id = $_GET['id'];
$status = $_GET['status'];

$mysqli = new mysqli("localhost","root","","blog");
$sql = "UPDATE detail_blog SET status=$status WHERE articleId=$id";


mysqli_query($mysqli,$sql);
header("location: activeBlog.php");
?>