<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/style.css">
    <title>Inscription</title>
</head>

<body>
    <div class="container col-xxl-6 col-md-9 col-12 mx-auto p-4 p-xl-5 mt-5">
        <h1 class='text-center dm-serif-display-regular mb-4'>Inscription</h1>
        <form class="row g-3"
            action="../controller/add_user_controller.php"
            method="post"
            enctype="multipart/form-data">
            <div class="col-12">
                <label for="mail" class="form-label">Email</label>
                <input name="mail"
                    type="email"
                    class="form-control"
                    placeholder="votremail@ceformat.com"
                    required>
            </div>
            <div class="col-md-8">
                <label for="name" class="form-label">Nom d'utilisateur</label>
                <input name="name"
                    minlength="3"
                    maxlength="20"
                    pattern="\w+"
                    type="text"
                    class="form-control"
                    placeholder="Caractères alphanumériques uniquement"
                    title="Caractères alphanumériques uniquement / Pas de caractères spéciaux"
                    required>
            </div>
            <div class="col-md-4">
                <label for="birthdate" class="form-label">Date de Naissance</label>
                <input name="birthdate"
                    type="date"
                    class="form-control"
                    required>
            </div>
            <div class="col-md-6">
                <label for="psw1" class="form-label">Mot de passe</label>
                <input name="psw1"
                    type="password"
                    class="form-control"
                    required>
            </div>
            <div class="col-md-6">
                <label for="psw2" class="form-label">Confirmer le mot de passe</label>
                <input name="psw2"
                    type="password"
                    class="form-control"
                    required>
            </div>
            <div class="col-4 mt-4">
                <button type="submit" class="btn-prim py-1 px-4">S'inscrire</button>
            </div>
            <div class="col-7">
                <?php
                include "message.php";
                ?>
            </div>
        </form>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'>
    </script>
</body>

</html>