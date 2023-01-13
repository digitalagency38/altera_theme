<?php
/*
Template Name: Тектовая страница
*/
?>
<?php get_header('new'); ?>
<div class="breadcrumbs-wrapper new_bread">
    <div class="container">
        <div class="breadcrumbs-wrapper__inner">
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
    </div>
</div>
    <div class="container text-page-redesign">
        <h1 class="title intro__title"><?php echo the_title(); ?></h1>
        <br />
        <section>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
        </section>
        <br />
    </div>
<div class="seo seo--redesign">
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

    <div class="advice advice--redesign">
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
<?php get_footer('new'); ?>
