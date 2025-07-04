@extends('layouts.master')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/favouritesAdd.css') }}">

@endsection

@section('content')


<a href="{{ url('/sponsoren') }}" class="ad-side" id="BietnPilsL">
    <img src="{{ asset('images/Bietn_Pils.png') }}" alt="Bietn Pils Advertentie" style="width: 100%; height: auto;">
</a>

<div id="pageContainer">
    <h1 id="AddedText">Serie toegevoegd aan favorieten!</h1>
    <a href="{{ url('/favourites') }}" id="BackToListButton">Terug naar mijn lijst</a>
</div>

<div style="width: 100%; display: flex; justify-content: center; margin-top: 40px;">
    <a href="{{ url('/sponsoren') }}">
        <img id="CigarootsAd" src="{{ asset('images/CigarootsAd.png') }}" alt="Cigaroots Advertentie">
    </a>
</div>


<a href="{{ url('/sponsoren') }}" class="ad-side" id="BietnPilsR">
    <img src="{{ asset('images/Bietn_Pils.png') }}" alt="Bietn Pils Advertentie" style="width: 100%; height: auto;">
</a>
@endsection