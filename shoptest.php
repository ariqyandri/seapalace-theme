<?php
/**
 * Template Name: Shop
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
<h1><?php the_title();?></h1>
</div>	
</header>

<div class="content shop">
<div class="shop-nav">	
<ul class="menu-nav">
<?php
$cat_terms = get_terms(
                array('product_cat'),
                array(
                        'hide_empty'    => true,
                         'orderby' => 'ID',
                         'order'   => 'ASC',
                        // 'number'        => 6 //specify yours
                    )
            );

if( $cat_terms ) :

    foreach( $cat_terms as $term ) :?>
<li>
<?php
$terms = get_the_terms( get_the_ID(), 'product_cat' );

  echo '<a href="#'.$term->term_id.'">'.$term->name.'</a>';
?>	
</li>

<?php endforeach; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</ul>
</div>
</div>	


<div class ="shop-content">
<?php
$cat_terms = get_terms(
                array('product_cat'),
                array(
                        'hide_empty'    => true,
                         'orderby' => 'ID',
                         'order'   => 'ASC',
                        // 'number'        => 6 //specify yours
                    )
            );

if( $cat_terms ) :

    foreach( $cat_terms as $term ) :
 ?>

<div class="cat-container">
<?php

 
  echo '<h1>'.$term->name.'</h1>';
  echo '<div class="shop-row" id="'.$term->term_id.'">';
?>

 <?php  

        $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'posts_per_page'        => -1,
                'order'                 => 'ASC',
                'tax_query'             => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'slug',
                                                'terms'    => $term->slug,
                                            ),
                                        ),
                'ignore_sticky_posts'   => true //caller_get_posts is deprecated since 3.1
            );
        $_posts = new WP_Query( $args );

        if( $_posts->have_posts() ) :
            while( $_posts->have_posts() ) : $_posts->the_post(); ?>
  
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
<div class="item-wrapper item-trigger" rel="<?php the_ID(); ?>">
<a href="#" class="button yith-wcqv-button quickview" data-product_id="<?php the_ID(); ?>"></a>
<div class="menu-preview" style="background-image: url('<?php echo $image[0]; ?>')"> </div>
<div class="price-tag">
<p><?php echo $product->get_price_html(); ?></p>
</div>
<div class="menu-info">
<div class="menu-title">
<h2 ><?php the_title(); ?></h2>
</div>
<div class="menu-cta">
      <?php
global $product;
$pid = $product->get_id();
?>

<a href="<?php echo do_shortcode( '[add_to_cart_url id=' . $pid . ']' ) ?>" class="default_btn button product_type_simple add_to_cart_button ajax_add_to_cart added" data-product_id="<?php echo  $pid ?>" ><i class="fas fa-shopping-cart"></i></a>
</div>




</div>
</div>

           <?php endwhile; ?>

<?php 
          else: ?>
          
            <?php
        endif;
        ?>
</div>
</div>
<?php 
    endforeach;
endif;
?>
</div>
<?php wp_reset_postdata(); ?>


<script type="text/javascript">

</script>



<script>
$(document).ready(function () {  
  var top = $('.shop-nav').offset().top;
  $(window).scroll(function (event) {
    var y = $(this).scrollTop();
    if (y >= top - 100)
      $('.shop-nav').addClass('stick');
    else
      $('.shop-nav').removeClass('stick');

  });
});


// $('.menu-nav a').click(function(){
//  $('.menu-nav a').not(this).toggleClass('active',false);
// $(this).toggleClass("active");
// });   



    $('a[href*="#"]:not([href="#"])').click(function() {
      var target = $(this.hash);
        $('html,body').stop().animate({
          scrollTop: target.offset().top - 250
        }, 'linear');   
  });    
  if (location.hash){
    var id = $(location.hash);
  }
  $(window).load(function() {
    if (location.hash){
      $('html,body').animate({scrollTop: id.offset().top -250}, 'linear')
    };
  });




$(document).ready(function () {
    $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        // e.preventDefault();
        // $(document).off("scroll");
        
        // $('a').each(function () {
        //     $(this).removeClass('active');
        // })
        // $(this).addClass('active');
      
        // var target = this.hash,
        //     menu = target;
        // $target = $(target);
        // $('html, body').stop().animate({
        //     'scrollTop': $target.offset().top-250  
        // }, 500, 'swing', function () {
        //     window.location.hash = target;
        //     $(document).on("scroll", onScroll);
        // });
    });
});




function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('.menu-nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top - 250 <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.menu-nav a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}







</script>

<?php get_footer(); ?>