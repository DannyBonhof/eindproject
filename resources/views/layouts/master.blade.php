<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standaard Homepagina</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo_eindproject_noBG.png') }}" alt="Logo" style="height:150px; width:150px;">
            </a>
        </div>
            <div class="dropdown">
        <button class="dropbtn">Menu &#9662;</button>
        <div class="dropdown-content">
            <a href="{{ route('sponsoren') }}">Sponsoren</a>
        </div>
    </div>
        <form class="searchbar" action="#" method="get">
            <input type="text" placeholder="Zoeken..." name="q">
            <button type="submit">Zoek</button>
        </form>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('series') }}">Series</a></li>
                <li><a href="{{ route('overons') }}">Over ons</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
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