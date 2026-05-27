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

    <style>
  @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap');
  .np * { box-sizing: border-box; }
  .np {
    font-family: 'Oswald', sans-serif;
    padding: 2rem 0 3rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
  }
  .np-ghost {
    font-size: clamp(5rem, 16vw, 9rem);
    font-weight: 700;
    color: var(--color-border-tertiary);
    letter-spacing: -0.05em;
    line-height: 1;
    margin-bottom: -0.5rem;
    user-select: none;
    pointer-events: none;
  }
  .np-icon-wrap {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: var(--color-background-secondary);
    border: 0.5px solid var(--color-border-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
  }
  .np-icon-wrap i { font-size: 28px; color: var(--color-text-tertiary); }
  .np h2 {
    font-family: 'Oswald', sans-serif;
    font-size: 1.6rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--color-text-primary);
    margin: 0 0 10px;
  }
  .np p {
    font-family: 'Oswald', sans-serif;
    font-size: 0.88rem;
    font-weight: 300;
    color: var(--color-text-secondary);
    letter-spacing: 0.05em;
    line-height: 1.7;
    max-width: 340px;
    margin: 0 auto 2rem;
  }
  .np-divider {
    width: 40px;
    height: 1px;
    background: var(--color-border-secondary);
    margin: 0 auto 2rem;
  }
  .np-suggestions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    justify-content: center;
    margin-bottom: 2rem;
  }
  .np-chip {
    font-family: 'Oswald', sans-serif;
    font-size: 0.65rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--color-text-secondary);
    background: var(--color-background-secondary);
    border: 0.5px solid var(--color-border-secondary);
    border-radius: var(--border-radius-md);
    padding: 7px 16px;
    cursor: pointer;
    transition: border-color 0.15s, color 0.15s;
  }
  .np-chip:hover {
    border-color: var(--color-border-primary);
    color: var(--color-text-primary);
  }
  .np-actions { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }
  .np-btn-primary {
    font-family: 'Oswald', sans-serif;
    font-size: 0.72rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    font-weight: 500;
    padding: 11px 28px;
    cursor: pointer;
    border-radius: var(--border-radius-md);
    transition: opacity 0.15s;
    background: var(--color-text-primary);
    color: var(--color-background-primary);
    border: none;
  }
  .np-btn-primary:hover { opacity: 0.82; }
  .np-btn-ghost {
    font-family: 'Oswald', sans-serif;
    font-size: 0.72rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    font-weight: 400;
    padding: 11px 28px;
    cursor: pointer;
    border-radius: var(--border-radius-md);
    border: 0.5px solid var(--color-border-secondary);
    background: transparent;
    color: var(--color-text-secondary);
    transition: border-color 0.15s, color 0.15s;
  }
  .np-btn-ghost:hover { border-color: var(--color-border-primary); color: var(--color-text-primary); }
</style>

<h2 class="sr-only">No posts found — empty state container for Hopreneur Web Services</h2>

<div class="np">
  <div class="np-ghost" aria-hidden="true">000</div>

  <div class="np-icon-wrap">
    <i class="ti ti-file-search" aria-hidden="true"></i>
  </div>

  <h2>No Posts Found</h2>
  <p>Nothing matched your search. Try a different term, browse by category, or start fresh.</p>

  <div class="np-divider"></div>

  <div class="np-suggestions">
    <?php $categories = get_categories(); 

    foreach($categories as $cat){
        if($cat->name === 'Uncategorized'){

        }
        else {
            ?>

            <a href="<?php echo get_category_link( $cat->term_id ); ?>" class="np-chip">
                <?php echo $cat->name; ?>
            </a>


        <?php
        }
    }

    ?>
  </div>

<?php endif; ?>

</div>
 
  </section>



  </main>   


<?php get_footer(); ?>

