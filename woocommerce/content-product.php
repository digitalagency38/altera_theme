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
    <div class="card__list--dis">
      <div class="card__list--prices">
        <div class="card__list--price"><?= $product->get_regular_price(); ?> ₽</div>
        <?php if ($product->get_sale_price()): ?>	
        	<div class="card__list--price-old"><?= $product->get_sale_price(); ?> ₽</div>
        <?php endif ?>
      </div>
      <div class="card__list--amount">
        <div class="quantity product__quantity">
          <button type="button" class="product__quantity_button product__quantity_minus">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="3" viewBox="0 0 10 3" fill="none">
              <path d="M0 0.5H10V2.5H0V0.5Z" fill="#333333"></path>
            </svg>
          </button>
          <input type="number" id="quantity_6360b676dcbaf" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Кол-во" size="4" placeholder="" inputmode="numeric" autocomplete="off">
          <button type="button" class="product__quantity_button product__quantity_plus">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
              <path d="M0 4.78571H10V6.21429H0V4.78571Z" fill="#333333"></path>
              <path d="M4.28571 10.5V0.5L5.71429 0.5L5.71429 10.5H4.28571Z" fill="#333333"></path>
            </svg>
          </button>
        </div>  
      </div>
    </div>
    <a href="?add-to-cart=<?= $product->get_id(); ?>" data-quantity="1" data-product_id="<?= $product->get_id(); ?>" data-product_sku="<?= $product->get_sku(); ?>" aria-label="Добавить «<?= $product->get_name(); ?>» в корзину" class="card__list--add-cart ajax_add_to_cart" rel="nofollow">В корзину</a>
  </div>
</div>

