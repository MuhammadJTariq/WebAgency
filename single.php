<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="page-header">
        <div>
            <?php the_content(); ?>
        </div>
        </div>

    <?php endwhile; ?>
<?php else : ?>
    <p>No content found</p>
<?php endif; ?>

<?php get_footer(); ?>