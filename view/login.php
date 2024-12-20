
<?php
include "base.php";
?>
<div class="container col-xxl-6 col-md-9 col-12 mx-auto p-4 p-xl-5 mt-5 my-5">

    <h1 class='text-center dm-serif-display-regular mb-4'>Connexion</h1>

    <form class="row g-3" action="../controller/login_controller.php" method="POST">
        <div class="mb-3">
            <label for="user_mail" class="form-label">Email</label>
            <input name="user_mail" type="email" class="form-control" required>
        </div>

        <div class="mb-5">
            <label for="user_psw" class="form-label">Mot de passe</label>
            <input name="user_psw" type="password"class="form-control" required>
        </div>

        <div class="text-center my-2">
                <button type="submit" class="btn btn-prim py-1 px-4">Se connecter</button>
        </div>

        <div class="text-center">
            <?php
            include "message.php";
            ?>
        </div>

    </form>
</div>

<?php 
include "footer.php";
?>
