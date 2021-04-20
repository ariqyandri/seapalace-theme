<?php while ( have_posts() ) : the_post(); ?>

<div class="post-container">

    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php the_content(); ?>
    YO

</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>