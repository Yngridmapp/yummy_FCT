<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Yummy! @yield('title')</title>


</head>
<!-- BARRA ACCESO -->

<body class="body">

    <nav class="navbar navbar-expand-sm navbar-dark flex-row  text-left bg-red">
        <!-- Permito acceso al usurio -->
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><img class="yummy" src="{{asset('img/logo/yummy.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Opcion que ve el usuario no registrado o no loggeado -->
            @guest
            <div class="collapse navbar-collapse d-flex justify-content-end">
                <ul class="navbar-nav ">
                    <li class="nav-item active">

                        <a class="nav-link" href="{{route('login')}}">Acceder
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('register')}}">Registrar</a>
                    </li>
                </ul>
            </div>
            @endguest
            <!-- /////////////////////////////////////////////////////////// -->

            <!-- Opcion disponible para usuario registrado -->
            @auth
            <div class="collapse navbar-collapse d-flex justify-content-end">

                <!-- <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Mis recetas
                             <span class="sr-only">(current)</span> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item color2" href="">Crear</a>


                        </div>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item color2" href="">Ver</a>


                        </div>
                    </li> -->
                <div class="dropdown">
                    <button class="btn bg-red dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mis recetas
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('recipes.create')}}">Crear</a>
                        <a class="dropdown-item" href="{{route('users.myrecipes',Auth::User()->id)}}">Ver</a>
                    </div>
                </div>
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('users.show',Auth::User()->id)}}">Mi perfil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @if(Auth::user()->rol_id == 1)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('users.index',Auth::User()->id)}}">Listado usuarios
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::user()->rol_id == 1)
                            {{ roleName(Auth::user())}}
                            @else
                            {{Auth::user()->name}}
                            @endif

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item color2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            @endauth
            <!-- /////////////////////////////////////////////////////////// -->
        </div>

    </nav>
    <!-- BARRA CATEGORIAS -->
    @unless(Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register')
    <nav class="navbar navbar-expand-sm navbar-light flex-row  text-left bar-catego">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categories" aria-controls="categories" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                Categorias
            </button>
            <div class="collapse navbar-collapse text-catego" id="categories">
                <ul class="navbar-nav w-100 d-flex justify-content-between ">
                    @foreach ($categories as $category)
                    <li class="nav-item"><a class="nav-link" href="{{route('category.index',$category->id)}}">{{$category->category}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    @endunless
    <!-- BUSCADOR Y CARRUSELL -->
    @yield('body')

    <!-- <footer class="footer py-3 bg-red">
        <div class="container">
            <span class="text-light">Place sticky footer content here.</span>
        </div>
    </footer> -->

    <footer class="text-center text-white footer" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>


</html>