@extends('layouts.app')

@section('content')

<div style="margin:12%">
    <a class="btn btn-primary" href="{{ route('vehiclepost')  }}" role="button">Post My Vehicle</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a class="btn btn-primary" href="{{ route('vehiclesearch')  }}" role="button">Search For Vehicle</a>
</div>

@endsection