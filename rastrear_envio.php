<?php
require_once('controller/conexion.php');
session_start();
$conn = getConnection();
$query = $conn->prepare("SELECT * FROM Envio WHERE guiaRastreo = '" . $_GET['guia_rastreo'] . "' LIMIT 1");
$query->execute();
$envio = $query->fetch(PDO::FETCH_OBJ);
// var_dump($envio);
?>
<!doctype html>
<html lang="es_MX">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilos -->
  <link href="assets/scss/styles.css" rel="stylesheet">
  <link href="assets/css/floating-labels.css" rel="stylesheet">

  <!-- GoogleMaps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjLv5hvfP9NrrQXo7B0mO1UnhsLYZq3w"></script>
  <title>Rastreo de envío</title>
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
    <?php if (isset($_SESSION['idUsuario'])) : ?>
      <a class="p-1 p-sm-3 p-lg-3 text-dark" href="cliente/principal_cliente.php">Mi cuenta</a>
      <form action="controller/logout.php">
        <button type="submit" class="btn btn-outline-primary">Cerrar sesión</button>
      </form>
    <?php else : ?>
      <a class="btn btn-outline-primary" href="login.php">Iniciar sesión</a>
    <?php endif; ?>
  </div>

  <div class="text-center mt-3 mt-lg-4 mb-4">
    <h1 class="display-5 font-weight-light mb-3">Rastreo de paquete</h1>
    <p class="h4 text-secondary font-weight-light p-0 m-0">Guia de rastreo: <?php echo $_GET['guia_rastreo'] ?></p>
  </div>

  <div class="container mb-3">
    <div class="row">
      <div class="col-12 col-xl-6">
        <h5 class="text-center">Historial de movimientos</h5>
        <table class="table table-hover table-responsive-sm">
          <thead>
            <tr class="bg-primary text-white">
              <th scope="col">#</th>
              <th scope="col">Movimiento</th>
              <th scope="col">Fecha</th>
              <th scope="col">Ubicación</th>
              <!-- <th scope="col">Hora</th> -->
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < 1; $i++) : ?>
              <tr>
                <th scopre="row">1</th>
                <td>Entregado a sucursal</td>
                <td>15 de junio</td>
                <td>Tulancingo, HGO</td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
      <div class="col-12 col-xl-6">
        <div class="text-center">
          <button id="btn-map" class="btn btn-primary mb-3" onclick="creaRuta()">Mostrar mapa</button>
        </div>
        <div id="map" style="width: 100%; height: 500px"></div>
      </div>
    </div>
  </div>

  <!-- Archivos JavaScript -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script>
    var google_map; // objeto gGMaps 
    var dirn; // objeto DirectionsService 
    var dir_disp; // objeto DirectionsRenderer

    // variable global que contiene los puntos 
    var lista_de_puntos = new Array();

    function mostrar_gmaps() {
      document.getElementById('btn-map').disabled = true;

      google_map = new google.maps.Map(document.getElementById("map"));

      dirn = new google.maps.DirectionsService();
      dir_disp = new google.maps.DirectionsRenderer();
      dir_disp.setMap(google_map);

      // posicionamiento en Paris

      google_map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      google_map.setZoom(6);
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

    function creaRuta(origen, destino) {
      mostrar_gmaps();
      var ciudadPartida = origen;
      var ciudadLlegada = destino;

      if (ciudadPartida != "" && ciudadLlegada != "") {
        var request = {
          origin: ciudadPartida,
          destination: ciudadLlegada,
          travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        dirn.route(request, leer_distancia);
      }
    }

    function creaRuta() {
      mostrar_gmaps();
      var ciudadPartida = 'Tulancingo';
      var ciudadLlegada = 'Puebla';

      if (ciudadPartida != "" && ciudadLlegada != "") {
        var request = {
          origin: ciudadPartida,
          destination: ciudadLlegada,
          travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        dirn.route(request, leer_distancia);
      }
    }
  </script>
</body>

</html>