<?php get_header(); ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<header class="default" style="background-image: url('<?php echo $image[0]; ?>')">
<div class="overlay"></div>
<div class="default-title">
<h1><?php the_title(); ?></h1>
</div>	
</header>
<!-- End of header -->
<div class="content">
<div class="">
				<?php
	if (have_posts()) :
   while (have_posts()) :
      the_post();
         the_content();
   endwhile;
endif;
?>
</div>
</div>
<?php get_footer(); ?>