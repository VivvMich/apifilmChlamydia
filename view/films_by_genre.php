<?php
include "base.php"; 
include "../controller/films_by_genre_controller.php";
?>

<h1 class="text-center my-4"><?= $genre_name; ?></h1>

<?php

if (!empty($films)) {
    echo "<div class='container'><div class='row'>";
    
    foreach ($films as $film) {
        ?>
        <div class="col-12 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <?php if (isset($film['poster_path'])): ?>
                    <img src="https://image.tmdb.org/t/p/w500<?= $film['poster_path']; ?>" class="card-img-top" alt="<?= $film['title']; ?>">
                <?php endif; ?>
                
                <div class="card-body">
                    <h5 class="card-title"><?= $film['title']; ?></h5>
                    <p class="card-text"><?= substr($film['overview'], 0, 200); ?>...</p>
                    <p class="card-text"><strong>Note:</strong> <?= $film['vote_average']; ?>/10</p>
                </div>
                
                <div class="card-footer text-muted">
                    <a href="movie_view.php?film_id=<?= $film['id']; ?>" class="btn button-cool">Voir plus</a>
                </div>
            </div>
        </div>
        <?php
    }
    
    echo "</div></div>";

    if (isset($total_pages) && isset($page)) {
        ?>
        <div class="d-flex justify-content-center my-4">
            <?php if ($page > 1): ?>
                <a href="films_by_genre.php?genre_id=<?= $genre_id; ?>&page=<?= $page - 1; ?>" class="btn button-cool mx-2">Précédent</a>
            <?php endif; ?>
            
            <?php 
            for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): 
                $active_class = ($i == $page) ? 'active' : ''; 
            ?>
                <a href="films_by_genre.php?genre_id=<?= $genre_id; ?>&page=<?= $i; ?>" class="btn button-cool mx-2 <?= $active_class; ?>"><?= $i; ?></a>
            <?php endfor; ?>
            
            <?php if ($page < $total_pages): ?>
                <a href="films_by_genre.php?genre_id=<?= $genre_id; ?>&page=<?= $page + 1; ?>" class="btn button-cool mx-2">Suivant</a>
            <?php endif; ?>
        </div>
        <?php
    }
} else {
    echo "<p class='text-center'>Aucun film trouvé pour ce genre.</p>";
}

include "footer.php";
?>
