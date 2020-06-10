<?php
require_once('conexion.php');

function haIniciadoSesion()
{
  if (
    isset($_SESSION) && isset($_SESSION['idUsuario'])
    || isset($_SESSION) && isset($_SESSION['idEmpleado'])
  ) {
    return true;
  } else {
    return false;
  }
}

function redirigeA($direccionArchivo)
{
  $host  = $_SERVER['HTTP_HOST'];
  header("Location: http://$host:8080/PaquePlus/$direccionArchivo");
}
