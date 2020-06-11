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
  <div class="d-flex flex-column flex-md-row align-items-center pt-2 px-md-4 bg-white border-bottom shadow-sm">
    <div class="my-0 mr-md-auto font-weight-normal">
      <img src="assets/img/paquePlus.png" width="165" class="d-inline-block align-top" alt="" loading="lazy">
    </div>
    <nav class="my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="#">Rastreos</a>
      <a class="p-2 text-dark" href="#">Envíos</a>
      <a class="p-2 text-dark" href="cotizacion.php">Cotización</a>
      <a class="p-2 text-dark" href="#">Sobre nosotros</a>
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

  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
          etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
      </div>
    </div>

  </main>

  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a
          href="../getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>