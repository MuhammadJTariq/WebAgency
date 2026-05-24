<?php get_header();  ?>

<section class="projects-section"
style="background-image:url('<?php echo THEME_DIR; ?>/images/sketch.png'); 
background-attachment:fixed;

"
>
  <div class="projects-grid">
 
    <!-- CARD 1 — Image -->
    <div class="project-card reveal">
      <div class="card-media">
        <!-- Replace src with your actual screenshot -->
        <svg class="card-media-placeholder" viewBox="0 0 800 450" xmlns="http://www.w3.org/2000/svg">
          <rect width="800" height="450" fill="#111"/>
          <rect x="0" y="0" width="800" height="48" fill="#141414"/>
          <circle cx="24" cy="24" r="6" fill="#222"/><circle cx="44" cy="24" r="6" fill="#222"/><circle cx="64" cy="24" r="6" fill="#222"/>
          <rect x="120" y="16" width="400" height="16" rx="8" fill="#1a1a1a"/>
          <rect x="40" y="80" width="300" height="14" rx="3" fill="#222"/>
          <rect x="40" y="104" width="220" height="10" rx="3" fill="#1a1a1a"/>
          <rect x="40" y="140" width="160" height="340" rx="4" fill="#181818" stroke="#222" stroke-width="1"/>
          <rect x="220" y="140" width="540" height="260" rx="4" fill="#181818" stroke="#1e1e1e" stroke-width="1"/>
          <rect x="240" y="160" width="200" height="12" rx="3" fill="#222"/>
          <rect x="240" y="182" width="300" height="8" rx="3" fill="#1a1a1a"/>
          <rect x="240" y="196" width="260" height="8" rx="3" fill="#1a1a1a"/>
          <rect x="240" y="240" width="100" height="36" rx="3" fill="#2a2a2a"/>
          <rect x="56" y="160" width="128" height="8" rx="3" fill="#1e1e1e"/>
          <rect x="56" y="176" width="100" height="6" rx="3" fill="#1a1a1a"/>
          <rect x="56" y="188" width="110" height="6" rx="3" fill="#1a1a1a"/>
          <rect x="56" y="200" width="90" height="6" rx="3" fill="#1a1a1a"/>
          <line x1="0" y1="420" x2="800" y2="420" stroke="#1a1a1a" stroke-width="1"/>
          <rect x="40" y="428" width="80" height="6" rx="3" fill="#181818"/>
          <text x="400" y="400" text-anchor="middle" font-family="monospace" font-size="9" fill="#1e1e1e" letter-spacing="4">HOPRENEUR PROJECT 01</text>
        </svg>
        <span class="media-type-badge">Live Site</span>
      </div>
      <div class="card-body">
        <div class="card-meta">
          <span class="card-num">Project 01</span>
          <div class="card-tags">
            <span class="card-tag">WordPress</span>
            <span class="card-tag">E-Commerce</span>
          </div>
        </div>
        <div class="card-title">Craftwork Supply Co.</div>
        <p class="card-desc">A full WooCommerce build for a local woodworking supply shop. Custom product filtering, inventory management, and a clean storefront designed to convert browsers into buyers. Launched in under 3 weeks.</p>
      </div>
      <div class="card-footer">
        <a href="https://github.com" target="_blank" rel="noopener" class="github-link">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          View on GitHub
        </a>
        <a href="#" class="card-live-link">Live Site</a>
      </div>
    </div>
 
    <!-- CARD 2 — Video Embed -->
    <div class="project-card reveal">
      <div class="card-media">
        <!-- Replace with your YouTube/Vimeo embed URL -->
        <iframe
          src="https://www.youtube.com/embed/dQw4w9WgXcQ?controls=1&modestbranding=1&rel=0"
          title="Project demo video"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          loading="lazy"
        ></iframe>
        <span class="media-type-badge">Video Demo</span>
      </div>
      <div class="card-body">
        <div class="card-meta">
          <span class="card-num">Project 02</span>
          <div class="card-tags">
            <span class="card-tag">Landing Page</span>
            <span class="card-tag">Conversion</span>
          </div>
        </div>
        <div class="card-title">Northfield Consulting</div>
        <p class="card-desc">A high-converting landing page for a B2B consulting firm looking to drive qualified leads. A/B tested headline, sticky CTA bar, and a case study section that reduced bounce rate by 38% post-launch.</p>
      </div>
      <div class="card-footer">
        <a href="https://github.com" target="_blank" rel="noopener" class="github-link">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          View on GitHub
        </a>
        <a href="#" class="card-live-link">Live Site</a>
      </div>
    </div>
 
    <!-- CARD 3 — Image -->
    <div class="project-card reveal">
      <div class="card-media">
        <svg class="card-media-placeholder" viewBox="0 0 800 450" xmlns="http://www.w3.org/2000/svg">
          <rect width="800" height="450" fill="#0f0f0f"/>
          <rect x="0" y="0" width="800" height="450" fill="url(#g)"/>
          <defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#141414"/><stop offset="100%" stop-color="#0a0a0a"/></linearGradient></defs>
          <line x1="0" y1="0" x2="800" y2="450" stroke="#161616" stroke-width="1"/>
          <line x1="800" y1="0" x2="0" y2="450" stroke="#161616" stroke-width="1"/>
          <rect x="60" y="60" width="680" height="330" rx="6" fill="none" stroke="#1e1e1e" stroke-width="1"/>
          <rect x="80" y="100" width="280" height="16" rx="3" fill="#1e1e1e"/>
          <rect x="80" y="126" width="200" height="10" rx="3" fill="#181818"/>
          <rect x="80" y="180" width="80" height="36" rx="3" fill="#2a2a2a"/>
          <rect x="80" y="260" width="660" height="1" fill="#1a1a1a"/>
          <rect x="80" y="280" width="140" height="80" rx="4" fill="#181818" stroke="#1e1e1e" stroke-width="1"/>
          <rect x="240" y="280" width="140" height="80" rx="4" fill="#181818" stroke="#1e1e1e" stroke-width="1"/>
          <rect x="400" y="280" width="140" height="80" rx="4" fill="#181818" stroke="#1e1e1e" stroke-width="1"/>
          <rect x="560" y="280" width="160" height="80" rx="4" fill="#1e1e1e" stroke="#252525" stroke-width="1"/>
          <rect x="96" y="296" width="60" height="8" rx="2" fill="#222"/>
          <rect x="96" y="312" width="80" height="6" rx="2" fill="#1a1a1a"/>
          <text x="400" y="420" text-anchor="middle" font-family="monospace" font-size="9" fill="#1e1e1e" letter-spacing="4">HOPRENEUR PROJECT 03</text>
        </svg>
        <span class="media-type-badge">Squarespace</span>
      </div>
      <div class="card-body">
        <div class="card-meta">
          <span class="card-num">Project 03</span>
          <div class="card-tags">
            <span class="card-tag">Squarespace</span>
            <span class="card-tag">Portfolio</span>
          </div>
        </div>
        <div class="card-title">Maren Reid Photography</div>
        <p class="card-desc">A portfolio and booking site for a Toronto-based wedding photographer. Custom Squarespace build with a full-screen gallery layout, integrated Calendly for bookings, and a contact flow optimized for inquiry conversion.</p>
      </div>
      <div class="card-footer">
        <a href="https://github.com" target="_blank" rel="noopener" class="github-link">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          View on GitHub
        </a>
        <a href="#" class="card-live-link">Live Site</a>
      </div>
    </div>
 
    <!-- CARD 4 — Video Embed -->
    <div class="project-card reveal">
      <div class="card-media">
        <!-- Replace with your YouTube/Vimeo embed URL -->
        <iframe
          src="https://www.youtube.com/embed/dQw4w9WgXcQ?controls=1&modestbranding=1&rel=0&start=10"
          title="Project demo video"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          loading="lazy"
        ></iframe>
        <span class="media-type-badge">Video Demo</span>
      </div>
      <div class="card-body">
        <div class="card-meta">
          <span class="card-num">Project 04</span>
          <div class="card-tags">
            <span class="card-tag">WordPress</span>
            <span class="card-tag">Redesign</span>
          </div>
        </div>
        <div class="card-title">Lakeview Dental Group</div>
        <p class="card-desc">A full site redesign for a multi-location dental practice. Migrated from an outdated Wix site to a custom WordPress build with online appointment booking, Google Reviews integration, and a 94 PageSpeed score.</p>
      </div>
      <div class="card-footer">
        <a href="https://github.com" target="_blank" rel="noopener" class="github-link">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          View on GitHub
        </a>
        <a href="#" class="card-live-link">Live Site</a>
      </div>
    </div>
 
  </div>
</section>
 
<!-- CTA STRIP -->
<div class="cta-strip">
  <h2>Got a Project in Mind?</h2>
  <p>Let's talk about what you're building — I'll tell you exactly how I'd approach it.</p>
  <a href="/#contact" class="btn-primary">Start the Conversation</a>
</div>
 
<?php get_footer(); ?>