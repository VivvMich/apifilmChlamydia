<?php

if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
    $api_key = '99f201be404368c1e7bbe43792331934';

    $url = "https://api.themoviedb.org/3/movie/" . $film_id . "?api_key=" . $api_key . "&language=fr";
    $response = file_get_contents($url);
    $film_details = json_decode($response, true);

    if ($film_details) {
        $original_language = $film_details['original_language'];
        $title = $film_details['title'];
        $poster_path = $film_details['poster_path'];
        $vote_average = $film_details['vote_average'];
        $genres = $film_details['genres'];
        $overview = $film_details['overview'];

        $credits_url = "https://api.themoviedb.org/3/movie/" . $film_id . "/credits?api_key=" . $api_key;
        $credits_response = file_get_contents($credits_url);
        $credits_data = json_decode($credits_response, true);

        if ($credits_data && isset($credits_data['cast'])) {
            $actors = array_slice($credits_data['cast'], 0, 5);
        } else {
            $actors = [];
        }

        $film_data = [
            'original_language' => $original_language,
            'title' => $title,
            'poster_path' => $poster_path,
            'vote_average' => $vote_average,
            'genres' => $genres,
            'overview' => $overview,
            'actors' => $actors
        ];
    } else {
        echo "Film non trouvé.";
    }
} else {
    echo "Aucun film sélectionné.";
}
?>
