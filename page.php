<?php get_header('new'); ?>
<div class="breadcrumbs-wrapper new_bread">
    <div class="container">
        <div class="breadcrumbs-wrapper__inner">
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
    </div>
</div>
    <div class="container">
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
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>
<?php get_footer('new'); ?>
