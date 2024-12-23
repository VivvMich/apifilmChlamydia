<?php session_start();
include "../controller/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../style/css/style.css">
    <script defer src="../script/scriptbase.js"></script>

    <title>Scroll Movies</title>
</head>
<body>

<nav class="navbar bg-dark border-bottom border-body navbar-expand-lg sticky-lg-top" data-bs-theme="dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="view/homepage.php">Scroll Movies</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll liste-nav" style="--bs-scroll-height: 200px;">
        <li class="nav-item">
          <a class="nav-link text-primary" href="view/films.php">FILMS</a>
        </li>
        <li class="nav-item dropdown" id="filmsDropdown">
          <a class="nav-link text-primary dropdown-toggle" id="filmsLink" role="button" aria-expanded="false">
            CATÉGORIES
          </a>
          <ul class="dropdown-menu" aria-labelledby="filmsLink" id="genreDropdownMenu">
          </ul>
        </li>
      </ul>
        <div class="me-auto w-50">
            <input class="form-control me-2 my-1 text-center recherche" type="search" placeholder="Recherchez un film..." aria-label="Search" id="search">   
            <ul class="list-group mt-2" id="results">

            </ul>     
        </div>

        <ul class="navbar-nav me-end my-2 my-lg-0 navbar-nav-scroll liste-nav" style="--bs-scroll-height: 200px;">
        <?php if(!isset($_SESSION['name'])){ ?>
        <li class="nav-item">
          <a class="nav-link text-primary" href="view/login.php">Connexion</a>
        </li>
        <?php }else{ ?>
          <li class="nav-item">
          <a class="nav-link text-primary" href="controller/logout.php">Déconnexion</a>
        </li>
        <?php } ?>

        <li class="nav-item">
          <?php if(!isset($_SESSION['name'])){ ?>
          <a class="nav-link text-primary" href="view/form.php">S'inscrire</a>
        </li>
        <?php }else{ ?>
          <a class="nav-link text-primary" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
            <?=$_SESSION['name']?>
          </a>
        </ul>
        <?php }?>
    </div>
  </div>
</nav>


