<?php
/*
Template Name: Портфолио Редизайн
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
<div class="breadcrumbs-wrapper new_bread">
    <div class="container">
        <div class="breadcrumbs-wrapper__inner">
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
    </div>
</div>
<h1 class="title intro__title"><div class="container"><?php echo get_the_title(); ?></div></h1>

    <div class="container container--side-bar portfolio--redesign">
      
        <div class="side-bar">
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
                <div class="projects--list more-box 123">
					<?php foreach ($portfolio as $item):?>
                        <a href="<?php echo $item->guid?>" class="item" itemid="<?php echo $item->ID?>">
                            <div class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></div>
                          <div class="date"><?php echo date('j.n.Y', strtotime($item->post_date))?></div>
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
				                Загрузить ещё
				            </div>
				        </section>
				    <?php endif;?>
        </div>
    </div>
<div class="seo seo--redesign">
        <div class="container">
            <div class="seo__inner">
                <div class="seo__wrapper">
                    <div class="title">
						<?php echo the_field('seo_title'); ?>
                    </div>

                    <div class="seo__text">
						<?php echo the_field('seo_text'); ?>
                    </div>
                </div>
                <img class="seo__img" src="<?php echo the_field('seo_kartinka'); ?>" alt="">
            </div>

        </div>
    </div>

    <div class="advice advice--redesign">
        <div class="container">
            <div class="advice__inner">
                <div>
                    <div class="advice__title">
						<?php echo the_field('advice_title'); ?>
                    </div>
                    <div class="advice__descr">
						<?php echo the_field('advice_text'); ?>
                    </div>
                </div>

                <div class="btn-service btn-service--small" data-form_id="<?php echo the_field('advice_form'); ?>">
                    
					<?php echo the_field('advice_btn'); ?>
                </div>
            </div>
        </div>
    </div>

<?php echo do_shortcode('[contact-form-7 id="31848" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31849" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31850" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31851" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31852" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31853" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31854" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31855" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31856" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31857" title="Без названия"]') ?>
<?php echo do_shortcode('[contact-form-7 id="31858" title="Без названия"]') ?>
  
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
