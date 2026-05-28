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
            <h1>Every<br><?php $category = get_queried_object(); echo $category->slug;  ?></h1>
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


                <?php


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
        <?php $cats = get_categories(); 
          foreach($cats as $cat){
          if($cat->name === 'Uncategorized'){

          }
          else {
              ?>
            <a href="<?php echo get_category_link($cat->term_id); ?>" class="cat-item active">
              <span class="cat-name"><?php echo $cat->name; ?></span>
              <span class="cat-count">47</span>
            </a>

            <?php
          }
          }
        
        ?>
      </div>
    </div>
 
    <div class="sidebar-section">
      <div class="sidebar-section-title">Most Read</div>
      <div class="popular-list">
        <?php $value = hopQuery::returnMostRead(3, true);
        $counter = 0;
          foreach($value as $val){
            ?>
        <a href="<?php echo sanitize_url($val['link']); ?>" class="popular-item">
          <div class="popular-num"><?php echo $counter; ?></div>
          <div class="popular-info">
            <div class="popular-cat"><?php echo $val['cat']; ?></div>
            <div class="popular-title"><?php echo $val['title']; ?></div>
          </div>
        </a>
          <?php
          $counter++;
          }

         ?>
      </div>
    </div>
 
    <div class="sidebar-section">
      <div class="sidebar-section-title">Tags</div>
      <div class="tag-cloud">
        <?php $tags = get_tags(); 
        foreach($tags as $tag){
          ?>
          <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag-chip"><?php echo $tag->name; ?></a>


          <?php
        }






      ?>
      </div>
    </div>
 
  </aside>
</div>
 

<?php get_footer(); ?>