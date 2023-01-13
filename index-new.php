<?php
/*
Template Name: Главная (новая)
*/
?>
<?php
    $blog_link = get_page_data('blog')->guid;
    $service_link = get_page_data('services')->guid;
    $portfolio_link = get_page_data('portfolio')->guid;
    $gallery = get_field('front_gallery', $post->ID, true);
    $services = get_posts([
	    'post_type' => 'post_service',
	    'numberposts' => -1,
    ]);
    $backgrounds = [
      "img/index_background_31.jpg",
      "img/index_background_1.jpg",
      "img/index_background_2.jpg",
      "img/index_background_3.jpg"

    ];
?>
<?php get_header('new')?>

<?php 
	$glavnyj_slajder = get_field('glavnyj_slajder');
?>
<div class="main_first center_block">
  <div class="main_first__blocks sl_first new_red_slider">
    <?php
    	if (isset($glavnyj_slajder2)) {
        	foreach ($glavnyj_slajder2 as $item) {
    ?>
      <div class="main_first__block">
        <div class="main_first__l-side"><img src="<?= $item['kartinka_sleva']; ?>" alt="<?= $item['zagolovok']; ?>"></div>
        <div class="main_first__c-side">
          <div class="main_first__title"><?= $item['zagolovok']; ?></div>
          <div class="main_first__text"><?= $item['tekst']; ?></div>
          <a href="<?= $item['ssylka']; ?>" class="main_first__more<?php if ($item['forma']) {echo ' btn-popup';} ?>">Узнать подробности</a>
        </div>
        <div class="main_first__r-side"><img src="<?= $item['kartinka_sprava']; ?>" alt="<?= $item['zagolovok']; ?>"></div>
      </div>
    <?php
      		}
    	};
    ?>
    <?php
    	if (isset($glavnyj_slajder)) {
        	foreach ($glavnyj_slajder as $item) {
    ?>
      <a href="<?= $item['ssylka']; ?>" class="main_first__block">
        <div class="main_first__c-side">
          <div class="main_first__title"><?= $item['zagolovok']; ?></div>
        </div>
		  <div class="main_first__img"><img src="<?= $item['img']; ?>" alt=""></div>
		  <div class="main_first__img2"><img src="<?= $item['img2']; ?>" alt=""></div>
      </a>
    <?php
      		}
    	};
    ?>
  </div>
  <div class="main_first__navs sl_navs">
    
  </div>
</div>
<?php 
	$uslugi = get_field('uslugi');
?>
<div class="main_services center_block">
  <div class="main_services__top">
    <div class="main_services__title"><?= $uslugi['zagolovok'] ?></div>
    <a href="<?= $uslugi['ssylka'] ?>" class="main_services__more">Все услуги</a>
  </div>
  <div class="main_services__blocks sl_services">
    <?php
    	if (isset($uslugi)) {
        	foreach ($uslugi['spisok'] as $item) {
    ?>
      <a href="<?= $item['ssylka']; ?>" class="main_services__block">
        <div class="main_services__img"><img src="<?= $item['kartinka']; ?>" alt="<?= $item['zagolovok']; ?>"></div>
        <div class="main_services__info">
          <div class="main_services__tit"><?= $item['zagolovok']; ?></div>
          <div class="main_services__price">от: <span><?= $item['czena']; ?> ₽</span></div>
        </div>
      </a>
    <?php
      		}
    	};
    ?>
  </div>
