<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="page-header"
     style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/sketch.png');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;">
        <div class="page-content">
            <?php the_content(); ?>
        </div>
        </div>

    <?php endwhile; ?>
<?php else : ?>
    <p>No content found</p>
<?php endif; ?>

<?php get_footer(); ?>