<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'shop--single', $product ); ?>>
    <div class="card center_block">
        <div class="card__top">
            <h1 class="card__h1 mob"><?= $product->get_title(); ?></h1>
          	<?php $post_thumbnail_id = $product->get_image_id(); ?>
          	<? if (wp_get_attachment_url( $post_thumbnail_id )): ?>
            	<div class="card__l-side">
                    <img src="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>" alt="<?= $product->get_title(); ?>">
                </div>
          	<?endif;?>
            <div class="card__r-side">
				<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
				<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
					<div itemprop="productID" class="card__amt">В наличии: <?= $product->get_stock_quantity(); ?></div>
					<h1 class="card__h1"><?= $product->get_title(); ?></h1>
					<div class="card__info">
						<div class="card__prices">
							<div class="card__prices--price"><?= $product->get_regular_price(); ?> ₽</div>
							<?php if ($product->get_sale_price()): ?>	
							<div class="card__prices--price-old"><?= $product->get_sale_price(); ?> ₽</div>
							<?php endif ?>
						</div>
<?php if ( $product->get_stock_quantity() !== 1 ): ?>
                  		<div class="card__list--amount">
                        <div class="quantity product__quantity">
                          <?php do_action( 'woocommerce_before_add_to_cart_quantity' );

                              woocommerce_quantity_input( array(
                                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                              ) );

                              do_action( 'woocommerce_after_add_to_cart_quantity' );
                          ?>
                        </div>  
                      </div>
<?php endif ?>
					</div>
					<div class="card__list">
						<div class="card__list--item">
							<div class="card__list--title">Доступна рассрочка</div>
							<a href="<?= get_option('ras_link'); ?>" class="card__list--link">Подробнее</a>
						</div>
						<div class="card__list--item">
							<div class="card__list--title">Бесплатная доставка до двери</div>
							<a href="<?= get_option('mag_link'); ?>" class="card__list--link">Подробнее</a>
						</div>
					</div>
					<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="card__add-card"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
					<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
				</form>
            </div>
        </div>
		<script>
			$(function () {
				setTimeout(function() {
					$('#responsiveTabsDemo').responsiveTabs({
					startCollapsed: 'accordion'
				});
			}, 500)
			});
		</script>
      <?// if ($product->get_short_description() || $product->get_attributes()): ?>
            <div class="card__tabs">
                <div id="responsiveTabsDemo">
                    <ul>
                        <?// if ($product->get_short_description()): ?>
                            <li><a href="#tab-1">Описание</a></li>
                        <?//endif;?>
                        <? //if ($product->get_attributes()): ?>
                            <li><a href="#tab-2">Характеристики</a></li>
                        <?//endif;?>
                    </ul>
                    <div class="card__tabs--content">
                        <? //if ($product->get_short_description()): ?>
                          <div id="tab-1">
                              <div class="card__tabs--text">
								  <?php the_content(); ?>
							  </div>
                          </div>
                        <?//endif;?>
                        <? //if ($product->get_attributes()): ?>
                          <div id="tab-2">
                              <div class="card__options">
                                  <ul>
									  	<?php
									  $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
										?>
									  
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<li class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
                if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</li>
		<?php endforeach; ?>
                                      
                                  </ul>
                              </div>
                          </div>
                        <?//endif;?>
                    </div>
                </div>
            </div>
      <?//endif;?>
			<div class="card__list">
              <div class="card__list--tit">Похожие товары</div>
              <div class="card__list--blocks">
                <?php
	global $product;
	$orderby = 'rand';
	$columns = 4;
	$related = $product->get_related( 7 );
                $args = array(
					'post_type' => 'product',
					'no_found_rows' => 1,
					'posts_per_page' => 4,
					'ignore_sticky_posts' => 1,
					'orderby' => $orderby,
					'post__in' => $related,
					'post__not_in' => array($product->id),
					'meta_key'             => '_stock_status',
					'meta_value'           => 'instock',
					'compare'              => '!='
                );?> 
                  <?php 

                  $loop = new WP_Query( $args );
                      while ( $loop->have_posts() ) : $loop->the_post(); 
                      global $product;
                  ?>
				  <?//php if ( $product->get_regular_price() !== '' ): ?>
                  	<div class="card__list--block">
                      <a href="<?php the_permalink(); ?>" class="card__list--top">
                        <?php if (has_post_thumbnail( $loop->post->ID )) 
                                echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
                                else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="">'; ?>

    <?php if( !empty(get_field('flag_text')) ): ?>
      <div class="card__list--flags">
        <div class="card__list--flag"><?= get_field('flag_text'); ?></div>
      </div>
    <?php endif; ?>
                      </a>
                      <div class="card__list--info">
                          <a href="<?php the_permalink(); ?>" class="card__list--title"><?php the_title(); ?></a>
                          <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
                              <div class="card__list--article">
                                  Код товара: <span><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
                              </div>
                          <?php endif; ?>
                          
    <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
    <div class="card__list--dis">
      <div class="card__list--prices">
        <div class="card__list--price">
			<?= $product->get_regular_price(); ?> ₽
		  </div>
        <?php if ($product->get_sale_price()): ?>	
        	<div class="card__list--price-old"><?= $product->get_sale_price(); ?> ₽</div>
        <?php endif ?>
      </div>
      
<?php if ( $product->get_stock_quantity() !== 1 ): ?>
                  		<div class="card__list--amount">
                        <div class="quantity product__quantity">
                          <?php do_action( 'woocommerce_before_add_to_cart_quantity' );

                              woocommerce_quantity_input( array(
                                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                              ) );

                              do_action( 'woocommerce_after_add_to_cart_quantity' );
                          ?>
                        </div>  
                      </div>
<?php endif ?>
    </div>
    <a href="?add-to-cart=<?= $product->get_id(); ?>" data-quantity="1" data-product_id="<?= $product->get_id(); ?>" data-product_sku="<?= $product->get_sku(); ?>" aria-label="Добавить «<?= $product->get_name(); ?>» в корзину" class="card__list--add-cart ajax_add_to_cart add_to_cart_button" rel="nofollow">В корзину</a>
  </form>
                      </div>
                  </div><?//php endif ?>
                  <?php 
                     endwhile;
                     wp_reset_query(); ?>
              </div>
          	</div>
    </div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
