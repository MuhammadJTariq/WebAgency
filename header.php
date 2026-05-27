<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EntreHopeur Home Page</title>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<body <?php body_class(); ?>>
<?php if(is_single()){
  echo '<div class="progress-bar" id="progress"></div>';
}
?>
<div class="menu-nav">

   <nav class="desktop-menu">
    <div class="nav-logo">
      <a  href="<?php echo home_url(); ?>" style="text-decoration: none; color:inherit">
        Hopreneur<span>.</span>
      </a>
    </div>
   <ul class="nav-links">
    <?php 
    $pages = get_pages();
    foreach($pages as $page){
      ?>
      <li><a href="<?php echo get_permalink($page->ID);  ?>"><?php echo $page->post_title; ?></a></li>
      <?php
    }

    ?>
  

   </ul>
     <form action="/" class="form-nav">
      <input name="s" type="search" placeholder="Search...">
    </form>
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
  <div class="mobile-menu">
    <div class="toggle-box">
    <input type="checkbox" id="checkbox">
    <label for="checkbox" class="toggle">
        <div class="bars" id="bar1"></div>
        <div class="bars" id="bar2"></div>
        <div class="bars" id="bar3"></div>
    </label>
    </div>
    <div class="mobile-links">
       <ul>
    <?php 
    $pages = get_pages();
    foreach($pages as $page){
      ?>
      <li><a href="<?php echo get_permalink($page->ID);  ?>"><?php echo $page->post_title; ?></a></li>
      <?php
    }
    ?>
    <li><a href="<?php echo home_url('/?s='); ?>">Search</a></li>

    <?php

    ?>
    <?php if(is_home()){
    ?>
    <button class="nav-cta mobile" onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})">Get a Quote</button>
    <?php
  }
  else {
    ?>
   <a href="https://us13.list-manage.com/contact-form?u=6dd9a2693801375b334b9176b&form_id=088d88f24d4ae3778dff73a44e5261bb"><button class="nav-cta">Get a Quote</button></a>
   <?php
  } 
  ?>
   </ul>
    </div>
  </div>
</nav>
