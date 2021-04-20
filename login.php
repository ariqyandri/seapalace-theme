<?php
/**
 * Template Name:Login
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?> 
<?php get_header(); ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<header class="default" style="background-image: url('<?php echo $image[0]; ?>')">
<div class="overlay"></div>
<div class="default-title">
<h1><?php the_title(); ?></h1>
</div>	
</header>
<div class="content">
<div class="row">


<div class="col-50 login">
<?php if(pll_current_language() == 'nl') { ?>  
<h2>Inloggen</h2>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h2>Login</h2>
<?php }  ?>
	<?php echo do_shortcode('[my_wc_login_form]'); ?>
</div>
<div class="col-50 register">
<?php if(pll_current_language() == 'nl') { ?>  
<h2>Account aanmaken</h2>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h2>Create account</h2>
<?php }  ?>    

<div class="register-text">
<?php if(pll_current_language() == 'nl') { ?>  
<p>Maak nu een account aan.</p>
 <?php  } else if(pll_current_language() == 'en') { ?>
<p>Create your acount</p>
<?php }  ?>

<a class="default_btn" id="registernow">
<?php if(pll_current_language() == 'nl') { ?>  
Account aanmaken
 <?php  } else if(pll_current_language() == 'en') { ?>
Create account
<?php }  ?>
</a>
</div>

<div class="register-container">
<?php if(pll_current_language() == 'nl') { ?>  
<?php echo do_shortcode( '[user_registration_form id="304"]' ); ?>
 <?php  } else if(pll_current_language() == 'en') { ?>
<?php echo do_shortcode( '[user_registration_form id="708"]' ); ?>
<?php }  ?>
</div>

</div>
</div>
</div>
<script type="text/javascript">
	  $(document).ready(function(){
    $("#registernow").click(function(){
        $(".register-container").slideDown("slow");
        $( ".register-text" ).fadeOut("fast");
      $('html, body').animate({
        scrollTop: $(".register-container").offset().top - 370
    }, 700);
    });
});
</script>
<?php get_footer(); ?>