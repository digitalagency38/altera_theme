<?php
/*
Template Name: Шаблон услуг с текстом
Template Post Type: post_service
*/
?>

<?php get_header('new')?>
<?php 
	$glavnyj_slajder = get_field('glavnyj_slajder');
	$reglamenty = get_field('reglamenty');
	$uslugi = get_field('uslugi');
?>
<div class="breadcrumbs-wrapper new_bread">
    <div class="container">
        <div class="breadcrumbs-wrapper__inner">
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
    </div>
</div>



    <div class="intro">
        <div class="container">
            <h1 class="title intro__title"><?php echo the_field('service_title') ?></h1>

            <div class="swiper swiper-intro">
                <div class="swiper-wrapper">
					<?php
						$slides = get_field('slider_services');
						for ($i = 0; $i < count($slides); $i++) {
							?>
								<div class="swiper-slide">
									<img src="<?php echo $slides[$i] ?>" alt="">
								</div>
							<?php
							
						}
					?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev swiper-button-prev-intro">
                    <svg width="59" height="42" viewBox="0 0 59 42" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.6828 19.5043L22.9404 2.11521L20.8412 0L0 21L20.8412 42L22.9404 39.8848L5.6828 22.4957H59V19.5043H5.6828Z" fill="white"/>
					</svg>

                </div>
                <div class="swiper-button-next swiper-button-next-intro">
                    <svg width="59" height="42" viewBox="0 0 59 42" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M53.3172 19.5043L36.0596 2.11521L38.1588 0L59 21L38.1588 42L36.0596 39.8848L53.3172 22.4957H0V19.5043H53.3172Z" fill="white"/>
					</svg>

                </div>
            </div>
        </div>
    </div>
<main class="content">
  <div class="main_advice center_block">
    <div class="main_advice__in">
      <div class="main_advice__l-side">
        <div class="main_advice__title"><?php echo the_field('intro_banner_title'); ?></div>
        <div class="main_advice__subtitle"><?php echo the_field('intro_banner_subtitle'); ?></div>
      </div>
      <div class="main_advice__r-side">
        <div class="main_advice__text"><?php echo the_field('intro_banner_text'); ?></div>
        <div class="main_advice__button" data-form_id="<?php echo the_field('form_id'); ?>"><?php echo the_field('intro_banner_btn_text'); ?></div>
      </div>
    </div>
  </div>
   <div class="benefits blovk_new">
        <div class="container">
            <div class="title">
				<?php echo the_field('benefits_title'); ?>
            </div>
			<?php $benefits = get_field( 'benefits' );?>
            <div class="benefits__wrapper">
				<?php if (is_array($benefits)) {
					foreach ($benefits as $e) { ?>
						<div class="benefits__box">
							<img src="<?php echo $e['img']; ?>" alt="" class="benefits__box-img">
							<div class="benefits__box-title"><?php echo $e['title']; ?></div>
						</div>
					<?php } ?>
				<?php } ?>
            </div>
        </div>
    </div>
  
  <div class="container text-page-redesign">
  <div class="title intro__title"><?php echo the_field('title-page-redesign'); ?></div>
        <section>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
        </section>
        <br />
    </div>
  <?php
            if (isset($uslugi)) {?>
  <div class="main__bls center_block">
    <div class="main__bls__title"><?= $uslugi['zagolovok']; ?></div>
    <div class="main__bls__blocks">
      <?php
            if (isset($uslugi)) {
                foreach ($uslugi['spisok'] as $item) {
        ?>
      <div class="main__bls__block">
        <div class="main__bls__l-side"><img src="<?= $item['kartinka']; ?>" alt=""></div>
        <div class="main__bls__r-side">
          <div class="main__bls__tit"><?= $item['nazvanie']; ?></div>
          <div class="main__bls__desc"><?= $item['opisanie']; ?></div>
          <ul class="main__bls__list">
            <?php
              foreach ($item['elementy'] as $elem) {
          	?>
            	<li><?= $elem['tekst']; ?></li>
            <?php
                };
            ?>
          </ul>
          <div class="main__bls__info">
            <div class="main__bls__price">
              <span>Стоимость</span> <?= $item['czena']; ?>
            </div>
            <div class="main__bls__btn" data-form_id="<?= $item['id_from']; ?>">Заказать</div>
          </div>
        </div>
      </div>
      <?php
                }
            };
        ?>
    </div>
  </div>
      <?php
            };
        ?>
  <div class="portfolio new_block">
        <div class="portfolio__in center_block">
        <div class="container">
            <div class="portfolio__header">
                <div class="title portfolio__title">
					<?php echo the_field('portfolio_title'); ?>
                  
                </div>
                <a href="/portfolio">
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

    <div class="seo">
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

    <div class="advice">
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
</main>

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