<?php
/*
Template Name: Портфолио новое
Template Post Type: post_portfolio
*/
?>
<?php get_header('new')?>
	<div class="container container-portfolio-single">
		<section>
			<h1><?php the_title(); ?></h1>
			<?php $content = apply_filters('the_content', $post->post_content);?>

			<?php //echo apply_filters('the_content', $post->post_content);?>
			<!--<a href="#" class="sub-header__button sub-header__button--phone  portf-open" style="min-height: 34px; width: fit-content; margin-top: 40px">
          
			  <span>просчитать подобный проект</span>
			</a>--> 
			<?php 
				$bunner = '<div class="intro__banner" style="background: url('.get_field('intro_banner_bg').'); background-position: center; background-repeat: no-repeat; background-size: cover;">
	                <div class="intro__banner-left">
	                    <div class="intro__banner-title">'.get_field('intro_banner_title').'</div>
	                    <div class="intro__banner-subtitle">'.get_field('intro_banner_subtitle').'
	                    </div>

	                </div>
	                <div class="intro__banner-right">
	                    <div class="intro__banner-text">
							'.get_field('intro_banner_text').'
	                    </div>
	                    <div class="btn-service intro__banner-btn-service btn-popup">
							'.get_field('intro_banner_btn_text').'
	                    </div>
	                </div>
	            </div>';
	            $content = str_replace('|$bunner|', $bunner, $content);
	            echo $content;
			?>


			<!--<div class="intro__banner" style="background: url(<?php echo the_field('intro_banner_bg'); ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
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
                    <div class="btn-service intro__banner-btn-service btn-popup">
						<?php echo the_field('intro_banner_btn_text'); ?>
                    </div>
                </div>
            </div>-->
		</section>
	</div>
<div class="service-popup">
            <div class="service-popup__inner">
              <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
            </div>
    </div>
<?php get_footer('new')?>
