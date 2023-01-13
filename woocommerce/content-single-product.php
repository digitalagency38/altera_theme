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
global $post;

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
    <div class="top_single_prod">
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary shop--single-content">
	    <?php
//        the_title( '<div class="title">', '</div>' );
        ?>

            <?php
                $pack_length = get_post_meta($post->ID, 'pack_length', true);
                $pack_width = get_post_meta($post->ID, 'pack_width', true);
                $pack_height = get_post_meta($post->ID, 'pack_height', true);
            ?>
            <div class="params">
                <?php if(!(strlen($pack_length) === 0 & strlen($pack_width) === 0 & strlen($pack_height) === 0)):?>
                    Размеры:<br/>
                <?php endif;?>
                <?php if(strlen($pack_width) > 0):?>
                    Ширина: <span><?php echo $pack_width?> см</span><br/>
                <?php endif;?>
                <?php if(strlen($pack_length) > 0):?>
                    Высота: <span><?php echo $pack_length?> см</span><br/>
                <?php endif;?>
                <?php if(strlen($pack_height) > 0):?>
                    Глубина: <span><?php echo $pack_height?> см</span><br/>
                <?php endif;?>

                <?php if(!empty($product->get_sku())): ?>
                <span itemprop="productID" class="sku">Артикул: <?php echo $product->get_sku(); ?></span>
                <?php endif;?>
            </div>

        <?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>

	</div>
	</div>
    <div class="description">
        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );?>
    </div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
//	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
<?php //do_action( 'woocommerce_after_single_product' ); ?>