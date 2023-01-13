<?php get_header('new')?>
	<section class="not-found">
		<div class="title">404 <span>ошибка</span></div>
		<div class="text">
			<span>Такой страницы не существует!</span>
			<p>Вам необходимо вернуться на главную,
				чтобы продолжить работу с сайтом.
			</p>
			<div class="btn"><a href="/" class="button">На главную</a></div>
		</div>
	</section>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
