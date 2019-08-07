<!doctype html>
<html>
  <head>
    <title>Milijuli Yatayat</title>
    <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
  </head>
  <body>
    <div class="container">
      <h4>This is superadmin view only!</h4>
      <div id="map-canvas" style="width:600px;height:400px"></div>
    </div>

    <script>
    window.lat = 27.7172;
    window.lng = 85.3240;

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(updatePosition);
        }
      
        return null;
    };

    function updatePosition(position) {
      if (position) {
        window.lat = position.coords.latitude;
        window.lng = position.coords.longitude;
      }
    }
    
    setInterval(function(){updatePosition(getLocation());}, 10000);
      
    function currentLocation() {
      return {lat:window.lat, lng:window.lng};
    };

    var map;
    var mark;

    var initialize = function() {
      map  = new google.maps.Map(document.getElementById('map-canvas'), {center:{lat:lat,lng:lng},zoom:12});
      mark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map});
    };

    window.initialize = initialize;

    var redraw = function(payload) {
      lat = payload.message.lat;
      lng = payload.message.lng;

      map.setCenter({lat:lat, lng:lng, alt:0});
      mark.setPosition({lat:lat, lng:lng, alt:0});
    };

    var pnChannel = "map2-channel";

    var pubnub = new PubNub({
      publishKey:   'pub-c-a8c48f0d-7a33-4672-ba2b-865541235004',
      subscribeKey: 'sub-c-8dff3c54-b8b6-11e9-9e08-42221187cc6e'
    });

    pubnub.subscribe({channels: [pnChannel]});
    pubnub.addListener({message:redraw});

    setInterval(function() {
      pubnub.publish({channel:pnChannel, message:currentLocation()});
    }, 5000);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDShSYssqKYoYnKO-m6pK2ERngP9P7rUdU&callback=initialize"></script>
  </body>
</html>