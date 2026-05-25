  <?php get_header(); ?>
  
  <main>
  
  <section class="search-hero">
    <div class="search-tag">Site Search</div>
    <h1>Find What<br>You <em>Need.</em></h1>
 
    <div class="search-bar-wrap">
      <div class="search-icon-box">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </div>
      <form class="search-input" action="">
        <input
        type="search"
        class="search-input"
        id="searchInput"
        placeholder="Search articles, topics, platforms…"
        autocomplete="on"
        autofocus
        name="s"
        aria-label="Search site"
      >
      </form>
      <button class="search-clear" id="searchClear" aria-label="Clear search">Clear</button>
      <script>
        const search = document.getElementById("searchInput");

            search.addEventListener("keydown", function(e){
            if(e.key === "enter"){
                e.preventDefault();
            }
            
        })
      </script>
    </div>
  </section>

   
  <!-- RESULTS -->
  <section class="results-area">
    <div class="results-list" id="resultsList">

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <a href="<?php the_permalink(); ?>" class="result-item">

            <div class="result-date">
                <div class="result-day"><?php echo get_the_date('D'); ?></div>
                <div class="result-month"><?php echo get_the_date('M'); ?></div>
                <div class="result-year"><?php echo get_the_date('Y'); ?></div>
            </div>

            <div class="result-body">


                <div class="result-title">
                    <?php the_title(); ?>
                </div>

                <div class="result-excerpt">
                    <?php the_excerpt(); ?>
                </div>

            </div>

            <div class="result-arrow">→</div>

        </a>

    <?php endwhile; ?>

<?php else : ?>

    <div class="state-empty" id="stateEmpty">
        <span class="state-icon" aria-hidden="true">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2a2a2a" stroke-width="1" stroke-linecap="round">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                <line x1="8" y1="8" x2="14" y2="14"/>
                <line x1="14" y1="8" x2="8" y2="14"/>
            </svg>
        </span>
        <h2>No Results Found</h2>
        <p>Try a different search term or browse by category.</p>
    </div>

<?php endif; ?>

</div>
 
  </section>



  </main>   


<?php get_footer(); ?>

