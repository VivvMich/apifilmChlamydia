<?php

if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
    $api_key = '99f201be404368c1e7bbe43792331934';

    $url = "https://api.themoviedb.org/3/movie/" . $film_id . "?api_key=" . $api_key . "&language=fr";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $response = curl_exec($ch);

    curl_close($ch);
    $film_details = json_decode($response, true);

    if ($film_details) {
        $original_language = $film_details['original_language'];
        $title = $film_details['title'];
        $poster_path = $film_details['poster_path'];
        $vote_average = $film_details['vote_average'];
        $genres = $film_details['genres'];
        $overview = $film_details['overview'];

        $credits_url = "https://api.themoviedb.org/3/movie/" . $film_id . "/credits?api_key=" . $api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $credits_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        $credits_response = curl_exec($ch);
        curl_close($ch);

        $credits_data = json_decode($credits_response, true);

        $film_data = [
            'original_language' => $original_language,
            'title' => $title,
            'poster_path' => $poster_path,
            'vote_average' => $vote_average,
            'genres' => $genres,
            'overview' => $overview,
        ];
    } else {
        echo "Film non trouvé.";
    }
} else {
    echo "Aucun film sélectionné.";
}
?>
