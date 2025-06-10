@extends('layouts.master')

@section('title', 'Privacy')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/Registreer.css') }}">

        <title>Login Pagina</title>
        <div id="AdWrapper">
            <img id="AdPilsL" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">

            <div id="loginForm">
                <h1>Registreer</h1>
                <input type="text" id="username" placeholder="naam">
                <br><br>
                <input type="text" id="email" placeholder="Email">
                <br><br>
                <input type="password" id="password" placeholder="Wachtwoord" onkeyup="passwordCheck()">
                <br><br>
                <button onclick="login()" id="LoginButton">Login</button>
                <br>
                <p>Heeft u nog geen account klik hier onder</p>
                &rarr; <button onclick="Registeer()" id="RegisterButton">Registeer</button> &larr;
            </div>

            <img id="AdPilsR" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">
        </div>

        </div>

    </head>

    <body>

    </body>

    </html>
@endsection