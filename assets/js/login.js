
$(document).ready(function () {

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
        if ( response == 'Ok')
          window.location.href = "cliente/principal_cliente.php";
        if ( response == 'No registrado')
          $('#tarjeta').prepend(
            '<div class="alert alert-danger" role="alert">' +
            '❌ Correo no registrado' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
              '<span aria-hidden="true">&times;</span>' +
            '</button>' +
          '</div>');
        if ( response == 'Contraseña incorrecta')
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