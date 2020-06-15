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

  <form id="form-cotizacion">
    <h1 class="text-center my-3">Cotización</h1>

    <!-- Origen, destino, peso -->
    <div class="container-md mt-3">
      <div class="row justify-content-around">

        <!-- Origen -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-5 mt-lg-3">
          <h4 class="text-center mb-3">Origen</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <select id="select_ciudad_origen" class="form-control mb-3" required>
              <option selected disabled value="">Ciudad de origen</option>
              <option value="Tulancingo">Tulancingo</option>
              <option value="Ciudad de méxico">Ciudad de méxico</option>
              <option value="Toluca">Toluca</option>
              <option value="Monterrey">Monterrey</option>
              <option value="Guadalajara">Guadalajara</option>
              <option value="Puebla">Puebla</option>
              <option value="Oaxaca">Oaxaca</option>
              <option value="Chihuahua">Chihuahua</option>
              <option value="León">León</option>
              <option value="Ciudad Juárez">Ciudad Juárez</option>
            </select>
            <div class="form-label-group">
              <input type="text" name="codigo_postal_origen" id="codigo_postal_origen" class="form-control" placeholder="Código postal" required autofocus>
              <label for="codigo_postal">Código postal</label>
            </div>
          </div>
        </div>

        <!-- Destino -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-5 mt-lg-3">
          <h4 class="text-center mb-3">Destino</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <select id="select_ciudad_destino" class="form-control mb-3" required>
              <option selected disabled value="">Ciudad destino</option>
              <option value="Tulancingo">Tulancingo</option>
              <option value="Ciudad de méxico">Ciudad de méxico</option>
              <option value="Toluca">Toluca</option>
              <option value="Monterrey">Monterrey</option>
              <option value="Guadalajara">Guadalajara</option>
              <option value="Puebla">Puebla</option>
              <option value="Oaxaca">Oaxaca</option>
              <option value="Chihuahua">Chihuahua</option>
              <option value="León">León</option>
              <option value="Ciudad Juárez">Ciudad Juárez</option>
            </select>
            <div class="form-label-group">
              <input type="text" name="codigo_postal_destino" id="codigo_postal_destino" class="form-control" placeholder="Código postal" required autofocus>
              <label for="codigo_postal">Código postal</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Peso -->
      <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-9 col-lg-7 col-xl-6 mt-lg-3">
          <h4 class="text-center mb-3">Paquete</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5 mx-lg-3">
            <div class="form-label-group">
              <input type="number" id="peso" name="peso" class="form-control" placeholder="Peso(Kg)" required autofocus>
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
            <div id="tamaño_xs" class="card-horizontal">
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
            <div id="tamaño_sm" class="card-horizontal">
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
            <div id="tamaño_md" class="card-horizontal">
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
            <div id="tamaño_lg" class="card-horizontal">
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

        <div class="col-12 mt-2">
          <div class="text-center mb-4">
            <button id="btn_solicita_cotizacion" class="btn btn-primary btn-lg">Solicitar cotización</button>
          </div>
        </div>
      </div>
    </div>

  </form>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="assets/js/cotizacion.js"></script>
  
</body>

</html>