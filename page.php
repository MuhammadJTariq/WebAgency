<?php get_header();  ?>

<?php 
if(have_posts()){
    while(have_posts()){
        the_post();
        the_title();
        the_content();

    }
}
wp_reset_postdata();

?>

<?php get_footer(); ?>