<?php
/**
 * Template Name: home
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?> 
<?php get_header(); ?>
<header class="home-page">
<div class="title-wrapper">

<h4>Sea Palace</h4>
<h1><?php the_field('slogan'); ?></h1>
<div class="cta-wrapper">
<?php if(pll_current_language() == 'nl') { ?>  
<a href="<?php echo get_home_url(); ?>/bezorgen-afhalen/" class="default_btn">Nu Bestellen</a>
<a href="#ft-open" class="default_btn ghost">Reserveren</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
<a href="<?php echo get_home_url(); ?>/en/delivery-take-away/" class="default_btn">Order now</a>
<a href="#ft-open" class="default_btn ghost">Reservations</a>
<?php }  ?>
</div>	
</div>	
    <div class="vimeo-wrapper">
   <iframe src="https://player.vimeo.com/video/399917295?rel0&amp;muted=1&amp;loop=1&amp;controls=0&amp;autoplay=1&amp;color=&amp;playlist=399917295"
           frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
</header>
<div class="content first-content">

<div class="col-center">	
<?php the_field('row_1_content'); ?>
</div>
</div>
<!--  -->
<div class="content">
<div class="col-center">
<?php if(pll_current_language() == 'nl') { ?>  
	<h1> Ons Menu</h1>
 <?php  } else if(pll_current_language() == 'en') { ?>
	<h1> Our Menu</h1>
<?php }  ?>
</div>
</div>
<!--  -->
<div class="content animation">
<div class="row center diner">



<!-- menu preview item -->
<div class="menu-wrapper">
<div class="menu-container">
<div class="menu-background"></div>
<div class="content-container">
	<?php if(pll_current_language() == 'nl') { ?>  
	<h2>Tot 16.00 uur</h2>
	<h1>Dim <span class="extrabold">Sum</span></h1>
	<a href="<?php echo get_home_url(); ?>/dimsum">Bekijk menu <i class="fas fa-chevron-right"></i></a>
 <?php  } else if(pll_current_language() == 'en') { ?>
	<h2>Until 16.00 uur</h2>
	<h1>Dim <span class="extrabold">Sum</span></h1>
	<a href="<?php echo get_home_url(); ?>/dimsum">Check menu <i class="fas fa-chevron-right"></i></a>
<?php }  ?>

</div>
</div>
</div>
<!--  -->
<!-- menu preview item -->
<div class="menu-wrapper">
<div class="menu-container">
<div class="menu-background diner"></div>
<div class="content-container">
<?php if(pll_current_language() == 'nl') { ?>  
	<h2>Vanaf 15.00 uur</h2>
	<h1><span class="extrabold">Diner</span></h1>
	<a href="<?php echo get_home_url(); ?>/diner">Bekijk menu <i class="fas fa-chevron-right"></i></a>
 <?php  } else if(pll_current_language() == 'en') { ?>
	<h2>From 15.00 uur</h2>
	<h1><span class="extrabold">Diner</span></h1>
	<a href="<?php echo get_home_url(); ?>/diner">Check menu <i class="fas fa-chevron-right"></i></a>
<?php }  ?>
</div>
</div>
</div>
<!--  -->

</div>
</div>
<!-- end of menu -->

<div class="content bg home animation">
	<div class="red-col-wrapper">
	<div class="red-col">
<?php the_field('row_3_content'); ?>
    </div>
</div>
</div>
<!--  -->


<div class="content half-bg animation top-padding">
<div class="row">
<div class="col-50">
	<div class="slide-in animation">
        <img src="<?php the_field('4th_row_img'); ?>">
	</div>	
</div>
<div class="col-50">
<section class="middle-section">
<?php the_field('row_4_content'); ?>
</section>
</div>

</div>
</div>
<!--  -->

<div class="content half-bg impresie">
<div class="row flex">

<div class="col-30 impresie" style="background-image: url(<?php bloginfo('template_url'); ?>/images/food_3.jpg);"></div>	
<div class="col-30 impresie" style="background-image: url(<?php bloginfo('template_url'); ?>/images/cocktail_1.jpg);"></div>	
<div class="col-30 impresie" style="background-image: url(<?php bloginfo('template_url'); ?>/images/food_2.jpg);"></div>	

</div>
</div>
<!--  -->
<div class="content half-bg roll">

<div class="qoute">
<i class="fas fa-quote-right"></i>
<?php if(pll_current_language() == 'nl') { ?>  
<h3>Een stukje China in<br> Amsterdam.</h3>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h3>A taste of China in<br> Amsterdam.</h3>
<?php }  ?>
</div>

<div class="roll-dish" >
<img src="<?php bloginfo('template_url'); ?>/images/sea-palace-bowl.png">
</div>
</div>
<!--  -->

<div class="content animation about">
<div class="row">
<div class="col-50">
<?php the_field('5th_row_content'); ?>
</div>
<div class="col-50">
	<div class="slide-right">
  <img src="<?php the_field('5th_row_img'); ?>">
    </div>
</div>

</div>
</div>
<!--  -->

<div class="content last-row">
<div class="row">
<div class="col-60">
	<div class="impresie large"style="background-image: url(<?php the_field('6th_row_img'); ?>);"></div>
</div>
<div class="col-40">
	<section class="middle-section">
<?php the_field('6th_rows_content'); ?>
<?php if(pll_current_language() == 'nl') { ?>  
<a href="<?php echo get_home_url(); ?>/bezorgen-afhalen/" class="default_btn">Afhaalservice</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
<a href="" class="default_btn">Delivery service</a>
<?php }  ?>
</section>
</div>
</div>
</div>	
<?php get_footer(); ?>


