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
<script>
    const rechercher = document.querySelector(".query")
    const btnSearch = document.querySelector("#button-addon2")
    const genreList = document.querySelector(".genres")
    const options = {
        method: 'GET',
        headers: {
            accept: 'application/json',
            Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2MjU5OTRmYWI5ZDljYmE0ZjU2NzI3NmIwMjdjYzA4NiIsIm5iZiI6MTczNDUzNDU4OS4wNjMsInN1YiI6IjY3NjJlNWJkOGQxY2ZkYzUyMjRhMzQwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hrQwwr_wex6bORJPcA7JdcD0pG7HfhCzPLwPV6xsMRw'
        }
    };

    btnSearch.addEventListener("click", function() {
        genreList.innerHTML = "";
        fetch(`https://api.themoviedb.org/3/search/movie?query=${rechercher.value}&include_adult=false&language=fr&page=1&api_key=625994fab9d9cba4f567276b027cc086`, options)
            .then(res => res.json())
            .then(res => {
                console.log(res);
                for (let i = 0; i <= res.results.length; i++) {
                    const element = res.results[i];
                    console.log(element.original_title);
                    let contenu = document.createElement("a")
                    contenu.innerHTML = element.original_title
                    contenu.href = `./view/movie_view.php?film_id=${element.id}`
                    genreList.appendChild(contenu)
                }
            })
            .catch(err => console.error(err));
    })

    fetch('https://api.themoviedb.org/3/genre/movie/list?language=fr', options)
        .then(res => res.json())
        .then(res => {
            console.log(res)
            for (let i = 0; i < res.genres.length; i++) {
                const genre = res.genres[i].name;
                const genreId = res.genres[i].id;
                let content = document.createElement("a")
                content.innerHTML = genre
                content.href = `./view/films_by_genre.php?genre_id=${genreId}`
                genreList.appendChild(content)
            }
        })
        .catch(err => console.error(err));
</script>
</body>

</html>