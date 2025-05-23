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
        <p>Footer</p>
    </footer>
</body>
</html>
