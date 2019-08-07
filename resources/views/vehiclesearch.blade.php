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

                        <form action="{{ route('vehiclesearch') }}" method="POST">
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

                            <div class="form-group ">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City">
                            </div>
                            
                            <div class="form-group">
                            <label for="vehicletype">Vehicle Type</label>
                            <input type="text" class="form-control" name="vehicletype" placeholder="Vehicle">
                            </div>
                            
                            @csrf
                            <button type="submit" class="btn btn-primary">Find A Match</button>
                        </form>
                        
                    </div>
                </div>
            
            <br><br><br>
            @if($querymatchs)
                @foreach($querymatchs as $querymatch)
                <table  class="table table-hover table-bordered" id="vehicletable" >
                    <thead>
                        <tr>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Vehicle descripton</th>
                        <th scope="col">Price</th>
                        <th scope="col">Location</th>
                        <th scope="col">View Details</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{ $querymatch->VehicleType }}</td>
                        <td>{{ $querymatch->desc }}</td>
                        <td>{{ $querymatch->Price }}</td>
                        <td>{{ $querymatch->Location}}</td>
                        <td><a href="{{ route('individualpostroute',['id' =>$querymatch->productid]) }}">View Details</a></td>
                    </tr>
                @endforeach

            @else
                    No matching results found.
            
            @endif

        

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

                        <script type="text/javascript">
                        $(document).ready(function() {
                        $('#vehicletable').DataTable({
                            searching: false
                        });
                        });
                        </script>
                </div>
        </div>
        
    </div>

@endsection
