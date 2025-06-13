@extends('layouts.master')

@section('title', 'Uitloggen')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
@endsection

@section('content')
    <div style="text-align:center; margin-top:50px;">
        <h1>Uitloggen</h1>
        <p>Weet je zeker dat je wilt uitloggen?</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Uitloggen</button>
        </form>
        <br>
        <a href="{{ url('/') }}">Annuleren en terug naar Home</a>
    </div>
@endsection
