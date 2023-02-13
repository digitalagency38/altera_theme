<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="card__list--block">
  <a href="<?= $product->get_permalink(); ?>" class="card__list--top">
    <?= $product->get_image('large'); ?>
    <?php if( !empty(get_field('flag_text')) ): ?>
      <div class="card__list--flags">
        <div class="card__list--flag"><?= get_field('flag_text'); ?></div>
      </div>
    <?php endif; ?>
  </a>
  <div class="card__list--info">
    <a href="<?= $product->get_permalink(); ?>" class="card__list--title"><?= $product->get_name(); ?></a>
    <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
      <div class="card__list--article">
        Код товара: <span><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
      </div>
    <?php endif; ?>
    <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
    <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
    <div class="card__list--dis">
      <div class="card__list--prices">
        <div class="card__list--price"><?= $product->get_regular_price(); ?> ₽</div>
        <?php if ($product->get_sale_price()): ?>	
        	<div class="card__list--price-old"><?= $product->get_sale_price(); ?> ₽</div>
        <?php endif ?>
      </div>
      
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
    </div>
    <a href="?add-to-cart=<?= $product->get_id(); ?>" data-quantity="1" data-product_id="<?= $product->get_id(); ?>" data-product_sku="<?= $product->get_sku(); ?>" aria-label="Добавить «<?= $product->get_name(); ?>» в корзину" class="card__list--add-cart ajax_add_to_cart add_to_cart_button" rel="nofollow">В корзину</a>
  </form>
  </div>
</div>

