<?php
class Conexion
{
  var $conn;

  public function __construct()
  {
    try {
      $servername = "localhost:3306";
      $username = "root";
      $password = "";
      $dbName = "PaquePlus";
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOexception $e) {
      echo "ERROR: " . $e->getMessage();
    }
  }

  public function close()
  {
    $this->conn = null;
  }
}
