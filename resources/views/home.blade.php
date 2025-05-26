@extends('layouts.master')

@section('title', 'Home')

@section('content')
<?php
function getRandomShow($maxId = 3000) {
    $tries = 0;
    do {
        $id = rand(1, $maxId);
        $url = "https://api.tvmaze.com/shows/$id";
        $response = @file_get_contents($url);

        if ($response === FALSE) {
            // Fout, probeer een andere ID
            $tries++;
            continue;
        }

        $show = json_decode($response, true);
        if (isset($show['name'])) {
            return $show;
        } else {
            $tries++;
        }
    } while ($tries < 10);

    return null; // Na 10 pogingen geen resultaat
}

$show = getRandomShow();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Random TV Show</title>
    <style>
    #show {
        max-width: 600px;
        min-height: 300px;
        margin: 20px;
        font-family: Arial, sans-serif;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        background-color: lightgray;
        display: flex;
        flex-direction: column; /* Zet naast elkaar */
        align-items: row;
        gap: 20px; /* Ruimte tussen afbeelding en tekst */
    }
    #show img {
        max-width: 220px;
        height: 300px;
        display: block;
        margin-bottom: 0;
        border-radius: 8px;
        object-fit: cover;
    }
    .show-info {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        gap: 10px;
    }
    </style>
</head>
<body>

<div id="show">
    <?php if ($show): ?>
        <!-- <h2><?= htmlspecialchars($show['name']) ?></h2> -->
        <?php if (isset($show['image']['medium'])): ?>
            <img src="<?= htmlspecialchars($show['image']['medium']) ?>" alt="<?= htmlspecialchars($show['name']) ?>">
        <?php endif; ?>
        <p><strong>Titel:</strong><?= htmlspecialchars($show['name']) ?>
        <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show['genres'])) ?></p>
        <p><strong>Rating:</strong> <?= htmlspecialchars($show['rating']['average'] ?? 'N.v.t.') ?></p>
        <!-- Beschrijving is verwijderd -->
    <?php else: ?>
        <p>Kon geen serie laden, probeer het opnieuw.</p>
    <?php endif; ?>
</div>

</body>
</html>


<?php
$url = "https://api.tvmaze.com/shows";

$response = file_get_contents($url);

if ($response === FALSE) {
    die("Kon geen data ophalen van de API.");
}

$shows = json_decode($response, true);

if ($shows === NULL) {
    die("Kon JSON niet decoderen.");
}

usort($shows, function($a, $b) {
    $ratingA = $a['rating']['average'] ?? 0;
    $ratingB = $b['rating']['average'] ?? 0;
    return $ratingB <=> $ratingA;
});

$top10 = array_slice($shows, 0, 10);
?>

<style>
  body {
    font-family: Arial, sans-serif;
  }
  .scroll-wrapper {
    position: relative;
    width: 90%; 
    margin: 20px auto;
    margin-top: 20px;
  }
  .scroll-container {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    gap: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: lightgray;
  }
  .scroll-container::-webkit-scrollbar {
    height: 8px;
  }
  .scroll-container::-webkit-scrollbar-thumb {
    background-color: #aaa;
    border-radius: 4px;
  }
  .show {
    flex: 0 0 auto;
    width: 180px;
    border: 1px solid #ddd;
    box-shadow: 2px 2px 6px #ccc;
    padding: 10px;
    text-align: center;
    border-radius: 6px;
    background: #fff;
  }
  .show img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
  }
  .rating {
    margin-top: 8px;
    font-weight: bold;
    color: #333;
  }
  
  .scroll-btn {
    position: absolute;
    top: 10px; 
    height: 300px; 
    width: 40px;
    background: rgb(245, 197, 24);
    box-shadow: 0 0px 25px rgb(245, 197, 24);
    border: none;
    color: white;
    font-size: 30px;
    cursor: pointer;
    border-radius: 6px;
    opacity: 0.8;
    transition: opacity 0.3s;
    user-select: none;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .scroll-btn:hover {
    opacity: 1;
  }
  .scroll-left {
    left: -50px;
  }
  .scroll-right {
    right: -50px;
  }
</style>

<div class="scroll-wrapper">
  <button class="scroll-btn scroll-left" onclick="scrollShows(-200)" aria-label="Scroll naar links">&#8592;</button>
  <div class="scroll-container" id="scrollContainer">
    <?php
    foreach ($top10 as $show) {
        $image = $show['image']['medium'] ?? 'https://via.placeholder.com/180x250?text=Geen+afbeelding';
        $rating = $show['rating']['average'] ?? 'N.v.t.';
        echo '<div class="show">';
        echo '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($show['name']) . '">';
        echo '<div class="rating">Rating: ' . htmlspecialchars($rating) . '</div>';
        echo '</div>';
    }
    ?>
  </div>
  <button class="scroll-btn scroll-right" onclick="scrollShows(200)" aria-label="Scroll naar rechts">&#8594;</button>
</div>

<script>
  function scrollShows(distance) {
    const container = document.getElementById('scrollContainer');
    container.scrollBy({ left: distance, behavior: 'smooth' });
  }
</script>



@endsection