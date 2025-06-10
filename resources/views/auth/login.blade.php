@extends('layouts.master')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
@endsection

@section('content')
<div id="AdWrapper">
    <img id="AdPilsL" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">

    <div id="loginForm">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <br><br>
            <input type="password" name="password" placeholder="Wachtwoord" required>
            <br><br>
            <button type="submit" id="LoginButton">Login</button>
        </form>
        <br>
        <p>Heeft u nog geen account? klik hier onder</p>
        &rarr; <a href="{{ route('register') }}" id="RegisterButton" class="register-link">Register</a> &larr;
    </div>

    <img id="AdPilsR" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">
</div>
@endsection
