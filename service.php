<?php
/*
Template Name: Услуга
Template Post Type: post_service
*/
?>
<?php
    $service_gallery = get_field('service_gallery', $post->ID);
    $service_sale_slider = get_field('service_sale_slider', $post->ID);
    $service_title_before_content = get_field('service_title_before_content', $post->ID);
    $service_title_before_best = get_field('service_title_before_best', $post->ID);

    if(wp_get_post_tags($post->ID)){
	    $tag_slug = wp_get_post_tags($post->ID)[0]->slug;
	    $portfolio = get_posts([
		    'post_type' => 'post_portfolio',
		    'numberposts' => 6,
		    'tag' =>  $tag_slug
	    ]);
    }
?>
<?php get_header('new')?>
<?php 
 if ($post->ID == 24403) {
?>
<style>
	.container_hero {
		background: url(https://altera-irkutsk.ru/wp-content/uploads/2021/11/hero.jpg) center center no-repeat;
		background-size: cover;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding: 80px 40px;
		color: #fff;	
		position: relative;
		margin-bottom: 60px;
	}
	.container_hero:before {
		content: "";
		display: block;
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		background: rgba(0,0,0,0.3);
		z-index: 0;
	}
	.container_hero > * {
		position: relative;
		z-index: 1;			
	}
	
	.container_hero p, .container_hero h1 {
		//max-width: 800px;
		text-align: center;
		margin-bottom: 40px;
	}
	.va-middle {
		display: flex;
		flex-direction: column;
		//align-items: center;
		justify-content: center;
		height: 100%;
		padding: 40px;
	}
	.wp-block-columns img {
		line-height: 0;
	}
</style>	
<div class="container">
	<div class="container_hero">
		<h1>Строительство бассейнов В Иркутске "под ключ"</h1>
		<p>Бронируйте строительство бассейна по старым ценам! Сэкономьте от 15% от итоговой стоимости. Оставляйте заявку и в течение 24 часов мы произведем расчет стоимости бассейна вашей мечты.
</p>
		<a class="button" href="#consult">Оставить заявку</a>
	</div>
	<div class="service_details--content">	
		<p class="has-text-align-center"><strong>Проекты любой сложности, работаем «с 0»</strong></p>	
		<p>&nbsp;</p>
		<div class="wp-block-columns">
		   <div class="wp-block-column">
			  <figure class="wp-block-image size-large"><img loading="lazy" width="64" height="64" style="width: auto; display: block; margin: 20px auto 0 auto" src="https://altera-irkutsk.ru/wp-content/uploads/2021/05/guarantee.png" alt="" class="wp-image-24407"></figure>
			  <p>Гарантия на работу и оборудование год</p>
		   </div>
		   <div class="wp-block-column">
			  <figure class="wp-block-image size-large"><img loading="lazy" width="64" height="64" style="width: auto; display: block; margin: 20px auto 0 auto" src="https://altera-irkutsk.ru/wp-content/uploads/2021/05/pay-day.png" alt="" class="wp-image-24408"></figure>
			  <p>Собственная рассрочка, фиксирование цены при предоплате</p>
		   </div>
		   <div class="wp-block-column">
			  <figure class="wp-block-image size-large"><img loading="lazy" width="64" height="64" style="width: auto; display: block; margin: 20px auto 0 auto" src="https://altera-irkutsk.ru/wp-content/uploads/2021/05/key.png" alt="" class="wp-image-24409"></figure>
			  <p>Строительство под ключ от 14 дней</p>
		   </div>
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p class="has-text-align-center"><strong>Строительство бассейнов в Иркутске</strong></p>	
		<p>&nbsp;</p>
		<p class="has-text-align-center">для дач, коттеджей и загородных домов</p>	
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div class="wp-block-columns" style="background: #def4fd">
			<div class="wp-block-column">
				<img style="max-width: 100%" src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/e01.jpg">
			</div>
			<div class="wp-block-column">
				<div class="va-middle">
					<p><strong>Компания Альтера</strong></p>
					<p>&nbsp;</p>
					<p>Сотни сданных объектов и довольных клиентов за 20 лет работы. Работаем с мировыми лидерами по поставке оборудования и материалов для строительства бассейнов в Иркутской области и республике Бурятия
				</div>
				
			</div>
		</div>
		
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div class="wp-block-columns" style="background: #def4fd">
			
			<div class="wp-block-column">
				<div class="va-middle">
					<p><strong>Строительство бассейна</strong></p>
					<p>&nbsp;</p>
					<p>Стоимость строительства, а также модернизация бассейна варьируется в зависимости от размеров объекта, его формы, сложности и объема работ.
Реконструкция и обслуживание бассейна рассчитывается индивидуально.

				</div>
				
			</div>
			<div class="wp-block-column">
				<img style="max-width: 100%" src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/e02.jpg">
			</div>
		</div>
		
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div class="wp-block-columns" style="background: #def4fd">
			<div class="wp-block-column">
				<img style="max-width: 100%" src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/e03.jpg">
			</div>
			<div class="wp-block-column">
				<div class="va-middle">
					<p><strong>Комплектующие для бассейна</strong></p>
					<p>&nbsp;</p>
					<p>У нас всегда можно приобрести инструменты, оборудование и комплектующие для ухода за бассейнами.
					<p>&nbsp;</p>
					<p>Всегда в наличии средства для дезинфекции воды бассейна и другие химические реагенты, применяемые в очистке и поддержании в надлежащем состоянии.

				</div>
				
			</div>
		</div>
	</div>	
	<p>&nbsp;</p>
		<p>&nbsp;</p>
	<p class="has-text-align-center"><strong>Выполненные объекты 


</strong></p><p>&nbsp;</p>
	<p class="has-text-align-center">Мы гордимся тем фактом, что более половины объектов банно-саунного<br/> и бассейного направления по Байкальскому тракту были выполнены<br/> сотрудниками нашей компании</p>
	
	<p>&nbsp;</p>
		<p>&nbsp;</p>
	<div class="swiper-object-review" style="margin-bottom: 40px">
		<div class="swiper-container-review">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img style="width: 100%; max-width: 580px; height: 400px; object-fit: cover; margin: auto; display: block" src="https://altera-irkutsk.ru/wp-content/uploads/2021/12/01.jpg"></div>
				<div class="swiper-slide"><img style="width: 100%; max-width: 580px; height: 400px; object-fit: cover; margin: auto; display: block" src="https://altera-irkutsk.ru/wp-content/uploads/2021/12/02.jpg"></div>
				<div class="swiper-slide"><img style="width: 100%; max-width: 580px; height: 400px; object-fit: cover; margin: auto; display: block" src="https://altera-irkutsk.ru/wp-content/uploads/2021/12/03.jpg"></div>
				<div class="swiper-slide"><img style="width: 100%; max-width: 580px; height: 400px; object-fit: cover; margin: auto; display: block" src="https://altera-irkutsk.ru/wp-content/uploads/2021/12/04.jpg"></div>
				<div class="swiper-slide"><img style="width: 100%; max-width: 580px; height: 400px; object-fit: cover; margin: auto; display: block" src="https://altera-irkutsk.ru/wp-content/uploads/2021/12/05.jpg"></div>
				
				
			</div>	
		</div>
		<div class="swiper-pagination-review"></div>
			<div class="swiper-button-review swiper-button-prev-review"></div>
			<div class="swiper-button-review swiper-button-next-review"></div>
		</div>
		
	</div>
<?php	 
 } else if ($post->ID == 25782) {
?>
<div class="container">
	<section class="service_about" style="margin-bottom: 0px!important;">
      <div class="service_about--content">  			
        <div class="service_about--title"><h1>Строительство бань в Иркутске и области</h1></div>
      </div>
	</section>
</div>
<?php
} else if ($post->ID == 94) {	 
 }else {
?>
	<div class="container">
		<section class="service_about">
      <div class="service_about--content">
  			<div class="service_about--img"><img src="<?php echo get_the_post_thumbnail_url($post)?>" alt="#"></div>
        <div class="service_about--title"><h1><?php echo $post->post_title?></h1></div>
  			<div class="service_about--description"><p><?php echo $post->post_excerpt?></p></div>
  			<a class="button" href="#consult">Получить консультацию</a>
      </div>
		</section>
	</div>
<?php }?>
	<!-- <section class="service_gallery">
        <?php //foreach ($service_gallery as $item):?>
		<div class="service_gallery--item"><img src="<?php //echo $item?>" alt="#"></div>
        <?php //endforeach; unset($item)?>
	</section> -->
	<div class="container">
		<section class="service_details">
			<div class="service_details--title"><h1><?php echo $service_title_before_content?></h1></div>
			<div class="service_details--content">
				<?php echo apply_filters('the_content', $post->post_content);?>
			</div>
		</section>
		<?php if(isset($portfolio)):?>
            <section class="service_best-projects">
                <div class="service_best-projects--title"><?php echo $service_title_before_best?></div>
                <div class="service_best-projects--list">
                        <?php foreach ($portfolio as $item):?>
                            <div class="item">
                                <div class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></div>
                                <div class="title"><?php echo $item->post_title?></div>
                                <div class="short_desc"><?php echo $item->post_excerpt?></div>
                            </div>
                        <?php endforeach; unset($item)?>
                </div>
            </section>
		<?php endif;?>
	</div>
<?php if ($post->ID != 24403) {?>
  <div class="service_about--btn open_modal"><div class="button">Получить консультацию</div></div>
  <?php if( have_rows('service_reviews') ):?>
    <div class="container">
      <section class="section-review">
        <div class="section-title">
          <h2>Отзывы</h2>
        </div>
        <div class="swiper-object-review">
            <div class="swiper-container-review">
                <div class="swiper-wrapper">
                <?php while ( have_rows('service_reviews') ) : the_row(); foreach (get_sub_field('service_review') as $review):?>
                    <div class="swiper-slide">
                        <div class="review-item">
                            <div class="review-content">
                              <span><?= $review->post_content ?></span>
                            </div>
                            <div class="review-title">
                              <span><?= $review->post_title ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endwhile; ?>
                </div>
            </div>
            <div class="swiper-pagination-review"></div>
            <div class="swiper-button-review swiper-button-prev-review"></div>
            <div class="swiper-button-review swiper-button-next-review"></div>
        </div>
      </section>
    </div>
  <?php endif; ?>
<?php }?>
<?php 
 if ($post->ID == 24403) {
?>
<!--
<div class="container" style="text-align: center; margin: 40px auto">
	<h3 style="margin-bottom: 20px">
		Наши реализованные проекты
</h3>
	<p>
		Можем выслать наше портфолио, либо вы можете перейти на страницу <a style="text-decoration: underline" href="https://altera-irkutsk.ru/potrfolio/">портфолио</a>

	</p>	
</div>-->
	<div class="container" style="margin-top: 60px">
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div class="wp-block-columns" style="background: #def4fd">
			
			<div class="wp-block-column">
				<div class="va-middle">
					<p><strong>Расчет стоимости бесплатно</strong></p>
					<p>&nbsp;</p>
					<p>С вами свяжется наш замерщик и приедет в удобное время. 

					<p>&nbsp;</p>
					<p>Мы составим расчет в течение 24 часов

				</div>
				
			</div>
			<div class="wp-block-column">
				<div id="consult">
					<?= do_shortcode('[contact-form-7 id="23755" title="Консультация"]') ?>	
				</div>
			</div>
		</div>
	</div>
<?php }?>
<?php if ($post->ID != 24403) {?>
    <div class="container" style="margin-top: 60px">
        <section class="service_footer">
            <div class="box box_logo">
                <div class="logo"><img src="<?php get_uri('img/logo/logo.svg')?>" alt="#"></div>
                <div class="text">
                    У нашей компании богатая история.
                    С ней вы можете познакомиться
                    в разделе “о компании”.
                    <div class="blog_btn">
                        <a href="<?php echo get_page_link(7)?>" class="button">Познакомиться</a>
                    </div>
                </div>
            </div>
            <div class="box box_img"><img src="<?php get_uri('img/service/footer.png')?>" alt="#"></div>
        </section>
		<div id="consult">
			<?= do_shortcode('[contact-form-7 id="23755" title="Консультация"]') ?>	
		</div>
		
    </div>
<?php }?>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
