<?php
$apiKey = '99f201be404368c1e7bbe43792331934';

$url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=' . $apiKey . '&language=fr-FR';

$response = file_get_contents($url);

if ($response) {
    $data = json_decode($response, true);
    $genres = $data['genres'];

    echo json_encode($genres);
} else {
    echo json_encode(['error' => 'Impossible de récupérer les genres de films.']);
}
?>
