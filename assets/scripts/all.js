window.addEventListener("load", function () {
  const results = document.querySelector(".results-area");
 
  if (results) {
    results.scrollIntoView({
      block:"start",
      behavior: "smooth"
    });
  }
});


document.querySelector(".toggle").addEventListener("click", () => {
  console.log('element clicked');
  const ul = document.querySelector(".mobile-links ul");
  if(ul.classList.contains('expand')){
    ul.classList.remove('expand');
  }
  else{
    ul.classList.add('expand');
  }


})


const search = document.getElementById("searchInput");

console.log(search);

search.addEventListener("keydown", function(e){
  if(e.key === "enter"){
    e.preventDefault();
    console.log("search triggered");
  }
 
})