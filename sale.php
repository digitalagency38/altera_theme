<?php
/*
Template Name: Акции
*/
?>
<?php
    $load_count = 6;
    $post_type = 'post_sale';
    $count = wp_count_posts('post_sale')->publish;

    $sale_slider = get_field('sale_slider', $post->ID);
    $sale_list = get_posts([
	    'post_type' => $post_type,
	    'numberposts' => $load_count,
    ]);
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
<?php if (have_rows('sale_slider')): ?>
	<section class="service_advertising">
    <div class="container">
      <div class="swiper-container service_advertising--swiper">
  			<div class="swiper-wrapper">
                      <?php while( have_rows('sale_slider') ): the_row(); ?>
                        <div class="swiper-slide">
                          <?php $link_sale = get_sub_field('sale_slider_link'); ?>
                          <?php if ($link_sale): ?>
                            <a class="sale_slider_link" href="<?= $link_sale ?>"></a>
                          <?php endif; ?>
                          <img class="sale_slider_desktop" src="<?= get_sub_field('sale_slider_desktop')?>" alt="#">
                          <img class="sale_slider_mobile" src="<?= get_sub_field('sale_slider_mobile')?>" alt="#">
                        </div>
                      <?php endwhile; ?>
  			</div>
  			<div class="swiper-pagination"></div>
  		</div>
    </div>
	</section>
                  <?php endif; ?>
	<div class="container post_container">
        <div class="sale-page--list more-box post_news post_akcii">
	<?php
		$post_type = 'post_sale';
		$count = wp_count_posts('post_sale')->publish;
		$sale_list = get_posts([
			'post_type' => $post_type,
		]);
	?>
			<?php foreach ($sale_list as $item): ?>
                <div class="item" itemid="<?php echo $item->ID?>">
                    <a href="<?php echo str_replace("https://altera-irkutsk.ru/","",str_replace("","",$item->guid))?>" class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></a>
                    <div class="text">
						<div class="post_date">
						<?php
						$date="$item->post_date";
						$y = date('Y-m-d',strtotime($date));
						echo $y;
						?>
						</div>
                        <a href="<?php echo str_replace("https://altera-irkutsk.ru/","",str_replace("","",$item->guid))?>" class="title"><?php echo $item->post_title?></a>
                        <div class="short_desc"><?php echo $item->post_excerpt?></div>
						<a class="post_button" href="<?php echo str_replace("https://altera-irkutsk.ru/","",str_replace("","",$item->guid))?>">Подробнее</a>
                    </div>
                </div>
			<?php endforeach;?>
        </div>
	</div>
    <?php if($count > $load_count):?>
        <section class="container">
            <div class="button button_show-more"
                 onclick="showMorePost('<?php echo $load_count?>', '<?php echo $count?>', '<?php echo $post_type?>')"
            >
                Показать еще
            </div>
        </section>
    <?php endif;?>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
