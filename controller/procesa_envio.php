<?php
require_once('../controller/conexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $conn = getConnection();
  // echo $_GET['numero_envio'];
  try {
    $query = $conn->prepare("SELECT * FROM Envio WHERE numeroEnvio = '" . $_GET['numero_envio'] . "' LIMIT 1");
    $query->execute();
    $envio = $query->fetch(PDO::FETCH_OBJ);

    if ($envio) {
      $guiaRastreo = strval(rand(1000000000, 9999999999));

      $sql = "UPDATE Envio SET guiaRastreo=? WHERE numeroEnvio=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$guiaRastreo, $_GET['numero_envio']]);

      $_SESSION['msg_success'] = 'Se proceso el envío: ' . $_GET['numero_envio'];
      $_SESSION['guia_rastreo'] = $guiaRastreo;
      $host = $_SERVER['HTTP_HOST'];
      header("Location: http://$host/PaquePlus/empleado");
    }

    if ($envio == false) {
      $_SESSION['msg_error'] = 'El número de envío: ' . $_GET['numero_envio'] . ' no existe';
      $host = $_SERVER['HTTP_HOST'];
      header("Location: http://$host/PaquePlus/empleado");
    }
  } catch (PDOException $e) {
    echo "El envío no existe";
  }
}
