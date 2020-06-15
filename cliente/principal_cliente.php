<?php
require_once("../controller/UsuariosController.php");
session_start();

if (isset($_SESSION['idUsuario'])) {
  $idUsuario = $_SESSION['idUsuario'];
  $usuario = getInformacionUsuario($idUsuario);
}
?>

<?php if (isset($_SESSION['idUsuario'])) : ?>
  <!doctype html>
  <html lang="es_MX">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Estilos -->
    <link href="../assets/scss/styles.css" rel="stylesheet">
    <link href="../assets/css/principal_cliente.css" rel="stylesheet">
    <link href="../assets/css/floating-labels.css" rel="stylesheet">

    <title>Mi cuenta</title>
  </head>

  <body class="bg-light">
    <!-- Barra de navegación -->
    <div class="d-flex flex-column flex-md-row align-items-center py-3 py-lg-1 px-0 px-md-4 bg-white border-bottom shadow-sm">
      <div class="my-0 mr-md-auto font-weight-normal">
        <a href="index.php"><img src="../assets/img/paquePlus.png" width="165" class="d-inline-block align-top" loading="lazy"></a>
      </div>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-1 p-sm-3 p-lg-3 text-dark" href="configurar_cuenta.php">Configurar cuenta</a>
      </nav>
      <a class="btn btn-outline-primary" href="../controller/logout.php">Salir</a>
    </div>

    <!-- Alerta aun no registras todos tus datos -->
    <?php if (!tieneInformacionRemitente($idUsuario)) : ?>
      <div class="container">
        <div class="row justify-content-center mt-4">
          <div class="col-12 col-md-9 col-lg-6 text-center">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              Aún no registras todos tus datos
              <a href="informacion_personal.php">completa tu registro</a>
            </div>
          </div>
        </div>
      </div>
    <?php else : ?>
      <h1 class="text-center mt-4 text-secondary">Bienvenido</h1>
      <h3 class="text-center mb-4"><?php echo $usuario['nombre'] ?></h3>
    <?php endif; ?>

    <?php if (isset($_SESSION['msg_exito'])) : ?>
      <div class="container">
        <div class="row justify-content-center mt-4">
          <div class="col-12 col-md-9 col-lg-6 text-center">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $_SESSION['msg_exito'] ?>
            </div>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['msg_exito']) ?>
    <?php endif; ?>

    <!-- Menú -->
    <div class="container mt-3 mt-lg-3">
      <div class="row justify-content-center">
        <!-- Nuevo envío -->
        <div class="col-sm-7 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nuevo envío</h5>
              <p class="card-text">Realiza nuevos encvíos para clientes de forma presencial</p>
              <a href="../nuevo_envio.php" class="btn btn-primary">Realizar envío</a>
            </div>
          </div>
        </div>
        <!-- Cotización -->
        <div class="col-sm-5 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cotización</h5>
              <p class="card-text">Realiza una cotización rápida de un envío.</p>
              <a href="../cotizacion.php" class="btn btn-primary">Cotizar un envío</a>
            </div>
          </div>
        </div>
        <!-- Rastreo -->
        <div class="col-sm-4 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rastreos</h5>
              <p class="card-text">¿No sabes cuando recibirás tu paquete?</p>
              <!-- Boton modal procesar envio -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rastreo_Modal">
                Rastrear un envío
              </button>
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
                    <form action="../rastrear_envio.php" method="GET">
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
          </div>
        </div>
        <!-- Mis envios -->
        <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mis envíos</h5>
              <p class="card-text">Procesar un envío que ya fue pagado en línea para generar su guia de rastreo y poder enviarlo.</p>
              <!-- Boton modal procesar envio -->
              <a href="historial.php" class="btn btn-primary text-white">Ver mi historial de envíos</a>
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
  </body>

  </html>
<?php else : ?>
  <?php
  $host = $_SERVER['HTTP_HOST'];
  header("Location: http://$host/PaquePlus/index.php");
  ?>
<?php endif; ?>