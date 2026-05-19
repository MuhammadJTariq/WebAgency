<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EntreHopeur Home Page</title>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
</head>
<body>
    <?php body_class(); ?>
<nav>
  <div class="nav-logo">Hopreneur<span>.</span></div>
   <?php wp_nav_menu(
    [
      'theme_location' => 'primary',
      'menu_class' => 'nav-links'
    ]
   );
   ?>
  <button class="nav-cta" onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})">Get a Quote</button>
</nav>
