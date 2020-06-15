<?php
session_start();
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
    <?php if(isset($_SESSION['idUsuario'])): ?>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="cliente/principal_cliente.php">Mi cuenta</a>
      <form action="controller/logout.php">
        <button type="submit" class="btn btn-outline-primary">Cerrar sesión</button>
      </form>
    <?php else: ?>
      <a class="btn btn-outline-primary" href="login.php">Iniciar sesión</a>
    <?php endif; ?>
  </div>

  <div class="container">
    <div class="text-center">
      <h1 class="my-3">Envío pagado ✅</h1>
      <p class="text-secondary h5 font-weight-light mt-3 mb-4">Tu envío ha sido pagado y ya esta registrado para ser procesado en nuestras sucursales</p>
      <p class="font-weight-light h3 mt-5"><strong>Número de envío: </strong>123456789</p>
      <p class="text-secondary">Acude a tu sucursal más cercana tu paquete y este código para poder procesarlo lo más pronto posible.</p>
      <p class="text-secondary">Gracias por enviar con PaquePlus❤️😃</p>
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