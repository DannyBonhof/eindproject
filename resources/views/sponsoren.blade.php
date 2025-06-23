@extends('layouts.master')

@section('title', 'Privacy')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sponsoren.css') }}">

<div id="AdCigaContainer">
    <img id="AdCiga" src="{{ asset('images/CigarootsAd.png') }}" alt="Advertentie">
    <div class="adCiga-text">Poahhh, donderjend lekker dit, dit moatst net ferjitte – dit kin fierste gefaarlik wêze, smoke mei mate of it wurdt gefaarlik. Mar dit is wol de bêste sigret dy’tst krije kinst.</div>
</div>

<div id="AdPilsContainer">
    <img id="AdPils" src="{{ asset(path: 'images/Bietn_Pils.png') }}" alt="Advertentie">
    <div class="adpils-text">Poahhh, donderjend lekker dit, dit kin samar it bêste pils wêze datst krije kinst – makke fan machtige bieten makket dit it bêste pilske.</div>
</div>



@endsection