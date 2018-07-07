<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swatkins/gantt/css/gantt.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header" style="width: 100%">
        <a href="{{ url('/admin') }}">
          <img src="{{ asset('static/Kingdomhire_logo.svg') }}" width="400" style="padding: 5px 15px 5px 0px;">
        </a>
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li class="navbar-brand">
            Admin Dashboard
          </li>
          <li class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">Home</a>
          </li>
          <li class="dropdown{{ Request::is('admin/vehicles*') ? ' active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
              Vehicles
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('vehicle.add') }}">Add a vehicle</a>
              </li>
              <li>
                <a href="{{ route('admin.vehicles') }}">Vehicles list</a>
              </li>
            </ul>
          </li>
          <li class="dropdown{{ Request::is('admin/rates*') ? ' active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
              Rates
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('vehicle-rate.add') }}">Add a rate</a>
              </li>
              <li>
                <a href="{{ route('vehicle-rate.index') }}">Manage rates</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    @yield('content')
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });
</script>
</body>
</html>
