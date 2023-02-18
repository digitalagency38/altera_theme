<?php
/*
Template Name: О компании
*/
?>
<?php
$service_link = get_page_data('services')->guid;
$services = get_posts([
	'post_type' => 'post_service',
	'numberposts' => -1,
])
?>
<?php get_header('new')?>
	<div class="container">
		<div class="about_logo">
			<img src="<?php get_uri('img/about/1.jpg')?>" alt="#">
			<img class="svg img-flow img-flow-logo" src="<?php get_uri('img/logo/logo_white.svg')?>" alt="#">
		</div>
		<div class="about-content">
			<div class="row block">
				<div class="col">
					<div class="img-flow img-flow-1">
							<img class="" src="<?php get_uri('img/about/bg.jpg')?>" alt="">
					</div>
					<img class="img-flow img-flow-2" src="<?php get_uri('img/about/2.jpg')?>" alt="">
				</div>
				<div class="col content-text-1">
					<h2>История</h2>
					<p>«Компания Альтера» была основана в 1998 году, став одной из первых на рынке проектирования и строительства бассейнов, бань и саун Иркутска.</p>
					<p>В последующие годы охват рынка услуг расширился на всю территорию Иркутской области. </p>
					<p><span class="line"></span></p>
					<p>С 2002 года компания стала работать и за пределами области: в Бурятии, Читинской области и даже в Монголии.</p>
					<p>Изначально компания занималась исключительно проектированием, строительством и гарантийным обслуживанием бассейнов, бань и саун, а также оптово-розничной продажей сопутствующих товаров, однако уже летом 2003 года к этому списку услуг присоединилось проектирование и строительство интерьерных и уличных фонтанов различной сложности.</p>
				</div>
				
			</div>
			<div class="row block" style="display: none">
				<div class="col content-text-2">
					<h2>Искусственные водоемы</h2>
					<p>Вода – это главный элемент для поддержания жизни человека и великолепный ресурс для сооружения прекрасных водоемов, прудов и фонтанов. Правильное сочетание этого компонента с растительностью, натуральными камнями и декоративными элементами позволяет создать функциональные и красивые водные формирования возле частного дома, базы для отдыха или парка.</p>
					<a class="button" href="#">Посмотреть все</a>
				</div>
				<div class="col">
					<img class="img-flow img-flow-3" src="<?php get_uri('img/about/header.png')?>" alt="">
				</div>
			</div>
			<section class="portfolio">
				<div class="portfolio_title">
					Посмотрите на то, что мы уже сделали.<br/>
					Эти проекты существуют, и мы гордимся ими!
				</div>
			  <figure class="wp-block-video" style="padding-bottom: 25px;"><video controls="" src="https://altera-irkutsk.ru/wp-content/uploads/2020/03/res2.mp4"></video></figure>
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
					<a href="/portfolio/" class="button">Посмотреть портфолио</a>
				</div>
			</section>
			<div class="block block-content-1">
				<p>Отдельно стоит отметить деятельность компании в области архитектурного проектирования.</p>
				<p>Архитектурное  бюро в компании существует с 2001 года и оказывает как услуги комплексного проектирования с нуля, так и работы по планировке и перепланировке, реконструкции и проведению капитального ремонта.</p>
				<h2 class="strong blue"> Вы можете обратиться к нам уже сейчас, и мы разработаем для Вас дизайн проект!</h2>
				<img class="img-1" src="<?php get_uri('img/about/pool.png')?>" alt="">
				<a class="button quiz-open" href="#">Заказать</a>
			</div>
			<div class="row block">
				<div class="col">
					<h2>За время своей деятельности сотрудниками «Компания Альтера» было построено и запущено в работу:</h2>
					<ul class="block-li-1">
						<li>более <span> 900 </span> бассейнов</li>
						<li>около <span> 1300 </span> саун различных форм и размеров, как для частного, так и коммерческого пользования.</li>
						<li>сданы «под ключ» оздоровительные комплексы общественного использования в городах </li>
					</ul>
				</div>
				<div class="col">
					<div class="img-flow img-flow-4">
							<img class="" src="<?php get_uri('img/about/bg.jpg')?>" alt="">
					</div>
					<img class="img-flow img-flow-5" src="<?php get_uri('img/about/4.jpg')?>" alt="">
				</div>
			</div>
			<div class="block block-content-2">
				<p class="text-content-1">Мы гордимся тем фактом, что более <span> половины </span> объектов банно-саунного направления по Байкальскому тракту были выполнены сотрудниками нашей компании.</p>
				<p><span class="line"></span></p>
				<div id="map-about" style="width: 100%; height:400px" data-coordinates='[[52.287325, 104.281081, "Иркутск"], [51.514930, 104.134478, "Байкальск"], [52.061509, 113.379319, "Чита"], [54.905552, 99.024698, "Нижнеудинск"]]'></div>
			</div>
			<div class="block block-content-2">
				<h2>Наши корпоративные клиенты:</h2>
				<?php require 'parts/views/clients.php'?>
			</div>
		</div>

</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
