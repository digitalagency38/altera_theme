<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="cart__step--r-side <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
  <div class="cart__step--tit">Ваш заказ:</div>
  <ul class="cart__step--list">
    <li>
      <div class="cart__step--name">Всего товаров:</div>
      <div class="cart__step--number"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
    </li>
    <li>
      <div class="cart__step--name">Стоимость:</div>
      <div class="cart__step--number" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></div>
    </li>
    <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
      <li class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <div class="cart__step--name"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
        <div class="cart__step--number" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
      </li>
    <?php endforeach; ?>
    
    <?php
    if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
      $taxable_address = WC()->customer->get_taxable_address();
      $estimated_text  = '';

      if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
        /* translators: %s location. */
        $estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
      }

      if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
        foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
    ?>
      <li class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <div class="cart__step--name"><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
        <div class="cart__step--number" data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
      </li>
    <?php
        }
      } else {
    ?>
      <li class="tax-total">
        <div class="cart__step--name"><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
        <div class="cart__step--number" data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></div>
      </li>
    <?php
      }
    }
    ?>
  </ul>
  <div class="cart__step--all-price">
    <span>Итого:</span><?php wc_cart_totals_order_total_html(); ?>
  </div>
  <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
  <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
  <?php do_action( 'woocommerce_after_cart_totals' ); ?>
</div>
