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
                <div class="mx-3 mt-2">
                    <h3>Langue originale du film</h3>
                    <p><?= strtoupper($film_data['original_language']); ?></p> 
                </div>
                <div class="mx-3">
                    <div class="my-2">
                        <h3>Genres</h3>
                        <ul class="list-group list-group-horizontal flex-wrap">
                            <?php
                            foreach ($film_data['genres'] as $genre) {
                                echo '<li class="list-group-item">' . $genre['name'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="my-5">
                        <h3>Synopsis</h3>
                        <p><?= $film_data['overview']; ?></p>
                    </div>
                    <div class="my-1">
                        <h3>Note moyenne</h3>
                        <p><?= $film_data['vote_average']; ?>/10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
