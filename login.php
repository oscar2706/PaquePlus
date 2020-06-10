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
  <link href="assets/css/login.css" rel="stylesheet">

  <title>PaquePlus - Iniciar sesión</title>
</head>

<body>
  <form class="form-signin" method="POST" id="form-login">
    <div class="text-center mb-4">
      <img class="mb-4 img-fluid" src="assets/img/paquePlus.png" height="100">
      <h1 class="h3 mb-3 font-weight-light">Inicio de sesión</h1>
    </div>

    <div class="card">
      <div class="card-body" id="tarjeta">
        
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
        <div class="mb-3">
          <a href="">¿Olvidaste tu contraseña?</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body text-center">
        ¿Aún no eres cliente? <a href="registro.php">Crea una cuenta</a>.
      </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Diseñado por Oscar Patricio </p>
  </form>
  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="assets/js/login.js"></script>
</body>

</html>