</div>
<div class="main_services main_news center_block">
  <div class="main_services__top">
    <div class="main_services__title">Акции</div>
    <a href="/akczii" class="main_services__more">Все акции</a>
  </div>
	<?php
		$post_type = 'post_sale';
		$count = wp_count_posts('post_sale')->publish;
		$sale_list = get_posts([
			'post_type' => $post_type,
		]);
	?>
	<div class="sale-page--list more-box post_news sl_new_news">
		<?php foreach ($sale_list as $item): ?>
		<div class="item" itemid="<?php echo $item->ID?>">
			<a href="<?php echo str_replace("https://altera-irkutsk.ru/","",str_replace("","",$item->guid))?>" class="img"><img src="<?php echo get_the_post_thumbnail_url($item)?>" alt="#"></a>
			<div class="text">
				<div class="post_date"><?php echo get_the_date(); ?></div>
				<a href="<?php echo str_replace("https://altera-irkutsk.ru/","",str_replace("","",$item->guid))?>" class="title"><?php echo $item->post_title?></a>
				<div class="short_desc"><?php echo $item->post_excerpt?></div>
				<a class="post_button" href="<?php echo str_replace("https://altera-irkutsk.ru/","",str_replace("","",$item->guid))?>">Подробнее</a>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div>
<?php 
	$pochemu_my = get_field('pochemu_my');
?>
<div class="main_pref">
  <div class="main_pref__in center_block">
    <div class="main_pref__title"><?= $pochemu_my['zagolovok'] ?></div>
    <div class="main_pref__blocks">
      <?php
    	if (isset($pochemu_my)) {
        	foreach ($pochemu_my['spisok'] as $item) {
      ?>
        <div class="main_pref__block">
          <div class="main_pref__top">
            <div class="main_pref__img"><img src="<?= $item['kartinka']; ?>" alt="<?= $item['zagolovok']; ?>"></div>
            <div class="main_pref__tit"><?= $item['zagolovok']; ?></div>
          </div>
          <div class="main_pref__text"><?= $item['tekst']; ?></div>
        </div>
      <?php
      		}
    	};
      ?>
    </div>
  </div>
</div>
<?php 
	$kategorii = get_field('kategorii');
?>
<div class="main__cat center_block">
  <div class="main_services__top">
    <div class="main_services__title"><?= $kategorii['zagolovok'] ?></div>
    <a href="<?= $kategorii['ssylka'] ?>" class="main_services__more">Посмотреть все</a>
  </div>
  <div class="main__cat__blocks">
     <?php
    	if (isset($kategorii)) {
        	foreach ($kategorii['spisok'] as $item) {
    ?>
      <a href="<?= $item['ssylka']; ?>" class="main__cat__block">
        <div class="main__cat__img"><img src="<?= $item['kartinka']; ?>" alt="<?= $item['zagolovok']; ?>"></div>
        <div class="main__cat__info">
          <div class="main__cat__tit"><?= $item['zagolovok']; ?></div>
          <div class="main__cat__price">от: <span><?= $item['czena']; ?> ₽</span></div>
        </div>
      </a>
    <?php
      		}
    	};
    ?>
  </div>
</div>
<?php 
	$tovary = get_field('tovary');
?>
<div class="main_prods">
  <div class="main_prods__in center_block">
    <div class="main_prods__title"><?= $tovary['zagolovok']; ?></div>
    <div class="main_prods__blocks sl_prods">
      <?php
    	if (isset($tovary)) {
        	foreach ($tovary['spisok'] as $item) {
    ?>
        <a href="<?= $item['ssylka']; ?>" class="main_prods__block">
          <div class="main_prods__img">
            <img src="<?= $item['kartinka']; ?>" alt="<?= $item['nazvanie']; ?>">
            <?php
                if ($item['flagi']) {
            ?>
              <div class="main_prods__flags">
                <?php
                        foreach ($item['flagi'] as $flag) {
                ?>
                <div class="main_prods__flag sale" style="--background: <?= $flag['czvet']; ?>;"><?= $flag['tekst']; ?></div>
                <?php
                  };
                ?>
              </div>
            <?php
                  };
            ?>
          </div>
          <div class="main_prods__info">
            <div class="main_prods__tit"><?= $item['nazvanie']; ?></div>
            <div class="main_prods__prices">
              <div class="main_prods__price"><?= $item['czena-novaya']; ?> ₽</div>
              <?php
                  if ($item['czena-staraya']) {
              ?>
              <div class="main_prods__old_price"><?= $item['czena-staraya']; ?></div>
              <?php
                  };
              ?>
            </div>
            <div class="main_prods__button"><?= $item['tekst_v_knopke']; ?></div>
          </div>
        </a>
      <?php
      		}
    	};
    ?>
    </div>
  </div>
