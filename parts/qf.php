
<div class="qf">
  <div id="qf-form">
    <div class="qf-head">
      <h2>Get a Quote</h2>
      <p>Fill in a few details and I'll be in touch within 24 hours.</p>
    </div>

    <div class="qf-row-2">
      <div>
        <label for="qf-name">Your Name</label>
        <input type="text" id="qf-name" placeholder="Jane Smith">
      </div>
      <div>
        <label for="qf-email">Email Address</label>
        <input type="email" id="qf-email" placeholder="jane@example.com">
      </div>
    </div>

    <div class="qf-row-2">
      <div>
        <label for="qf-biz">Business Name</label>
        <input type="text" id="qf-biz" placeholder="Acme Co.">
      </div>
      <div>
        <label for="qf-phone">Phone (optional)</label>
        <input type="tel" id="qf-phone" placeholder="(555) 000-0000">
      </div>
    </div>

    <hr class="qf-divider">

    <div class="qf-row">
      <label>What do you need?</label>
      <div class="qf-checks">
        <label class="qf-check"><input type="checkbox" name="service" value="Landing Page"><span>Landing Page</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="Full Website"><span>Full Website</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="WordPress"><span>WordPress</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="Squarespace"><span>Squarespace</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="Wix"><span>Wix</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="E-Commerce"><span>E-Commerce</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="Redesign"><span>Redesign</span></label>
        <label class="qf-check"><input type="checkbox" name="service" value="Maintenance"><span>Maintenance</span></label>
      </div>
    </div>

    <div class="qf-row-2" style="margin-top:18px">
      <div>
        <label for="qf-budget">Budget Range</label>
        <select id="qf-budget">
          <option value="" disabled selected>Select a range</option>
          <option>Under $500</option>
          <option>$500 – $1,000</option>
          <option>$1,000 – $2,500</option>
          <option>$2,500 – $5,000</option>
          <option>$5,000+</option>
          <option>Not sure yet</option>
        </select>
      </div>
      <div>
        <label for="qf-timeline">Timeline</label>
        <select id="qf-timeline">
          <option value="" disabled selected>When do you need it?</option>
          <option>ASAP</option>
          <option>Within 2 weeks</option>
          <option>Within a month</option>
          <option>1–3 months</option>
          <option>Flexible</option>
        </select>
      </div>
    </div>

    <div class="qf-row" style="margin-top:18px">
      <label for="qf-detail">Tell me about your project</label>
      <textarea id="qf-detail" placeholder="What are you building, who's it for, any existing site or inspiration links?"></textarea>
    </div>

    <button class="qf-submit" onclick="submitForm()">Send My Request →</button>
  </div>

  <div class="qf-thanks" id="qf-thanks">
    <i class="ti ti-circle-check" aria-hidden="true"></i>
    <h3>Request Sent</h3>
    <p>Thanks! I'll review your details and get back to you within 24 hours.</p>
  </div>
</div>