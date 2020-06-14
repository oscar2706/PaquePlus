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
  <link href="assets/css/album.css" rel="stylesheet">

  <title>PaquePlus - Iniciar sesión</title>
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

  <!-- Carrusel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/recibe_paquete3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-sm-block">
          <h5>Tú eres nuestra prioridad</h5>
          <p>En PaquePlus nuestra meta es brindarte el mejor servicio posible.
            Por esto ofrecemos los mejores servicios de paqueteria.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/call_center.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-sm-block">
          <h5>¿Tienes alguna duda? Contactanos</h5>
          <p>En PaquePlus nuestros clientes son lo más importante. Por este motivo ofrecemos atención al cliente
            24 horas los 7 días de la semana. Contactanos al (775)-141-99-32
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/avion_paqueplus.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-sm-block">
          <h5>Siempre ofreciendo servicios de calidad</h5>
          <p>Como una empresa inovadora en PaquePlus siempre estamos buscando más y mejores formas de cumplir nuestra misión.
            Brindarte la mejor atención y los mejores servicios.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <footer class="text-muted mt-4">
    <div class="container">
      <p class="m-0">&copy; 2020 PaquePlus, Inc.</p>
      <p>Diseñado por Oscar Patricio Hernández para la materia de Servicios Web</p>
    </div>
  </footer>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>