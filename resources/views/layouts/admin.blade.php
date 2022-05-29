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
</head>
<body>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                   DAGANG ARAK
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <a href="/admin/checkout" class="nav-link">
                            <i class="fas fa-cubes"></i>
                            <p>Checkout</p>
                        </a>
                        <a href="{{ URL::to('admin/kategori') }}" class="nav-link">
                            <i class="fas fa-cube"></i>
                            <p>Kategori</p>
                        </a>
                         <a href="{{ URL::to('admin/produk') }}" class="nav-link">
                            <i class="fas fa-cubes"></i>
                            <p>Produk</p>
                        </a>
                        <a href="{{ URL::to('admin/courier') }}" class="nav-link">
                            <i class="fas fa-cubes"></i>
                            <p>Kurir</p>
                        </a>
                        <a href="{{ URL::to('admin/detail') }}" class="nav-link">
                            <i class="fas fa-cubes"></i>
                            <p>Detail</p>
                        </a>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="{{ route('logoutadmin') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('logoutadmin') }}
                                    </a> --}}
                                    <div class="">
                                        <a href="{{  route('logoutadmin') }}" class="btn btn-dark btn-sm fw-bold">
                                            <i class="fa fa-plus"></i> LOGOUT
                                        </a>
                                    </div>

                                    {{-- <form id="logout-form" action="{{ route('logoutadmin') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="py-4">
            @yield('content')
        </main>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
</body>
</html>
