<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/mag/css/style.css">

<div class="cart center_block">
  <h1 class="cart__h1">Корзина</h1>
  <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<div class="cart__prod">
        <div class="cart__top">
            <div class="cart__top--title"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
            <div class="cart__top--title"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
            <div class="cart__top--title"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></div>
            <div class="cart__top--title">Стоимость</div>
            <div class="cart__top--title">&nbsp;</div>
        </div>
		<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
		<div class="cart__block woocommerce-cart-form__cart-item cart_item">
            <div class="cart__block--item">
              <?php
                      $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                      if ( ! $product_permalink ) {
                        echo $thumbnail; // PHPCS: XSS ok.
                      } else {
                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                      }
              ?>
                <div class="cart__block--tit">
					<?php
							if ( ! $product_permalink ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
							} else {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
							}

							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
							}
						?>
              
              </div>
            </div>
            <div class="cart__block--item">
                <div class="cart__block--mob">Цена:</div>
                <div class="cart__block--prc">
                  <?php
                      echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                  ?>
              	</div>
            </div>
          
            <div class="cart__block--item">
                <div class="cart__block--mob">Количество:</div>
                <div class="quantity product__quantity">
                    
				<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                  ?>
                </div>  
            </div>
            <div class="cart__block--item">
                <div class="cart__block--mob">Стоимость:</div>
                <div class="cart__block--prc">
              	<?php
                      echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                  ?>
              	</div>
            </div>
            <div class="cart__block--item cart__block--del">
				<?php
                      echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        'woocommerce_cart_item_remove_link',
                        sprintf(
                          '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                          esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                          esc_html__( 'Remove this item', 'woocommerce' ),
                          esc_attr( $product_id ),
                          esc_attr( $_product->get_sku() )
                        ),
                        $cart_item_key
                      );
              ?>
            </div>
		</div>
		<?php
				}
			}
		?>
	</div>
	<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<tbody>
			<?php do_action( 'woocommerce_cart_contents' ); ?>

					<button type="submit" class="button" name="update_cart"
						value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</div>
    <div class="cart__info">
        <div class="cart__info--block">
            <div class="cart__info--l-side">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.25 15.625V21.875C1.25 22.2065 1.3817 22.5245 1.61612 22.7589C1.85054 22.9933 2.16848 23.125 2.5 23.125H3.75C3.75 24.1196 4.14509 25.0734 4.84835 25.7767C5.55161 26.4799 6.50544 26.875 7.5 26.875C8.49456 26.875 9.44839 26.4799 10.1517 25.7767C10.8549 25.0734 11.25 24.1196 11.25 23.125H18.75C18.75 24.1196 19.1451 25.0734 19.8483 25.7767C20.5516 26.4799 21.5054 26.875 22.5 26.875C23.4946 26.875 24.4484 26.4799 25.1517 25.7767C25.8549 25.0734 26.25 24.1196 26.25 23.125H27.5C27.8315 23.125 28.1495 22.9933 28.3839 22.7589C28.6183 22.5245 28.75 22.2065 28.75 21.875V6.875C28.75 5.88044 28.3549 4.92661 27.6517 4.22335C26.9484 3.52009 25.9946 3.125 25 3.125H13.75C12.7554 3.125 11.8016 3.52009 11.0983 4.22335C10.3951 4.92661 10 5.88044 10 6.875V9.375H7.5C6.91783 9.375 6.34366 9.51054 5.82295 9.7709C5.30224 10.0313 4.8493 10.4093 4.5 10.875L1.5 14.875C1.46344 14.9293 1.43403 14.9882 1.4125 15.05L1.3375 15.1875C1.28233 15.3269 1.25269 15.4751 1.25 15.625ZM21.25 23.125C21.25 22.8778 21.3233 22.6361 21.4607 22.4305C21.598 22.225 21.7932 22.0648 22.0216 21.9701C22.2501 21.8755 22.5014 21.8508 22.7439 21.899C22.9863 21.9473 23.2091 22.0663 23.3839 22.2411C23.5587 22.4159 23.6777 22.6387 23.726 22.8811C23.7742 23.1236 23.7495 23.3749 23.6549 23.6034C23.5602 23.8318 23.4 24.027 23.1945 24.1643C22.9889 24.3017 22.7472 24.375 22.5 24.375C22.1685 24.375 21.8505 24.2433 21.6161 24.0089C21.3817 23.7745 21.25 23.4565 21.25 23.125ZM12.5 6.875C12.5 6.54348 12.6317 6.22554 12.8661 5.99112C13.1005 5.7567 13.4185 5.625 13.75 5.625H25C25.3315 5.625 25.6495 5.7567 25.8839 5.99112C26.1183 6.22554 26.25 6.54348 26.25 6.875V20.625H25.275C24.9235 20.2383 24.4951 19.9293 24.0172 19.7179C23.5394 19.5065 23.0226 19.3973 22.5 19.3973C21.9774 19.3973 21.4606 19.5065 20.9828 19.7179C20.5049 19.9293 20.0765 20.2383 19.725 20.625H12.5V6.875ZM10 14.375H5L6.5 12.375C6.61643 12.2198 6.76741 12.0938 6.94098 12.007C7.11455 11.9202 7.30594 11.875 7.5 11.875H10V14.375ZM6.25 23.125C6.25 22.8778 6.32331 22.6361 6.46066 22.4305C6.59801 22.225 6.79324 22.0648 7.02165 21.9701C7.25005 21.8755 7.50139 21.8508 7.74386 21.899C7.98634 21.9473 8.20907 22.0663 8.38388 22.2411C8.5587 22.4159 8.67775 22.6387 8.72598 22.8811C8.77421 23.1236 8.74946 23.3749 8.65485 23.6034C8.56024 23.8318 8.40002 24.027 8.19446 24.1643C7.9889 24.3017 7.74723 24.375 7.5 24.375C7.16848 24.375 6.85054 24.2433 6.61612 24.0089C6.3817 23.7745 6.25 23.4565 6.25 23.125ZM3.75 16.875H10V20.35C9.26229 19.6907 8.29392 19.3496 7.30587 19.4012C6.31781 19.4527 5.39015 19.8926 4.725 20.625H3.75V16.875Z" fill="#0095D9"/>
                </svg>
            </div>
            <div class="cart__info--r-side">
                <div class="cart__info--title">Платная доставка по Вашему адресу состовляет: <span>2 500 ₽</span></div>
                <a href="#" class="cart__info--link">Подробнее</a>
            </div>
        </div>
        <div class="cart__info--block">
            <div class="cart__info--l-side">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.6091 9.40001C25.602 9.36705 25.602 9.33296 25.6091 9.30001C25.603 9.27116 25.603 9.24136 25.6091 9.21251V9.10001L25.5341 8.91251C25.5036 8.86135 25.4657 8.81501 25.4216 8.77501L25.3091 8.67501H25.2466L20.3216 5.56251L15.6716 2.68751C15.564 2.60217 15.4409 2.5385 15.3091 2.50001H15.2091C15.0974 2.48136 14.9833 2.48136 14.8716 2.50001H14.7466C14.6014 2.53212 14.4622 2.58697 14.3341 2.66251L4.99661 8.47501L4.88411 8.56251L4.77161 8.66251L4.64661 8.75001L4.58411 8.82501L4.50911 9.01251V9.12501V9.20001C4.49696 9.2829 4.49696 9.36712 4.50911 9.45001V20.3625C4.50868 20.5749 4.5624 20.784 4.6652 20.9699C4.76799 21.1558 4.91646 21.3124 5.09661 21.425L14.4716 27.225L14.6591 27.3H14.7591C14.9706 27.3671 15.1976 27.3671 15.4091 27.3H15.5091L15.6966 27.225L24.9966 21.5125C25.1767 21.3999 25.3252 21.2433 25.428 21.0574C25.5308 20.8715 25.5845 20.6624 25.5841 20.45V9.53751C25.5841 9.53751 25.6091 9.45001 25.6091 9.40001ZM14.9966 5.21251L17.2216 6.58751L10.2341 10.9125L7.99661 9.53751L14.9966 5.21251ZM13.7466 23.9625L6.87161 19.7625V11.775L13.7466 16.025V23.9625ZM14.9966 13.825L12.6091 12.3875L19.5966 8.05001L21.9966 9.53751L14.9966 13.825ZM23.1216 19.725L16.2466 24V16.025L23.1216 11.775V19.725Z" fill="#0095D9"/>
                </svg>
            </div>
            <div class="cart__info--r-side">
                <div class="cart__info--title">Если вы сделаете дозаказ на сумму <span>10 000 ₽</span>, доставка по Вашему адресу будет бесплатной</div>
                <a href="#" class="cart__info--link">Подробнее</a>
            </div>
        </div>
        <div class="cart__info--block">
            <div class="cart__info--tit">Промокод на скидку</div>
          <?php if ( wc_coupons_enabled() ) { ?>
            <div class="coupon cart__info--input">
              <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
              <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">Применить</button>
              <?php do_action( 'woocommerce_cart_coupon' ); ?>
            </div>
            <?php } ?>
        </div>
    </div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
</div>
<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
<div class="cart__step">
  <?php
  /**
           * Cart collaterals hook.
           *
           * @hooked woocommerce_cross_sell_display
           * @hooked woocommerce_cart_totals - 10
           */
  do_action( 'woocommerce_cart_collaterals' );
  ?>
</div>
<?php do_action( 'woocommerce_after_cart' ); ?>
