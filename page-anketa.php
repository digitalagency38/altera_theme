<?php get_header('new')?>
<div class="container">
    <section class="h-form-section">
        <div class="h-form-section__header">
            <h3 class="h-form__title">
                АНКЕТА
            </h3>
            <h4 class="h-form__subtitle">
                За участие в опросе Вам подарок — сертификат на скидку в 10%
            </h4>
            <p>
                Ваше мнение очень важно для нас, поэтому предлагаем принять участие в опросе. Мы стремимся повысить качество нашей работы и лучше соответствовать вашим потребностям. Заполнение анкеты займёт около 3-х минут. Анкета несёт конфиденциальный характер.
            </p>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="831" title="Anketa" html_class="h-form-section__form promotion_popup" ]')?>
        <div class="conditions-block">
            <a href="conditions-akcii" target="_blank">условия акции</a>
        </div>
    </section>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    setcookie('lotereya', 'ok', (new Date).getTime() + (3 * 24 * 60 * 60 * 1000), '/');
  });
</script>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
