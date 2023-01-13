<?php get_header('new')?>
	<div class="container">
		<?php echo do_shortcode('[woocommerce_cart]')?>
	</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>