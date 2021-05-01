<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-blue fixed-top" style="background-color: #e3f2fd; ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ route('homePage') }}">Navbar</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homePage') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                        </li>

                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.create') }}">Add Post</a>
                            </li>
                        @endif

                    </ul>

                    @guest
                        <ul class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item">
                                <button class="btn "><a href="{{ route('login') }}" class="nav-link">Login</a></button>
                            </li>
                            <li class="nav-item">
                                <button class="btn "><a href="{{ route('register') }}"
                                        class="nav-link">Register</a></button>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item">
                                <a href="" class="nav-link">Hi {{ Auth::user()->name }}</a>
                            </li>
                        </ul>

                        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                        </form>

                    @endguest


                </div>
            </nav>


            {{-- <main class="d-flex align-items-center min-vh-100 py-3 py-md-0"> --}}
            @if (session('status'))
                <center>
                    <div style="color:red; position: absolute; top:7%; margin:auto;">
                        <p> {{ session('status') }} </p>
                    </div>
                </center>
            @endif
            @yield('content')
            {{-- </main> --}}

        </div>
    </div>

</body>

</html>
