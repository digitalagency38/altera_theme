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
<div class="container_block">
	<div class="container">
		<section>
			<div class="block_top">
				<div class="block_top__img">
					<img src="<?= get_field( "img" ); ?>" alt="<?php echo get_the_title(); ?>">
				</div>
				<div class="block_top__dates">
					<div class="block_top__date"><span>Начали: </span><?= get_field( "date_start" ); ?></div>
					<div class="block_top__date"><span>Сдадим:</span><?= get_field( "date_end" ); ?></div>
				</div>
			</div>
			<div class="block_info">
				<div class="block_info__title">О проекте</div>
				<div class="block_info__text"><?= get_field( "text" ); ?></div>
			</div>
			<?php $block_txt = get_field( 'block_txt' );?>	
			<div class="block_txt txt_all">
				<h2><?php echo $block_txt['title']; ?></h2>
				<div class="block_txt__text"><?php echo $block_txt['text']; ?></div>
				<?php $c_d_f = ($block_txt['list']); ?>
				<div class="block_txt__slider sl_txt">
					<?php if (is_array($c_d_f)) {
						foreach ($c_d_f as $e) { ?>
							<div class="block_txt__item">
								<img src="<?php echo $e['img']; ?>" alt="">
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<?php $block_txt2 = get_field( 'block_txt2' );?>	
			<div class="block_txt">
				<div class="block_txt__text"><?php echo $block_txt2['text']; ?></div>
			</div>
		</section>
	</div>
</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>