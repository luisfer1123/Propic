<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--estilos propios-->
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

    <!--iconos-->
    <script src="https://kit.fontawesome.com/628b78a55e.js" crossorigin="anonymous"></script>

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--stilos propis-->
    @yield('linkscss')

    <!---icono-->
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">

    <!--login css-->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: black">
            <a href="/" class="navbar-brand">Propic.com.co</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navegador">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navegador">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a href="{{url('anuncios')}}" class="nav-link">Anuncios</a>
                    </li>
                    @guest
                    @else
                     <li class="nav-item active">
                        <a href="{{url('MisAnuncios')}}" class="nav-link">Mis anuncios <span class="badge bg-success">@yield('Acount')</span></a>
                    </li><li class="nav-item active">
                        <a href="{{url('MisAnuncios')}}" class="nav-link">Mis chats <span class="badge bg-success">@yield('Acount')</span></a>
                    </li>
                    @endguest
                    <li class="nav-item active">
                        <a href="{{ url('Somos') }}" class="nav-link">Quienes somos</a>
                    </li>
                    <li class="nav-item active">
                        <a href="" class="nav-link">Contacto</a>
                    </li>
                    
                    @guest
                    <li class="nav-item active">
                        <a href="{{ route('login') }}" class="btn btn-success my-2 my-sm-0 nav-link">Iniciar sesion</a>
                    </li>
		    @else
                   
                    <li class="nav-item active">
                        <a href="{{ route('logout') }}" class="btn btn-danger my-2 my-sm-0 nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesion</a>
                    </li>
                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </div>

        </nav>


        <main class="py-4" style="min-height: 350px">
            @yield('content')
        </main>
    </div>
    <footer class="page-footer font-small bg-dark text-white mt-5">
        <div class="container">

            <div class="row">
              <div class="col-md-6 pt-3">
                  <h5 class="text-center text-left">Nosotros</h5>
                  <p>Este pagina esta creada con el fin de que los usuarios puedan encontrar la casa o propiedad.
                    Que tanto desean de manera rapida y sencilla clasificando los anuncios y eliminando a quellos que no estan disponibles.
                  </p>
              </div>
              <div class="col-md-6 pt-3">
                @guest
                <ul class="list-unstyled list-inline text-center py-2  d-flex justify-content-end">
                  <li class="list-inline-item ">
                    <h5 class="mb-1">Registrarse</h5>
                  </li>

                  <li class="list-inline-item">
                    <a href="/login" class="btn btn-outline-light">Login</a>
                  </li>


                </ul>
                @endguest
              </div>
            </div>

        </div>

        <div class="footer-copyright text-center py-3" style="background: black">
          todos los derechos reservados © 2020 Copyright
        </div>
     </footer>
     @yield('scriptjs')
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
