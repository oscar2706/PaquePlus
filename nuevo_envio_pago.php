<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "Petición POST";
    $_SESSION['pago'] = $_POST;
    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/PaquePlus/nuevo_envio_exito.php");
  }
?>

<?php if(isset($_SESSION)): ?>
<!doctype html>
<html lang="es_MX">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilos -->
  <link href="assets/scss/styles.css" rel="stylesheet">
  <link href="assets/css/floating-labels.css" rel="stylesheet">

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

  <form id="form-pago">
    <h1 class="text-center my-3">Verificación de envío</h1>
    <p class="text-center text-secondary h5 font-weight-light mt-3 mb-4">Por favor verifique que todos los datos sean correctos antes de pagar.</p>
    <!-- Origen, destino, Paquete -->
    <div class="container-fluid">
      <div class="row justify-content-around">

        <!-- Origen -->
        <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-4 mt-lg-1">
          <h4 class="text-center mb-3">Origen</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <p><strong>Nombre: </strong> <?php echo $_SESSION['direcciones']['origen_nombre'] ?></p>
            <p><strong>Empresa: </strong> <?php echo $_SESSION['direcciones']['origen_empresa'] ?></p>
            <p><strong>Dirección: </strong> <?php echo $_SESSION['direcciones']['origen_direccion'] ?></p>
            <p><strong>Código postal: </strong> <?php echo $_SESSION['direcciones']['origen_codigo_postal'] ?></p>
            <p><strong>Ciudad de origen: </strong> <?php echo $_SESSION['direcciones']['origen_ciudad'] ?></p>
            <p><strong>Correo electronico: </strong> <?php echo $_SESSION['direcciones']['origen_correo'] ?></p>
            <p><strong>Número de contacto: </strong> <?php echo $_SESSION['direcciones']['origen_numero'] ?></p>
          </div>
        </div>

        <!-- Destino -->
        <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-4 mt-lg-1">
          <h4 class="text-center mb-3">Destino</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <p><strong>Nombre: </strong> <?php echo $_SESSION['direcciones']['destino_nombre'] ?></p>
            <p><strong>Empresa: </strong> <?php echo $_SESSION['direcciones']['destino_empresa'] ?></p>
            <p><strong>Dirección: </strong> <?php echo $_SESSION['direcciones']['destino_direccion'] ?></p>
            <p><strong>Código postal: </strong> <?php echo $_SESSION['direcciones']['destino_codigo_postal'] ?></p>
            <p><strong>Ciudad de origen: </strong> <?php echo $_SESSION['direcciones']['destino_ciudad'] ?></p>
            <p><strong>Número de contacto: </strong> <?php echo $_SESSION['direcciones']['destino_numero'] ?></p>
          </div>
        </div>

        <!-- Paquete -->
        <div class="col-12 col-sm-5 col-md-6 col-lg-4 col-xl-4 mt-lg-1">
          <h4 class="text-center mb-3">Paquete</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <p><strong>Contenido: </strong><?php echo $_SESSION['paquete']['contenido'] ?></p>
            <p><strong>Valor(MXN): </strong>$<?php echo $_SESSION['paquete']['valor'] ?></p>
            <p><strong>Tipo de envío: </strong><?php echo $_SESSION['paquete']['tipo_envio'] ?></p>
            <p><strong>Peso(Kg): </strong><?php echo $_SESSION['paquete']['peso'] ?></p>
            <p><strong>Tamaño: </strong><?php echo $_SESSION['paquete']['tamaño'] ?></p>
          </div>
        </div>

      </div>

      <!-- Pagar -->
      <div class="row justify-content-center mb-5">
        <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 mt-lg-3">
          <div class="px-4 px-sm-3 px-lg-5 mx-lg-3 text-center">
            <h4 class="text-primary mb-3">Total(MXN) <span class="pl-3">$350 MXN</span></h4>
            <div id="paypal-button-container"></div>
            <a href="cobro.php" class="btn btn-primary btn-block text-white">Continuar al pago</a>
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
<?php endif; ?>