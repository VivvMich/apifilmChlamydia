<?php
include "base.php"; 
include "../controller/movie_controller.php";
?>

<div class="container mx-auto p-4 mt-2">
    <div class="row">
        <h1 class="text-center col-12 mb-4"><?= $film_data['title']; ?></h1>

        <div class="d-flex flex-column flex-md-row">
            <div class="mx-3 mb-3">
                <?php if ($film_data['poster_path']): ?>
                    <img src="https://image.tmdb.org/t/p/w500<?= $film_data['poster_path']; ?>" alt="<?= $film_data['title']; ?>" class="img-fluid">
                <?php else: ?>
                    <img src="https://placehold.co/600x600" alt="Jacket du film" class="img-fluid">
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6">
                <div class="mx-3">
                    <div class="my-5">
                        <h2>Genres</h2>
                        <ul class="list-group list-group-horizontal flex-wrap">
                            <?php
                            foreach ($film_data['genres'] as $genre) {
                                echo '<li class="list-group-item">' . $genre['name'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="my-5">
                        <h2>Acteurs principaux</h2>
                        <ul class="list-group list-group-horizontal flex-wrap">
                            <?php if (!empty($film_data['actors'])): ?>
                                <?php foreach ($film_data['actors'] as $actor): ?>
                                    <li class="list-group-item">
                                        <?php if ($actor['profile_path']): ?>
                                            <img src="https://image.tmdb.org/t/p/w92<?= $actor['profile_path']; ?>" alt="<?= $actor['name']; ?>" class="img-fluid" style="width: 50px; height: 75px;">
                                        <?php else: ?>
                                            <span>Aucune image disponible</span>
                                        <?php endif; ?>
                                        <?= $actor['name']; ?> (<?= $actor['character']; ?>)
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Aucun acteur trouvé.</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="my-5">
                        <h2>Synopsis</h2>
                        <p><?= $film_data['overview']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
