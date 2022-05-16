<?php

class Connection
{

  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $db_name = 'blog';

  public $db_connection;

  public function __construct()
  {
    if (!$this->db_connection) {
      $this->db_connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

      if ($this->db_connection->connect_error) {
        echo "Failed to connect to MySQL";
      }
    }
  }
}