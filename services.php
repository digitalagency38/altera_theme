<?php
/*
Template Name: Услуги
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
<div class="container">
	<section class="services_title"><h1>Услуги</h1></section>
	<section class="services_list">
		<?php foreach ($services as $service): ?>
		<?php 
		//	if(($service->ID!=282)&&($service->ID!=95)&&($service->ID!=68)&&($service->ID!=283)&&($service->ID!=96)) {
			if(($service->ID!=95)) {
				//print_r($service);
		?>
		
			<div class="services_list--item">
				<div class="img"><a href="/post_service/<?php echo $service->post_name?>/"><img src="<?php echo get_the_post_thumbnail_url($service)?>" alt="#"></a></div>
				<div class="title"><a href="/post_service/<?php echo $service->post_name?>/"><h2><?php echo $service->post_title?></h2></a></div>
				<!--<div class="text"><?php echo $service->post_excerpt?></div>-->
				<a href="/post_service/<?php echo $service->post_name?>/" class="btn"><div class="button">Перейти</div></a>
			</div>
		<?php }?>
		
		<?php endforeach;?>
		<div class="services_list--item"></div>
		<div class="services_list--logo"><img src="<?php get_uri('img/logo/logo.svg')?>" alt="#"></div>
	</section>
</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
