@extends('layouts.app')

@section('content')

{{-- <div style="margin:10%">

<h5>Welcome, {{Auth::user()->name}}</h5>
<div>
    <img src = "{{ asset("img/1.jpg") }}" alt=" " width="42" height="42">
</div>

<h6>Vehicle type: {{$querymatchs->VehicleType}}</h6>
<a class="btn btn-primary"  href="{{ route('khaltitest') }}" role="button">Book this vehicle</a>
</div> --}}

<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">Welcome,
      <small>{{Auth::user()->name}}</small>
    </h1>
  
    <!-- Portfolio Item Row -->
    <div class="row">
  
      <div class="col-md-8">
        <img class="img-fluid" src="{{ asset("img/". $querymatchs->VehicleType.".png") }}" alt="">
      </div>
  
      <div class="col-md-4">
        <h3 class="my-3">Product Description</h3>
      <p>{{  $querymatchs->desc   }}</p>
        <h3 class="my-3">Product Details</h3>
        <ul>
            <li>Pick Up Date: {{  $querymatchs->PickUpDate   }}</li>
            <li>Drop Off Date: {{  $querymatchs->DropOffDate  }}</li>
            <li>City: {{  $querymatchs->City   }}</li>
            <li>Vehicle Type: {{  $querymatchs->VehicleType   }}</li>
            <li>Posted By: {{  $querymatchs->postedby   }}</li>
            <a class="btn btn-primary"  href="{{ route('khaltitest') }}" role="button">Book this vehicle</a>
        </ul>
      </div>
  
    </div>
    <!-- /.row -->
  
    <!-- Related Projects Row -->
    <h3 class="my-4">Related Vehicles</h3>
  
    <div class="row">
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="{{ asset("img/1.jpg") }}" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="{{ asset("img/1.jpg") }}" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="{{ asset("img/1.jpg") }}" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="{{ asset("img/1.jpg") }}" alt="">
            </a>
      </div>
  
    </div>
    <!-- /.row -->
  
  </div>
  <!-- /.container -->
  
@endsection