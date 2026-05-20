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
   <ul class="nav-links">
    <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
    <li><a href="<?php echo home_url('/blog'); ?>">Blog</a></li>

   </ul>
  <?php if(is_home()){
    ?>
    <button class="nav-cta" onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})">Get a Quote</button>
    <?php
  }
  else {
    ?>
   <a href="https://us13.list-manage.com/contact-form?u=6dd9a2693801375b334b9176b&form_id=088d88f24d4ae3778dff73a44e5261bb"><button class="nav-cta">Get a Quote</button></a>
   <?php
  } 
  ?>
</nav>
