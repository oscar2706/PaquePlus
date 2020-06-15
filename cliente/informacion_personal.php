<?php
require_once('../controller/conexion.php');
require_once('../controller/AppController.php');

$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    session_start();
    $sql = "INSERT INTO Remitente (nombre, empresa, direccion, codigo_postal, ciudad, estado, numero_contacto, rfc, idUsuario) 
            VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([
      $_POST['nombre'],
      $_POST['empresa'],
      $_POST['direccion'],
      strval($_POST['codigo_postal']),
      $_POST['ciudad'],
      $_POST['estado'],
      strval($_POST['telefono']),
      $_POST['rfc'],
      $_SESSION['idUsuario']
    ])) {
      $_SESSION['msg_exito'] = 'Se registro la información correctamente!';
      redirigeA('cliente/principal_cliente.php');
    } else {
      echo "Error al insertar";
    }
  } catch (PDOexception $e) {
    echo $e->getMessage();
  }
}
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

  <title>Información Personal</title>
</head>

<body class="bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form class="form-signin" method="POST">
          <div class="text-center mb-4">
            <img class="mb-3 img-fluid" src="../assets/img/paquePlus.png" width="400">
            <h1 class="h2 mb-3 font-weight-light">Información personal</h1>
          </div>

          <div class="card">
            <div class="card-body">

              <!-- Mensaje error -->
              <?php if (isset($msgError)) : ?>
                <div class="alert alert-danger" role="alert">
                  ❌ <?php echo $msgError ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <div class="form-label-group">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required autofocus>
                <label for="nombre">Nombre</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="empresa" id="empresa" class="form-control" placeholder="empresa" required>
                <label for="empresa">Empresa</label>
              </div>
              <!-- Dirección -->
              <div class="form-label-group">
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
                <label for="inputPassword">Dirección</label>
              </div>
              <!-- CP -->
              <div class="form-label-group">
                <input type="number" name="codigo_postal" id="codigo_postal" class="form-control" placeholder="Código postal" required>
                <label for="codigo_postal">Código postal</label>
              </div>
              <!-- Estado -->
              <div class="form-label-group">
                <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" required>
                <label for="estado">Estado</label>
              </div>
              <!-- Ciudad -->
              <div class="form-label-group">
                <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" required>
                <label for="ciudad">Ciudad</label>
              </div>
              <!-- Telefono -->
              <div class="form-label-group">
                <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" required>
                <label for="telefono">Teléfono</label>
              </div>
              <!-- RFC -->
              <div class="form-label-group">
                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" required>
                <label for="rfc">RFC</label>
              </div>

              <button id="btnSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Finalzar</button>
            </div>
          </div>
          <p class="mt-5 mb-3 text-muted text-center">&copy; Diseñado por Oscar Patricio </p>
        </form>
      </div>
    </div>

  </div>

  <!-- jQuery library -->
  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>