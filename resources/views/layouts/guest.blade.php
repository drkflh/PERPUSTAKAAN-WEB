<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Perpustakaan Darik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('guest/vendors/styles/core.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('guest/vendors/styles/icon-font.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('guest/vendors/styles/style.css')}}" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('admin/images/icon-1.png') }}" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/buku">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    </div>
    @yield('content')
    <script src="{{asset('guest/vendors/scripts/core.js')}}"></script>
    <script src="{{asset('guest/vendors/scripts/script.min.js')}}"></script>
    <script src="{{asset('guest/vendors/scripts/process.js')}}"></script>
    <script src="{{asset('guest/vendors/scripts/layout-settings.js')}}"></script>
</body>

</html>