<div class="well">
  <div class="row">
    <div class="col-md-12">
      @if($vehicles->isEmpty())
        <h3>No vehicles present</h3>
      @else
        <h3>Vehicles</h3>
        <h5>{{ count($vehicles) }} vehicle(s) in total</h5>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2">
      <ul class="nav nav-pills nav-stacked vehicle-navbar-tabs" id="myTabs">
        <li class="active"><a href="#all" class="btn" data-toggle="pill">All</a></li>
        @foreach(array_keys($vehicles->groupBy('type')->toArray()) as $key)
          <li><a data-toggle="pill" class="btn" href="#{{ str_replace(" ", "-", $key) }}">{{ $key }}s</a></li>
        @endforeach
      </ul>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10">
      <div class="tab-content vehicles-tab-content">
        <div id="all" class="tab-pane fade in active">
          <div class="row">
            @foreach($vehicles as $vehicle)
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                @include('admin.vehicle.admin-summary')
              </div>
            @endforeach
          </div>
        </div>
        @for($i = 0; $i < count($vehicles->groupBy('type')); $i++)
          <div id="{{ str_replace(" ", "-", array_keys($vehicles->groupBy('type')->toArray())[$i]) }}" class="tab-pane fade">
            <div class="row">
              @foreach($vehicles->groupBy('type')->slice($i, 1)->first() as $vehicle)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  @include('admin.vehicle.admin-summary')
                </div>
              @endforeach
            </div>
          </div>
        @endfor
      </div>
    </div>
  </div>
</div>