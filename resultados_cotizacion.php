<div class="container-xl resultados_cotizacion">
  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $cotizacion = [];
      $cotizacion1 = [
        'entrega_estimada' => ''
      ];
      // echo "Funciona!!! D:";
      // var_dump($_POST);
      // try {
      //   $sql = "INSERT INTO Usuario (correo, password) VALUES (?,?)";
      //   $stmt = $conn->prepare($sql);
      //   if ($stmt->execute([$_POST['correo'], $_POST['contraseña']])) {
      //     $query = $conn->prepare("SELECT idUsuario FROM Usuario 
      //                         WHERE correo = '" . $_POST['correo'] . "' AND password  = '" . $_POST['contraseña'] . "' 
      //                         LIMIT 1");
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
  <h2 class="text-center mb-5 mt-5">Sus cotizaciones</h2>

  <!-- Resultado -->
  <div class="cotizacion shadow-sm rounded mb-4 mb-lg-5 m-3 border py-3">
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

<script>
  $(document).ready(function() {
    $('.cotizacion').hover(
      function() {
        $(this).addClass("shadow-lg");
      },
      function() {
        $(this).removeClass("shadow-lg");
      }
    )

    $('.btn-continuar').on('mouseover', function() {
      $('.btn-continuar').css('cursor', 'pointer');
    })
  });
</script>