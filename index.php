<?php
/*
Template Name: Главная
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
<div class="swiper-object-index">
    <div class="swiper-container swiper-container-index">
      <div class="swiper-wrapper">
        <?php //foreach ($backgrounds as $bg): ?>
          <!--<div class="swiper-slide" style="background-image: url('<?php //get_uri($bg)?>')">-->
          <!--  <div class="container">-->
          <!--    <div class="index-header-slide-box-container">-->
          <!--      <div class="index-header-slide-box">-->
          <!--        <div class="title">-->
          <!--          «Компания Альтера»-->
          <!--        </div>-->
          <!--        <div class="content">-->
          <!--          <p>-->
          <!--    				Ваш персональный проводник  в строительстве и обслуживании бассейнов, саун, фонтанов, а также бань и хамамов. Мы делаем жизнь комфортнее!-->
          <!--    			</p>-->
          <!--        </div>-->
          <!--        <button class="button button_small quiz-open">Заказать расчет</button>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
        <?php //endforeach; ?>
        <!--<div class="swiper-slide" style="background-image: url('<?php //echo get_stylesheet_directory_uri(); ?>/img/index_background_0.jpg')">-->
        <!--    <div class="container">-->
        <!--      <div class="index-header-slide-box-container">-->
        <!--        <div class="index-header-slide-box">-->
        <!--          <div class="title">-->
        <!--                Режим работы торгового зала-->
        <!--          </div>-->
        <!--          <div class="content">-->
        <!--            <p>-->
        <!--      				31 декабря и 1, 2 января — выходные<br>-->
        <!--                    с 3 января «Компания Альтера» работает в обычном режиме<br><br>-->
        <!--                    С Новым годом! -->
        <!--      			</p>-->
        <!--      		<br>-->

        <!--          </div>-->

        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!---->
		
		<!--<div class="swiper-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/index_background_31.jpg')">
            <div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                        Химия
                  </div>
                  <div class="content">
                    <p>
              				В Иркутской области "Компания Альтера" является ключевым поставщиком специализированной химии для бассейнов, искусственных водоемов, бань, саун.
              			</p>
              		<br>
              		<p><span class="blue__text quiz-open-corp">Для корпоративных клиентов</span> действуют особые условия и цены на товары и услуги.</p>
              		<br>
              		<p>Подробности по телефону <a href="tel:8(3952)504-201">8(3952)504-201</a></p>
                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
          </div>
		</div>-->
		<div class="swiper-slide" style="background-image: url('https://altera-irkutsk.ru/wp-content/uploads/2021/10/photo_2021-10-15_16-23-14.jpg')">
			<div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                        Заказывайте бассейн сейчас и сэкономьте до 15%!
                  </div>
                  <div class="content">
                    <p>Принимаем заказы на строительство бассейнов на следующий год. 
					<p>Держим цены до 31 мая 2022г.
					<p>Успевайте! Предложение ограничено. 
					<p>Все комплектующие в наличии, бесплатное хранение на складе компании!</p>
                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
        </div>
		<!--
        <div class="swiper-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/index_background_1.jpg')">
            <div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                    Оборудование для бассейнов
                  </div>
                  <div class="content">
                    <p>
                        Широкий спектр оборудования, который предлагает "Компания Альтера" охватывает весь процесс водоподготовки и ухода за бассейном, фонтаном.
              			</p>
              		<br>
              		<p><span class="blue__text quiz-open-corp">Для корпоративных клиентов</span> действуют особые условия и цены на товары и услуги.</p>
              		<br>
              		<p>Подробности по телефону <a href="tel:8(3952)504-201">8(3952)504-201</a></p>
                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
          </div>
		  -->
		   <div class="swiper-slide" style="background-image: url('https://altera-irkutsk.ru/wp-content/uploads/2022/03/slide6.jpg')">
            <div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                    Бронируйте по старым ценам!
                  </div>
                  <div class="content">
                    <p>Пока все строительные материалы есть в наличии на складе.
                    <p>Следующий закуп материалов по новому, увеличенному, прайсу. 
                    <p>Успевайте построить бассейн, баню, сауну или хаммам по старым ценам! 
                    <p>Экономьте от 15% от общей стоимости. 

                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
          </div>
		  <div class="swiper-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/index_background_1.jpg')">
            <div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                    Покупайте выгодно! 
                  </div>
                  <div class="content">
                    <p>
                       До конца апреля действуют старые цены на все категории товаров из наличия со склада!

                    <p>Также по старым ценам можно заказать строительство Spa-объекта любой сложности

                    <p>Успевайте строить выгодно и качественно!

                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
          </div>
		  
		 
		  
        <div class="swiper-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/index_background_2.jpg')">
            <div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                    Оборудование для бань и саун
                  </div>
                  <div class="content">
                    <p>
"Компания Альтера" предлагает оборудование для обустройства бани и сауны, отвечающее всем требованиям стандартов, безопасности и имеющее высокое качество.
              			</p>
              		<br>
              		<p><span class="blue__text quiz-open-corp">Для корпоративных клиентов</span> действуют особые условия и цены на товары и услуги.</p>
              		<br>
              		<!--<p>Подробности по телефону <a href="tel:8(3952)504-201">8(3952)504-201</a></p>-->
                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
          </div>
        <div class="swiper-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/index_background_3.jpg')">
            <div class="container">
              <div class="index-header-slide-box-container">
                <div class="index-header-slide-box">
                  <div class="title">
                    Сервисное обслуживание
                  </div>
                  <div class="content">
                    <p>
              				«Компания Альтера» оказывает услуги по ремонту и сервисному обслуживанию бассейнов, бань, саун, хамамов. Если Вы являетесь владельцем столь сложного объекта, то вам необходимо уделять особое внимание регулярному обслуживанию оборудования.
              			</p>
              		<br>
              		<p><span class="blue__text quiz-open-corp">Для корпоративных клиентов</span> действуют особые условия и цены на товары и услуги.</p>
              		<br>
              		<!--<p>Подробности по телефону <a href="tel:8(3952)504-201">8(3952)504-201</a></p>-->
                  </div>
                  <button class="button button_small quiz-open">Узнать подробности</button>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
    <div class="swiper-navigation">
      <div class="swiper-button-index swiper-button-prev-index"></div>
      <div class="swiper-pagination-index"></div>
      <div class="swiper-button-index swiper-button-next-index"></div>
    </div>
</div>
<div class="container">
  <section class="service_list">
    <div class="swiper-container service_list-swiper">
      <div class="swiper-wrapper">
              <?php foreach ($services as $service):?>
        <div class="swiper-slide">
          <div class="service-slide">
            <div class="service_logo">
              <a href="/post_service/<?php echo $service->post_name?>/"><img src="<?php echo get_the_post_thumbnail_url($service)?>" alt="#"></a>
            </div>
            <div class="service_content">
              <div class="service_title">
                <a href="/post_service/<?php echo $service->post_name?>/"><?php echo $service->post_title?></a>
              </div>
              <div class="service_description"><?php echo $service->post_excerpt?></div>
              <div class="service_btn">
                <a href="/post_service/<?php echo $service->post_name?>/" class="button">Посмотреть</a>
              </div>
            </div>
          </div>
        </div>
              <?php endforeach; unset($service)?>
      </div>
    </div>
    <div class="service_list-swiper-button-container">
      <div class="swiper-button-next service_list-swiper_arrow service_list-swiper_arrow--right"></div>
      <div class="swiper-button-prev service_list-swiper_arrow service_list-swiper_arrow--left"></div>
    </div>
  </section>
	<style>
		.bicon {
			width: 80px;
			margin-bottom: 10px;
		}
	</style>
	<div class="portfolio_title">
			Почему выбирают именно нас?
		</div>
	<section class="portfolio about-content" style="box-shadow: none; margin: 0; padding: 0px">
		
		<div class="row">	
			<div class="col">	
				<img src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/004-business-and-finance.png" class="bicon">
				<p><strong>Выбираем только проверенных поставщиков</strong></p>
				<p>При отделке бани или сауны мы используем качественные породы дерева, такие как: липа, канадский кедр и абаш.</p>
				<p>&nbsp;</p>
			</div>
			
			<div class="col">	
				<img src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/003-clock.png" class="bicon">
				<p><strong>Делаем на совесть в кратчайшие сроки</strong></p>
				<p>Наша компания обладает 20-летним опытом в своем деле, мы гарантируем качественный результат за кратчайшие сроки</p>
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="row">	
			<div class="col">	
				<img src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/005-worker.png" class="bicon">
				<p><strong>Специалисты своего дела</strong></p>
				<p>Мы за разделение труда. Над каждым проектом работают специалисты узкого профиля.</p>
				<p>&nbsp;</p>
			</div>
			
			<div class="col">	
				<img src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/001-tax.png" class="bicon">
				<p><strong>Нет скрытых платежей</strong></p>
				<p>Цена окончательная на стадии договора. Возможен гибкий график платежей</p>
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="row">		
			<div class="col">	
				<img src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/002-file.png" class="bicon">
				<p><strong>Бесплатный дизайн-проект</strong></p>
				<p>Индивидуальный дизайн-проект в подарок при подписании договора</p>
				<p>&nbsp;</p>
			</div>
			
			<div class="col-md-6">	
				<img src="https://altera-irkutsk.ru/wp-content/uploads/2021/11/006-key.png" class="bicon">
				<p><strong>Под ключ</strong></p>
				<p>Все без исключения работы совершает только наша компания</p>
				<p>&nbsp;</p>
			</div>
			
		</div>
	</section>
	
	<section class="portfolio" >
		<div class="portfolio_title">
			Посмотрите на то, что мы уже сделали.<br/>
			Эти проекты существуют, и мы гордимся ими!
		</div>
	  <!--<figure class="wp-block-video" style="padding-bottom: 25px;"><video controls="" src="https://altera-irkutsk.ru/wp-content/uploads/2020/03/res2.mp4"></video></figure>-->
		<div class="portfolio_gallery">
			<?php if ($gallery): ?>
				<?php foreach ($gallery as $item):?>
				<div class="portfolio_gallery--item">
					<img src="<?php echo $item?>" alt="#">
				</div>
				<?php endforeach; unset($item)?>
			<?php endif; ?>
		</div>
		<div class="portfolio_title">
			И это далеко не всё! Переходите в раздел<br/>
			портфолио, чтобы посмотреть наши лучшие работы!
		</div>
		<div class="portfolio_btn">
			<a href="/potrfolio/" class="button">Посмотреть портфолио</a>
		</div>
	</section>
	<style>
		.stages .row {
			display: flex;
		}
		
		.stages .row .col {
			flex: 0 0 25%;
			max-width: 25%;
			position: relative;
		
		}
		
		.stages .row .col p {
			margin-top: 10px;
			text-align: center;
			padding: 0 30px;
		}
		
		.stages .row .col span {
			display: flex;
			width: 50px;
			height: 50px;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
			color: #fff;
			background: #0293D5;
			
			margin-left: calc(50% - 25px);
		}
		
		.stages .row .col span:after {
			content: "";
			position: absolute;
			display: block;
			left: calc(50% + 25px);
   			right: calc(-25px - 50%);
			height: 1px;
			background: #0293D5;
			top: 25px;
				
		}
		
		.stages .row .col:last-of-type span:after {
			display: none;
		}
		
		@media screen and (max-width: 767px) {
			.stages .row {
				flex-wrap: wrap;
			}
			.stages .row .col {
				flex: 0 0 50%;
				max-width: 50%;
				position: relative;

			}
			.stages .row .col span:after {
				display: none;
			}
			.stages .row .col p { 
				padding: 0 5px;
			}
			.portfolio.about-content {
				padding: 30px;
			}
		}
	</style>
	<section class="stages">
		<div class="portfolio_title">
			Из каких этапов состоит наша работа
		</div>
		<div class="row">	
			<div class="col">	
				<span>1</span>
				<p><strong> Заявка</strong></p>
				<p>Вы оставляете заявку на расчет стоимости ремонта и встречаетесь с замерщиком</p>
				<p>&nbsp;</p>
			</div>
			
			<div class="col">
				<span>2</span>
				<p><strong>Расчет стоимости</strong></p>
				<p>В этот же день мы производим расчет и высылаем вам договор на подпись</p>
				<p>&nbsp;</p>
			</div>
		
			<div class="col">	
				<span>3</span>
				<p><strong>Строительство</strong></p>
				<p>На следующий день мы завозим материалы и начинаем работы</p>
				<p>&nbsp;</p>
			</div>
			
			<div class="col">	
				<span>4</span>
				<p><strong>Прием работы</strong></p>
				<p>Вы принимаете, утверждаете и оплачиваете каждый этап работ</p>
				<p>&nbsp;</p>
			</div>
		</div>
	</section>
<section class="blog">
    <div class="blog_logo">
        <img src="<?php get_uri('img/logo/logo.svg')?>" alt="#">
    </div>
    <div class="blog_content">
      <div class="blog_text">
          Оставьте заявку прямо сейчас и получите дизайн-проект бесплатно
      </div>
      <div class="blog_btn">
          <!--<a href="<?php echo get_page_link(7)?>" class="button">Получить дизайн-проект</a>-->
		  <a class="button open_modal">Получить дизайн-проект</a>
      </div>
    </div>
</section>
  <h2 class="portfolio_title">Наши корпоративные клиенты:</h2>
<?php require 'parts/views/clients.php'?>
</div>

<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
