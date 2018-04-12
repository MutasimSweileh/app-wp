<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/glyphs/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/glyphs/Simple-Line-Icons.css" type="text/css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php  if(!get_theme_mod("penci_preloader")){ ?>
      <!-- Start PreLoader -->
      <section class="preloader">
        <div class="sk-chasing-dots">
          <div class="sk-child sk-dot1"></div>
          <div class="sk-child sk-dot2"></div>
        </div>
      </section>
       <!-- End PreLoader  -->
<?php } ?>
       <!-- Start Header -->

       <header id="header">
         <a class="logo" href="/">
         <?php
          if(has_custom_logo()){
          echo get_log_img();
          }else{
          ?>
           <img src="<?=get_template_directory_uri()?>/img/logo.png" alt="" />
         <?php } ?>
         </a>

         <nav class="navigation">

         <div class="responsive-menu">
           <a class="responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse">
             <i class="flaticon-three"></i>
           </a>
         </div>

           <div class="collapse navbar-collapse">
   					<div class="Menu-Header top-menu">
                          	<?php if ( has_nav_menu( 'Primary' ) ) : ?>

                                 <?php

                                 wp_nav_menu(array(
                                'theme_location' => 'Primary',
                                'container' => false,
                                //'menu_id' => 'nav',
                                //'menu_class' => 'nav navbar-nav',
                                'menu_class' => 'nav navbar-nav',
                                'walker' => new Main_Nav()
                              //  'items_wrap' => '<ul id="nav"><li class="active"><a href="#" data-slug="4,5,6,7,8,9" class="xyz">All</a></li>%3$s</ul>'
                                ));

								?>
                        	<?php endif; ?>


   						  <!--<li class="parent-list">
   							<a href="#" class="dropdown-toggle js-activated">الصفحات</a>
   							<ul class="dropdown-menu fadeIn">
   							<li><a href="404.html">غير موجود</a></li>
   							</ul>
   						  </li>-->


   					</div>
   				</div>
         </nav>
         <form class="searchbox">
           <input type="search" placeholder="البحث...." name="search" class="searchbox-input" onkeyup="buttonUp();" required>
           <button type="submit" class="searchbox-submit"><i class="flaticon-loupe"></i></button>
           <span class="searchbox-icon"><i class="flaticon-loupe"></i></span>
         </form>
       </header>

       <!-- END Header -->

      <main>

