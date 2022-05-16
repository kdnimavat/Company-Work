<?php
$connect = mysqli_connect("localhost", "root", "", "blog");

$record_per_page = 4;
$page = '';
$output = '';

if (isset($_POST['page'])) {
  $page = $_POST['page'];
} else {
  $page = 1;
}
$start_from = ($page - 1) * $record_per_page;

$query = "SELECT * FROM detail_blog ORDER BY articleID LIMIT $start_from,$record_per_page";

$result = mysqli_query($connect, $query);

$output .= "
<table class='table table-bordered'>
<tr>
<th>ID</th>
<th>Article Title</th>
<th>Article Category</th>  
<th>Article Description</th>  
<th>Article Date</th>  
<th>Article Image</th>  
<th>Action</th>  
<th>Status</th>  
</tr>";
while ($row = mysqli_fetch_array($result)) {
$status = ($row['status']==1)?'Enable':'Disable';
  $output .= '
    <tr>
      <td>' . $row["articleId"] . '</td>
      <td>' . $row["articleTitle"] . '</td>
      <td>' . $row["articleCategory"] . '</td>
      <td><a class="btn btn-info btn-sm text-white" href="../blogDetail/blogDiscription.php?showBlog&id='. $row["articleId"] .'">Read
More</a></td>
<td>'.$row['articleDate'] .'</td>
<td><img src="../../assets/images/'.$row['articleImage'] .'" height="100" width="150"></td>

<td><a class="btn btn-secondary text-decoration-none text-white"
href="../../controller/UserController.php?getBlog&id='.$row['articleId'] .'">Edit</a>

<a class="btn btn-danger text-decoration-none text-white"
href="../../controller/UserController.php?deleteBlog&id='.$row['articleId'].'">
Delete</a>
</td>
<td> <a class="btn btn-success text-decoration-none text-white" href="blogStatus.php?id=' . $row['articleId'] . '&status=0" >'.$status.'</a></td>
</tr>
';
}
$output .= '</table><br />
<div align="center">';
$page_query = "SELECT * FROM detail_blog ORDER BY articleId ";
$page_result = mysqli_query($connect, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);

for ($i = 1; $i <= $total_pages; $i++) {
  $output
    .= "<span class='pagination_link' style='cursor:pointer; background-color:#999999; margin-left:5px; padding:10px; border:1px solid black;' articleId='" . $i
    . "'>" . $i . "</span>";
}
echo $output;