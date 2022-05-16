<?php
session_start();
include_once 'Connection.php';

class BaseModel extends Connection
{

  public $connection;


  public function __construct()
  {
    $this->connection = new Connection();
  }

  public function insert($tableName, $data)
  {
    $fname  = $data['first_name'];
    $lname =   $data['last_name'];
    $email =   $data['email'];
    $mobile_no =   $data['mobile_no'];
    $password = $data['password'];
    $image = $data['image'];
    $insert = "INSERT INTO $tableName 
    (`first_name`, `last_name`, `email`, `mobile_no`, `password`, `image`) 
    VALUES ('$fname', '$lname', '$email','$mobile_no', '$password', '$image')";
    $result = mysqli_query($this->connection->db_connection, $insert);
    
    return $result;
  }
  
  public function insertBlog($tablename, $fields, $values)
  {
    $sql = "INSERT INTO {$tablename} ({$fields}) VALUES ({$values})";
    return mysqli_query($this->connection->db_connection, $sql);
  }

  public function select($tableName, $id)
  {
    $sql = "SELECT * FROM {$tableName} WHERE id={$id}";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function selectAll($tableName)
  {
    $sql = "SELECT * FROM {$tableName}";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function statusBlog($tableName, $userid)
  {

    $sql = "SELECT * FROM {$tableName} WHERE status=1 and user_id='$userid'";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }


  public function selectBlog($tableName, $id)
  {
    $sql = "SELECT * FROM {$tableName} WHERE articleId={$id}";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function selectEmail($tableName)
  {
    $sql = "SELECT * FROM {$tableName} WHERE email='{$_SESSION['email']}'";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function emailSelect($tableName)
  {
    $sql = "SELECT * FROM {$tableName} WHERE email='{$_POST['email']}'";
    return mysqli_query($this->connection->db_connection, $sql);
  }

  public function delete($tableName, $fieldName, $values)
  {
    $sql = "DELETE FROM {$tableName} WHERE {$fieldName}={$values}";
    return mysqli_query($this->connection->db_connection, $sql);
  }

  public function update($tableName, $updatedFields, $id)
  {
    $sql = "UPDATE {$tableName} SET {$updatedFields} WHERE id={$id}";
    return mysqli_query($this->connection->db_connection, $sql);
  }

  public function updateBlogData($tableName, $updatedFields, $id)
  {
    $sql = "UPDATE {$tableName} SET {$updatedFields} WHERE articleId={$id}";
    return mysqli_query($this->connection->db_connection, $sql);
  }
  public function updateProfile($tableName, $updatedFields, $email)
  {
    $sql = "UPDATE {$tableName} SET {$updatedFields} WHERE email='{$email}'";
    return mysqli_query($this->connection->db_connection, $sql);
  }

  public function emailVerify($tableName)
  {
    $sql = "SELECT email FROM {$tableName} WHERE email = '{$_POST['email']}'";
    return mysqli_query($this->connection->db_connection, $sql);
  }

  public function selectBlogByCatagory($tableName)
  {

    $sql = "SELECT * FROM {$tableName} WHERE articleCategory = 'Education'";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function selectLifestyleByCatagory($tableName)
  {
    $sql = "SELECT * FROM {$tableName} WHERE articleCategory = 'Lifestyle'";
    $result = mysqli_query($this->connection->db_connection, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function selectUserId($tableName, $email)
  {

    $sql = "SELECT * FROM {$tableName} WHERE email='{$email}'";

    $result = mysqli_query($this->connection->db_connection, $sql);

    $fetch = mysqli_fetch_array($result);

    $_SESSION['id'] = $fetch['id'];
    return $fetch['id'];
  }

  public function liveSearchData($tableName){
    
    if(isset($_POST['input']))
    {
      $input =  $_POST['input'];  
      
      $query="SELECT * FROM {$tableName} WHERE articleTitle LIKE '{$input}%' OR articleCategory LIKE '{$input}%'";
      
      $result = mysqli_query($this->connection->db_connection, $query);
    
      $data = [];

      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
       return $data;
    }
  }

  public function userSearchData($tableName){
    
    if(isset($_POST['input']))
    {
      $input =  $_POST['input'];  
      
      $query="SELECT * FROM {$tableName} WHERE first_name LIKE '{$input}%' OR last_name LIKE '{$input}%' OR email LIKE '{$input}%' OR mobile_no LIKE '{$input}%'";
      
      $result = mysqli_query($this->connection->db_connection, $query);
    
      $data = [];

      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
       return $data;
      // print_r($data); exit;
    }
  }
}
