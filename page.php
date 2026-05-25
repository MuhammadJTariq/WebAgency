<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div id="tsparticles" style="width:100%; height:100vh">
            <script>
tsParticles.load("tsparticles", {
  background: {
    color: "transparent"
  },

  particles: {
    number: {
      value: 80
    },

    color: {
      value: "#ffffff"
    },

    links: {
      enable: true,
      color: "#ffffff",
      distance: 150
    },

    move: {
      enable: true,
      speed: 2
    }
  }
});
</script>
        </div>
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