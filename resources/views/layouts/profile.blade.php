<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sayit') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleProfiles.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Sayit') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                        <li class="contMenuNavBar" onclick="location.href = '{{route('home')}}';">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" 
                            width="25px" height="25px"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            fill="#dfdfdf" stroke='red'
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g><g><path d="M256,11.96L0,234.276l26.206,30.176l23.967-20.814V440.09c0,33.056,26.893,59.95,59.95,59.95h111.906V304.204h69.941
                            V500.04h109.908c33.056,0,59.95-26.893,59.95-59.95V243.639l23.967,20.814L512,234.277L256,11.96z M421.861,440.09
                            c0,11.019-8.964,19.983-19.983,19.983h-69.941V264.238H182.062v195.836h-71.94c-11.019,0-19.983-8.964-19.983-19.983V208.931
                            L256,64.894l165.861,144.037V440.09z"/></g></g></svg>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <form class="form-inline my-2 my-lg-0">
                              <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                              <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
                <div class="row">
                    <div class="col">
                        <main class="py-2">
                            @yield('contentHeader')
                        </main>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 p-0">
                       <aside class="py-2">
                            @yield('aside-left')
                        </aside>                    
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
                        <main class="py-4">
                            @yield('content')
                        </main>    
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 p-0">
                        <aside class="py-4">
                            @yield('aside-rigth')
                        </aside>        
                    </div>
                </div>
        </div>
    </div>
</body>
</html>