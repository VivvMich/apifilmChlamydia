const filmsLink = document.getElementById('filmsLink');
const genreDropdownMenu = document.getElementById('genreDropdownMenu');
let isDropdownVisible = false;
let isGenresLoaded = false;

filmsLink.addEventListener('click', function(event) {
  event.preventDefault();

  if (isDropdownVisible) {
    genreDropdownMenu.style.display = 'none';
    isDropdownVisible = false;
  } else {
    if (!isGenresLoaded) {
      fetch('../controller/get_genres.php')
        .then(response => response.json())
        .then(data => {
          genreDropdownMenu.innerHTML = '';
          data.forEach(genre => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.classList.add('dropdown-item');
            a.href = `../view/films_by_genre.php?genre_id=${genre.id}`;
            a.textContent = genre.name;
            li.appendChild(a);
            genreDropdownMenu.appendChild(li);
          });

          isGenresLoaded = true;
          genreDropdownMenu.style.display = 'block';
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des genres:', error);
        });
    } else {
      genreDropdownMenu.style.display = 'block';
    }
    isDropdownVisible = true;
  }
});

document.addEventListener('click', function(event) {
  if (!filmsLink.contains(event.target) && !genreDropdownMenu.contains(event.target)) {
    if (isDropdownVisible) {
      genreDropdownMenu.style.display = 'none';
      isDropdownVisible = false;
    }
  }
});
