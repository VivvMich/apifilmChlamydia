const search = document.getElementById("search");
const results = document.getElementById("results");
const filmsLink = document.getElementById("filmsLink");
const genreDropdownMenu = document.getElementById("genreDropdownMenu");
const rechercher = document.querySelector(".query");
const btnSearch = document.querySelector("#button-addon2");
const genreList = document.querySelector(".genres");
const options = {
  method: "GET",
  headers: {
    accept: "application/json",
    Authorization:
      "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2MjU5OTRmYWI5ZDljYmE0ZjU2NzI3NmIwMjdjYzA4NiIsIm5iZiI6MTczNDUzNDU4OS4wNjMsInN1YiI6IjY3NjJlNWJkOGQxY2ZkYzUyMjRhMzQwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hrQwwr_wex6bORJPcA7JdcD0pG7HfhCzPLwPV6xsMRw",
  },
};
let isDropdownVisible = false;
let isGenresLoaded = false;

btnSearch.addEventListener("click", function () {
  genreList.innerHTML = "";
  fetch(
    `https://api.themoviedb.org/3/search/movie?query=${rechercher.value}&include_adult=false&language=fr&page=1&api_key=625994fab9d9cba4f567276b027cc086`,
    options
  )
    .then((res) => res.json())
    .then((res) => {
      console.log(res);
      for (let i = 0; i <= res.results.length; i++) {
        const element = res.results[i];
        console.log(element.original_title);
        let contenu = document.createElement("a");
        contenu.innerHTML = element.original_title;
        contenu.href = `./view/movie_view.php?film_id=${element.id}`;
        genreList.appendChild(contenu);
      }
    })
    .catch((err) => console.error(err));
});

fetch("https://api.themoviedb.org/3/genre/movie/list?language=fr", options)
  .then((res) => res.json())
  .then((res) => {
    console.log(res);
    for (let i = 0; i < res.genres.length; i++) {
      const genre = res.genres[i].name;
      const genreId = res.genres[i].id;
      let content = document.createElement("a");
      content.innerHTML = genre;
      content.href = `./view/films_by_genre.php?genre_id=${genreId}`;
      genreList.appendChild(content);
    }
  })
  .catch((err) => console.error(err));

search.addEventListener("input", function () {
  let v = this.value;
  fetch(
    `https://api.themoviedb.org/3/search/movie?query=${v}&include_adult=false&language=fr-FR&page=1&api_key=2503d00d549b6a52558ef4eeffabb642`
  )
    .then((response) => response.json())
    .then((movies) => {
      let res = movies.results;
      results.innerHTML = "";
      for (el of res) {
        const li = document.createElement("li");
        li.classList.add("list-group-item", "search-list");
        li.innerHTML = el.title;
        li.addEventListener("click", () => {
          window.location.href = `movie_view.php&id=${el.id}`;
        });
        console.log(li);
        results.appendChild(li);
      }
    })
    .catch((err) => console.error(err));
});

filmsLink.addEventListener("click", function (event) {
  event.preventDefault();
  if (isDropdownVisible) {
    genreDropdownMenu.style.display = "none";
    isDropdownVisible = false;
  } else {
    if (!isGenresLoaded) {
      fetch("controller/get_genres.php")
        .then((response) => response.json())
        .then((data) => {
          genreDropdownMenu.innerHTML = "";
          data.forEach((genre) => {
            const li = document.createElement("li");
            const a = document.createElement("a");
            a.classList.add("dropdown-item");
            a.href = `../view/films_by_genre.php?genre_id=${genre.id}`;
            a.textContent = genre.name;
            li.appendChild(a);
            genreDropdownMenu.appendChild(li);
          });
          isGenresLoaded = true;
          genreDropdownMenu.style.display = "block";
        })
        .catch((error) => {
          console.error("Erreur lors de la récupération des genres:", error);
        });
    } else {
      genreDropdownMenu.style.display = "block";
    }
    isDropdownVisible = true;
  }
});

document.addEventListener("click", function (event) {
  if (
    !filmsLink.contains(event.target) &&
    !genreDropdownMenu.contains(event.target)
  ) {
    if (isDropdownVisible) {
      genreDropdownMenu.style.display = "none";
      isDropdownVisible = false;
    }
  }
});
