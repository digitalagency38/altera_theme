<?php
/*
Template Name: Портфолио внутренняя
Template Post Type: post_portfolio
*/
?>
<?php get_header('new')?>
	<div class="container container-portfolio-single">
		<section>
			<h1><?php the_title(); ?></h1>
			<?php echo apply_filters('the_content', $post->post_content);?>
			<a href="#" class="sub-header__button sub-header__button--phone  portf-open" style="min-height: 34px; width: fit-content; margin-top: 40px">
          
			  <span>просчитать подобный проект</span>
			</a>
		</section>
	</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
