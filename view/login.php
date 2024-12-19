<?php
include "base.php"
?>

<div class="container-fluid">
    <div class="container col-xl-9 col-xxl-8 col-12 col-md-10  mx-auto p-4 p-xl-5 mt-5">

        <h1 class="text-center mb-4 title">Se connecter</h1>

        <form class="w-25 mx-auto" action="../controller/login_controller.php" method="POST">

            <label class="form-label" for="user_mail">Email de connexion</label>
            <input type="mail" class="form-control" name="user_mail">

            <label class="form-label" for="user_psw">Mot de passe</label>
            <input class="form-control" type="password" name="user_psw">

            <div class="text-center my-4">
                <input class="btn btn-primary" type="submit" value="Connexion">
            </div>
            
        </form>
    <div>
</div>

</body>
</html>