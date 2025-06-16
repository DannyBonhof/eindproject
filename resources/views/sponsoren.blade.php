@extends('layouts.master')

@section('title', 'Privacy')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sponsoren.css') }}">

<div id="AdCigaContainer">
    <img id="AdCiga" src="{{ asset('images/CigarootsAd.png') }}" alt="Advertentie">
    <div class="adCiga-text">Poahhh donders lekker dit, dit moet u niet vergeten dit kan veelste gevoarlijk rook met mate of het gevaorlijk. Maor dit is wel de beste peuk die je kan halen.</div>
</div>

<div id="AdPilsContainer">
    <img id="AdPils" src="{{ asset(path: 'images/Bietn_Pils.png') }}" alt="Advertentie">
    <div class="adpils-text">Poahhh donders lekker dit, dit kan wel eens de beste pils zien de je kan halen gemaokt van machtige Bietn maokt dit de beste pilsener.</div>
</div>



@endsection