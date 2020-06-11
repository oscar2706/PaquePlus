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

  <div class="container-xl">
    <h2 class="text-center my-3">Sus cotizaciones</h2>

    <!-- Resultado -->
    <div class="cotizacion shadow-sm rounded mb-4 m-3 border">
      <div class="row justify-content-center align-items-center p-3">
        <div class="col-12 col-lg-2 text-center">
          <img class="" src="assets/img/camion.png" width="160">
        </div>
        <div class="col-12 col-lg-7 text-center text-lg-left">
          <div class="pl-0 pl-lg-3">
            <p class="card-title text-secondary">Entrega estimada</p>
            <h5 class="card-title">Miercoles 22 de junio
              <span class="card-title text-secondary">| Antes de las 12:00</span>
            </h5>
            <p class="card-text text-secondary font-italic">Reserve hoy antes de las 15:00 para poder procesar el envío</p>
          </div>
        </div>
        <div class="col-12 col-lg-3 text-center pr-xl-5 p-3">
          <p class="text-primary m-0 pb-1 pb-lg-2">
            <span class="text-secondary"><small>Incluye iva</small></span>
            MXN 100.00
          </p>
          <button class="btn-continuar btn btn-block btn-primary">Continuar a envío</button>
        </div>
      </div>
    </div>

  </div>


  <!-- JavaScript Jquery, Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>
    $(document).ready(function() {
      // $('.cotizacion').on('mouseenter', function() {
      //   console.log(this);
      //   $(this).toggleClass("shadow-lg border selected");
      //   $(this).on('mouseleave', function() {
      //     console.log(this);
      //     $(this).toggleClass("shadow-lg border selected");
      //   })
      // })
      $('.cotizacion').hover(
        function() {
          $(this).addClass("shadow-lg");
        },
        function() {
          $(this).removeClass("shadow-lg");
        }
      )
      // $('.cotizacion').on('mouseout', function() {
      //   console.log(this);
      //   $('.cotizacion').removeClass("shadow-lg border selected");
      //   $(this).toggleClass("shadow-lg border selected");
      // })
      $('.btn-continuar').on('mouseover', function() {
        $('.btn-continuar').css('cursor', 'pointer');
      })
    });
  </script>
</body>

</html>