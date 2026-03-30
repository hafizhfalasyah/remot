<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <!-- Link to Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>ReMot | Rental Motor Website</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
</head>
<body>
    <!-- Navbar -->
    <header>
        <a href="http://localhost:8000/home" class="logo"><img  class="logo" src="{{ url('/img/logo.png') }}"></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#rent">Sewa</a></li>
            <li><a href="#motors">Motor</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
        <style>
            .nv {
                display: flex;
                align-items: center;
            }
            .user {
                margin-right: -5px;
            }
            .log {
                display: inline-block;
                background-color: #dc3545;
                color: #fff;
                border-radius: 20px;
                text-decoration: none;
                font-size: 14px;
                line-height: 1.5;
                transition: background-color 0.3s ease;
            }

            .log:hover {
                background-color: #c82333;
            }
            .sign-up:hover {
                color: #6CA6CD;
            }
        </style>
        <div class="header-btn">
            <ul>
                @guest
                    @if (Route::has('register'))
                        <a href="{{ route('login') }}" class="sign-up">Daftar</a>
                    @endif

                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="sign-in">Masuk</a>
                    @endif
                    @else
                        <li class="nv">
                            <a id="user" class="user" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class='bx bxs-user' ></i>
                                {{ Auth::user()->name }}
                            </a>

                            <a class="log" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class='bx bxs-log-out-circle' ></i>
                                {{ __('Keluar') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                @endguest
            </ul>
        </div>
    </header>

    <!-- Content -->
    @yield('content')

    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Link to JS -->
    <script src="{{ asset('/js/main.js') }}"></script>
    {{-- <script src="/js/main.js"></script> --}}

