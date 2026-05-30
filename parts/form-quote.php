<div class="form">
    
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
  .hf * { box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
  .hf {
    background: #0a0a0a;
    border-radius: 12px;
    padding: 2.5rem;
    max-width: 640px;
    margin: 1rem auto;
  }
  .hf-head { margin-bottom: 2rem; padding-bottom: 1.5rem; border-bottom: 1px solid #222; }
  .hf-tag { font-size: 10px; letter-spacing: 0.3em; text-transform: uppercase; color: #555; margin-bottom: 10px; }
  .hf-head h2 { font-size: 22px; font-weight: 700; color: #e8e8e8; margin: 0; letter-spacing: 0.04em; text-transform: uppercase; }
  .hf-head p { font-size: 12px; font-weight: 300; color: #666; margin: 6px 0 0; letter-spacing: 0.03em; line-height: 1.6; }
  .hf-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }
  .hf-field { margin-bottom: 14px; }
  .hf-label { display: block; font-size: 10px; font-weight: 600; letter-spacing: 0.22em; text-transform: uppercase; color: #555; margin-bottom: 7px; }
  .hf-input, .hf-select, .hf-textarea {
    width: 100%; background: #111; border: 1px solid #222;
    border-radius: 6px; color: #e8e8e8;
    font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400;
    padding: 11px 14px; outline: none; transition: border-color 0.2s;
    letter-spacing: 0.02em;
  }
  .hf-input::placeholder, .hf-textarea::placeholder { color: #333; }
  .hf-input:focus, .hf-select:focus, .hf-textarea:focus { border-color: #444; }
  .hf-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 14px center;
    cursor: pointer;
  }
  .hf-select option { background: #111; color: #e8e8e8; }
  .hf-section-title { font-size: 10px; font-weight: 600; letter-spacing: 0.22em; text-transform: uppercase; color: #555; margin-bottom: 14px; display: flex; align-items: center; gap: 10px; }
  .hf-section-title::after { content: ''; flex: 1; height: 1px; background: #1e1e1e; }
  .hf-radio-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 20px; }
  .hf-radio-label { cursor: pointer; }
  .hf-radio-label input { display: none; }
  .hf-radio-box {
    display: flex; align-items: center; gap: 10px;
    background: #111; border: 1px solid #1e1e1e;
    border-radius: 6px; padding: 11px 14px;
    font-size: 12px; font-weight: 500; letter-spacing: 0.05em;
    color: #555; transition: all 0.15s; user-select: none;
  }
  .hf-radio-box::before {
    content: ''; width: 14px; height: 14px; border-radius: 50%;
    border: 1px solid #333; flex-shrink: 0; transition: all 0.15s;
  }
  .hf-radio-label input:checked + .hf-radio-box {
    border-color: #444; color: #e8e8e8; background: #161616;
  }
  .hf-radio-label input:checked + .hf-radio-box::before {
    background: #e8e8e8; border-color: #e8e8e8;
    box-shadow: inset 0 0 0 3px #161616;
  }
  .hf-radio-label:hover .hf-radio-box { border-color: #333; color: #999; }
  .hf-textarea { resize: vertical; min-height: 120px; line-height: 1.6; }
  .hf-char-count { font-size: 10px; color: #333; text-align: right; margin-top: 5px; letter-spacing: 0.05em; }
  .hf-divider { border: none; border-top: 1px solid #1a1a1a; margin: 20px 0; }
  .hf-submit {
    width: 100%; font-family: 'Montserrat', sans-serif; font-size: 12px;
    font-weight: 700; letter-spacing: 0.25em; text-transform: uppercase;
    background: #e8e8e8; color: #0a0a0a; border: none; border-radius: 6px;
    padding: 15px; cursor: pointer; transition: background 0.2s; margin-top: 6px;
  }
  .hf-submit:hover { background: #fff; }
  .hf-privacy { font-size: 10px; font-weight: 300; color: #333; text-align: center; margin-top: 12px; letter-spacing: 0.03em; }
  .hf-thanks { display: none; text-align: center; padding: 3rem 0; }
  .hf-thanks-icon { font-size: 40px; color: #333; margin-bottom: 16px; }
  .hf-thanks h3 { font-size: 18px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #e8e8e8; margin: 0 0 8px; }
  .hf-thanks p { font-size: 12px; font-weight: 300; color: #555; letter-spacing: 0.04em; margin: 0; }
</style>

<h2 class="sr-only">Hopreneur get a quote form with contact info, service selection, budget, and message</h2>

<div class="hf">
  <div id="hf-form">
    <div class="hf-head">
      <div class="hf-tag">Hopreneur Web Services</div>
      <h2>Get a Quote</h2>
      <p>Fill out the form and I'll get back to you within 24 hours.</p>
    </div>

    <div class="hf-row">
      <div>
        <label class="hf-label" for="hf-fn">First name</label>
        <input class="hf-input" id="hf-fn" type="text" placeholder="Jane">
      </div>
      <div>
        <label class="hf-label" for="hf-ln">Last name</label>
        <input class="hf-input" id="hf-ln" type="text" placeholder="Smith">
      </div>
    </div>

    <div class="hf-row">
      <div>
        <label class="hf-label" for="hf-em">Email</label>
        <input class="hf-input" id="hf-em" type="email" placeholder="jane@example.com">
      </div>
      <div>
        <label class="hf-label" for="hf-ph">Phone</label>
        <input class="hf-input" id="hf-ph" type="tel" placeholder="(416) 000-0000">
      </div>
    </div>

    <div class="hf-section-title">What do you need?</div>

    <div class="hf-radio-grid">
      <label class="hf-radio-label">
        <input type="radio" name="service" value="Landing Page">
        <div class="hf-radio-box">Landing Page</div>
      </label>
      <label class="hf-radio-label">
        <input type="radio" name="service" value="Website">
        <div class="hf-radio-box">Website</div>
      </label>
      <label class="hf-radio-label">
        <input type="radio" name="service" value="Email Marketing">
        <div class="hf-radio-box">Email Marketing</div>
      </label>
      <label class="hf-radio-label">
        <input type="radio" name="service" value="Automation">
        <div class="hf-radio-box">Automation</div>
      </label>
      <label class="hf-radio-label" style="grid-column: 1 / -1;">
        <input type="radio" name="service" value="Website Redesign & Refresh">
        <div class="hf-radio-box">Website Redesign & Refresh</div>
      </label>
    </div>

    <div class="hf-field">
      <label class="hf-label" for="hf-budget">Budget range</label>
      <select class="hf-select" id="hf-budget">
        <option value="" disabled selected>Select your budget</option>
        <option value="500-1000">$500 – $1,000</option>
        <option value="1000-2000">$1,000 – $2,000</option>
        <option value="2500+">$2,500 – Max</option>
      </select>
    </div>

    <hr class="hf-divider">

    <div class="hf-section-title">Your message</div>

    <div class="hf-field">
      <label class="hf-label" for="hf-msg">Tell me about your project</label>
      <textarea class="hf-textarea" id="hf-msg" placeholder="Describe what you're building, your goals, timeline, or anything else I should know…" maxlength="600" oninput="document.getElementById('hf-cc').textContent = this.value.length + ' / 600'"></textarea>
      <div class="hf-char-count" id="hf-cc">0 / 600</div>
    </div>

    <button class="hf-submit" onclick="submitForm()">Send My Request →</button>
    <p class="hf-privacy">Your info is never shared or sold. I'll only use it to respond to your inquiry.</p>
  </div>

  <div class="hf-thanks" id="hf-thanks">
    <div class="hf-thanks-icon"><i class="ti ti-circle-check" aria-hidden="true"></i></div>
    <h3>Request Sent</h3>
    <p>Thanks! I'll review your details and be in touch within 24 hours.</p>
  </div>
</div>

<script>
function submitForm() {
  const fn = document.getElementById('hf-fn').value.trim();
  const em = document.getElementById('hf-em').value.trim();
  [document.getElementById('hf-fn'), document.getElementById('hf-em')].forEach(el => el.style.borderColor = '');
  if (!fn) document.getElementById('hf-fn').style.borderColor = '#c0392b';
  if (!em) document.getElementById('hf-em').style.borderColor = '#c0392b';
  if (!fn || !em) return;
  document.getElementById('hf-form').style.display = 'none';
  document.getElementById('hf-thanks').style.display = 'block';
}
</script>

</div>