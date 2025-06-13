@extends('layouts.master')

@section('title', 'Privacy')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sponsoren.css') }}">

<div id="AdCigaContainer">
    <img id="AdCiga" src="{{ asset('images/CigarootsAd.png') }}" alt="Advertentie">
    <div class="adCiga-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia unde blanditiis nobis ratione maxime non laborum aliquid nostrum animi cupiditate saepe optio aperiam expedita excepturi, quas officiis vel pariatur iste.</div>
</div>

<div id="AdPilsContainer">
    <img id="AdPils" src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">
    <div class="adpils-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia unde blanditiis nobis ratione maxime non laborum aliquid nostrum animi cupiditate saepe optio aperiam expedita excepturi, quas officiis vel pariatur iste.</div>
</div>



@endsection