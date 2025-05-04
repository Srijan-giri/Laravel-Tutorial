<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Demo App')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.0.0/mdb.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="header">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                @auth
                    <a class="navbar-brand" href="{{route('home')}}">Laravel</a>
                @endauth
                @guest
                    <a class="navbar-brand" href="{{route('login')}}">Laravel</a>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="@if(Auth::check()) {{route('home')}} @else {{route('login')}} @endif">Home</a>
                        </li>
                    </ul>
                    <form class="d-flex mx-lg-5 mx-md-3 mx-sm-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @auth
                                    @yield('username')
                                @endauth
                                @guest
                                    Hi, Guest
                                @endguest
                            </button>
                            @auth
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item active" href="{{route('profile')}}">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            @endauth
                            @guest
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item active" href="{{route('register.get')}}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                                </ul>
                            @endguest
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <div class="body">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
