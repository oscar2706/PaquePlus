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

  <!-- PayPal -->
  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>

  <!-- SweetAlert2 -->
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

  <title>PaquePlus</title>
</head>

<body class="bg-light">
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
    <div class="py-3 text-center">
      <h1>Pago</h1>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8 order-md-1">
        <form id="form-pago">
          <h4 class="mb-3">Tipo de pago</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Tarjeta de debito</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Nombre en la tarjeta</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Nombre completo mostrado en la tarjeta</small>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Número de la tarjeta</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="cc-expiration">Fecha de expiración
                <span class="small text-secondary">mm/aa</span>
              </label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            </div>
          </div>
          <!-- <div id="paypal-button-container"></div> -->
          <hr class="mb-4">
          <div class="text-center">
            <h4 class="text-primary mb-3">Total a pagar(MXN) <span class="pl-3">$350 MXN</span></h4>
          </div>
          <a id="btn-submit" class="btn btn-primary btn-lg btn-block text-white" onclick="paga()">Pagar</a>
        </form>
      </div>
    </div>
    <footer class="text-muted mt-5">
      <div class="container">
        <p class="m-0">&copy; 2020 PaquePlus, Inc.</p>
        <p>Diseñado por Oscar Patricio Hernández para la materia de Servicios Web</p>
      </div>
    </footer>

  </div>
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>
    function paga() {
      Swal.fire({
        icon: 'success',
        title: 'Pago realizado',
        text: 'El cobro fue aplciado y procesado con éxito',
      }).then((result) => {
        window.location.href = "nuevo_envio_exito.php";
      })
    }
  </script>
</body>

</html>