<?php
/*
Template Name: Контакты 2
*/
?>
<?php get_header('new')?>
<div class="container" style="position: relative;">
	<div class="contact_info">
		<div class="title">Контакты:</div>
		<div class="text">
			<?php echo apply_filters('the_content', $post->post_content);?>
		</div>
	</div>
</div>
<div class="contact" id="map-contact">

</div>
<div class="contact_map--mobile"></div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
