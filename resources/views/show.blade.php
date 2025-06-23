@extends('layouts.master')

@section('title', 'Zoekresultaat')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <?php
    $show = null;
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        $url = "https://api.tvmaze.com/shows/$id?embed[]=seasons&embed[]=episodes";
        $response = @file_get_contents($url);
        if ($response !== FALSE) {
            $show = json_decode($response, true);
        }
    } elseif (isset($_GET['q']) && !empty(trim($_GET['q']))) {
        $query = urlencode($_GET['q']);
        $url = "https://api.tvmaze.com/singlesearch/shows?q=$query";
        $response = @file_get_contents($url);
        if ($response !== FALSE) {
            $show = json_decode($response, true);
        }
    }
                ?>
    <div id="show">
        <?php if ($show): ?>
        <?php
        $seasons = isset($show['_embedded']['seasons']) ? count($show['_embedded']['seasons']) : 'N.v.t.';
        $episodes = isset($show['_embedded']['episodes']) ? count($show['_embedded']['episodes']) : 'N.v.t.';
            ?>
        <?php    if (isset($show['image']['medium'])): ?>
        <img src="<?= htmlspecialchars($show['image']['medium']) ?>" alt="<?= htmlspecialchars($show['name']) ?>">
        <?php    endif; ?>
        <div class="show-info">
            <p><strong>Titel:</strong> <?= htmlspecialchars($show['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show['rating']['average'] ?? 'N.v.t.') ?></p>
            <p><strong>Seizoenen:</strong> <?= $seasons ?></p>
            <p><strong>Afleveringen:</strong> <?= $episodes ?></p>
        </div>
        <?php
        $youtubeSearch = 'https://www.youtube.com/results?search_query=' . urlencode($show['name'] . ' trailer');
                        ?>
                        <div>
        <div class="trailer-link" style="margin-top:18px;">
            <a href="<?= $youtubeSearch ?>" target="_blank" rel="noopener">
                Bekijk trailer op YouTube
            </a>
        </div>


        
        @auth   
        <a href="{{ url('favouritesadd/' . $show['id']) }}" class="favoButton" >Toevoegen aan Lijst </a>
        
        @else
        <p style="margin-top: 18px;">Log in om deze serie aan je favorieten toe te voegen.</p>
        @endauth    
        <?php else: ?>
        <p>Geen resultaten gevonden voor deze titel.</p>
        <?php endif; ?>
        </div>
    </div>

    <?php if ($show && !empty($show['summary'])): ?>
    <div class="show-description">
        <p><strong>Beschrijving:</strong> <?= strip_tags($show['summary']) ?></p>
    </div>
    <?php endif; ?>
@endsection