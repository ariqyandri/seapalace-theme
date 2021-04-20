<?php get_header(); ?>
<header class="default long error">
<div class="overlay"></div>	
<div class="error title-wrapper">
<?php if(pll_current_language() == 'nl') { ?>  
<h1>404</h1>
<p>OEPS! NIETS GEVONDEN</p>
<a href="<?php echo get_home_url(); ?>" class="default_btn">Terug naar homepage</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h1>404</h1>
<p>OOPS! something went wrong</p>
<a href="<?php echo get_home_url(); ?>" class="default_btn">Back to the homepage</a>
<?php }  ?>
</div>
</header>
<?php get_footer(); ?>