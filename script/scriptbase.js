const search = document.getElementById('search');
const results = document.getElementById('results');

search.addEventListener("input", function(){
    let v = this.value;
    console.log(v);

  
  fetch(`https://api.themoviedb.org/3/search/movie?query=${v}&include_adult=false&language=fr-FR&page=1&api_key=`)
    .then(response => response.json())
    .then(movies =>{
        let res = movies.results
        console.log(res) 
        results.innerHTML = "";

        for(el of res){
            const li = document.createElement('li');
            li.classList.add("list-group-item");
            li.innerHTML = `${el.title}`;
            results.appendChild(li);    
}})
   
    
    .catch(err => console.error(err));



})