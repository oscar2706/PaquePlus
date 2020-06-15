<div class="container-xl resultados_cotizacion">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
    date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("d-m-Y");

    $cotizaciones = [
      [
        'entrega_estimada' => date("d-m-Y", strtotime($fecha_actual . "+" . "1 days")),
        'precio' => 300 + (0.1 * random_int(100, 300))
      ],
      [
        'entrega_estimada' => date("d-m-Y", strtotime($fecha_actual . "+" . random_int(2, 3) . " days")),
        'precio' => 200 + (0.1 * random_int(100, 300))
      ],
      [
        'entrega_estimada' => date("d-m-Y", strtotime($fecha_actual . "+" . random_int(3, 5) . " days")),
        'precio' => 150 + (0.1 * random_int(100, 300))
      ],
      [
        'entrega_estimada' => date("d-m-Y", strtotime($fecha_actual . "+" . random_int(5, 7) . " days")),
        'precio' => 100 + (0.1 * random_int(100, 300))
      ],
    ];
  }
  ?>
  <h2 class="text-center mb-3 mb.lg-4 mt-3">Sus cotizaciones</h2>

  <!-- Resultado -->
  <?php foreach ($cotizaciones as $cotizacion) : ?>
    <div class="cotizacion shadow-sm rounded mb-3 mb-lg-4 m-3 border py-1 py-lg-3">
      <div class="row justify-content-center align-items-center p-3">
        <div class="col-12 col-lg-2 text-center">
          <img class="" src="assets/img/camion.png" width="160">
        </div>
        <div class="col-12 col-lg-7 text-center text-lg-left">
          <div class="pl-0 pl-lg-3">
            <p class="card-title text-secondary">Entrega estimada</p>
            <h5 class="card-title"><?php echo $cotizacion['entrega_estimada'] ?>
              <span class="card-title text-secondary">| Antes de las 12:00</span>
            </h5>
            <p class="card-text text-secondary font-italic">Reserve hoy antes de las 15:00 para poder procesar el envío</p>
          </div>
        </div>
        <div class="col-12 col-lg-3 text-center pr-xl-5 p-3">
          <div class="card">
            <div class="card-body bg-primary">
              <p class="text-white m-0 pb-1 pb-lg-2">
                <span class="text-text-white-50"><small>Incluye iva</small></span>
                MXN $<?php echo $cotizacion['precio'] ?>
              </p>
            </div>
          </div>
          <!-- <button class="btn-continuar btn btn-block btn-primary">Continuar a envío</button> -->
        </div>
      </div>
    </div>
  <?php endforeach; ?>

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