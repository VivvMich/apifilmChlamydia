<?php
include "base.php";
?>
<div class="container col-xxl-6 col-md-9 col-12 mx-auto p-4 p-xl-5 mt-5">
    <h1 class='text-center dm-serif-display-regular mb-4 title'>Bienvenue à Scroll Movies</h1>
    <div class="input-group mb-5">
        <input type="text"
            class="form-control query recherche"
            placeholder="Titre du film ?" aria-label="search" aria-describedby="button-addon2">
        <button class="px-4 btn btn-primary" type="button" id="button-addon2">Rechercher</button>
    </div>
    <h4 class="py-3">Parcourir les films par genres :</h4>
    <div class="genres d-flex flex-column align-items-center border">
    </div>

</div>
<?php
include "footer.php";
?>