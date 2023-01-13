<?php
/*
Template Name: Отзывы
*/
?>
<?php get_header('new')?>
	<section class="container container-review">
		<?php echo apply_filters('content', $post->post_content)?>
	</section>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
