<?php
/**
 * Template Name:Dimsum
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?> 
<?php get_header(); ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<header class="default long" style="background-image: url('<?php echo $image[0]; ?>')">
<div class="overlay"></div>
<div class="default-title">
<h4>Sea Palace</h4>
<h1><?php the_field('dim_sum_slogan'); ?></h1>
</div>	
</header>
</header>
<!-- end of header -->
<div class="content first-content bottom-padding">
<div class="col-center">
<?php the_field('1st_row_content'); ?>
</div>
</div>
<!-- end fo row 1 -->
<div class="content right-bg">
<div class="row">
<div class="col-50">
<?php the_field('2nd_row_content'); ?>
<?php if(pll_current_language() == 'nl') { ?>  
		<a href="<?php bloginfo('template_url'); ?>/menu/<?php the_field('dim_sum_menu'); ?>" target="_blank" class="default_btn">Dim sum kaart</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
		<a href="<?php bloginfo('template_url'); ?>/menu/<?php the_field('dim_sum_menu'); ?>" target="_blank" class="default_btn">Dim sum Menu</a>
<?php }  ?>
</div>
<div class="col-50">
<img src="<?php the_field('2nd_row_img'); ?>">
</div>
</div>
</div>	
<!-- end of row 2 -->
<div class="content right-bg">
<div class="row">
<div class="col-50">
	<img src="<?php the_field('3rd_row_img'); ?>">
</div>
<div class="col-50">
<?php the_field('3rd_row_content'); ?>
<?php if(pll_current_language() == 'nl') { ?>  
	<a href="<?php echo get_home_url(); ?>/bezorgen-afhalen/#24" class="default_btn">Dimsum Bestellen</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
	<a href="<?php echo get_home_url(); ?>/en/delivery-take-away/#72" class="default_btn">Order Dimsum</a>
<?php }  ?>
</div>
</div>
</div>	
<!-- end of row 3 -->
<div class="content right-bg bottom-padding">
<div class="col-center">
<?php the_field('4th_row_content'); ?>
</div>	
</div>
<!-- end of row 4 -->
<div class="content first-content bottom-padding">
<div class="col-center">
<?php the_field('5th_row_content'); ?>
<?php if(pll_current_language() == 'nl') { ?>  
	<a href="<?php echo get_home_url(); ?>/diner"  class="default_btn">Bekijk diner opties</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
	<a href="<?php echo get_home_url(); ?>/en/dinner/"  class="default_btn">View dinner options</a>
<?php }  ?>
</div>	
</div>	
<?php get_footer(); ?>