
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      console.log(btn.innerHTML);
      fetchData(btn.innerHTML);
    });
  });
 
  // Scroll reveal
  const reveals = document.querySelectorAll('.reveal');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 80);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(el => obs.observe(el));


const wpValues =  {
  nonce : nonce,
  url : url
}

const GridCards = {
  allCardsHTML: document.querySelector(".blog-grid").innerHTML,
  cache: {},
};


const containers = {
  featured : document.querySelector(".featured"),
  cardGrid : document.querySelector(".blog-grid")
}

function animateLoader(){
  const loader = document.querySelector(".loader");
  const bar = document.querySelector(".bar");
  loader.classList.remove("hide");
  loader.classList.add("visible");

  gsap.to(bar, {
    scaleX: 1,
    duration: 3,
    ease: "power2.out",
  onComplete: () => {
    loader.classList.remove("visible");
    loader.classList.add("hide");
    // over here set the bar to zero 

  }
});

}


function fetchData(value) {
  if(value === "All"){
    containers.featured.style.display = "grid";
    animateLoader();
    containers.cardGrid.innerHTML = GridCards.allCardsHTML;
    return;
  }
  if(GridCards.cache[value]){
    containers.featured.style.display = "none";
    animateLoader();
    containers.cardGrid.innerHTML = GridCards.cache[value];
  }

  return fetch(
    url + '?nonce=' + encodeURIComponent(nonce) + '&value=' + encodeURIComponent(value),
    {
      method: 'GET',
      headers: { 'Accept': 'application/json' }
    }
  )
  .then(res => res.json())
  .then(data => {
    showFilter(data, false, value);
  });
}

function showFilter(data, exists = false, value) {
 
  containers.featured.style.display = "none";
  containers.cardGrid.innerHTML = "";

  let html = "";

  data.forEach(value => {
    const img = value.thumbnail_url ?? "";

    html += `
      <article class="blog-card visible">
        <div class="card-image"
          style="background-image: url('${img}');
                 background-size: cover;
                 background-position: center;">
        </div>

        <div class="card-content">
          <div class="card-meta">
            <span class="card-category">${value.category ?? ""}</span>
            <span class="card-date">${value.date ?? ""}</span>
          </div>

          <h3>${value.title ?? ""}</h3>
          <p>${value.excerpt ?? ""}</p>

          <div class="card-footer">
            <span class="read-time">${value.readtime ?? ""} min</span>
            <a href="${value.permalink ?? "#"}" class="card-link">Read</a>
          </div>
        </div>
      </article>
    `;
  });
  GridCards.cache[value] = html;
  containers.cardGrid.innerHTML = html;
}