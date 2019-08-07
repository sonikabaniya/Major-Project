@extends('layouts.app')

@section('content')

<div style="margin:10%">

<h3>Welcome, Sonika</h3>
<div>
    <img src = "{{ asset("img/1.jpg") }}" alt=" " width="42" height="42">
</div>

<h6>Vehicle type: {{$querymatchs->VehicleType}}</h6>
<a class="btn btn-primary"  href="{{ route('khaltitest') }}" role="button">Book this vehicle</a>
</div>

@endsection