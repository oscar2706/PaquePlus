<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "Petición POST";
  echo '<br>';
  var_dump($_POST);
  $_SESSION['paquete'] = $_POST;
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

  <title>Nuevo envio</title>
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

  <!-- Formulario -->
  <form id="form-datos-paquete" method="POST">
    <!-- Contenido, valor, peso -->
    <div class="container-xl">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
          <h1 class="text-center my-3">Datos paquete</h1>
          <hr>
        </div>
      </div>
      <!-- Peso -->
      <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-9 col-lg-7 col-xl-6 mt-lg-3">
          <div class="px-4 px-sm-3 px-lg-5 mx-lg-3">
            <div class="form-label-group">
              <input type="text" id="contenido" name="contenido" class="form-control" placeholder="Contenido" required autofocus>
              <label for="contenido">Contenido</label>
            </div>
            <div class="form-label-group">
              <input type="number" id="valor" name="valor" class="form-control" placeholder="Valor(MXN)" required>
              <label for="valor">Valor(MXN)</label>
            </div>
            <select id="tipo_envio" name="tipo_envio" class="form-control mt-5 mb-3" required>
              <option selected disabled value="">Tipo de envío</option>
              <option value="Tortuga">Tortuga (5-7 días hábiles)</option>
              <option value="Normal">Normal (3-5 días hábiles)</option>
              <option value="Preferente">Preferente (2-3 días hábiles)</option>
              <option value="Paloma">Paloma (día siguiente)</option>
            </select>
            <div class="form-label-group">
              <input type="number" id="peso" name="peso" class="form-control" placeholder="Peso(Kg)" required>
              <label for="peso">Peso(Kg)</label>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Tamaños de paquetes -->
    <div class="container-fluid">
      <h5 class="text-center mb-3">Selecciona un tamaño</h5>
      <div class="row justify-content-center">
        <!-- Chico -->
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2 mb-3">
          <div class="card ">
            <div id="extra_chico" class="card-horizontal">
              <div class="img-square-wrapper ">
                <img class="img-fluid" src="assets/img/paquete-xs.png" width="100">
              </div>
              <div class="card-body px-0 py-2">
                <h5 class="card-title">Sobre</h5>
                <p class="card-text">32 x 24 x 1cm</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Mediando -->
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2 mb-3">
          <div class="card ">
            <div id="chico" class="card-horizontal">
              <div class="img-square-wrapper ">
                <img class="img-fluid" src="assets/img/paquete-sm.png" width="100">
              </div>
              <div class="card-body p-2">
                <h5 class="card-title">Un libro</h5>
                <p class="card-text">23x14x4cm</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Grande -->
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2 mb-3">
          <div class="card ">
            <div id="mediano" class="card-horizontal">
              <div class="img-square-wrapper ">
                <img class="img-fluid" src="assets/img/paquete-md.png" width="100">
              </div>
              <div class="card-body p-2">
                <h5 class="card-title">Caja de zapatos</h5>
                <p class="card-text">35x20x15cm</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Extra grande-->
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2 mb-3">
          <div class="card ">
            <div id="grande" class="card-horizontal">
              <div class="img-square-wrapper ">
                <img class="img-fluid" src="assets/img/paquete-lg.png" width="100">
              </div>
              <div class="card-body p-2">
                <h5 class="card-title">Caja de mudanza</h5>
                <p class="card-text">75x33x35cm</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Boton continuar -->
    <div class="container-md">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 mt-lg-3">
          <div class="px-4 px-sm-3 px-lg-5 mx-lg-3">
            <button type="submit" class="btn btn-primary btn-block text-white">Continuar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="assets/js/envio_detalles_paquete.js"></script>
</body>

</html>