<?php
/*
Template Name: Страница проектов
*/
?>
<?php get_header('new')?>
<div class="post_main">
	<div class="breadcrumbs-wrapper new_bread">
		<div class="container">
			<div class="breadcrumbs-wrapper__inner">
				<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			</div>
		</div>
	</div>
	<h1 class="title intro__title center_block"><?php echo get_the_title(); ?></h1>
</div>
<div class="container">
	<div class="block_proj">
		<?php $services = get_field('proj_list'); ?>
		<?php foreach( $services as $key => $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
				<div class="block_proj__block">
					<div class="block_proj__top">
						<div class="block_proj__img">
							<img src="<?= get_field( 'img' ); ?>" alt="<?php the_title(); ?>">
						</div>
						<a href="<?php echo get_permalink(); ?>" class="block_proj__title"><?php the_title(); ?></a>
					</div>
					<div class="block_proj__info">
						<div class="block_proj__l-side">
							<div class="block_proj__text"><?= get_field( 'text' ); ?></div>
							<div class="block_proj__dates">
								<div class="block_proj__date"><span>Начали: </span><?= get_field( 'date_start' ); ?></div>
								<div class="block_proj__date"><span>Сдадим: </span><?= get_field( 'date_end' ); ?></div>
							</div>
							<a href="<?php echo get_permalink(); ?>" class="block_proj__link">Смотреть проект</a>
						</div>
						<div class="block_proj__r-side">
							<div class="block_proj__date"><span>Начали: </span><?= get_field( 'date_start' ); ?></div>
							<div class="block_proj__date"><span>Сдадим: </span><?= get_field( 'date_end' ); ?></div>
						</div>
					</div>
				</div>
			<?php } ?>
	  <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
	</div>
</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
