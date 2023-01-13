<?php
/*
Template Name: Портфолио
*/
?>
<?php
$load_count = 6;
$post_type = 'post_portfolio';
$count = wp_count_posts('post_portfolio')->publish;
$terms_count = [];
$portfolio = get_posts([
	'post_type' => $post_type,
	'numberposts' => $load_count,
]);
$terms = get_terms( array(
	'taxonomy' => 'post_tag',
	'hide_empty' => false,
));
foreach ($terms as $key => $term){
	$terms_count[$term->slug] = get_terms(['slug' => $term->name])[0]->count;
}
?>
<?php get_header('new')?>
    <div class="container container--side-bar">
        <div class="side-bar">
            <div class="side-bar--title">Выбрать категорию:</div>
            <div class="side-bar--list">
                <ul>
                    <li onclick="
                            getPostByTag(
                            '',
                            '<?php echo $load_count?>',
                            '<?php echo $count?>',
                            '<?php echo $post_type?>'
                            );
                            changeTitle('', event)
                            "
                    >
                        Все категории
                    </li>
				    <?php foreach ($terms as $term):?>
                        <li onclick="
                                    getPostByTag(
                                        '<?php echo $term->slug?>',
                                        '<?php echo $load_count?>',
                                        '<?php echo $terms_count[$term->slug]?>',
                                        '<?php echo $post_type?>'
                                    );
                                    changeTitle('<?php echo $term->name?>', event)
                                    "
                        >
                            <?php echo isset($term->name) ? $term->name : $term['title'] ?>
                        </li>
				    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="content">
            <section class="projects">
                <div class="projects--title"><h1><?= get_the_title() ?></h1> <span></span></div>
                <div class="projects--list more-box">
					<?php foreach ($portfolio as $item):?>
                        <a href="<?php echo $item->guid?>" class="item" itemid="<?php echo $item->ID?>">
                            <div class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></div>
                            <div class="text">
                                <div class="title"><?php echo $item->post_title?></div>
                                <div class="short_desc"><?php echo $item->post_excerpt?></div>
                            </div>
                        </a>
					<?php endforeach;?>
                </div>

            </section>
						<?php if($count > $load_count):?>
				        <section class="container portfolio_btn_section--hide">
				            <div class="button button_show-more"
				                 onclick="showMorePost('<?php echo $load_count?>', '<?php echo $count?>', '<?php echo $post_type?>')"
				            >
				                Показать еще
				            </div>
				        </section>
				    <?php endif;?>
        </div>
    </div>
    <div class="portfolio_btn_section"></div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
