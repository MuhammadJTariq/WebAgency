  window.addEventListener('scroll', () => {
    const doc = document.documentElement;
    const scrollTop = doc.scrollTop || document.body.scrollTop;
    const scrollHeight = doc.scrollHeight - doc.clientHeight;
    const progress = (scrollTop / scrollHeight) * 100;
    document.getElementById('progress').style.width = progress + '%';
  });
 
  // TOC active state
  const sections = document.querySelectorAll('.post-content h2[id]');
  const tocLinks = document.querySelectorAll('.toc-list a');
 
  const tocObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        tocLinks.forEach(l => l.classList.remove('toc-active'));
        const active = document.querySelector(`.toc-list a[href="#${entry.target.id}"]`);
        if (active) active.classList.add('toc-active');
      }
    });
  }, { rootMargin: '-20% 0px -70% 0px' });
 
  sections.forEach(s => tocObserver.observe(s));


setTimeout(async () => {
        const header = document.querySelector("#header-single");
        try {
            const response = await fetch('/get', {
                method : 'POST',
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    id : header.dataset.id,
                    action : 'update_views'
                })
            });

            const data = await response.json();
        } catch(error){
            console.log(error);
        }


    }, 20000);
    
