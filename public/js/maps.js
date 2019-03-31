var map;
var markers="";

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -7.2574719, lng: 112.75208829999997},
    zoom: 13
  });

  var input = document.getElementById('pac-input');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(13);
    }

    // Set the position of the marker using the place ID and location.
    // marker.setPlace({
    //   placeId: place.place_id,
    //   location: place.geometry.location
    // });
    // marker.setVisible(true);
    // infowindow.open(map, marker);

    placeMarker(place.geometry.location);

    // document.getElementById('place-name').textContent = place.name;
    // document.getElementById('place-id').textContent = place.place_id;
    // document.getElementById('place-address').textContent = place.formatted_address;
    $('#nama_lokasi').val(place.name);
    $('#lat').val(place.geometry.location.lat());
    $('#lng').val(place.geometry.location.lng());
    infowindow.setContent(document.getElementById('infowindow-content'));
  });

  var geocoder = new google.maps.Geocoder();
  google.maps.event.addListener(map, 'click', function(event) {
      geocoder.geocode({
          'latLng': event.latLng
      }, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                //   document.getElementById('place-name').textContent =results[0].place_id;
                //   document.getElementById('place-id').textContent = results[0].place_id;
                //   document.getElementById('place-address').textContent = results[0].formatted_address;
                  $('#nama_lokasi').val(results[0].name);
                  $('#lat').val(results[0].geometry.location.lat());
                  $('#lng').val(results[0].geometry.location.lng());

                //   alert(results[0].formatted_address);
                  placeMarker(event.latLng);
              }
          }
      });
  });

  function placeMarker(location){
      if (markers !== ""){
          markers.setMap(null);
          marker.setMap(null);
          marker.setVisible(false);
      }
      markers = new google.maps.Marker({
          position: location,
          map: map
      });
  }
}
