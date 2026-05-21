<?php get_header(); ?>

<?php 
global $wp_query;
display_header($wp_query);
?>
<?php

function display_header($wp_query){
    ob_start(); 

    ?>
    <!-- PAGE HEADER -->
        <header class="page-header">
        <div class="page-header-inner">
            <div>
            <div class="page-tag">Full Post Archive</div>
            <h1>Every<br>Article.</h1>
            </div>
            <div class="header-right">
            <div class="post-count-big"><?php echo $wp_query->found_posts; ?></div>
            <div class="post-count-label">Posts Published</div>
            </div>
        </div>
        </header>
        <?php
    echo ob_get_clean();
}



?>
<!-- STATS ROW -->
<div class="archive-stats reveal">
  <div class="stat-cell">
    <div class="stat-cell-num">47</div>
    <div class="stat-cell-label">Total Articles</div>
  </div>
  <div class="stat-cell">
    <div class="stat-cell-num">6</div>
    <div class="stat-cell-label">Categories</div>
  </div>
  <div class="stat-cell">
    <div class="stat-cell-num">3</div>
    <div class="stat-cell-label">Years of Writing</div>
  </div>
</div>
 
<!-- CONTROLS BAR -->



 
<!-- ARCHIVE LAYOUT -->
<div class="archive-layout">
 
  <!-- POSTS AREA -->
  <main class="posts-area" id="postsArea">
 
    <!-- 2025 GROUP -->
    
      <!-- LIST VIEW -->
      <div class="posts-list" id="list-2025">
        <?php if(have_posts()){
            while(have_posts()){
                the_post();
                ?>
                <a href="<?php echo get_the_permalink(); ?>" class="post-row">
                    <div class="post-row-date"><div class="post-row-day"><?php echo get_the_date('d'); ?></div><div class="post-row-month">
                        <?php echo get_the_date('M'); ?>
                    </div></div>
                    <div class="post-row-content">
                        <div class="post-row-cat"><?php echo get_search_query(  ); ?></div>
                        <div class="post-row-title"><?php echo get_the_title(); ?></div>
                        <div class="post-row-excerpt">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                    </div>
                    <div class="post-row-arrow">→</div>
                </a>


                <?


            }
        }
        ?>
        
        
      </div>
 
     


 
  </main>
 
  <!-- SIDEBAR -->
  <aside class="archive-sidebar">
 
    <div class="sidebar-section">
      <div class="sidebar-section-title">Categories</div>
      <div class="cat-list">
        <a href="#" class="cat-item active" onclick="filterCat(event,'all')"><span class="cat-name">All Posts</span><span class="cat-count">47</span></a>
        <a href="#" class="cat-item" onclick="filterCat(event,'wordpress')"><span class="cat-name">WordPress</span><span class="cat-count">14</span></a>
        <a href="#" class="cat-item" onclick="filterCat(event,'squarespace')"><span class="cat-name">Squarespace</span><span class="cat-count">9</span></a>
        <a href="#" class="cat-item" onclick="filterCat(event,'landing pages')"><span class="cat-name">Landing Pages</span><span class="cat-count">7</span></a>
        <a href="#" class="cat-item" onclick="filterCat(event,'tips')"><span class="cat-name">Tips & Tricks</span><span class="cat-count">10</span></a>
        <a href="#" class="cat-item" onclick="filterCat(event,'business')"><span class="cat-name">Business</span><span class="cat-count">7</span></a>
      </div>
    </div>
 
    <div class="sidebar-section">
      <div class="sidebar-section-title">Most Read</div>
      <div class="popular-list">
        <a href="#" class="popular-item">
          <div class="popular-num">1</div>
          <div class="popular-info">
            <div class="popular-cat">WordPress</div>
            <div class="popular-title">Why Your WordPress Site Is Slow</div>
          </div>
        </a>
        <a href="#" class="popular-item">
          <div class="popular-num">2</div>
          <div class="popular-info">
            <div class="popular-cat">Business</div>
            <div class="popular-title">How Much Should a Website Cost?</div>
          </div>
        </a>
        <a href="#" class="popular-item">
          <div class="popular-num">3</div>
          <div class="popular-info">
            <div class="popular-cat">Landing Pages</div>
            <div class="popular-title">The Anatomy of a Converting Landing Page</div>
          </div>
        </a>
        <a href="#" class="popular-item">
          <div class="popular-num">4</div>
          <div class="popular-info">
            <div class="popular-cat">Tips & Tricks</div>
            <div class="popular-title">5 Signs It's Time to Redesign Your Website</div>
          </div>
        </a>
      </div>
    </div>
 
    <div class="sidebar-section">
      <div class="sidebar-section-title">Tags</div>
      <div class="tag-cloud">
        <a href="#" class="tag-chip">WordPress</a>
        <a href="#" class="tag-chip">SEO</a>
        <a href="#" class="tag-chip">Speed</a>
        <a href="#" class="tag-chip">Design</a>
        <a href="#" class="tag-chip">Squarespace</a>
        <a href="#" class="tag-chip">Hosting</a>
        <a href="#" class="tag-chip">E-Commerce</a>
        <a href="#" class="tag-chip">Plugins</a>
        <a href="#" class="tag-chip">Security</a>
        <a href="#" class="tag-chip">Wix</a>
        <a href="#" class="tag-chip">Domains</a>
        <a href="#" class="tag-chip">Maintenance</a>
        <a href="#" class="tag-chip">WooCommerce</a>
        <a href="#" class="tag-chip">Local SEO</a>
      </div>
    </div>
 
  </aside>
</div>
 

<?php get_footer(); ?>