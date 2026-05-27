<?php get_header(); ?>


<?php 
if(have_posts()){
  while(have_posts()){
    the_post();
    $cat = get_the_category( get_the_ID() );
    $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'full' );


    ob_start();
    ?>
    <header class="post-hero" id="header-single" data-id="<?php echo get_the_ID(); ?>">
      <div class="breadcrumb">
        <a href="<?php echo home_url('/blog'); ?>">Blog</a>
        <span>/</span>
        <a href="<?php echo get_category_link($cat[0]->term_id); ?>"><?php echo $cat[0]->name; ?></a>
        <span>/</span>
        <span style="color: var(--gray-dark);">Current Post</span>
    </div>
  <div class="post-hero-inner">
    <div>
      <span class="post-category-tag"><?php echo $cat[0]->name; ?></span>
      <h1><?php echo get_the_title(); ?>
      <p class="post-hero-excerpt">
        <?php echo get_post_meta(get_the_ID(), 'headline', true);?>
      </p>
    </div>
    <div class="post-meta-panel">
      <div class="meta-block">
        <div class="meta-label">Published</div>
        <div class="meta-value"><?php echo get_the_date(); ?></div>
      </div>
      <div class="meta-block">
        <div class="meta-label">Author</div>
        <div class="meta-value"><?php echo get_the_author(); ?></div>
      </div>
      <div class="meta-block">
        <div class="meta-label">Read Time</div>
        <div class="meta-value"><?php echo hopQuery::get_reading_time(get_the_ID()); ?> Read</div>
      </div>
      <div class="meta-block">
        <div class="meta-label">Category</div>
        <div class="meta-value">WordPress</div>
      </div>
    </div>
  </div>
   <!-- HERO IMAGE -->
  <?php if($thumbnail){
    ?>
    <div class="post-hero-image"
    style="background-image:url('<?php echo $thumbnail ?>')">
    
    </div>


    <?

  }
  else {
    

  }
  ?>
</header>
   
<!-- BODY -->
<div class="post-body">
 
  <!-- ARTICLE -->
  <article>
    <div class="post-content" id="post-content">
      <?php echo hopQuery::add_toc_headings(get_the_content()); ?>
    </div>
 
    <!-- TAGS -->
    <div class="post-tags">
      <span class="tags-label">Tags</span>

      <?php
      $tags = get_the_tags();

      if ($tags) {
        foreach ($tags as $tag) {
          echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag">'
            . esc_html($tag->name) .
          '</a>';
        }
      }
      ?>
    </div>
 
    <!-- SHARE -->
    <div class="post-share">
      <span class="share-label">Share</span>
      <button class="share-btn" onclick="navigator.clipboard.writeText(window.location.href)">Copy Link</button>
      <button class="share-btn">Twitter / X</button>
      <button class="share-btn">LinkedIn</button>
    </div>
 
  </article>
   <aside class="post-sidebar">
    <div class="sticky-sidebar">
 
      <div>
        <div class="sidebar-block-title">In This Article</div>
        <ul class="toc-list" id="toc">
          <?php echo hopQuery::displayToc(); ?>
        </ul>
      </div>
 
      <div>
        <div class="sidebar-block-title">Related Posts</div>
        <div class="related-list">
          <?php buildRelate::relatedPosts(get_the_ID(), [], get_the_category( get_the_ID() )); ?>
        </div>
      </div>
 
      <div class="sidebar-cta">
        <div class="sidebar-block-title" style="margin-bottom: 16px;">Need a Hand?</div>
        <p>If your site is slow or something's not working, I can take a look and tell you exactly what needs fixing.</p>
        <a href="/#contact" class="sidebar-cta-btn">Get a Quote →</a>
      </div>
 
    </div>
  </aside>
 
</div>
 
<!-- AUTHOR -->
<div class="post-author">
  <div class="author-avatar">HW</div>
  <div class="author-info">
    <div class="author-label">Written By</div>
    <div class="author-name">Hopreneur Web Services</div>
    <div class="author-bio">Building websites for small businesses and entrepreneurs. Landing pages, WordPress, Squarespace, and more — done right, without the agency runaround.</div>
  </div>
</div>
 
<!-- MORE POSTS -->
<section class="more-posts">
  <div class="more-posts-header">More Articles</div>
  <div class="more-posts-grid">
    <?php buildRelate::relatedPosts(get_the_ID(), get_the_tags(), []); ?>
 
  </div>
</section>
    
  <? 

    echo ob_get_clean();
  }
}
wp_reset_postdata();
 
?>
 
  <!-- SIDEBAR -->

 
<?php get_footer(); ?>