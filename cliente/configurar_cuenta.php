<?php
require_once("../controller/UsuariosController.php");
session_start();

if (isset($_SESSION['idUsuario'])) {
  $idUsuario = $_SESSION['idUsuario'];
  $usuario = getInformacionUsuario($idUsuario);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "actualiza_usuario";
  // try {
  //   $sql = "INSERT INTO Usuario (correo, password) VALUES (?,?)";
  //   $stmt = $conn->prepare($sql);
  //   if ($stmt->execute([$_POST['correo'], $_POST['contraseña']])) {
  //     $query = $conn->prepare("SELECT idUsuario FROM Usuario 
  //                       WHERE correo = '" . $_POST['correo'] . "' AND password  = '" . $_POST['contraseña'] . "' 
  //                       LIMIT 1");
  //     $query->execute();
  //     $registro = $query->fetch(PDO::FETCH_OBJ);
  //     var_dump($registro);

  //     session_start();
  //     $_SESSION['idUsuario'] = $registro->idUsuario;
  //     redirigeA('cliente/principal_cliente.php');
  //   }
  // } catch (PDOexception $e) {
  //   if ($e->getCode() == 23000) {
  //     $msgError = 'Este correo ya esta registrado';
  //   }
  // }
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

    <title>Configuración de cuenta</title>
  </head>

  <body class="bg-light">
    <!-- Barra de navegación -->
    <div class="d-flex flex-column flex-md-row align-items-center py-3 py-lg-1 px-0 px-md-4 bg-white border-bottom shadow-sm">
      <div class="my-0 mr-md-auto font-weight-normal">
        <a href="index.php"><img src="../assets/img/paquePlus.png" width="165" class="d-inline-block align-top" loading="lazy"></a>
      </div>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-1 p-sm-3 p-lg-3 text-dark" href="">Configurar cuenta</a>
      </nav>
      <a class="btn btn-outline-primary" href="../controller/logout.php">Salir</a>
    </div>

    <!-- Alerta aun no registras todos tus datos -->
    <h1 class="text-center mt-4 mb-4">Configuración de cuenta</h1>

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
        <!-- Usuario -->
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuario
                <span>
                  <button id="btn-edita-usuario" class="btn btn-primary btn-sm" onclick="editaUsuario()">Editar</button>
                </span>
              </h5>
              <!-- Formulario usuario-->
              <form method="POST">
                <div class="form-label-group">
                  <input type="email" name="correo" id="inputEmail" class="form-control" placeholder="Correo" value="<?php echo $usuario['correo'] ?>" disabled required>
                  <label for="inputEmail">Correo</label>
                </div>
                <div class="form-label-group">
                  <input type="password" name="contraseña" id="inputPassword" class="form-control" placeholder="Contraseña" value="<?php echo $usuario['password'] ?>" disabled required>
                  <label for="inputPassword">Contraseña</label>
                </div>
                <button id="btnSubmit_usuario" class="btn btn-primary btn-block" type="submit" disabled>Actualizar</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Información personal -->
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Información personal
                <span>
                  <button id="btn-edita-remitente" class="btn btn-primary btn-sm" onclick="editaRemitente()">Editar</button>
                </span>
              </h5>
              <!-- Formulario remitente -->
              <form method="POST">
                <div class="form-label-group">
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required value="<?php echo $usuario['nombre'] ?>" 
                  disabled required>
                  <label for="nombre">Nombre</label>
                </div>

                <div class="form-label-group">
                  <input type="text" name="empresa" id="empresa" class="form-control" placeholder="empresa" value="<?php echo $usuario['empresa'] ?>" 
                  disabled required>
                  <label for="empresa">Empresa</label>
                </div>
                <!-- Dirección -->
                <div class="form-label-group">
                  <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="<?php echo $usuario['direccion'] ?>" 
                  disabled required>
                  <label for="inputPassword">Dirección</label>
                </div>
                <!-- CP -->
                <div class="form-label-group">
                  <input type="number" name="codigo_postal" id="codigo_postal" class="form-control" placeholder="Código postal" value="<?php echo $usuario['codigo_postal'] ?>" 
                  disabled required>
                  <label for="codigo_postal">Código postal</label>
                </div>
                <!-- Estado -->
                <div class="form-label-group">
                  <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" value="<?php echo $usuario['estado'] ?>" 
                  disabled required>
                  <label for="estado">Estado</label>
                </div>
                <!-- Ciudad -->
                <div class="form-label-group">
                  <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" value="<?php echo $usuario['ciudad'] ?>" 
                  disabled required>
                  <label for="ciudad">Ciudad</label>
                </div>
                <!-- Telefono -->
                <div class="form-label-group">
                  <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" value="<?php echo $usuario['numero_contacto'] ?>" 
                  disabled required>
                  <label for="telefono">Teléfono</label>
                </div>
                <!-- RFC -->
                <div class="form-label-group">
                  <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" value="<?php echo $usuario['rfc'] ?>" 
                  disabled required>
                  <label for="rfc">RFC</label>
                </div>
                <button disabled id="btnSubmit_remitente" class="btn btn-lg btn-primary btn-block" type="submit">Actualizar</button>
              </form>
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
      function editaUsuario() {
        if (document.getElementById('inputEmail').disabled)
          document.getElementById('inputEmail').disabled = false;
        else
          document.getElementById('inputEmail').disabled = true;

        if (document.getElementById('inputPassword').disabled)
          document.getElementById('inputPassword').disabled = false;
        else
          document.getElementById('inputPassword').disabled = true;

        if (document.getElementById('btn-edita-usuario').innerText == 'Editar') {
          document.getElementById('btn-edita-usuario').innerText = 'Cancelar';
          document.getElementById('btn-edita-usuario').classList = 'btn btn-sm btn-secondary';
          document.getElementById('btnSubmit_usuario').disabled = false;
        } else {
          document.getElementById('btn-edita-usuario').innerText = 'Editar';
          document.getElementById('btn-edita-usuario').classList = 'btn btn-sm btn-primary';
          document.getElementById('btnSubmit_usuario').disabled = true;
        }
      }

      function editaRemitente() {
        if (document.getElementById('nombre').disabled)
          document.getElementById('nombre').disabled = false;
        else
          document.getElementById('nombre').disabled = true;

        if (document.getElementById('empresa').disabled)
          document.getElementById('empresa').disabled = false;
        else
          document.getElementById('empresa').disabled = true;

        if (document.getElementById('direccion').disabled)
          document.getElementById('direccion').disabled = false;
        else
          document.getElementById('direccion').disabled = true;

        if (document.getElementById('codigo_postal').disabled)
          document.getElementById('codigo_postal').disabled = false;
        else
          document.getElementById('codigo_postal').disabled = true;

        if (document.getElementById('estado').disabled)
          document.getElementById('estado').disabled = false;
        else
          document.getElementById('estado').disabled = true;

        if (document.getElementById('ciudad').disabled)
          document.getElementById('ciudad').disabled = false;
        else
          document.getElementById('ciudad').disabled = true;

        if (document.getElementById('telefono').disabled)
          document.getElementById('telefono').disabled = false;
        else
          document.getElementById('telefono').disabled = true;

        if (document.getElementById('rfc').disabled)
          document.getElementById('rfc').disabled = false;
        else
          document.getElementById('rfc').disabled = true;

        if (document.getElementById('btn-edita-remitente').innerText == 'Editar') {
          document.getElementById('btn-edita-remitente').innerText = 'Cancelar';
          document.getElementById('btn-edita-remitente').classList = 'btn btn-sm btn-secondary';
          document.getElementById('btnSubmit_remitente').disabled = false;
        } else {
          document.getElementById('btn-edita-remitente').innerText = 'Editar';
          document.getElementById('btn-edita-remitente').classList = 'btn btn-sm btn-primary';
          document.getElementById('btnSubmit_remitente').disabled = true;
        }
      }
    </script>
  </body>

  </html>
<?php else : ?>
  <?php
  $host = $_SERVER['HTTP_HOST'];
  header("Location: http://$host/PaquePlus/index.php");
  ?>
<?php endif; ?>