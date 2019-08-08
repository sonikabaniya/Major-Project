@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Our Services</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset("img/1.jpg") }}" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset("img/2.jpg") }}" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset("img/3.jpg") }}" alt="Third slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset("img/4.jpg") }}" alt="Third slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset("img/5.jpg") }}" alt="Third slide">
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            
        </div>
    </div>
    <br><br><br>
    <div id="aboutUsDiv">
      <br>
        <h3>About Us</h3>
        <p>
            The global vehicle rental market is booming with growth opportunities popping up from the urban as well as tourism sector, the rise in the population, the growing economy and the increase in disposable income. The advancement in Information Technology and internet penetration has greatly enhanced various business processes and communication between companies (services provider) and their customers of which car rental industry is not left out.
            
        </p>
        <p>
                Global Positioning System (GPS) is a worldwide radio-navigation system formed from the constellation of 24 satellites and their ground stations.It is a method of working out exactly where something is. A GPS tracking system, for example, may be placed in a vehicle, on a cell phone, or on special GPS devices, which can either be a fixed or portable unit. Outdoor navigation of visually impaired people most often is based on data from the GPS maps and Geographic Information Systems (GIS). Such systems cannot be used for navigation in the regions where there are not any GPS maps or the maps are not sufficiently precise and detailed.

        </p>
        <p>
                Problems commonly associated with conventional systems affect car rental firms and their customers alike. Bookings are usually made over the counter, requiring clients to go to the company’s premises and book a ride. With vehicle rental solutions, customers themselves can make bookings directly from the company website, making the process much easier. This results in richer customer experience and therefore repeat business. Also, proper routing ensures that every booking is responded to efficiently, taking into consideration both scheduled and customer timings. Consecutive bookings need to be managed in such a way that hassle-free travel is attained with little or no downtime at all.

        </p>
        <p>
                The popularity of e-wallets as a payment method continues to grow. Most customers prefer to pay using e-wallets because they are efficient and easy to use. However, car rental companies must be certain that their solution provides ample security. E-wallets have been known to be vulnerable to attacks, resulting in customer losses. Being able to provide instant payment online is a key advantage to online reservations!
        </p>
    </div>
    <br><br><br>
    <div id="servicesDiv">
        <h3>Our Services</h3>
        <br>
        <div class="imgcontainer col-sm-6 col-md-6">
                <img src="{{ asset("img/Cycle.png") }}" alt="Avatar" class="image" style="width:100%">
                <div class="middle">
                  <div class="text">Cycle <br> Rs. 500 per day</div>
                </div>
        </div>
        <div class="imgcontainer col-sm-6 col-md-6">
            <img src="{{ asset("img/Bike.png") }}" alt="Avatar" class="image" style="width:100%">
            <div class="middle">
              <div class="text">Motorbike<br> Rs. 5000 per day</div>
            </div>
        </div>
        <div class="imgcontainer col-sm-6 col-md-6">
            <img src="{{ asset("img/scooter.png") }}" alt="Avatar" class="image" style="width:100%">
            <div class="middle">
              <div class="text">Scooter<br> Rs. 5000 per day</div>
            </div>
        </div>
        <div class="imgcontainer col-sm-6 col-md-6">
            <img src="{{ asset("img/Car.png") }}" alt="Avatar" class="image" style="width:100%">
            <div class="middle">
              <div class="text">Car<br> Rs. 7000 per day</div>
            </div>
        </div>
    </div>

    <div class="mapDiv">
        <script>
            var map;
            var infowindow;
            function initMap() {
              var nepal = {lat:  27.700769, lng: 85.300140};
              map = new google.maps.Map(document.getElementById('mapBox'), {
                center: nepal,
                zoom: 15.5
              });
             
        
              infowindow = new google.maps.InfoWindow();
              var service = new google.maps.places.PlacesService(map);
              service.nearbySearch({
                location: nepal,
                radius: 1000,
                type: ['Car rental']
              }, callback);
            }
        
            function callback(results, status) {
              if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                  createMarker(results[i]);
                }
              }
            }
        
            function createMarker(place) {
              var placeLoc = place.geometry.location;
              var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
              });
        
              google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
              });
            }
          </script>
        <div id="mapBox"></div> 
        <p>kldjalks</p>
        <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDShSYssqKYoYnKO-m6pK2ERngP9P7rUdU&libraries=places&callback=initMap" ></script>

    </div>
</div>
<section id="footer">
  <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
          <div class="col-xs-12 col-sm-4 col-md-4">
              <h5>Quick links</h5>
              <ul class="list-unstyled quick-links">
                  <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                  {{-- <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>About</a></li>
                  <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                  <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>Get Started</a></li> --}}
              </ul>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
              <h5>Quick links</h5>
              <ul class="list-unstyled quick-links">
                  <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                  {{-- <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>About</a></li>
                  <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                  <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>Get Started</a></li> --}}
              </ul>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
              <h5>Quick links</h5>
              <ul class="list-unstyled quick-links">
                  <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                  {{-- <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>About</a></li>
                  <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                  <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>Get Started</a></li> --}}
              </ul>
          </div>
      </div>
      
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
              <p><u><a href="#">Milijuli Yatayat</a></u> is a major project made by group of 3 sudents of Kathmandu Engineering College.</p>
              <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.swasthanaari.com" target="_blank">Milijuli Yatayat</a></p>
          </div>
      </div>	
  </div>
</section>
@endsection
