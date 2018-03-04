<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print'/>

    <link href="{{ asset('bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">

    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        .fc-view-container {
            background: white;
        }

        body {
            margin-bottom: 70px
        }

        .dtp > .dtp-content {
            max-height: 527px;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="app-header navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                Rendez-Vous
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">S'enregistrer</a></li>
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="nav-item" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Se déconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="/editAccount/{{ Auth::user()->id }}"> Mon compte</a>
                            </li>
                            
                            @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>


    @yield('calendar')
</div>



<!-- Scripts -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
<script src="{{ asset('js/app.js') }}"></script>


<script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('jquery.min.js') }}"></script>
<script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('fullcalendar/locale/fr.js') }}"></script>
<script src="{{ asset('fullcalendar/gcal.min.js') }}"></script>


<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('bootstrap-datetimepicker/js/bootstrap-datepicker.fr.min.js') }}" charset="UTF-8"></script>
<script src="{{ asset('bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

@yield('script_calendar')

<script>
    $('#timestamp_add').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm:ss', lang : 'fr', weekStart : 1, cancelText : 'ANNULER' });
    $('#timestamp_edit').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm:ss', lang : 'fr', weekStart : 1, cancelText : 'ANNULER' });
</script>
</body>
</html>
