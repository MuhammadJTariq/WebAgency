document.addEventListener("DOMContentLoaded", () => {

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

const processBtn = document.getElementById("process-btn");

const processSec = document.querySelector("#process-sec");
const stepborder = document.querySelector(".step[data-step='1']");

processBtn.addEventListener("click", function(){
    setTimeout(function(){
          stepborder.classList.add('border-active');
          returnPopup(0);
        }, 500);

})



gsap.registerPlugin(ScrollTrigger);

gsap.from(".nav-cta", {
  scrollTrigger: ".section",
  opacity: 0,
  y: 100,
  duration: 1
});

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
    let head = `<div class="card-steps" data-step="${this.step}">`;
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
    <div>
      <button id="close-pop">Close</button>
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
    const sectionPopup = document.querySelector(".track")
    sectionPopup.insertAdjacentHTML("afterbegin", this.html);

  }
}

notesData.forEach(note => {
  new noteAppend(note.title, note.content, note.step);
})


const closePop = document.querySelectorAll("#close-pop");

closePop.forEach(button => {
  button.addEventListener("click", function(){
    returnPopup(1);
  })
})




function returnPopup(step){
  if(step === 1){
    const main = document.querySelector("main");
    const popups = document.querySelector(".card-popup");
    stepborder.classList.remove('border-active');
    gsap.to(popups, {
      opacity: 0,
      duration: 0.5
    }); 
    const track = document.querySelector(".track");
    main.classList.remove('blur');
     gsap.to(track, {
      xPercent: 0,
      duration: 0.8,
      ease : "power2.inOut"

    });


  }
  if(step === 0){
    const main = document.querySelector("main");
    const popups = document.querySelector(".card-popup");
    const track = document.querySelector(".track");
    const cards = document.querySelectorAll(".card-steps");
    setTimeout(() => {
      main.classList.add('blur');
    }, 2000)
    setTimeout(() => {
      gsap.to(popups, {
      scale: 1,
      opacity: 1,
      x: "-50%",
      y: "-50%",
      duration: 1.5
    }); 
    }, 2000);
    moveCarousel(track, cards);
   
  }
  
}




function moveCarousel(track, cards){
  let interval;
  let index = 0;
  clearInterval(interval);

  interval = setInterval(() => {
      index++;
      
      gsap.to(track, {
      xPercent: - 100 * index,
      duration: 0.8,
      ease : "power2.inOut"

    });
    if(index >= cards.length - 1){
        clearInterval(interval);
      }

}, 4000);
}


});




function rollView(element){
  element.classList.add('expand');
}