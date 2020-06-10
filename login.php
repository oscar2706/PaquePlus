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
  <form class="form-signin">
    <div class="text-center mb-4">
      <img class="mb-4 img-fluid" src="assets/img/paquePlus.png" height="100">
      <h1 class="h3 mb-3 font-weight-light">Inicio de sesión</h1>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="form-label-group">
          <input type="email" id="inputEmail" class="form-control" placeholder="Correo" required autofocus>
          <label for="inputEmail">Correo</label>
        </div>
    
        <div class="form-label-group">
          <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
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
</body>

</html>