</div>
<div class="portfolio">
        <div class="container">
            <div class="portfolio__header">
                <div class="title portfolio__title">
					<?php echo the_field('portfolio_title') ?>
                  
                </div>
                <a href="/portfolio/">
                    <div class="btn-service btn-service--portfolio btn-service--portfolio-small mt30">
                        Все работы
                    </div>
                </a>
            </div>

            <div class="swiper swiper-portfolio">
                <div class="swiper-wrapper">
					<?php
                                $post_objects = get_field('portfolio_projects');
                                        if( $post_objects ): ?>
                                <?php foreach( $post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>
                                    <div class="portfolio__box swiper-slide">
                                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                        <div class="portfolio__box-date">
                                            <?php echo get_the_date( "d.m.Y" ); ?>
                                        </div>
                                        <div class="portfolio__box-name">
                                            <?php echo get_the_title(); ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>"><div class="btn-service btn-service--portfolio">Подробнее</div></a>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                            <?php endif; ?>
                    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev swiper-button-prev-portfolio">
                <svg width="39" height="28" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.98588 10.2165L12.0534 1.10797L10.9505 0L0 11L10.9505 22L12.0534 20.892L2.98588 11.7835H31V10.2165H2.98588Z" fill="#CCCCCC"/>
                        </svg>

            </div>
            <div class="swiper-button-next swiper-button-next-portfolio">
                <svg width="39" height="28" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0141 10.2165L18.9466 1.10797L20.0495 0L31 11L20.0495 22L18.9466 20.892L28.0141 11.7835H0V10.2165H28.0141Z" fill="#0095D9"/>
                        </svg>
            </div>
        </div>
    </div>
<div class="work-process work-process--mobile">
        <div class="container">
            <div class="title">
                Как мы будем работать
            </div>
            <div class="work-process__inner">
                <div class="work-process__box">
                    <div class="work-process__box-circle">
                        <img src="<?php echo the_field('work_process_img_1') ?>" alt="" class="work-process__box-img">
                    </div>
                    <div class="work-process__box-title"><?php echo the_field('work_process_title_1') ?></div>
                    <div class="work-process__box-descr"><?php echo the_field('work_process_descr_1') ?></div>
                </div>
                <div class="work-process__box">
                    <div class="work-process__box-circle">
                        <img src="<?php echo the_field('work_process_img_2') ?>" alt="" class="work-process__box-img">
                    </div>
                    <div class="work-process__box-title"><?php echo the_field('work_process_title_2') ?></div>
                    <div class="work-process__box-descr"><?php echo the_field('work_process_descr_2') ?></div>
                </div>
                <div class="work-process__box">
                    <div class="work-process__box-circle">
                        <img src="<?php echo the_field('work_process_img_3') ?>" alt="" class="work-process__box-img">
                    </div>
                    <div class="work-process__box-title"><?php echo the_field('work_process_title_3') ?></div>
                    <div class="work-process__box-descr"><?php echo the_field('work_process_descr_3') ?></div>
                </div>
                <div class="work-process__box">
                    <div class="work-process__box-circle">
                        <img src="<?php echo the_field('work_process_img_4') ?>" alt="" class="work-process__box-img">
                    </div>
                    <div class="work-process__box-title"><?php echo the_field('work_process_title_4') ?></div>
                    <div class="work-process__box-descr"><?php echo the_field('work_process_descr_4') ?></div>
                </div>
            </div>
        </div>
    </div>
<?php 
	$otzyvy = get_field('otzyvy');
?>
<div class="main_reviews center_block">
  <div class="main_reviews__title"><?= $otzyvy['zagolovok'] ?></div>
  <div class="main_reviews__blocks sl_reviews">
    <?php
    	if (isset($otzyvy)) {
        	foreach ($otzyvy['spisok'] as $item) {
    ?>
    <div class="main_reviews__block">
      <div class="main_reviews__top">
        <div class="main_reviews__img"><img src="<?= $item['avatar']; ?>" alt="<?= $item['imya']; ?>"></div>
        <div class="main_reviews__info">
          <div class="main_reviews__name"><?= $item['imya']; ?></div>
          <div class="main_reviews__date"><?= $item['data']; ?></div>
        </div>
      </div>
      <div class="main_reviews__text"><?= $item['tekst']; ?></div>
      <div class="main_reviews__hide"><?= $item['skrytyj_tekst']; ?></div>
      <div class="main_reviews__bottom">
        <div class="main_reviews__more">Читать полностью</div>
        <div class="main_reviews__small_logo"><img src="<?= $item['gde_ostavlen_otzyv']; ?>" alt="<?= $item['gde_ostavlen_otzyv']; ?>"></div>
      </div>
    </div>
    <?php
      		}
    	};
    ?>
  </div>
</div>
<div class="team">
        <div class="container">
            <div class="team__header">
                <div class="title team__title">
                    Наша команда
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev swiper-button-prev-team">
                    <svg width="39" height="28" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.98588 10.2165L12.0534 1.10797L10.9505 0L0 11L10.9505 22L12.0534 20.892L2.98588 11.7835H31V10.2165H2.98588Z" fill="#CCCCCC"/>
                        </svg>

                </div>
                <div class="swiper-button-next swiper-button-next-team">
                    <svg width="39" height="28" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0141 10.2165L18.9466 1.10797L20.0495 0L31 11L20.0495 22L18.9466 20.892L28.0141 11.7835H0V10.2165H28.0141Z" fill="#0095D9"/>
                        </svg>
                </div>
            </div>

            <div class="swiper  swiper-team">
                <div class="swiper-wrapper">
					<?php
					$post_objects = get_field('id_team');
							 if( $post_objects ): ?>
					<?php foreach( $post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
					<div class="swiper-slide">
						<img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
						<div class="team__name">
							<?php echo the_title(); ?>
						</div>
						<div class="team__position">
							<?php echo the_field('team_position'); ?>
						</div>
						<div class="team__experience">
							<?php echo the_field('team_experiance'); ?>
						</div>
					</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php 
	$o_nas = get_field('o_nas');
	if ($o_nas) {
?>
<div class="main_text">
  <div class="main_text__in center_block">
    <div class="main_text__l-side">
      <div class="main_text__title"><?= $o_nas['zagolovok'] ?></div>
      <div class="main_text__text"><?= $o_nas['tekst'] ?></div>
    </div>
    <div class="main_text__r-side">
      <img src="<?= $o_nas['kartinka'] ?>" alt="<?= $o_nas['zagolovok'] ?>">
    </div>
  </div>
</div>
<?php }; ?>
<?php 
	$klienty = get_field('klienty');
	if ($klienty) {
?>
<div class="main_vendors center_block">
  <div class="main_vendors__title">Наши корпоративные клиенты:</div>
  <div class="main_vendors__blocks">
    <?php
        foreach ($klienty as $item) {
    ?>
      <a href="<?= $item['ssylka']; ?>" class="main_vendors__block">
        <img src="<?= $item['kartinka'] ?>" alt="">
      </a>
    <?php
    	};
    ?>
  </div>
</div>
<?php }; ?>
<div class="main_advice center_block">
  <div class="main_advice__in">
    <div class="main_advice__l-side">
      <div class="main_advice__title">Закажите консультацию</div>
      <div class="main_advice__subtitle">Наши специалисты свяжутся с вами и ответят на все интересующие
        вас вопросы. </div>
    </div>
    <div class="main_advice__r-side">
      <div class="main_advice__text">Оставьте заявку, чтобы забронировать выгодное предложение!</div>
      <div class="main_advice__button btn-popup">Оставить заявку</div>
    </div>
  </div>
</div>

<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
