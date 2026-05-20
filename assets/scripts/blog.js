
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


console.log(nonce);
console.log(url);

const GridCards = {
  allCards: [],
  cache: []
};

const containers = {
  'featured' : document.querySelector(".featured"),
  'cardGrid' : document.querySelector(".blog-grid")
}

const initialCards = document.querySelectorAll(".blog-card");

initialCards.forEach(card => {
  GridCards.allCards.push(card.cloneNode(true));
});

function addView(category, allCards, featured = '') {
  const cards = [];

  allCards.forEach(card => {
    cards.push(card.cloneNode(true));
  });

  GridCards.cache.push({ category, featured, allCards: cards });
}


function fetchData(value) {
  if (value === 'all') {
    showFilter(GridCards.allCards, true);
    return;
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
    showFilter(data, false);
  });
}

function showFilter(data, exists = false) {
  const cardGrid = containers.cardGrid;

  if (exists) {
    containers.featured.style.display = "block";
    cardGrid.innerHTML = "";

    data.forEach(card => {
      cardGrid.appendChild(card);
    });

    return;
  }

  containers.featured.style.display = "none";
  cardGrid.innerHTML = "";

  let html = "";

  data.forEach(value => {
    const img = value.thumbnail_url ?? "";

    html += `
      <article class="blog-card">
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

  cardGrid.innerHTML = html;
}