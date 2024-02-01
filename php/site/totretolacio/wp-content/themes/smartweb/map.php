<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true" type="text/javascript"></script>
<script type="text/javascript">
  var map;

  var customIcons = {
    lloc: {
      icon: 'http://lebre.cat/caçadors/wp-content/themes/smartweb/img/Contacta/icono mapa.png',
    },
    altre: {
      icon: '',
    }
  };

  function load() {
    map=map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(40.7124712,0.5785434),
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel:false
    })
    map.setOptions({draggable: false});
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP file
    var name = 'Federació Catalana de Caça';
    var address = 'Av. Alcalde Palau,56-58, 2n 2a';

    // var type = markers[i].getAttribute("type"); //icono
    var point = new google.maps.LatLng(
        parseFloat('40.7124712'),
        parseFloat('0.5785434')
    );

    var html = "<b>" + name + "</b> <br/>" + address;
    var icon = customIcons['lloc'] || {};//icono

    var marker = new google.maps.Marker({
        map: map,
        position: point,
        icon: icon.icon,
        shadow: icon.shadow
    });

    bindInfoWindow(marker, map, infoWindow, html);
  }

  function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    });
  }

  function newLocation(name,address,newLat,newLng) {
    map=map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(40.807138,0.517842),
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel:false
    })
    map.setOptions({draggable: false});
    var infoWindow = new google.maps.InfoWindow;

    // var type = markers[i].getAttribute("type"); //icono
    var point = new google.maps.LatLng(
        parseFloat(newLat),
        parseFloat(newLng)
    );

    var html = "<b>" + name + "</b> <br/>" + address;
    var icon = customIcons['lloc'] || {};//icono

    var marker = new google.maps.Marker({
        map: map,
        position: point,
        icon: icon.icon,
        shadow: icon.shadow
    });

    bindInfoWindow(marker, map, infoWindow, html);

    map.setCenter({
        lat : newLat,
        lng : newLng
    });
  }

  window.addEventListener('load',load,true);
  /*var j = jQuery.noConflict();
  j(document).ready(function() {
    j("#jesus").on('click', function () {
      newLocation('Forn Carlos Ripolles','Av. Molins d’en Comte, 31',40.825595,0.509283);
    });
    j("#tortosa").on('click', function () {
      newLocation('Forn Carlos Ripolles','Rambla Catalunya, 29',40.815066,0.517651);
    });
    j("#santcarles").on('click', function () {
      newLocation('Forn Carlos Ripolles','Plaça Vella, 1',40.619386,0.593258);
    });
  });*/
</script>

<div id="map" class="mapa"></div>
