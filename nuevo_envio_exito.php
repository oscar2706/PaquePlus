<?php
include_once('controller/conexion.php');
session_start();

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
date_default_timezone_set('America/Mexico_City');
$fecha_actual = date("Y-m-d");
if (isset($_SESSION['direcciones'])) {
  $conn = getConnection();
  try {

    // Se inserta el remitente
    $sql = "INSERT INTO Remitente (nombre, empresa, direccion, codigo_postal, ciudad, estado, numero_contacto) 
            VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $_SESSION['direcciones']['origen_nombre'],
      $_SESSION['direcciones']['origen_empresa'],
      $_SESSION['direcciones']['origen_direccion'],
      $_SESSION['direcciones']['origen_codigo_postal'],
      $_SESSION['direcciones']['origen_ciudad'],
      'Hidalgo',
      $_SESSION['direcciones']['origen_numero'],
    ]);

    // Se obtiene idRemitente
    $idRemitente = $conn->lastInsertId();

    // Se inserta el destinatario
    $sql = "INSERT INTO Destinatario (nombre, empresa, direccion, codigo_postal, ciudad, estado, numero_contacto) 
            VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $_SESSION['direcciones']['destino_nombre'],
      $_SESSION['direcciones']['destino_empresa'],
      $_SESSION['direcciones']['destino_direccion'],
      $_SESSION['direcciones']['destino_codigo_postal'],
      $_SESSION['direcciones']['destino_ciudad'],
      'Puebla',
      $_SESSION['direcciones']['destino_numero'],
    ]);

    // Se obtiene idDestinarario
    $idDestinatario = $conn->lastInsertId();

    $tipo_envio = 1;
    switch ($_SESSION['paquete']['tipo_envio']) {
      case 'Tortuga':
        $tipo_envio = 1;
        break;
      case 'Normal':
        $tipo_envio = 2;
        break;
      case 'Preferente':
        $tipo_envio = 3;
        break;
      case 'Paloma':
        $tipo_envio = 4;
        break;
    }

    // Se inserta el envio
    $sql = "INSERT INTO Envio (fechaSolicitud, costo, idTipoEnvio, idDestinatario, idRemitente) 
            VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $fecha_actual,
      350,
      $tipo_envio,
      $idDestinatario,
      $idRemitente
    ]);

    // Se obtiene el idEnvio
    $numeroEnvio = $conn->lastInsertId();

    // Se inserta el paquete
    $sql = "INSERT INTO Paquete (size, peso, valor, contenido, numeroEnvio) 
            VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $_SESSION['paquete']['tamaño'],
      intval($_SESSION['paquete']['peso']),
      350.0,
      $_SESSION['paquete']['contenido'],
      $numeroEnvio
    ]);
    
  } catch (PDOexception $e) {
    if ($e->getCode() == 23000) {
      $msgError = 'Este correo ya esta registrado';
    }
  }
}
?>
<!doctype html>
<html lang="es_MX">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilos -->
  <link href="assets/scss/styles.css" rel="stylesheet">
  <link href="assets/css/floating-labels.css" rel="stylesheet">

  <!-- PayPal -->
  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
  <title>Cotización</title>
</head>

<body>
  <!-- Barra de navegación -->
  <div class="d-flex flex-column flex-md-row align-items-center py-3 py-lg-1 px-0 px-md-4 bg-white border-bottom shadow-sm">
    <div class="my-0 mr-md-auto font-weight-normal">
      <a href="index.php"><img src="assets/img/paquePlus.png" width="165" class="d-inline-block align-top" loading="lazy"></a>
    </div>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="rastreos.php">Rastreos</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="envios.php">Envíos</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="cotizacion.php">Cotización</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="sobre_nosotros.php">Sobre nosotros</a>
    </nav>
    <?php if (isset($_SESSION['idUsuario'])) : ?>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="cliente/principal_cliente.php">Mi cuenta</a>
      <form action="controller/logout.php">
        <button type="submit" class="btn btn-outline-primary">Cerrar sesión</button>
      </form>
    <?php else : ?>
      <a class="btn btn-outline-primary" href="login.php">Iniciar sesión</a>
    <?php endif; ?>
  </div>

  <div class="container">
    <div class="text-center">
      <h1 class="my-3">Envío pagado ✅</h1>
      <p class="text-secondary h5 font-weight-light mt-3 mb-4">Tu envío ha sido pagado y ya esta registrado para ser procesado en nuestras sucursales</p>
      <p class="font-weight-light h3 mt-5"><strong>Número de envío: </strong><?php echo $numeroEnvio ?></p>
      <p class="text-secondary">Acude a tu sucursal más cercana con tu paquete y tu número de envío para poder procesarlo lo más pronto posible.</p>
      <p class="text-secondary mt-3">Gracias por enviar con PaquePlus❤️😃</p>
    </div>

    <!-- Pagar -->
    <div class="row justify-content-center mt-5 mb-5">
      <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
        <div class="px-4 px-sm-3 px-lg-5 mx-lg-3">
          <div id="paypal-button-container"></div>
          <a href="index.php" class="btn btn-lg btn-block btn-primary text-white">Regresar al inicio</a>
        </div>
      </div>
    </div>


  </div>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>