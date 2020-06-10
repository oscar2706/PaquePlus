<?php
require_once('controller/conexion.php');
require_once('controller/AppController.php');

$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $sql = "INSERT INTO Usuario (correo, password) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$_POST['correo'], $_POST['contraseña']])) {
      $query = $conn->prepare("SELECT idUsuario FROM Usuario 
                        WHERE correo = '" . $_POST['correo'] . "' AND password  = '" . $_POST['contraseña'] . "' 
                        LIMIT 1");
      $query->execute();
      $registro = $query->fetch(PDO::FETCH_OBJ);
      var_dump($registro);

      session_start();
      $_SESSION['idUsuario'] = $registro->idUsuario;
      redirigeA('cliente/principal_cliente.php');
    }
  } catch (PDOexception $e) {
    if ($e->getCode() == 23000) {
      $msgError = 'Este correo ya esta registrado';
    }
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
  <link href="assets/scss/styles.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">

  <title>PaquePlus - Iniciar sesión</title>
</head>

<body>
  <form class="form-signin needs-validation" method="POST">
    <div class="text-center mb-4">
      <img class="mb-4 img-fluid" src="assets/img/paquePlus.png" height="100">
      <h1 class="h5 font-weight-light text-secondary">Unete a PaquePlus</h1>
      <h1 class="h2 mb-3 font-weight-light">Crea tu cuenta</h1>
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
          <input type="email" name="correo" id="inputEmail" class="form-control" placeholder="Correo" required autofocus>
          <label for="inputEmail">Correo</label>
        </div>

        <div class="form-label-group">
          <input type="password" name="contraseña" id="inputPassword" class="form-control" placeholder="Contraseña" required>
          <label for="inputPassword">Contraseña</label>
        </div>

        <div class="form-label-group">
          <input type="password" name="confirmacionContraseña" id="inputPasswordConfirm" class="form-control" placeholder="Confirma contraseña" required>
          <label for="inputPassword">Confirma contraseña</label>
        </div>
        <button id="btnSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Crear cuenta</button>
      </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Diseñado por Oscar Patricio </p>
  </form>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>
    let password = document.getElementById("inputPassword");
    let confirm_password = document.getElementById("inputPasswordConfirm");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las contraseñas no coinciden");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    let btnSubmit = document.getElementById('btnSubmit');
    btnSubmit.onclick = validatePassword;
  </script>
</body>

</html>