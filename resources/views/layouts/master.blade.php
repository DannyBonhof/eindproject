<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMBD</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    @yield('styles')
</head>

<body>
    <header>
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo_eindproject_noBG.png') }}" alt="Logo"
                    style="height:150px; width:150px;">
            </a>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Menu &#9662;</button>
            <div class="dropdown-content">
                <a href="{{ url('sponsoren') }}">Sponsoren</a>
            </div>
        </div>
        <form class="searchbar" action="{{ route('show') }}" method="get">
            <input type="text" placeholder="Zoeken..." name="q" value="{{ request('q') }}">
            <button type="submit">Zoek</button>
        </form>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('about') }}">Over ons</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/series') }}">Series</a></li>

            </ul>
        </nav>

    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; Biet'n inc</p>
    </footer>
</body>

</html>