<?php

include_once 'Connection.php';

class AuthenticationModel extends Connection
{
    public $connection;

    public function __construct()
  {
    $this->connection = new Connection();
  }

  public function login($tableName,$email,$password)
  {
    
    $encryptpassword =  md5($password);
    $sql = "SELECT * FROM {$tableName}  WHERE email = '{$email}' AND password = '{$encryptpassword}'";  
    return mysqli_query($this->connection->db_connection, $sql);
  }

}

?>