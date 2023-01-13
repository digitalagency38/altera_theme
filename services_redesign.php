<?php
/*
Template Name: Услуги Редизайн
*/
?>
<?php get_header('new')?>
<?php
	$services = get_posts([
	        'post_type' => 'post_service',
            'numberposts' => 999,
            'orderby'     => 'menu_order',
		    'order'       => 'ASC'
    ]);
?>
<div class="breadcrumbs-wrapper new_bread">
    <div class="container">
        <div class="breadcrumbs-wrapper__inner">
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
    </div>
</div>

<div class="main_first center_block new_first">
  	<h1 class="title intro__title"><?php echo get_the_title(); ?></h1>
	<div class="new_services">
        <div class="new_services__in">
          
          
          
		<?php foreach ($services as $post): ?>
		<?php 
		//	if(($service->ID!=282)&&($service->ID!=95)&&($service->ID!=68)&&($service->ID!=283)&&($service->ID!=96)) {
			if(($post->ID!=95)) {
				//print_r($service);
		?>
          	<a href="/post_service/<?php echo $post->post_name?>/" class="new_services__item">
                <div class="new_services__item-image">
                    <img src="<?php echo get_the_post_thumbnail_url($post)?>" alt="">
                </div>
                <div class="new_services__item-overlay"></div>
                <div class="new_services__item-image-info">
                    <div class="name"><?php echo $post->post_title?></div>
                    <?php 
                //	if(($service->ID!=282)&&($service->ID!=95)&&($service->ID!=68)&&($service->ID!=283)&&($service->ID!=96)) {
                      if(get_field('price')) {
                        //print_r($service);
                    ?>
                      <div class="price">
                          <span>от:</span>
                          <strong><?php echo get_field('price') ;?> ₽</strong>
                      </div>
                    <?php }?>
                </div>
            </a>
		<?php }?>
		
		<?php endforeach;?>
          <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
      </div>
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
