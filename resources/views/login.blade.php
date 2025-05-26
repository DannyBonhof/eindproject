@extends('layouts.master')

@section('title', 'Privacy')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ asset('css/Login.css') }}">

    <title>Login Pagina</title>
    <div id="AdContainer">
        <img id="AdPilsL" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertensie">
        <img id="AdPilsR" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertensie">
    </div>
    <div id="loginForm">
        <h1>Login</h1>

        <input type="text" id="username" placeholder="naam">
            <br><br>
        <input type="password" id="password" placeholder="Wachtwoord" onkeyup="passwordCheck()">
            <br><br>
        <button onclick="login()">Login</button>
        <button onclick="Registeer()">Registeer</button>
        
    </div>

</head>
<body>
    
</body>
</html>
@endsection