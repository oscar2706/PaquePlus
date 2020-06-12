$(document).ready(function () {
  $('.card-horizontal').on('click', function () {
    // console.log(this.id);
    $('.card-horizontal').removeClass("shadow-lg border border-primary selected");
    $(this).toggleClass("shadow-lg border border-primary selected");
  })

  $('.card-horizontal').on('mouseover', function () {
    $('.card-horizontal').css('cursor', 'pointer');
  })

  $('#form-cotizacion').on('submit', function (event) {
    event.preventDefault();

    if ($('.card-horizontal').hasClass('selected')) {
      var cp_origen = $('#codigo_postal_origen').val();
      var ciudad_origen = $('#select_ciudad_origen').val();
      var cp_destino = $('#codigo_postal_destino').val();
      var ciudad_destino = $('#select_ciudad_destino').val();
      var peso = $('#peso').val();
      var tamaño = $('.card-horizontal.selected');

      console.log(cp_origen);
      console.log(ciudad_origen);
      console.log(cp_destino);
      console.log(ciudad_destino);
      console.log(peso);
      console.log(tamaño.attr('id'));

      $.ajax({
        url: 'resultados_cotizacion.php',
        type: 'POST',
        data: {
          "ciudad_origen": ciudad_origen,
          "ciudad_destino": ciudad_destino,
          "cp_origen": cp_origen,
          "cp_destino": cp_destino,
          "peso": peso,
          "tamaño": tamaño.attr('id')
        },
        success: function (response) {
          console.log('Se proceso con AJAX');
          console.log($('.resultados_cotizacion'));
          $('.resultados_cotizacion').empty();
          $('body').append(response);
          var $target = $('html,body');
          $target.animate({ scrollTop: $target.height() }, 1000);
        }
      })

    } else {
      alert('Selecciona un tamaño');
    }
  })

  $('#form-login').on('submit', function (event) {
    event.preventDefault();
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    console.log("Correo: " + email);
    console.log("Contraseña: " + password);

    $.ajax({
      url: 'controller/procesa_login.php',
      type: 'POST',
      data: {
        'correo': email,
        'contraseña': password
      },
      success: function (response) {
        console.log(response);
        if (response == 'Ok')
          window.location.href = "cliente/principal_cliente.php";
        if (response == 'No registrado')
          $('#tarjeta').prepend(
            '<div class="alert alert-danger" role="alert">' +
            '❌ Correo no registrado' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>');
        if (response == 'Contraseña incorrecta')
          $('#tarjeta').prepend(
            '<div class="alert alert-danger text-center" role="alert">' +
            '❌ La contraseña es incorrecta' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>');
      }
    });

  });
});