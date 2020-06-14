$(document).ready(function () {
  $('.card-horizontal').on('click', function () {
    $('.card-horizontal').removeClass("shadow-lg border border-primary selected");
    $(this).toggleClass("shadow-lg border border-primary selected");
  })

  $('.card-horizontal').on('mouseover', function () {
    $('.card-horizontal').css('cursor', 'pointer');
  })

  $('#form-datos-paquete').on('submit', function (event) {
    event.preventDefault();

    if ($('.card-horizontal').hasClass('selected')) {
      var contenido = $('#contenido').val();
      var valor = $('#valor').val();
      var peso = $('#peso').val();
      var tamaño = $('.card-horizontal.selected');

      $.ajax({
        url: 'nuevo_envio_detalles.php',
        type: 'POST',
        data: {
          "contenido": contenido,
          "valor": valor,
          "peso": peso,
          "tamaño": tamaño.attr('id')
        },
        success: function (response) {
          console.log('Se proceso con AJAX');
          console.log($('.resultados_cotizacion'));
          window.location.href = "nuevo_envio_pago.php";
        }
      })

    } else {
      alert('Selecciona un tamaño');
    }
  })

});