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
  <link href="assets/css/envios.css" rel="stylesheet">
  <link href="assets/css/floating-labels.css" rel="stylesheet">

  <title>Envíos</title>
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

  <div class="text-center mt-3 mt-lg-4">
    <h1 class="display-4">Rastreos</h1>
  </div>

  <!-- Alerta aun no registras todos tus datos -->
  <?php if (isset($_SESSION['msg_error'])) : ?>
    <div class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-9 col-lg-6 text-center">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $_SESSION['msg_error'] ?>
          </div>
        </div>
      </div>
    </div>
    <?php unset($_SESSION['msg_error']) ?>
  <?php endif; ?>

  <div class="container mt-3 mt-lg-4 mb-4 mb-lg-4">
    <div class="row align-align-items-center bg-light rounded">
      <div class="col-12 col-lg-6 my-auto px-5 pb-5 py-3">
        <h1 class="display-5">Localiza tu paquete</h1>
        <p class="lead pt-1 pb-3">Si ya cuentas con tu <strong>guía de rastreo</strong> puedes saber donde se encuentra tu paquete y su fecha aproximada de llegada.</p>
        <!-- Boton modal rastero -->
        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#rastreo_Modal">
          Rastrear un envío
        </button>
      </div>
      <div class="col-12 col-lg-6 px-5 p-lg-0">
        <img src="assets/img/camioneta.png" class="ml-0 img-fluid float-left d-none d-sm-block">
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="rastreo_Modal" tabindex="-1" role="dialog" aria-labelledby="rastreo_ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rastreo_ModalLabel">Rastrear envío</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="controller/verifica_guia_rastreo.php" method="GET">
            <div class="modal-body">
              <div class="form-label-group">
                <input type="number" name="guia_rastreo" id="guia_rastreo" class="form-control" placeholder="Guia de rastreo" required autofocus>
                <label for="guia_rastreo">Guia de rastreo</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Rastrear</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="text-muted mt-4">
    <div class="container">
      <p class="m-0">&copy; 2020 PaquePlus, Inc.</p>
      <p>Diseñado por Oscar Patricio Hernández para la materia de Servicios Web</p>
    </div>
  </footer>
  <!-- Archivos JavaScript -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>