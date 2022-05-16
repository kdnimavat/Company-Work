<?php
include_once '../model/Connection.php';

$sql = "SELECT * FROM detail_blog";

$result =mysqli_query($db_connection,$sql);
$output ="";

if(mysqli_num_rows($result) > 0){
 $output .=' ';  
}
?>