@extends('layouts.admin-vehicle-dashboard')

@section('content')
<div class="well">
  <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Overall past hires</h3>
          <h5>{{ $pastHires->count() }} hire(s) in total</h5>
        </div>
        <div class="panel-body">
          <div id="overall_vehicle_hires_per_month"></div>
          @columnchart('Overall Hires per month', 'overall_vehicle_hires_per_month')
        </div>
      </div>
    </div>
    <div class="col-md-5">
      @include('admin.vehicle.list-inactive-hires')
    </div>
  </div>
</div>
@endsection