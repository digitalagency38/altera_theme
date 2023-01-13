<?php
/*
Template Name: Спасибо
*/
?>
<?php get_header('new')?>
<div class="container">
    <section class="thank">
        <div class="form">
            <?= get_the_content()  ?>
            <div class="btn"><a href="/" class="button">На главную</a></div>
        </div>
    </section>
</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new')?>
