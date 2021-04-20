<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
	<title>Sea Palace, het drijvende Chinese restaurant in Amsterdam-Centrum</title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/sea palace favicon.png" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	   <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	   <?php wp_head(); ?>
</head>
<body>
<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="spinner"></div>
</div>
</div>
</div>

<div class="wrapper">

<!-- main navigation -->
<div class="navigation-wrapper">
<div class="container">
<div class="logo-wrapper">
<a href="<?php echo get_home_url(); ?>">	
	<img src="<?php bloginfo('template_url'); ?>/images/SeaPalace-logo-white.png">
</a>	
</div>	
<div class="mobile-icons">
<div class="mobile-trigger-wrapper">
	<a  id="mobile-trigger">
			  <div class="burger">
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
		</a>
</div>
<div class="cart-cont">
<?php echo do_shortcode("[woo_cart_but]"); ?>
</div>
</div>

<div class="mobile-menu">
<div class="mobile-overlay"></div>	
<!-- <div class="mobile-logo">
<a href="<?php echo get_home_url(); ?>">	
	<img src="<?php bloginfo('template_url'); ?>/images/SeaPalace-logo-white-red.png">
</a>	
</div> -->
	<ul id="mobile-menu">
		<li>
<?php wp_nav_menu( array('theme_location' => 'mobile-menu',  ) ); ?>
	</li>
	<li>
		   <?php global $current_user; wp_get_current_user(); ?>
     <?php if ( is_user_logged_in() ) { ?>
     	<?php if(pll_current_language() == 'nl') { ?>  
          <a href="<?php echo get_home_url(); ?>/mijn-profiel/"><?php echo $current_user->display_name . "\n"; ?>
       <i class="fas fa-user"></i></a>
 <?php  } else if(pll_current_language() == 'en') { ?>
          <a href="<?php echo get_home_url(); ?>/en/my-acount/"><?php echo $current_user->display_name . "\n"; ?>
       <i class="fas fa-user"></i></a>
<?php }  ?>
       <?php } else { ?>
       	<?php if(pll_current_language() == 'nl') { ?>  
       <a class="login-link" href="<?php echo get_home_url(); ?>/inloggen">Inloggen / Aanmelden <i class="fas fa-user"></i></a>
 <?php  } else if(pll_current_language() == 'en') { ?>
       <a class="login-link" href="<?php echo get_home_url(); ?>/en/login">Login / Register <i class="fas fa-user"></i></a>
<?php }  ?>
        <?php } ?>
	</li>
	</ul>
<div class="lang-cta">
 <?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
</div>
</div>
<!-- adds opacity for under the menu -->
<div class="mobile-opacity"></div>
<!--  -->

<div class="nav-wrapper">
<ul id="main-menu">
	<li>
<?php wp_nav_menu( array('theme_location' => 'main-menu',  ) ); ?>
	</li>
	<li>
		   <?php global $current_user; wp_get_current_user(); ?>
     <?php if ( is_user_logged_in() ) { ?>

     	<?php if(pll_current_language() == 'nl') { ?>  
          <a href="<?php echo get_home_url(); ?>/mijn-profiel/"><?php echo $current_user->display_name . "\n"; ?>
       <i class="fas fa-user"></i></a>
 <?php  } else if(pll_current_language() == 'en') { ?>
          <a href="<?php echo get_home_url(); ?>/en/my-acount/"><?php echo $current_user->display_name . "\n"; ?>
       <i class="fas fa-user"></i></a>
<?php }  ?>
       <?php } else { ?>
       	<?php if(pll_current_language() == 'nl') { ?>  
       <a class="login-link" href="<?php echo get_home_url(); ?>/login">Inloggen / Aanmelden <i class="fas fa-user"></i></a>
 <?php  } else if(pll_current_language() == 'en') { ?>
       <a class="login-link" href="<?php echo get_home_url(); ?>/login">Login / Register <i class="fas fa-user"></i></a>
<?php }  ?>
        <?php } ?>
	</li>
	<li>
   <?php echo do_shortcode("[woo_cart_but]"); ?>
	</li>
</ul>

 <?php pll_the_languages( array( 'dropdown' => 3 ) ); ?>

</div>	
</div>
</div>
<!-- end of main nav -->
