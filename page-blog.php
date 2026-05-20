<?php get_header(); ?>


<!-- PAGE HEADER -->
<header class="page-header">
  <div class="page-header-left">
    <div class="page-tag">Insights & Guides</div>
    <h1>The<br>Blog.</h1>
  </div>
  <p>Web tips, platform breakdowns, and real talk about building an online presence that actually works.</p>
</header>
 
<!-- FILTER BAR -->
<div class="filter-bar">
  <span class="filter-label">Filter</span>
  <button class="filter-btn active">All</button>
  <button class="filter-btn">WordPress</button>
  <button class="filter-btn">Squarespace</button>
  <button class="filter-btn">Landing Pages</button>
  <button class="filter-btn">Tips & Tricks</button>
  <button class="filter-btn">Business</button>
</div>
 
<!-- FEATURED POST -->
<?php do_action('FormatFeatured'); ?>
<!-- BLOG GRID -->
<section class="blog-grid-section">
  <div class="blog-grid">
 
    <!-- Card 1 -->
     <?php do_action('FormatRecent'); ?>
    
  </div>
</section>
 
<!-- LIST + SIDEBAR -->
<section class="list-section">
  <div>
    <div class="list-section-title">More Articles</div>
    <div class="post-list">
 
      <a href="#" class="post-list-item reveal">
        <div class="post-num">04</div>
        <div class="post-list-info">
          <div class="post-list-cat">Business · Mar 5, 2025</div>
          <h4>How Much Should a Website Actually Cost?</h4>
          <p>The range is wild — $200 to $20,000 for what looks like the same thing. Here's what separates a cheap site from a valuable one, and where your money actually goes.</p>
        </div>
      </a>
 
      <a href="#" class="post-list-item reveal">
        <div class="post-num">05</div>
        <div class="post-list-info">
          <div class="post-list-cat">WordPress · Feb 18, 2025</div>
          <h4>The WordPress Plugins I Actually Install on Every Site</h4>
          <p>Out of thousands of options, these are the handful that earn a spot on every build — for performance, security, and sanity.</p>
        </div>
      </a>
 
      <a href="#" class="post-list-item reveal">
        <div class="post-num">06</div>
        <div class="post-list-info">
          <div class="post-list-cat">Tips & Tricks · Feb 3, 2025</div>
          <h4>5 Signs It's Time to Redesign Your Website</h4>
          <p>Most businesses wait too long. If your site is doing any of these five things, it's already costing you.</p>
        </div>
      </a>
 
      <a href="#" class="post-list-item reveal">
        <div class="post-num">07</div>
        <div class="post-list-info">
          <div class="post-list-cat">Squarespace · Jan 20, 2025</div>
          <h4>Getting the Most Out of Squarespace Without the Headaches</h4>
          <p>Squarespace is powerful but has real limitations. Know these before you commit to the platform.</p>
        </div>
      </a>
 
    </div>
  </div>
 
  <aside class="sidebar reveal">
    <div class="sidebar-block">
      <div class="sidebar-title">Browse by Topic</div>
      <div class="topic-list">
        <?php do_action('returnCats'); ?>
      </div>
    </div>
 
    <div class="sidebar-block">
      <div class="sidebar-title">About This Blog</div>
      <p style="font-size: 0.78rem; font-weight: 300; color: var(--gray); line-height: 1.75; letter-spacing: 0.03em;">
        Real web advice from someone who builds sites for a living. No fluff, no SEO filler — just the stuff that actually helps your business online.
      </p>
    </div>
  </aside>
</section>
 
<!-- NEWSLETTER -->
<section class="newsletter">
  <div class="newsletter-left reveal">
    <h2>Stay in<br>The Loop.</h2>
    <p>New posts on web tips, platform guides, and business advice — straight to your inbox. No spam, ever.</p>
  </div>
  <div class="newsletter-form reveal">
    <input type="email" class="newsletter-input" placeholder="your@email.com">
    <button class="newsletter-btn">Subscribe</button>
  </div>
</section>
 
<?php get_footer(); ?>