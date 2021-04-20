<?php
/**
 * Quick view content.
 *
 * @author  YITH
 * @package YITH WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

while ( have_posts() ) :
	the_post();
	?>

	<div class="product">
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
	<div class="branding">
		<img src="<?php bloginfo('template_url'); ?>/images/SeaPalace-logo-white.png">
	</div>
    <div class="modal-img" style="background-image: url('<?php echo $image[0]; ?>')"></div>
			<div class="modal-text">
					<?php do_action( 'yith_wcqv_product_summary' ); ?>
		
					  <?php


?>





<?php if(pll_current_language() == 'nl') { ?>  
<?php $values = get_field('alergie'); ?>
 <?php  } else if(pll_current_language() == 'en') { ?>
<?php $values = get_field('alergie_en'); ?>
<?php }  ?>


<?php

if($values)
{
?>
<div class="alergies">
<?php if(pll_current_language() == 'nl') { ?>  
<h2>Allergenen</h2>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h2>Allergies</h2>
<?php }  ?>

<ul>
 <?php 
	foreach($values as $value)
	{
    ?>

 <li class="tooltip"><img src="<?php bloginfo('template_url'); ?>/images/icons/<?php echo $value; ?>.png"  >
 <span class="tooltiptext"><?php echo $value; ?></span>
</li>
<?php 
	}
?>
</ul>
<?php
}
?>
	<!-- end of check -->


	</div>
	</div>
	<?php
endwhile; // end of the loop.
