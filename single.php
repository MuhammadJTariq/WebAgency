<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="page-header" style="background-image:url('<?php echo THEME_DIR; ?>/images/sketch.png'); 
background-attachment:fixed;

">
        <div>
            <?php the_content(); ?>
        </div>
        </div>

    <?php endwhile; ?>
<?php else : ?>
    <p>No content found</p>
<?php endif; ?>

<?php get_footer(); ?>