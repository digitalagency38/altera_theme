<?php
/*
Template Name: Акция
Template Post Type: post_sale
*/
?>
<?php get_header('new')?>
<div class="post_main">
	<div class="breadcrumbs-wrapper new_bread">
		<div class="container">
			<div class="breadcrumbs-wrapper__inner">
				<?php if ( function_exists( 'bcn_display' ) ) bcn_display(); ?>
			</div>
		</div>
	</div>
	<h1 class="title intro__title center_block"><?php echo get_the_title(); ?></h1>
</div>
<div class="container">
	<section>
		<div class="img_single">
			<?
			the_post_thumbnail(full); ?>
		</div>
		<div class="single_date"><?php echo get_the_date(); ?></div>
<!-- 		<h2 class="single_title"></h2> -->
		<div class="txt_single">
		<?php echo apply_filters('the_content', $post->post_content);?>
		</div>
		<a href="#" class="sub-header__button sub-header__button--phone  action-open" style="min-height: 34px; width: fit-content">
          
          <span>Оставить заявку</span>
        </a>
	</section>
</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
