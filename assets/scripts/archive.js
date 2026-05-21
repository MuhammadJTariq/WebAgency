 let currentView = 'list';
  let currentYear = 'all';
  let currentCat = 'all';
 
  function setView(view) {
    currentView = view;
    document.getElementById('listViewBtn').classList.toggle('active', view === 'list');
    document.getElementById('gridViewBtn').classList.toggle('active', view === 'grid');
 
    ['2025','2024','2023'].forEach(yr => {
      const l = document.getElementById('list-' + yr);
      const g = document.getElementById('grid-' + yr);
      if (l) l.style.display = view === 'list' ? 'block' : 'none';
      if (g) g.style.display = view === 'grid' ? 'grid' : 'none';
    });
  }
 
  function filterYear(year) {
    currentYear = year;
    document.querySelectorAll('.year-btn').forEach(b => b.classList.remove('active'));
    event.target.classList.add('active');
 
    document.querySelectorAll('.year-group').forEach(g => {
      const yr = g.dataset.year;
      g.style.display = (year === 'all' || yr === year) ? 'block' : 'none';
    });
  }
 
  function filterCat(e, cat) {
    e.preventDefault();
    currentCat = cat;
    document.querySelectorAll('.cat-item').forEach(c => c.classList.remove('active'));
    e.currentTarget.classList.add('active');
    applyFilters();
  }
 
  function applyFilters() {
    const query = document.getElementById('searchInput').value.toLowerCase().trim();
    let anyVisible = false;
 
    document.querySelectorAll('.post-row, .grid-card').forEach(row => {
      const title = (row.dataset.title || '').toLowerCase();
      const cat = (row.dataset.cat || '').toLowerCase();
      const matchSearch = !query || title.includes(query);
      const matchCat = currentCat === 'all' || cat.includes(currentCat);
      const show = matchSearch && matchCat;
      row.style.display = show ? '' : 'none';
      if (show) anyVisible = true;
    });
 
    document.getElementById('noResults').style.display = anyVisible ? 'none' : 'block';
  }
 
  document.getElementById('searchInput').addEventListener('input', applyFilters);
 
  // Scroll reveal
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 60);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
 
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));