@extends('layouts.admin-main')

@section('content')
@include('admin.vehicle.navbar')
<div class="row">
  @include('admin.vehicle.summary')
  <div class="col-md-5 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading"><h3>Edit Hire Form</h3></div>
      <div class="panel-body">
        <form action="{{ route('hire.edit', ['vehicle_id' => $vehicle->id, 'hire_id' => $hire->id]) }}" method="post">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-12">
              <div class="form-row">
                <label for="vehicle">Vehicle</label>
                <input id="vehicle" style="max-width: 300px;" class="form-control" type="text" value="{{ $vehicle->name() }}" disabled/>
              </div>
            </div>
            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }} col-md-12">
              <div class="form-row">
                <label for="start_date">Start Date</label>
                <input id="start_date" name="start_date" style="max-width: 300px;" class="form-control" type="text" value="{{ $hire->start_date }}" readonly/>
                @if( $errors->has('start_date'))
                  <span class="help-block">
                      <strong>{{ $errors->first('start_date') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }} col-md-12">
              <div class="form-row">
                <label for="end_date">End Date</label>
                {{ Form::text('end_date', $hire->end_date, array('class' => 'form-control datepicker', 'style' => 'max-width: 300px;')) }}
                @if( $errors->has('end_date'))
                  <span class="help-block">
                      <strong>{{ $errors->first('end_date') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            @if( $errors->has('reservation') or $errors->has('hire'))
              <div class="form-group has-error col-md-12">
                <div class="form-row">
                  <span class="help-block">
                    @if($errors->has('reservation'))
                      <strong>Other reservation</strong><br>
                      <strong>Start date = {{ $errors->get('reservation')['start_date'] }}</strong><br>
                      <strong>End date = {{ $errors->get('reservation')['end_date'] }}</strong>
                      <br><br>
                    @endif
                    @if($errors->has('hire'))
                      <strong>Current active hire</strong><br>
                      <strong>Start date = {{ $errors->get('hire')['start_date'] }}</strong><br>
                      <strong>End date = {{ $errors->get('hire')['end_date'] }}</strong>
                    @endif
                  </span>
                </div>
              </div>
            @endif
            <div class="form-row">
              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary">Edit Hire</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection