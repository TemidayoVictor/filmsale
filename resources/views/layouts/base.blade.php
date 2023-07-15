<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset ('css/swiper-bundle.min.css') }}">
    <link href="{{ asset ('css/boxicons/boxicons-2.1.4/boxicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('css/style3.css')}}">
    <link rel="shortcut icon" href="{{ asset('images/fav-icon.png') }}" type="image/png" sizes="160x160">
    <title>FilmSales | @yield('title')</title>
</head>
<body>
    <header>
        <div class="nav container">
            
            <a href="index.html" class="logo">
                Film<span>Sales</span>
            </a>

            @if(!auth()->user())
            
                <a href="{{ route('login') }}" class="links @if ($upperNav == "login") {{ 'active' }} @endif">
                    Login
                </a>

                <a href="{{ route('signup') }}" class="links @if ($upperNav == "signup") {{ 'active' }} @endif">
                    Create Account
                </a>
            @else 
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="links" type="submit" value="Logout">
                </form>
            @endif

            <!-- Navbar -->

            <div class="navbar">
                <a href="{{ route('home') }}" class="nav-link @if ($sideNav == "home") {{ 'nav-active' }} @endif">
                    <i class="bx bx-home"></i>
                    <span class="nav-link-title">Home</span>
                </a>

                <a href="{{ route('genres') }}" class="nav-link @if ($sideNav == "genre") {{ 'nav-active' }} @endif">
                    <i class="bx bxs-hot"></i>
                    <span class="nav-link-title">Genres</span>
                </a>

                @if (auth()->user() && auth()->user()->type == "client")
                    <a href="{{ route('settings', ['id' => Session::get('id')]) }}" class="nav-link @if ($sideNav == "profile") {{ 'nav-active' }} @endif">
                        <i class="bx bx-user"></i>
                        <span class="nav-link-title">Profile</span>
                    </a>

                    <a href="{{ route('purchaseList', ['id' => auth()->user()->id]) }}" class="nav-link @if ($sideNav == "purchaseList") {{ 'nav-active' }} @endif">
                        <i class="bx bx-money"></i>
                        <span class="nav-link-title">Purchase List</span>
                    </a>
                @elseif(auth()->user() && auth()->user()->type == "admin")
                    <a href="{{ route('usersList') }}" class="nav-link @if ($sideNav == "userList") {{ 'nav-active' }} @endif">
                        <i class="bx bxs-user"></i>
                        <span class="nav-link-title">Users</span>
                    </a>

                    <a href="{{ route('addMovie') }}" class="nav-link @if ($sideNav == "add") {{ 'nav-active' }} @endif">
                        <i class="bx bx-plus"></i>
                        <span class="nav-link-title">Add Movies</span>
                    </a>

                    <a href="{{ route('adminMovieList') }}" class="nav-link @if ($sideNav == "allMovies") {{ 'nav-active' }} @endif">
                        <i class="bx bx-tv"></i>
                        <span class="nav-link-title">All Movies</span>
                    </a>

                    <a href="{{ route('revenue') }}" class="nav-link @if ($sideNav == "revenue") {{ 'nav-active' }} @endif">
                        <i class="bx bx-money"></i>
                        <span class="nav-link-title">Revenue</span>
                    </a>
                @endif
            </div>
        </div>
    </header>

    <!-- Dynamic Content -->

    @yield('content')

    <!-- Copyright -->

    <div class="copyright container">
        <p>&#169 Film<span>Sales</span> 2023 All Rights Reserved</p>
    </div>

    <script src="{{ asset ('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset ('js/index.js') }}"></script>
</body>
</html>