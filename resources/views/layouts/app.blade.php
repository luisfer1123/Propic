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
    <link rel="stylesheet" href="css/inicio.css">

    <!--iconos-->
    <script src="https://kit.fontawesome.com/628b78a55e.js" crossorigin="anonymous"></script>
   
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="/" class="navbar-brand">Propic.com.co</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navegador">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navegador">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="anuncios" class="nav-link">Anuncios</a>
                    </li>
                    <li class="nav-item active">
                        <a href="/" class="nav-link">Mis anuncios <span class="badge bg-success">0</span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="" class="nav-link">Quienes somos</a>
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

        <main class="py-4">
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
                <ul class="list-unstyled list-inline text-center py-2  d-flex justify-content-end">
                  <li class="list-inline-item ">
                    <h5 class="mb-1">Registrarse</h5>
                  </li>
                  <li class="list-inline-item">
                    <a href="" class="btn btn-outline-light">Login</a>
                  </li>
                </ul>
              </div>
            </div>
            
        </div>

        <div class="footer-copyright text-center py-3" style="background: black">
          todos los derechos reservados © 2020 Copyright 
        </div>
     </footer>
     @yield('scriptjs')
</body>
</html>
