<?php
/**
 * Template Name:contact
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
<h1><?php the_title(); ?></h1>
</div>	
</header>
</header>
<div class="content bottom-padding">
<div class="row">
<div class="col-50 contact">
	<h2>Contact</h2>
	<ul>
		<li><?php the_field('adress'); ?></li>
<li><a href="tel:+31206264777"><i class="fas fa-phone"></i><?php the_field('phone_number'); ?></a></li>
<li><a href="mailto:<?php the_field('email'); ?>"><i class="far fa-envelope"></i><?php the_field('email'); ?></a></li>
<li><p><?php the_field('parkeer_info'); ?>:&nbsp;&nbsp;<a href="https://parkingcentrumoosterdok.nl/" target="_blank">parkingcentrumoosterdok.nl</a></p></li>
	</ul>
</div>
<div class="col-50">
<div class="img-effect">
<img src="<?php the_field('1st_row_img'); ?>">
</div>
</div>
</div>
</div>
<!-- end of row 1 -->
<div class="content full-bg top-padding">
<div class="col-center">
<?php if(pll_current_language() == 'nl') { ?>  
<h1>Neem contact op</h1>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h1>Get in touch</h1>
<?php }  ?>
<div class="form-wrapper">
	<?php if(pll_current_language() == 'nl') { ?>  
<?php echo do_shortcode( '[ninja_form id=2]'  );?>
 <?php  } else if(pll_current_language() == 'en') { ?>
<?php echo do_shortcode( '[ninja_form id=3]'  );?>
<?php }  ?>
</div>	
</div>	
</div>
<!-- end of form -->
<div class="map">
<div class="marker-wrapper">
<a href="https://g.page/Sea-Palace-restaurant?share" target="_blank">
<img src="<?php bloginfo('template_url'); ?>/images/SeaPalace-logo-white-shadow.png">
</a>
</div>
</div>	

<?php get_footer(); ?>