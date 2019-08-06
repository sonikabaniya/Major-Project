@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                        <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                        <form action="{{ route('vehiclepost') }}" method="POST">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pickupdate">Pick Up Date</label>
                                <input type="date" class="form-control" name="pickupdate" placeholder="Pick Up Date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dropoffdate">Drop Off Date</label>
                                <input type="date" class="form-control" name="dropoffdate" placeholder="Drop Off Date">
                            </div>
                            </div>
                            <div class="form-group">
                                    <label for="vehicleimage">Image Of Vehicle</label>
                                    <input type="file" class="form-control" name="vehicleimage" placeholder="Vehicle image">
                            </div>
                            <div class="form-group">
                                    <label for="vehicledescription">Description Of Vehicle</label>
                                    <input type="text" class="form-control" name="vehicledescription" placeholder="Vehicle description in short...">
                            </div>
                            <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City in which vehicle is available">
                            </div>
                            <div class="form-group">
                            <label for="vehicletype">Vehicle Type</label>
                            <input type="text" class="form-control" name="vehicletype" placeholder="Vehicle">
                            </div>
                            
                            @csrf
                            <button type="submit" class="btn btn-primary">Post My Vehicle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
