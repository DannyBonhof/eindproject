@extends('layouts.master')

@section('title', 'Registreer')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Register.css') }}">


@section('content')
<div id="AdWrapper">
    <img id="AdPilsL" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">

    <div id="loginForm">
        <h1>Registreer</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Naam" required>
            <br><br>
            <input type="email" name="email" placeholder="Email" required>
            <br><br>
            <input type="password" name="password" placeholder="Wachtwoord" required>
            <br><br>
            <input type="password" name="password_confirmation" placeholder="Herhaal wachtwoord" required>
            <br><br>
            <button type="submit" id="RegisterButton">Registreer</button>
        </form>
        <br>
        <p>Wel een account? klik hier onder</p>
        &rarr; <a href="{{ route('login') }}" id="LoginButton" class="login-link">Login</a> &larr;
    </div>

    <img id="AdPilsR" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">
</div>
@endsection