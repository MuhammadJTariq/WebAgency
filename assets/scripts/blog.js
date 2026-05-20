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



function fetchData(value) {
  return fetch(url + '?nonce=' + encodeURIComponent(nonce) + '&value=' + encodeURIComponent(value), {
    method: 'GET',
    headers: {
      'Accept': 'application/json'
    }
  })
  .then(res => res.json())
  .then(data => {
    console.log("rest response triggered");
    console.log(data);
  });
}