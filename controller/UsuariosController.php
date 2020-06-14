<?php
require_once('conexion.php');

function getInformacionUsuario($id) {
  $conn = getConnection();
  try {
    $stmt = $conn->prepare('SELECT * FROM Usuario WHERE idUsuario = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
  } catch (PDOexception $e) {
    return "PDO Error";
  }
}