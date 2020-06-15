<?php
require_once('conexion.php');

function getInformacionUsuario($id) {
  $conn = getConnection();
  try {
    $stmt = $conn->prepare('SELECT * FROM Usuario as u 
                            INNER JOIN Remitente as r ON u.idUsuario = r.idUsuario
                            WHERE u.idUsuario = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
  } catch (PDOexception $e) {
    return "PDO Error";
  }
}

function tieneInformacionRemitente($idUsuario){
  $conn = getConnection();
  try {
    $stmt = $conn->prepare('SELECT * FROM Remitente WHERE idUsuario = ? LIMIT 1');
    $stmt->execute([$idUsuario]);
    if($stmt->fetch() != null){
      return true;
    } else {
      return false;
    }
  } catch (PDOexception $e) {
    return false;
  }
}