<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    echo "Petición POST";
    $_SESSION['direcciones'] = $_POST;
    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/PaquePlus/nuevo_envio_detalles.php");
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
    <a class="btn btn-outline-primary" href="login.php">Iniciar sesión</a>
  </div>

  <form id="form-direcciones" method="POST" novalidate>
    <h1 class="text-center my-3">Nuevo envío</h1>

    <!-- Origen, destino -->
    <div class="container-md">
      <div class="row justify-content-around">

        <!-- Origen -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-5 mt-lg-1">
          <h4 class="text-center mb-3">Origen</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <div class="form-label-group">
              <input type="text" name="origen_nombre" id="origen_nombre" class="form-control" placeholder="Nombre" required autofocus>
              <label for="origen_nombre">Nombre</label>
            </div>
            <div class="form-label-group">
              <input type="text" name="origen_empresa" id="origen_empresa" class="form-control" placeholder="Empresa" required>
              <label for="origen_empresa">Empresa</label>
            </div>
            <div class="form-label-group">
              <input type="text" name="origen_direccion" id="origen_direccion" class="form-control" placeholder="Dirección" required>
              <label for="origen_direccion">Dirección</label>
            </div>
            <div class="form-label-group">
              <input type="number" name="origen_codigo_postal" id="origen_codigo_postal" class="form-control" placeholder="Código postal" required>
              <label for="origen_codigo_postal">Código postal</label>
            </div>
            <select id="origen_select_ciudad" name="origen_ciudad" class="form-control mb-3" required>
              <option selected disabled value="">Ciudad de origen</option>
              <option value="Tulancingo">Tulancingo, Hidalgo</option>
              <option value="Ciudad de méxico">Ciudad de méxico</option>
              <option value="Toluca">Toluca, Estado de México</option>
              <option value="Monterrey">Monterrey, Monterrey</option>
              <option value="Guadalajara">Guadalajara, Guadalajara</option>
              <option value="Puebla">Puebla, Puebla</option>
              <option value="Oaxaca">Oaxaca, Oaxaca</option>
              <option value="Chihuahua">Chihuahua, Chihuahua</option>
              <option value="León">León, Guanajuato</option>
              <option value="Ciudad Juárez">Ciudad Juárez, Chihuahua</option>
            </select>
            <div class="form-label-group">
              <input type="email" name="origen_correo" id="origen_correo" class="form-control" placeholder="Correo electronico" required>
              <label for="origen_correo">Correo electronico</label>
            </div>
            <div class="form-label-group">
              <input type="number" name="origen_numero" id="origen_numero" class="form-control" placeholder="Número de contacto" required>
              <label for="origen_numero">Número de contacto</label>
            </div>
          </div>
        </div>

        <!-- Destino -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-5 mt-lg-1">
          <h4 class="text-center mb-3">Destino</h4>
          <hr>
          <div class="px-4 px-sm-3 px-lg-5">
            <div class="form-label-group">
              <input type="text" name="destino_nombre" id="destino_nombre" class="form-control" placeholder="Nombre" required>
              <label for="destino_nombre">Nombre</label>
            </div>
            <div class="form-label-group">
              <input type="text" name="destino_empresa" id="destino_empresa" class="form-control" placeholder="Empresa" required>
              <label for="destino_empresa">Empresa</label>
            </div>
            <div class="form-label-group">
              <input type="text" name="destino_direccion" id="destino_direccion" class="form-control" placeholder="Dirección" required>
              <label for="origen_direccion">Dirección</label>
            </div>
            <div class="form-label-group">
              <input type="number" name="destino_codigo_postal" id="destino_codigo_postal" class="form-control" placeholder="Código postal" required>
              <label for="destino_codigo_postal">Código postal</label>
            </div>
            <select id="destino_select_ciudad" name="destino_ciudad" class="form-control mb-3" required>
              <option selected disabled value="">Ciudad destino</option>
              <option value="Tulancingo">Tulancingo, Hidalgo</option>
              <option value="Ciudad de méxico">Ciudad de méxico</option>
              <option value="Toluca">Toluca, Estado de México</option>
              <option value="Monterrey">Monterrey, Monterrey</option>
              <option value="Guadalajara">Guadalajara, Guadalajara</option>
              <option value="Puebla">Puebla, Puebla</option>
              <option value="Oaxaca">Oaxaca, Oaxaca</option>
              <option value="Chihuahua">Chihuahua, Chihuahua</option>
              <option value="León">León, Guanajuato</option>
              <option value="Ciudad Juárez">Ciudad Juárez, Chihuahua</option>
            </select>
            <div class="form-label-group">
              <input type="number" name="destino_numero" id="destino_numero" class="form-control" placeholder="Número de contacto" required>
              <label for="destino_numero">Número de contacto</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Continuar -->
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
</body>

</html>