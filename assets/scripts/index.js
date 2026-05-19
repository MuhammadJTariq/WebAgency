  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('visible'), i * 80);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
 
  reveals.forEach(el => observer.observe(el));



class noteAppend{
    title;
    content;
    step;
    html = '';
    constructor(title, content, step){
    this.title = title;
    this.content = content;
    this.step = step;
    this.buildHead();
    
  }

  buildHead(){
    let head = `<div class="card-steps hide" data-step="${this.step}">`;
    let body = '<div style="background: var(--color-background-primary); border: 0.5px solid var(--color-border-tertiary); border-radius: var(--border-radius-lg); padding: 2rem 2.25rem; max-width: 640px; margin: 1rem auto;">';
    this.html += head;
    this.html += body;
    this.buildTop();


  }
  buildTop(){
    let top = ` <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1.5rem; justify-content:space-around;">
    <div>
      <p style="font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--color-text-tertiary); margin: 0 0 3px;">Step 01</p>
      <p style="font-size: 18px; font-weight: 500; margin: 0; color: var(--color-text-primary);">${this.title}</p>
    </div>
    <div class="button">
      <button id="close">Close</button>
    </div>
  </div>`;
  this.html += top;
  this.buildMain();

  }

  buildMain(){
    let mainTop = ' <div class="card-content" style="border-top: 0.5px solid var(--color-border-tertiary); padding-top: 1.5rem;">';
    let mainMiddle = this.content;
    let mainBottom = ` <div style="border-top: 0.5px solid var(--color-border-tertiary); padding-top: 1.25rem; display: flex; justify-content: space-between; align-items: center;">
      <p style="font-size: 12px; color: var(--color-text-tertiary); margin: 0; letter-spacing: 0.05em;">Included with every project</p>
      <button onclick="sendPrompt('Tell me more about the Discovery process at Hopreneur')" style="font-size: 13px; padding: 8px 18px; cursor: pointer; display: flex; align-items: center; gap: 6px;">
        Learn more ↗
      </button>
    </div>`;
    this.html += mainTop;
    this.html += mainMiddle;
    this.html += mainBottom;
    this.buildTail();
  }

  buildTail(){
    let tail = '</div></div>';
    this.html += tail;
    this.buildFinish();

  }
  buildFinish(){
    const body = document.querySelector('body');
    body.insertAdjacentHTML('beforeend', this.html);

  }
}

notesData.forEach(note => {
  new noteAppend(note.title, note.content, note.step);
})

const steps = document.querySelectorAll('.step');

steps.forEach(step => {
  step.addEventListener('click', (e) => {
    console.log('clicked' ,  e.currentTarget.dataset.step);
    let num = step.dataset.step;
    returnPopup(num);
    })
  });


function returnPopup(step){
  const main = document.querySelector("main");
  const popups = document.querySelectorAll(".card-steps");
    popups.forEach(popup => {
      if(popup.dataset.step === step){
        popup.classList.remove('hide');
        popup.classList.add('visible');
        main.classList.add('blur')
        return;
      }});
}

const close = document.querySelectorAll("#close");

document.addEventListener('click', (e) => {
  const main = document.querySelector("main");
  if(e.target.matches('button')){
    const popup = e.target.closest('.card-steps');
    popup.classList.remove('visible');
    popup.classList.add('hide');
    main.classList.remove('blur');
  }
})