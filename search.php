<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('new'); ?>

	<div class="content search_page">
		<div class="content__item">
			
			<? if ( have_posts() ) : ?>
				<h1 class="content__item--h1"><? printf( __( 'Результаты поиска: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<ol class="find">            
				<? while ( have_posts() ) : the_post(); ?>
				<li><h2><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute() ?>"><? the_title() ?></a></h2>  
				<p><? echo(get_the_excerpt()) ?></p></li>
				<? endwhile; ?>
				</ol>
				<? else : ?>
				<h1 class="content__item--h1">Ничего не найдено</h1>
				<p>Ничего не найдено, попробуйте еще раз.</p>
				<br />
				<? get_search_form(); ?>
			<? endif; ?>
			<div class="pagination"><?php // Пагинация
				global $wp_query;
				$big = 999999999;
				echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'type' => 'list',
				'prev_text'    => __('« Назад'), 
				'next_text'    => __('Вперед »'),
				'total' => $wp_query->max_num_pages
				) );
				?>
			</div>    
		</div>
	</div>
<div class="service-popup">
  <div class="service-popup__inner">
    <?php echo do_shortcode('[contact-form-7 id="708" title="Получить консультацию"]') ?>  
  </div>
</div>

<?php get_footer('new'); ?>