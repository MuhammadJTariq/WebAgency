<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="page-header">

        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>
        </div>
        </div>

    <?php endwhile; ?>
<?php else : ?>
    <p>No content found</p>
<?php endif; ?>

<?php get_footer(); ?>