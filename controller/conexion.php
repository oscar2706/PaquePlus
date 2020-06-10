<?php

function getConnection()
{
  try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "PaquePlus";
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (PDOexception $e) {
    echo "ERROR: " . $e->getMessage();
  }
}
