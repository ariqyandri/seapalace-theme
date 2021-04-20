<?php
/**
 * Template Name: about us
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
<h1><?php the_field('slogan2'); ?></h1>
</div>	
</header>
</header>
<!-- end of header -->
<div class="content bottom-padding">
<div class="col-center">
<?php the_field('1st_row_content'); ?>
</div>
</div>
<!--end of row 1 -->
<div class="content half-bg">
<div class="row">
<div class="col-50"><img src="<?php the_field('2nd_row_img'); ?>"></div>
<div class="col-50">
<?php the_field('2nd_row_content'); ?>
</div>
</div>
</div>
<!-- end of row 2 -->
<div class="content half-bg">
<div class="row">
<div class="col-50">
<?php the_field('3rd_row_content'); ?>
</div>
<div class="col-50"><img src="<?php the_field('3rd_row_img'); ?>"></div>
</div>
</div>
<!-- end of row 3 -->
<div class="content top-padding">
<div class="col-center">
	<?php if(pll_current_language() == 'nl') { ?>  
<h1>Impresies</h1>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h1>IMPRESSIONS</h1>
<?php }  ?>

</div>	
	<?php
	if (have_posts()) :
   while (have_posts()) :
      the_post();
         the_content();
   endwhile;
endif;
?>
</div>
<?php get_footer(); ?>