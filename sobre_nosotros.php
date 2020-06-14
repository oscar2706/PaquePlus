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

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjLv5hvfP9NrrQXo7B0mO1UnhsLYZq3w"></script>
  <title>Sobre nosotros</title>
</head>

<body>
  <!-- Barra de navegación -->
  <div class="d-flex flex-column flex-md-row align-items-center py-3 py-lg-1 px-0 px-md-4 bg-white border-bottom shadow-sm">
    <div class="my-0 mr-md-auto font-weight-normal">
      <a href="index.php"><img src="assets/img/paquePlus.png" width="165" class="d-inline-block align-top" loading="lazy"></a>
    </div>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="rastreos.php">Rastreos</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="envios.php">Envíos</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="cotizacion.php">Cotización</a>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="sobre_nosotros.php">Sobre nosotros</a>
    </nav>
    <a class="btn btn-outline-primary" href="login.php">Iniciar sesión</a>
  </div>

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="assets/img/caja3.png" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="display-4 text-black-50 mb-5">Somos una empresa Mexicana líder en innovación</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="container-lg">
    <div class="row">
      <div class="col-12 bg-light mb-5">
        <div class="p-3 p-lg-5">
          <h1 class="font-weight-light mb-3">UNA HISTORIA DE SUPERACIÓN</h1>
          <p class="h5 font-weight-light text-justify">
            PaquePlus surgío como una empresa creada por un estudiante común y corriente cuyo objetivo es salvar el semestre a toda costa. Para lograr este objetivo se ha hecho uso de litros y litros de café en la sangre de este estudiante. Esta no es una tarea sencilla, requiere de mucho tiempo, de dedicación, entre muchas otras cosas. Espero poder salvar el semestre y poder entregar un proyecto de calidad en el camino.
          </p>
        </div>
      </div>
      <div class="col-12 col-lg-6 bg-light mb-5">
        <div class="p-3 p-lg-5">
          <h1 class="font-weight-light mb-3">Estamos realizando entregas.</h1>
          <p class="h5 font-weight-light text-justify">
            En FedEx, somos más de 475,000 empleados en todo el mundo trabajando para ti.
            Conectamos Posibilidades.
          </p>
          <p class="h5 font-weight-light">
            Conectamos Posibilidades.
          </p>
        </div>
      </div>
      <div class="col-12 col-lg-6 bg-light mb-5">
        <div class="p-3 p-lg-5">
          <h1 class="font-weight-light mb-3">Premios</h1>
          <p class="h5 font-weight-light text-justify">
            PaquePlus se convierte en la orgullosa ganadora de prestigiosos reconocimientos de logros excepcionales en ventas y servicio al cliente. Este es un testimonio de la mentalidad de la empresa, que pone al cliente en el centro de cada envío realizado. Vea nuestra lista de premios aquí.
          </p>
        </div>
      </div>
      <div class="col-12 bg-light mb-5">
        <div class="p-3 p-lg-5">
          <h1 class="font-weight-light mb-3">Sucursales</h1>
          <p class="h5 font-weight-light text-justify">
            Contamos con sucursales en muchas de las ciudades más importantes de México y estamos en expansión, esperanos muy pronto en tu ciudad.
          </p>
          <div id="map" style="width: 1000px; height: 600px"></div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>

  <!-- JavaScript Jquery, Bootstrap -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>
    var google_map; // objeto gGMaps 
    // var geocoder; // objeto Geocoder 
    var dirn; // objeto DirectionsService 
    var dir_disp; // objeto DirectionsRenderer

    // variable global que contiene los puntos 
    var lista_de_puntos = new Array();

    function mostrar_gmaps() {
      google_map = new google.maps.Map(document.getElementById("map"));

      // creación del geocoder
      // geocoder = new google.maps.Geocoder();

      // para el cálculo de las distancias
      dirn = new google.maps.DirectionsService();
      dir_disp = new google.maps.DirectionsRenderer();
      dir_disp.setMap(google_map);

      // posicionamiento en Paris
      var punto = new google.maps.LatLng(46.98025, 3.66943);
      google_map.setCenter(punto);

      google_map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      google_map.setZoom(5);
    }

    function mostrar_ciudad(ciudad) {
      if (ciudad != "") {
        Buscar_Agregar_Punto(ciudad);
      } else
        alert("Ingrese nombre de la ciudad");
    }

    function Buscar_Agregar_Punto(direccion) {
      geocoder.geocode({
        'address': direccion
      }, Agregar_punto_en_el_mapa);
    }

    function Agregar_punto_en_el_mapa(results, status) {
      // Se centra el mapa en el punto
      if (status == "OK") {
        var lugar = results[0].geometry;
        google_map.setZoom(5);
        google_map.setCenter(lugar.location);
        console.log(results);
        console.log(lugar);
        console.log(lugar.location);

        // Agregado del marcador en el mapa sobre la ciudad solicitada
        var marker = new google.maps.Marker({
          map: google_map,
          position: lugar.location
        });
        lista_de_puntos.push(marker);
      } else {
        alert("Geocode ha fallado por la razón : " + status);
      }
    }

    function mostrar_itinerario() {
      var ciudadPartida = document.getElementById("ciudadPartida").value;
      var ciudadLlegada = document.getElementById("ciudadLlegada").value;

      if (ciudadPartida != "" && ciudadLlegada != "") {
        var request = {
          origin: ciudadPartida,
          destination: ciudadLlegada,
          travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        dirn.route(request, leer_distancia);
      } else
        alert("Ingrese la ciudad origen y la ciudad destino");
    }

    function leer_distancia(response, status) {
      if (status == "OK") {
        dir_disp.setDirections(response);

        // Calculo de distancias
        var distancia = 0;
        var myRoute = response.routes[0];
        for (let i = 0; i < myRoute.legs.length; i++) {
          distancia += myRoute.legs[i].distance.value;
        }
        distancia = distancia / 1000;

        var kilometros_obj = document.getElementById("distancia")
        kilometros_obj.value = distancia + " kilometros";
      }
    }

    function mostrar_coordenadas() {
      var coordenada_x = document.getElementById("coordenada_x").value;
      var coordenada_y = document.getElementById("coordenada_y").value;
      if (coordenada_x != "" && coordenada_y != "") {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(coordenada_x, coordenada_y),
          map: google_map,
          title: "Coordenadas : " + coordenada_x + ", " + coordenada_y
        });

        google_map.setZoom(4);
        google_map.setCenter(marker.getPosition());

        lista_de_puntos.push(marker);
      } else
        alert("Ingrese la latitud y la longitud");

    }

    function borrar_marcadores() {
      for (let i = 0; i < lista_de_puntos.length; i++)
        lista_de_puntos[i].setMap(null);

      for (let i = 0; i < lista_de_puntos.length; i++)
        lista_de_puntos.pop();

      dir_disp.setMap(null);
      dir_disp = new google.maps.DirectionsRenderer();
      dir_disp.setMap(google_map);
    }

    // google.maps.event.addDomListener(window, 'resize', initialize);
    // google.maps.event.addDomListener(window, 'load', initialize);
    mostrar_gmaps();
    mostrar_ciudad('Tulancingo');
    mostrar_ciudad('Ciudad de mexico');
    mostrar_ciudad('Toluca');
    mostrar_ciudad('Monterrey');
    mostrar_ciudad('Guadalajara');
    mostrar_ciudad('Puebla');
    mostrar_ciudad('Oaxaca');
    mostrar_ciudad('Chihuahua');
    mostrar_ciudad('León');
    mostrar_ciudad('Ciudad Juárez');
    mostrar_ciudad('Durango');
    mostrar_ciudad('Hermosillo');
    mostrar_ciudad('Zacatecas');
  </script>
</body>

</html>