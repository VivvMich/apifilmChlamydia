<?php

if (isset($_GET['genre_id'])) {
    $genre_id = $_GET['genre_id'];
    $api_key = '99f201be404368c1e7bbe43792331934';

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1);

    $url = "https://api.themoviedb.org/3/discover/movie?with_genres=" . $genre_id . "&api_key=" . $api_key . "&page=" . $page . "&language=fr";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['results']) && count($data['results']) > 0) {
        $films = $data['results'];
        $total_pages = $data['total_pages'];

        $genre_url = "https://api.themoviedb.org/3/genre/movie/list?api_key=" . $api_key . "&language=fr";
        $genre_response = file_get_contents($genre_url);
        $genre_data = json_decode($genre_response, true);

        $genre_name = '';
        foreach ($genre_data['genres'] as $genre) {
            if ($genre['id'] == $genre_id) {
                $genre_name = $genre['name'];
                break;
            }
        }
    } else {
        $films = [];
        $genre_name = 'Genre non spécifié';
        $total_pages = 1;
        header("Location : ../view/films_by_genre.php");
    }
}
