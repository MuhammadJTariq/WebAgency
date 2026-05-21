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
  <?php $categories = get_categories(); 
  foreach($categories as $cat){
    ?>
  <button class="filter-btn"><?php echo $cat->name; ?></button>
    <?
  }
  
  ?>

</div>
 
<!-- FEATURED POST -->
<?php do_action('FormatFeatured'); ?>
<!-- BLOG GRID -->
<section class="blog-grid-section">
  <div class="loader hide">
      <div class="bar"></div>
  </div>
  <div class="blog-grid">
  
 
    <!-- Card 1 -->
     <?php do_action('FormatRecent'); ?>
    
  </div>
</section>
 
<!-- LIST + SIDEBAR -->
<section class="list-section">
  <div>
    <div class="list-section-title">Most Read</div>
    <div class="post-list">
        <?php hopQuery::returnMostRead(); ?>
 
    </div>
  </div>
 
  <aside class="sidebar reveal">
    <div class="sidebar-block">
      <div class="sidebar-title">Browse by Topic</div>
      <div class="topic-list">
        <?php  hopQuery::returnCats(); ?>
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