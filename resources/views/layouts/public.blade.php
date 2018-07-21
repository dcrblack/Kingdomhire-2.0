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
</head>
<body>
{{--<div class="container-fluid">--}}
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top" style="margin: 0; border: unset;">
      <div class="jumbotron jumbotron-home" style="background-color: #1D855C">
        <div class="bg"></div>
        <div class="container">
          <div class="navbar-header" style="min-width: 100%; margin: 10px 0px 10px 0px">
            {{--<div style="max-width: 100%; padding: 5px 5px 5px 5px;">--}}
            <a href="{{ url('/admin') }}">
              <img src="{{ asset('static/Kingdomhire_logo.svg') }}" class="logo" width="100%">
            </a>
          {{--</div>--}}
          <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="collapse navbar-collapse vehicle-dashboard-navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
              <a href="{{ route('public.home') }}">Home</a>
            </li>
            <li class="{{ Request::is('admin/vehicles*') ? ' active' : '' }}">
              <a href={{ route('public.vehicles') }}>Vehicles</a>
            </li>
            <li class="{{ Request::is('admin/rates*') ? ' active' : '' }}">
              <a href="{{ route('public.contact') }}">Contact</a>
            </li>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
              <li>
                <a href="{{ route('login') }}">Login</a>
              </li>
            @else
              <li>
                <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
              </li>
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
            @endguest
          </ul>
        </div>
        </div>
      </div>
    </nav>
  </div>
{{--</div>--}}

  {{--<div class="container">--}}
    @yield('content')
  {{--</div>--}}

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
