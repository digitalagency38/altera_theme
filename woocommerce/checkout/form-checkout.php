<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// do_action( 'woocommerce_before_checkout_form', WC()->checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! WC()->checkout->is_registration_enabled() && WC()->checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
  <form name="checkout" method="post" class="checkout woocommerce-checkout cart__step" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

      <?php if ( WC()->checkout->get_checkout_fields() ) : ?>

<div class="cart__step--l-side">
  <div class="cart__step--title">Оформление заказа</div>
          <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

          <div class="col2-set" id="customer_details">
              <div class="col-1">
                  <?php do_action( 'woocommerce_checkout_billing' ); ?>
              </div>

              <div class="col-3">
                  <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                    <div class="block_tabs">
                      <div class="block_tabs__top">
                        <?php wc_cart_totals_shipping_html(); ?>
                      </div>
                      <div class="block_tabs__content">
                        <div class="block_tabs__tab1 block_tabs_tab isActive">
                          <div class="block_tabs__l">
                            <div class="block_tabs__tit">Контакты:</div>
                            <div class="block_tabs__block">
                              <div class="block_tabs__title">Единый телефон:</div>
                              <a href="tel:73952504201" class="block_tabs__text">+ 7(3952) 50-42-01</a>
                            </div>
                            <div class="block_tabs__block">
                              <div class="block_tabs__title">Электронная почта:</div>
                              <a href="mailto:sale@irk-altera.ru" class="block_tabs__text">sale@irk-altera.ru</a>
                            </div>
                            <div class="block_tabs__block">
                              <div class="block_tabs__title">Адрес:</div>
                              <div class="block_tabs__text">664047, г.Иркутск, ул.Партизанская, 63</div>
                            </div>
                            <div class="block_tabs__block">
                              <div class="block_tabs__title">Режим работы склада:</div>
                              <div class="block_tabs__text">Пн-Пт: 09.00 — 19.00 / Сб-Вс: выходной</div>
                            </div>
                          </div>
                          <div class="block_tabs__r">
                            <div class="contact" id="map-contact" style="height: 330px;"></div>
                          </div>

                        </div>
                        <div class="block_tabs__tab2 block_tabs_tab">

                        </div>
                        <div class="block_tabs__tab3 block_tabs_tab">
                          <p>Доставка осуществляется транспортной компанией на ваш выбор.</p> <br>
                          Доставка до транспортной бесплатная от 10 000 руб. Оплата за доставку осуществляется при получении заказа.
                        </div>
                      </div>
                    </div>
				  
                  <?php endif; ?>
              </div>
              <div class="col-2">
                  <?php do_action( 'woocommerce_checkout_shipping' ); ?>
              </div>
          </div>

          <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

</div>
      <?php endif; ?>

      <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

<div class="cart_step_all">
<div class="cart__step--r-side">
      <div class="cart__step--tit"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></div>

      <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

      <div id="order_review" class="woocommerce-checkout-review-order">
          <?php do_action( 'woocommerce_checkout_order_review' ); ?>
      </div>
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
  <div class="checkbox">
    <input class="custom-checkbox" type="checkbox" checked id="color-1" name="color-1" value="indigo">
	  <label for="color-1">Оставляя заявку, вы соглашаетесь на обработу <a href="/politika-obrabotki-personalnih-dannih">персональных данных</a></label>
  </div>
  <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

  <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button button__all-link cart__step--btn" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">Оформить заказ</button>' ); // @codingStandardsIgnoreLine ?>

  <?php do_action( 'woocommerce_review_order_after_submit' ); ?>
</div>
</div>
      <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

  </form>

<?php do_action( 'woocommerce_after_checkout_form', WC()->checkout ); ?>
