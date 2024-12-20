<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/style.css">
    <title>Scroll Movies</title>
</head>

<body>
    <div class="container col-xxl-6 col-md-9 col-12 mx-auto p-4 p-xl-5 mt-5">
        <h1 class='text-center dm-serif-display-regular mb-4 title'>Bienvenue à Scroll Movies</h1>
        <div class="input-group mb-3">
            <input type="text"
                class="form-control query"
                placeholder="Titre du film ?" aria-label="search" aria-describedby="button-addon2">
            <button class="px-4" type="button" id="button-addon2">Rechercher</button>
        </div>

    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'>
    </script>
    <script>
        const search = document.querySelector(".query")
        const btnSearch = document.querySelector("#button-addon2")

        btnSearch.addEventListener("click", function() {
            const options = {
                method: 'GET',
                headers: {
                    accept: 'application/json',
                    Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2MjU5OTRmYWI5ZDljYmE0ZjU2NzI3NmIwMjdjYzA4NiIsIm5iZiI6MTczNDUzNDU4OS4wNjMsInN1YiI6IjY3NjJlNWJkOGQxY2ZkYzUyMjRhMzQwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hrQwwr_wex6bORJPcA7JdcD0pG7HfhCzPLwPV6xsMRw'
                }
            };
            fetch(`https://api.themoviedb.org/3/search/movie?query=${search.value}&include_adult=false&page=1&api_key=625994fab9d9cba4f567276b027cc086`, options)
                .then(res => res.json())
                .then(res => {
                    console.log(res);
                    for (let i = 0; i < res.results.length; i++) {
                        const element = res.results[i];
                        console.log(element.original_title);
                    }
                })
                .catch(err => console.error(err));
        })
    </script>
</body>

</html>