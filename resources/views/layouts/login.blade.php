<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Painel de acompanhamento integrado - {{ Route::currentRouteName() }} @if(Route::currentRouteName() == 'pedido') {{ @$pedido['pedido_comprador'] }} @endif </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/buttons.flash.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/jszip.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/pdfmake.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/vfs_fonts.js') }}" defer></script>
    <script src="{{ asset('js/datatables/buttons.html5.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/buttons.print.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/date-eu.js') }}" defer></script>


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
        <div id="drag" class="drag">


            

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg1"> 
            
               <!--  <svg version="1.1" id="svg2" class="svg-grande" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 38.9 39" style="enable-background:new 0 0 38.9 39;" xml:space="preserve">
                <style type="text/css">
                    .st0{opacity:0.3;fill-rule:evenodd;clip-rule:evenodd;fill:#FCFAFB;stroke:#FFFFFF;stroke-width:0.7087;}
                    .st1{fill:#FFFFFF;}
                    .st2{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                    .st3{fill-rule:evenodd;clip-rule:evenodd;fill:#7BCFDE;}
                </style>
                <g id="coracao">
                    <g id="Fundo">
                        <path id="Transparência" class="st0" d="M38.5,19.4c0,10.5-8.5,19.1-19.1,19.1S0.4,30,0.4,19.4C0.4,8.9,8.9,0.4,19.4,0.4
                            S38.5,8.9,38.5,19.4"/>
                        <path class="st1" d="M19.4,38.9C8.7,38.9,0,30.2,0,19.5S8.7,0.1,19.4,0.1s19.4,8.7,19.4,19.4S30.1,38.9,19.4,38.9z M19.4,0.8
                            C9.1,0.8,0.7,9.2,0.7,19.5c0,10.3,8.4,18.7,18.7,18.7s18.7-8.4,18.7-18.7C38.1,9.2,29.7,0.8,19.4,0.8z"/>
                    </g>
                    <g id="Coração">
                        <path id="Coração_x5F_Frequência" class="st2" d="M24.1,18.2l-1.7,4.2c-0.1,0.2-0.2,0.3-0.3,0.3c-0.1,0.1-0.2,0.2-0.4,0.2h-9.1
                            c-0.3,0-0.6-0.2-0.6-0.6c0-0.3,0.2-0.6,0.6-0.6h8.9l2.1-5.1c0.1-0.2,0.3-0.3,0.5-0.3c0.2,0,0.4,0.1,0.5,0.3l1.5,3.1
                            c2.3-5.4-0.7-9.7-4.9-9.7c-4.6,0-4.8,4.4-4.8,4.4h-0.3c0,0-0.2-4.4-4.8-4.4c-4.6,0-7.8,5.2-4.1,11.3c3.8,6.1,8.8,7.6,8.8,7.6h0.3
                            c0,0,5.1-1.5,8.8-7.6c0.1-0.1,0.1-0.2,0.2-0.4L24.1,18.2z"/>
                        <path id="Frequência" class="st3" d="M34.4,21.8c0,0-5.9-0.1-6,0.1l-0.6,1l-1.3-2.6c-0.2,0.3-0.4,0.7-0.6,1.1
                            c0,0-0.1,0.1-0.1,0.1l1.4,2.9c0.1,0.3,0.5,0.4,0.7,0.3c0.1-0.1,0.7-1,1.1-1.6h5.4c0.3,0,0.6-0.3,0.6-0.6
                            C35,22.1,34.7,21.8,34.4,21.8z"/>
                    </g>
                </g>
                </svg> -->

            </svg>
            

        </div>

        <div id="svg-anchor" class="container h-100">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}" ></script>
    <script src="{{ asset('js/svg.js') }}" ></script>
    <script src="{{ asset('js/svg.draggy.min.js') }}" ></script>
    <script src="{{ asset('js/svg.connectable.js') }}" ></script>
    <script src="{{ asset('js/animation.js') }}" ></script>

</body>
</html>
