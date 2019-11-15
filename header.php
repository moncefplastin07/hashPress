<!DOCTYPE html>
<html dir="rtl">
<head>
   <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo current_page_title()?></title>
   <meta name="theme-color" content="#343a40">
   <?php
   if (function_exists('include_the_meta_tags')) {
      include_the_meta_tags();
   }
   ?>
	<?php wp_head();?>
</head>
<body>
<div class="header">
	<nav class="nav top-nav justify-content-center">
      <a class="nav-link fa fa-home" href="<?php echo bloginfo('home') ?>"></a>
      <a class="nav-link fa fa-facebook" href="https://www.facebook.com/moncefplastin07" target="_blank"></a>
      <a class="nav-link fa fa-twitter" href="https://www.twitter.com/moncefplastin07" target="_blank"></a>
      <a class="nav-link fa fa-instagram" href="https://www.instagram.com/moncefplastin07" target="_blank"></a>
      <a class="nav-link fa fa-search" href="javascript:Search('open')"></a>
   </nav>
   <div class="header-content">
      <?php
         if (is_home()) {
            if (have_posts()) {
               the_post();
               get_template_part('template-parts/content/content','bigSlider');
            }
         }
      ?>
   </div>
   <div class="search-area text-center" id="search-area">
     <a class="nav-link fa fa-close" href="javascript:Search('close')" style="font-weight: bolder;"></a>
      <div class="search-box">

         <form action="<?php bloginfo('home')?>" method="GET">
            <input type="text" class="form-control search-input" placeholder="ادخل كلمة البحث" name="s">
         </form>
      </div>
   </div>
</div>
<!--
<nav class="nav header-menu-nav top-nav justify-content-right">
   <?php wp_nav_menu(array('menu' => 'header-menu-nav'))?>
</nav>
-->
