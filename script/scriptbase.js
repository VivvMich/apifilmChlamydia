const search = document.getElementById("search");
const results = document.getElementById("results");
const filmsLink = document.getElementById("filmsLink");
const genreDropdownMenu = document.getElementById("genreDropdownMenu");
let isDropdownVisible = false;
let isGenresLoaded = false;

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
