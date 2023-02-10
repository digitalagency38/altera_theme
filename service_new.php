<?php
  /*
  Template Name: Услуга (Новая версия)
  Template Post Type: post_service
  */
?>
<?php get_header('new')?>

     <div class="breadcrumbs-wrapper">
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
			
          <?php
          	$form_id = get_field('intro_banner_form');
          ?>
            <div class="intro__banner" style="background: url(<?php echo the_field('intro_banner_bg'); ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <div class="intro__banner-left">
                    <div class="intro__banner-title">
						<?php echo the_field('intro_banner_title'); ?>
                    </div>
                    <div class="intro__banner-subtitle">
						<?php echo the_field('intro_banner_subtitle'); ?>
                    </div>

                </div>
                <div class="intro__banner-right">
                    <div class="intro__banner-text">
						<?php echo the_field('intro_banner_text'); ?>
                    </div>
                    <div class="btn-service intro__banner-btn-service<?php if ($form_id == ""): ?> btn-popup<?php endif; ?>" <?php if ($form_id != ""): ?> data-form_id="<?= $form_id;?>"<?php endif; ?> >
						<?php echo the_field('intro_banner_btn_text'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="benefits blovk_new"> -->
     <div class="benefits" style="margin-bottom: 0;">
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

    <div class="tariffs">
        <div class="container">
			<?php $value = get_field('enable_price_economy'); if (($value) == 'yes') : ?>
          	<?php $post_objects = get_field('price_economy_portfolio'); ?>
           		<div class="tariffs__box">
					<div class="tariffs__box-left" style="background: url(<?php echo the_field('price_economy_img') ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
						<div class="tariffs__box-title">
							<?php echo the_field('price_name_1') ?>
							
						</div>
						<div class="tariffs__box-subtitle">
							
							Стоимость
						</div>
						<div class="tariffs__box-result">
							
							от <span><?php echo the_field('price_cena_1') ?></span> Р.
						</div>
						<div class="tariffs__box-subtitle">
							Сроки
						</div>
						<div class="tariffs__box-result">
							от <span><?php echo the_field('price_time_1') ?></span>
						</div>
						<div class="tariffs__box-subtitle">
							Проект
						</div>
						<div class="tariffs__box-result">
							<span>Под ключ</span>
						</div>
						<div class="btn-service btn-service--small<?php if (get_field('price_form') == ""): ?> btn-popup<?php endif; ?>" <?php if (get_field('price_form') != ""): ?> data-form_id="<?= get_field('price_form');?>"<?php endif; ?>>
                            Заказать
                        </div>
					</div>
					<div class="tariffs__box-right">
						<ol class="tariffs__box-list">
							
							<li class="tariffs__box-list-item"><?php echo the_field('text_right_1_1') ?> </li>
							<li class="tariffs__box-list-item"><?php echo the_field('text_right_1_2') ?>  </li>
							<li class="tariffs__box-list-item"><?php echo the_field('text_right_1_3') ?></li>
							<li class="tariffs__box-list-item"><?php echo the_field('text_right_1_4') ?></li>
						</ol>
					</div>
                  <?php if( $post_objects ): ?>
					<div class="tariffs__box-more" data-more="economy">
						Смотреть работы по этому тарифу
					</div>
                  <?php endif; ?>
				</div>
				<?php if( $post_objects ): ?>
				<div class="portfolio tariffs__portfolio" data-more="economy">
					<div class="swiper swiper-portfolio">
						<div class="swiper-wrapper">
                            
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
                            

						</div>
						<!-- If we need pagination -->
						<div class="swiper-pagination"></div>

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
          <?php endif; ?>
			<?php endif; ?>
               
			<?php $value = get_field('enable_price_standart'); if (($value) == 'yes') : ?>
          	<?php $post_objects = get_field('price_standart_portfolio'); ?>
                <div class="tariffs__box">
                    <div class="tariffs__box-left" style="background: url(<?php echo the_field('price_standart_img') ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                        <div class="tariffs__box-title">
							<?php echo the_field('price_name_2') ?>
                            
                        </div>
                        <div class="tariffs__box-subtitle">
                            Стоимость
                        </div>
                        <div class="tariffs__box-result">
                            от <span><?php echo the_field('price_cena_2') ?></span> Р.
                        </div>
                        <div class="tariffs__box-subtitle">
                            Сроки
                        </div>
                        <div class="tariffs__box-result">
                            от <span><?php echo the_field('price_time_2') ?></span>
                        </div>
                        <div class="tariffs__box-subtitle">
                            Проект
                        </div>
                        <div class="tariffs__box-result">
                            <span>Под ключ</span>
                        </div>
                        <div class="btn-service btn-service--small<?php if (get_field('price_form') == ""): ?> btn-popup<?php endif; ?>" <?php if (get_field('price_form') != ""): ?> data-form_id="<?= get_field('price_form');?>"<?php endif; ?>>
                            Заказать
                        </div>
                    </div>
                    <div class="tariffs__box-right">
                        <ol class="tariffs__box-list">
							<?php echo the_field('text_right_2') ?>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_2_1') ?></li>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_2_2') ?></li>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_2_3') ?></li>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_2_4') ?></li>
                        </ol>
                    </div>
                  <?php if( $post_objects ): ?>
                    <div class="tariffs__box-more" data-more="standart">
                        Смотреть работы по этому тарифу
                    </div>
                   <?php endif; ?>
                </div>
				<?php if( $post_objects ): ?>
                <div class="portfolio tariffs__portfolio" data-more="standart">
                    <div class="swiper swiper-portfolio">
                        <div class="swiper-wrapper">
                            
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

                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

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
                                      <?php endif; ?>
            <?php endif; ?>
            
            <?php $value = get_field('enable_price_premium'); if (($value) == 'yes') : ?>
          		<?php $post_objects = get_field('price_premium_portfolio'); ?>
                <div class="tariffs__box">
                    <div class="tariffs__box-left" style="background: url(<?php echo the_field('price_premium_img') ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                        <div class="tariffs__box-title">
							<?php echo the_field('price_name_3') ?>
                        </div>
                        <div class="tariffs__box-subtitle">
                            Стоимость
                        </div>
                        <div class="tariffs__box-result">
                            от <span><?php echo the_field('price_cena_3') ?></span> Р.
                        </div>
                        <div class="tariffs__box-subtitle">
                            Сроки
                        </div>
                        <div class="tariffs__box-result">
                            от <span><?php echo the_field('price_time_3') ?></span>
                        </div>
                        <div class="tariffs__box-subtitle">
                            Проект
                        </div>
                        <div class="tariffs__box-result">
                            <span>Под ключ</span>
                        </div>
                        <div class="btn-service btn-service--small<?php if (get_field('price_form') == ""): ?> btn-popup<?php endif; ?>" <?php if (get_field('price_form') != ""): ?> data-form_id="<?= get_field('price_form');?>"<?php endif; ?>>
                            Заказать
                        </div>
                    </div>
                    <div class="tariffs__box-right">
                        <ol class="tariffs__box-list">
							<?php echo the_field('text_right_3') ?>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_3_1') ?></li>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_3_2') ?></li>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_3_3') ?></li>
                            <li class="tariffs__box-list-item"><?php echo the_field('text_right_3_4') ?></li>
                        </ol>
                    </div>
                  <?php if( $post_objects ): ?>
                    <div class="tariffs__box-more" data-more="premium">
                        Смотреть работы по этому тарифу
                    </div>
                  <?php endif; ?>
                </div>
                <?php if( $post_objects ): ?>
                <div class="portfolio tariffs__portfolio" data-more="premium">
                    <div class="swiper swiper-portfolio">
                        <div class="swiper-wrapper">
                            
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
                            
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

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
          		<?php endif; ?>
			<?php endif; ?>
        </div>
    </div>

    <div class="portfolio">
        <div class="container">
            <div class="portfolio__header">
                <div class="title portfolio__title">
					<?php echo the_field('portfolio_title') ?>
                  
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

    <div class="work-process">
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
                    <h2 class="title">
						<?php echo the_field('seo_title') ?>
                    </h2>

                    <div class="seo__text">
						<?php echo the_field('seo_text') ?>
                    </div>
                </div>
                <img class="seo__img" src="<?php echo the_field('seo_kartinka') ?>" alt="">
            </div>

        </div>
    </div>

    <div class="advice">
        <div class="container">
            <div class="advice__inner">
                <div>
                    <div class="advice__title">
						<?php echo the_field('advice_title') ?>
                    </div>
                    <div class="advice__descr">
						<?php echo the_field('advice_text') ?>
                    </div>
                </div>

                <div class="btn-service btn-service--small<?php if (get_field('advice_form') == ""): ?> btn-popup<?php endif; ?>" <?php if (get_field('advice_form') != ""): ?> data-form_id="<?= get_field('advice_form');?>"<?php endif; ?>>
                    
					<?php echo the_field('advice_btn') ?>
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
