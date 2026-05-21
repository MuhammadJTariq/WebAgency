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

const wpValues = {
  nonce: nonce,
  url: url
};

const GridCards = {
  allCardsHTML: document.querySelector(".blog-grid").innerHTML,
  cache: {},
};

const containers = {
  featured: document.querySelector(".featured"),
  cardGrid: document.querySelector(".blog-grid")
};

function animateLoader() {
  const loader = document.querySelector(".loader");
  const bar = document.querySelector(".bar");

  return new Promise((resolve) => {
    loader.classList.remove("hide");
    loader.classList.add("visible");
    
    gsap.to(bar, {
      scaleX: 1,
      duration: 3,
      ease: "power2.out",
      onComplete: () => {
        loader.classList.remove("visible");
        loader.classList.add("hide");
        gsap.set(bar, { scaleX: 0 });
        resolve(); // Tells the code waiting for this promise that it can now proceed
      }
    });
  });
}

async function fetchData(value) {
  // 1. Handle "All" category instantly from memory
  if (value === "All") {
    await animateLoader();
    containers.featured.style.display = "grid";
    containers.cardGrid.innerHTML = GridCards.allCardsHTML;
    return; // Stop execution here
  }

  // 2. Handle cached categories instantly from memory
  if (GridCards.cache[value]) {
    await animateLoader();
    containers.featured.style.display = "none";
    containers.cardGrid.innerHTML = GridCards.cache[value];
    return; // Stop execution here! Don't fetch again!
  }

  // 3. If not cached, fetch it fresh
  try {
    const res = await fetch(
      url + '?nonce=' + encodeURIComponent(nonce) + '&value=' + encodeURIComponent(value),
      {
        method: 'GET',
        headers: { 'Accept': 'application/json' }
      }
    );
    const data = await res.json();
    
    // Pass the raw data directly to showFilter
    await showFilter(data, value);
  } catch (error) {
    console.error("Fetch failed:", error);
  }
}

async function showFilter(data, value) {
  // Build the HTML *before* running the loader so it's ready to drop in
  let html = "";

  data.forEach(item => {
    const img = item.thumbnail_url ?? "";
    html += `
      <article class="blog-card visible">
        <div class="card-image"
          style="background-image: url('${img}');
                 background-size: cover;
                 background-position: center;">
        </div>
        <div class="card-content">
          <div class="card-meta">
            <span class="card-category">${item.category ?? ""}</span>
            <span class="card-date">${item.date ?? ""}</span>
          </div>
          <h3>${item.title ?? ""}</h3>
          <p>${item.excerpt ?? ""}</p>
          <div class="card-footer">
            <span class="read-time">${item.readtime ?? ""} min</span>
            <a href="${item.permalink ?? "#"}" class="card-link">Read</a>
          </div>
        </div>
      </article>
    `;
  });

  // Cache the generated string
  GridCards.cache[value] = html;

  // Run the loader animation FIRST while old content is still visible
  await animateLoader();

  // Swap out the content right as the loader finishes hiding everything
  containers.featured.style.display = "none";
  containers.cardGrid.innerHTML = html;
}