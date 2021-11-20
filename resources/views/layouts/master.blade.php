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
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('users.myrecipes',Auth::User()->id)}}">Mis recetas
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('users.show',Auth::User()->id)}}">Mi perfil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
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



    <!-- <footer class="footer mt-auto d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="text-muted">&copy; 2021 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul>
  </footer> -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>


</html>