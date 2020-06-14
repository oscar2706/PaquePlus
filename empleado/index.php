<?php

?>
<!doctype html>
<html lang="es_MX">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilos -->
  <link href="../assets/scss/styles.css" rel="stylesheet">
  <link href="../assets/css/floating-labels.css" rel="stylesheet">

  <title>PaquePlus - Iniciar sesión</title>
</head>

<body class="bg-light">
  <!-- Barra de navegación -->
  <div class="text-center bg-white border-bottom shadow-sm py-2">
    <div class="my-0 mr-md-auto font-weight-normal">
      <a href="index.php"><img src="../assets/img/paquePlus.png" width="165" class="d-inline-block align-top" loading="lazy"></a>
    </div>
  </div>

  <h1 class="text-center mt-3">Empleado</h1>
  <div class="container mt-3 mt-lg-4">

    <!-- Alerta mensaje -->
    <!-- <div class="row justify-content-center">
      <div class="col-12 col-md-9 col-lg-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          El número de envío 1234567 no existe!
        </div>
      </div>
    </div> -->

    <!-- Menú -->
    <div class="row justify-content-center">
      <div class="col-sm-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Nuevo envío</h5>
            <p class="card-text">Realiza nuevos encvíos para clientes de forma presencial</p>
            <a href="#" class="btn btn-primary">Realizar envío</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cotización</h5>
            <p class="card-text">Realiza una cotización rápida de un envío.</p>
            <a href="#" class="btn btn-primary">Cotizar un envío</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Procesado de envíos</h5>
            <p class="card-text">Procesar un envío que ya fue pagado en línea para generar su guia de rastreo y poder enviarlo.</p>
            <!-- Boton modal procesar envio -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rastreo_Modal">
              Procesar un envío
            </button>
          </div>

          <!-- Modal Procesar envio-->
          <div class="modal fade" id="rastreo_Modal" tabindex="-1" role="dialog" aria-labelledby="rastreo_ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="rastreo_ModalLabel">Rastrear envío</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="rastrear_envio.php" method="GET">
                  <div class="modal-body">
                    <div class="form-label-group">
                      <input type="number" name="guia_rastreo" id="guia_rastreo" class="form-control" placeholder="Guia de rastreo" required autofocus>
                      <label for="guia_rastreo">Guia de rastreo</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button id="btn-" type="submit" class="btn btn-primary" data-dismiss="modal">Procesar</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
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

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>

  </script>
</body>

</html>