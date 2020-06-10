<?php
require_once('conexion.php');
require_once('AppController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = getConnection();
  try {
    $query = $conn->prepare("SELECT idUsuario FROM Usuario 
                            WHERE correo = '" . $_POST['correo'] . "'
                            LIMIT 1");
    $query->execute();
    $registro = $query->fetch(PDO::FETCH_OBJ);
    
    if (!$registro){
      echo 'No registrado';
    } else {
      $query = $conn->prepare("SELECT idUsuario FROM Usuario 
                              WHERE correo = '" . $_POST['correo'] . "' AND password  = '" . $_POST['contraseña'] . "'
                              LIMIT 1");
      $query->execute();
      $registro = $query->fetch(PDO::FETCH_OBJ);
      if (!$registro){
        echo 'Contraseña incorrecta';
      } else {
        session_start();
        $_SESSION['idUsuario'] = $registro->idUsuario;
        echo 'Ok';
      }
    }
  } catch (PDOexception $e) {
    echo 'Error';
  }
}