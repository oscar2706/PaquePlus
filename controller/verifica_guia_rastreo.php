<?php
require_once('../controller/conexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $conn = getConnection();
  var_dump($_GET);
  // echo $_GET['guia_rastreo'];

  try {
    $query = $conn->prepare("SELECT * FROM Envio WHERE guiaRastreo = '" . $_GET['guia_rastreo'] . "' LIMIT 1");
    $query->execute();
    $envio = $query->fetch(PDO::FETCH_OBJ);

    if ($envio) {
      echo "Se rastrea el envío";
      $host = $_SERVER['HTTP_HOST'];
      header("Location: http://$host/PaquePlus/rastrear_envio.php?guia_rastreo=" . $_GET['guia_rastreo']);
    }
    if ($envio == false) {
      echo "La guía de rastreo no existe";
      $host = $_SERVER['HTTP_HOST'];
      $_SESSION['msg_error'] = 'No existe la guia de rastreo ingresada';
      header("Location: http://$host/PaquePlus/rastreos.php?");
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
