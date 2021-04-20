<!-- begin footer -->
<footer>
<div class="container">	
<div class="row">
<div class="col-30">
<ul>
	<li><h4>Sea Palace</h4></li>
	<li><p>Oosterdokskade 8</p></li>
	<li><p>1011 AE Amsterdam</p></li>
	<li><p>
<?php if(pll_current_language() == 'nl') { ?>  
		Tel: 
 <?php  } else if(pll_current_language() == 'en') { ?>
   Phone:
<?php }  ?>

		<a href="tel:+31206264777">+31 (0)20 62 64 777</a></p></li>
	<li><p>E-mail: <a href="mailto:info@seapalace.nl">info@seapalace.nl</a></p></li>
	<li><a href="https://www.facebook.com/Sea.Palace.restaurant" target="_blank"><i class="fab fa-facebook-f"></i></a>
     <a href="https://www.instagram.com/seapalace/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/message/BWQRGS3YQUSEA1" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
</ul>	


</div>
<div class="col-30">
<ul>
	<?php if(pll_current_language() == 'nl') { ?>  
	<li><h4>Openingstijden</h4></li>
	<li><p>Restaurant</p></li>
	<li><p>Elke dag 12.00 – 22.30 uur</p></li>
	<li><a href="<?php echo get_home_url(); ?>/bezorgen-afhalen/"><p>Bezorgen / Afhalen</p></a></li>
	<li><p>7 dagen per week : 12.30 – 22.00 uur</p></li>
	<li><a href="<?php bloginfo('template_url'); ?>/menu/Take-Away-delivery-allergenen.pdf" target="_blank"><p>ALLERGENEN Bezorgen/Afhalen</p></a></li>

 <?php  } else if(pll_current_language() == 'en') { ?>
	<li><h4>Opening hours</h4></li>
	<li><p>Restaurant</p></li>
	<li><p>Every day from 12.00 – 22.30 uur</p></li>
	<li><a href="<?php echo get_home_url(); ?>/en/delivery-take-away/"><p>Delivery / Take Away</p></a></li>
	<li><p>7 days a week : 12.30 – 22.00 uur</p></li>
	<li><a href="<?php bloginfo('template_url'); ?>/menu/Take-Away-delivery-allergenen.pdf" target="_blank"><p>ALERGIES Take Away/Delivery</p></a></li>
<?php }  ?>
</ul>	

</div>	
<div class="col-30">
	<ul>
		<li><h4>Links</h4></li>
		<li><?php wp_nav_menu( array('theme_location' => 'footer-menu', ) );?></li>
	</ul>


</div>		

</div>
</div>
<div class="overlay"></div>
</footer>
<div class="under-footer">
<div class="container">
<p>© <?php echo date('Y');?>  Sea Palace. All rights reserved.</p>
</div>
</div>
<!-- end of footer -->
<div id="totop" class="totop"><i class="fas fa-angle-up"></i></div>
<!-- end of wrapper -->
</div>
</body>
<?php wp_footer(); ?>
</html>