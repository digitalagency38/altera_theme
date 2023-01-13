<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$add_class = '';
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
//$children = get_term_children($term->term_id, get_query_var('taxonomy'));
$children = [];
if (function_exists('avl_get_children_terms') && $term) {
    $children = avl_get_children_terms($term);
} 
if (!$children && $term) {
    $children = get_term_children($term->term_id, get_query_var('taxonomy'));
}

if ( (!$children && have_posts()) || isset($_GET['s']) ) {
    $add_class = 'single__product__wrapper';
} else {
    $add_class = 'single__cat__wrapper';
}
?>
<!--<ul class="products columns-<?php /*echo esc_attr( wc_get_loop_prop( 'columns' ) ); */?>">-->
<ul class="products shop--loop <?php echo $add_class; ?>">
