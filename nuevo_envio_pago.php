<?php

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
      <img src="assets/img/paquePlus.png" width="165" class="d-inline-block align-top" alt="" loading="lazy">
    </div>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="#">Rastreos</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="#">Envíos</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="cotizacion.php">Cotización</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="#">Sobre nosotros</a>
    </nav>
    <a class="btn btn-outline-primary" href="login.php">Iniciar sesión</a>
  </div>

  <form id="form-direcciones" novalidate>
    <h1 class="text-center my-3">Pago</h1>
    <p class="text-center text-secondary h5 font-weight-light mt-3 mb-4">Por favor verifique que todos los datos sean correctos antes de pagar.</p>
    <!-- Origen, destino, Paquete -->
    <div class="container-fluid">
      <div class="row justify-content-around">

        <!-- Origen -->
        <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-4 mt-lg-1">
          <h4 class="text-center mb-3">Origen</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <p><strong>Nombre:</strong> Nombre</p>
            <p><strong>Empresa:</strong> Empresa</p>
            <p><strong>Dirección:</strong> Dirección</p>
            <p><strong>Código postal:</strong> Código postal</p>
            <p><strong>Ciudad de origen:</strong> Ciudad de origen</p>
            <p><strong>Correo electronico:</strong> Correo electronico</p>
            <p><strong>Número de contacto:</strong> Número de contacto</p>
          </div>
        </div>

        <!-- Destino -->
        <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-4 mt-lg-1">
          <h4 class="text-center mb-3">Destino</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <p><strong>Nombre:</strong> Nombre</p>
            <p><strong>Empresa:</strong> Empresa</p>
            <p><strong>Dirección:</strong> Dirección</p>
            <p><strong>Código postal:</strong> Código postal</p>
            <p><strong>Ciudad de origen:</strong> Ciudad de origen</p>
            <p><strong>Número de contacto:</strong> Número de contacto</p>
          </div>
        </div>

        <!-- Paquete -->
        <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-4 mt-lg-1">
          <h4 class="text-center mb-3">Paquete</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <p><strong>Contenido:</strong>Contenido</p>
            <p><strong>Valor:</strong>Valor</p>
            <p><strong>Peso:</strong>Peso</p>
            <p><strong>Tamaño:</strong>CódigoTamaño</p>
          </div>
        </div>

      </div>

      <!-- Pagar -->
      <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 mt-lg-3">
          <div class="px-4 px-sm-3 px-lg-5 mx-lg-3">
            <div id="paypal-button-container"></div>
            <a href="nuevo_envio_exito.php" class="btn btn-primary btn-block text-white">Pagar</a>
          </div>
        </div>
      </div>

    </div>
  </form>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>
    paypal.Buttons().render('#paypal-button-container');
  </script>
</body>

</html>