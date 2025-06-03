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
    $url = "https://api.tvmaze.com/shows/$id";
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
        <?php if (isset($show['image']['medium'])): ?>
            <img src="<?= htmlspecialchars($show['image']['medium']) ?>" alt="<?= htmlspecialchars($show['name']) ?>">
        <?php endif; ?>
        <div class="show-info">
            <p><strong>Titel:</strong> <?= htmlspecialchars($show['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show['rating']['average'] ?? 'N.v.t.') ?></p>
        </div>
    <?php else: ?>
        <p>Geen resultaten gevonden voor deze titel.</p>
    <?php endif; ?>
</div>

<?php if ($show && !empty($show['summary'])): ?>
    <div class="show-description">
        <p><strong>Beschrijving:</strong> <?= strip_tags($show['summary']) ?></p>
    </div>
<?php endif; ?>
@endsection