<?php
/*
Template Name: Блог
*/
?>
<?php

    $load_count = 6;
    $post_type = 'post_blog';
    $count = wp_count_posts('post_blog')->publish;

    $blog = get_posts([
        'post_type' => $post_type,
        'numberposts' => 4,
    ]);
    $blog_first = array_shift($blog);
?>
<?php get_header('new')?>
<div class="container">
	<section class="blog-page">
		<div class="blog-page--title">Блог</div>
		<div class="blog-page--first" itemid="<?php echo $blog_first->ID?>">
			<div class="box box_img"><img src="<?php echo get_the_post_thumbnail_url($blog_first)?>" alt="#"></div>
			<div class="box box_text">
				<div class="title"><?php echo $blog_first->post_title?></div>
				<div class="description"><?php echo $blog_first->post_content?></div>
                <div class="btn"><a href="<?php echo $blog_first->guid?>" class="button">Перейти</a></div>
			</div>
		</div>
		<div class="blog-page--list more-box">
			<?php foreach ($blog as $item):?>
				<div class="item" itemid="<?php echo $item->ID?>">
					<div class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></div>
					<div class="description"><?php echo $item->post_content?></div>
					<div class="btn"><a href="<?php echo $item->guid?>" class="button">Перейти</a></div>
				</div>
			<?php endforeach; unset($item)?>
		</div>
	</section>
	<?php if($count > $load_count):?>
        <section class="container">
            <div class="button button_show-more"
                 onclick="showMorePost('<?php echo $load_count?>', '<?php echo $count?>', '<?php echo $post_type?>')"
            >
                Показать еще
            </div>
        </section>
	<?php endif;?>
</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>