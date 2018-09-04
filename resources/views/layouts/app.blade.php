<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Painel de acompanhamento integrado</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
    
</head>
<body>
    <div id="app">            
        @if(Route::getCurrentRoute()->uri() != 'login')
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-position fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_artigos.png') }}" class="img-fluid logo-image">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li>
                                <a target="_BLANK" class="help mr-3" name="Precisa de ajuda?" alt="Precisa de ajuda?" href="{{ route('help') }}">
                                    <i class="far fa-question-circle"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        
        <div class="col-xs-2">

            <div id="mySidenav" class="sidenav">
                @guest
                @else       
<!-- 
                <a href="/" role="button" aria-expanded="false">
                   <i class="fas fa-chart-line"></i> Dashboard
                </a> -->

                <hr class="hr-menu">
                
                <a class="dropdown-toggle" data-toggle="collapse" href="#collapseDial" role="button" aria-expanded="false" aria-controls="collapseDial">
                   <i class="fas fa-list"></i> Pedidos <span class="caret"></span>
                </a>
                <div class="sub-menu-item collapse show" id="collapseDial">
                    <a href="{{ route('pedidos') }}" role="button" aria-expanded="false">
                        - Pedidos ativos
                    </a>
                    <a href="{{ route('pedidos-arquivados') }}" role="button" aria-expanded="false">
                        - Pedidos arquivados
                    </a>
                </div>

                <hr class="hr-menu">

                <div class="logo-footer-wrapper">
                    <img src="{{ asset('images/logo_kroton.png') }}" class="img-fluid image-footer">    
                </div>
                
            
                <!-- <a href="#" role="button" aria-expanded="false">
                    Gerenciar Restrições
                </a> -->
                
            @endguest
            </div> 
        </div>
            
    <div class="col-10 offset-2">
        <div class="page">
            @yield('content')
        </div>            
    </div>

    @else

    <div class="container">
        @yield('content')
    </div>

    @endif
    </div>

    <script src="{{ asset('js/main.js') }}" ></script>

</body>
</html>
