<?php
/*
Template Name: Блог внутренняя
Template Post Type: post_blog
*/
?>
<?php
    $blog = get_posts([
        'post_type' => 'post_blog',
        'numberposts' => 3,
        'orderby' => 'rand',
        'exclude' => $post->ID
    ]);
?>
<?php get_header('new')?>
	<div class="container">
		<section class="blog-page blog-page--inner">
			<div class="blog-page--title">Блог</div>
			<div class="blog-page--first">
				<div class="box box_img"><img src="<?php echo get_the_post_thumbnail_url($post)?>" alt=""></div>
				<div class="box box_text">
					<div class="title"><?php echo $post->post_title?></div>
					<div class="description"></div>
				</div>
			</div>
			<div class="blog-page--full"><?php echo apply_filters('the_content', $post->post_content);?></div>
			<div class="blog-page--title">Другие новости:</div>
			<div class="blog-page--list">
				<?php foreach ($blog as $item):?>
					<div class="item">
						<div class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></div>
						<div class="description"><?php echo $item->post_content?></div>
						<div class="btn"><a href="<?php echo $item->guid?>" class="button">Перейти</a></div>

					</div>
				<?php endforeach; unset($item)?>
			</div>
		</section>
	</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>