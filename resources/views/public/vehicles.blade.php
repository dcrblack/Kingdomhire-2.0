@extends('layouts.public')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"><h1>Vehicles List</h1></div>
        </div>
        @foreach($vehicles as $vehicle)
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                @include('admin.vehicle.list-public')
              </div>
            </div>
          </div>
        @endforeach
    </div>
  </div>
@endsection
