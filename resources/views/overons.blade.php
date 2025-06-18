@extends('layouts.master')

@section('title', 'Over ons')

@section('content')
<link rel="stylesheet" href="{{ asset('css/OverOns.css') }}">

<!-- Place these OUTSIDE of #AdWrapper and any other container -->
<a href="{{ url('/sponsoren') }}" id="BietnPilsL">
    <img src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">
</a>
<a href="{{ url('/sponsoren') }}" id="BietnPilsR">
    <img src="{{ asset('images/Bietn_Pils.png') }}" alt="Advertentie">
</a>

<div id="AdWrapper">
    <div id="OverOnsContainer">
        <div id="OverOnsBlok1">
            <h1>Over Ons</h1>
        </div>
        <div id="OverOnsBlok2">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatum qui voluptates voluptatem
                quas, quo ab iste doloremque voluptate numquam facilis esse maiores hic minima, non necessitatibus
                corrupti temporibus pariatur!</p>
        </div>
    </div>

    <div id="PrivacyContainer">
        <div id="PrivacyBlok1">
            <h1>Privacy</h1>
        </div>
        <div id="PrivacyBlok2">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatum qui voluptates voluptatem
                quas, quo ab iste doloremque voluptate numquam facilis esse maiores hic minima, non necessitatibus
                corrupti temporibus pariatur!</p>
        </div>
    </div>

    <div id="AdCigaContainer">
        <a href="{{ url('/sponsoren') }}">
            <img id="AdCiga" src="{{ asset('images/CigarootsAd.png') }}" alt="Advertentie">
        </a>
    </div>
</div>


@endsection