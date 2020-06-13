$(document).ready(function () {
  $('.card-horizontal').on('click', function () {
    $('.card-horizontal').removeClass("shadow-lg border border-primary selected");
    $(this).toggleClass("shadow-lg border border-primary selected");
    $('html, body').animate({
      scrollTop: $("#btn_solicita_cotizacion").offset().top
    }, 1000);
  })

  $('.card-horizontal').on('mouseover', function () {
    $('.card-horizontal').css('cursor', 'pointer');
  })

});