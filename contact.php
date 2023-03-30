<?php
/*
Template Name: Контакты
*/
?>
<?php get_header('new')?>
<style>
	.footer {
		margin-top: 0 !important;
	}
</style>
<div class="container" style="position: relative; overflow: visible">
	<div class="contact_info__wraper">
		<div class="contact_info">
			<div class="title">Контакты:</div>
			<div class="text">
				<?php echo apply_filters('the_content', $post->post_content);?>
			</div>
		</div>
		<div class="contact_info contact_info--socials">
			<p><strong>Мы в социальных сетях:</strong></p>
			<div class="text">
				<div class="contacts__icons" style="">
          <a href="https://vk.com/altera_irkutsk" class="icon-svg" target="_blank">
            <svg class="">
              <use xlink:href="#icon--vk"></use>
            </svg>
          </a>
          <!--<a href="https://www.instagram.com/altera_irkutsk/" class="icon-svg" target="_blank">
            <svg class="">
              <use xlink:href="#icon--inst"></use>
            </svg>
          </a>
          <a href="https://ru-ru.facebook.com/alterairkutsk" class="icon-svg" target="_blank">
            <svg class="">
              <use xlink:href="#icon--fb"></use>
            </svg>
          </a>-->
        </div>
			</div>
		</div>
	</div>

</div>
<div class="contact" id="map-contact" style="height: 400px;">

</div>
<div class="contact_map--mobile"></div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type='text/javascript' src='https://altera-irkutsk.ru/wp-content/themes/altera/js/map.js'></script>
<?php get_footer('new')?>
