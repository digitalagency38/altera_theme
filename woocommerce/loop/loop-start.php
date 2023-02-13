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

?>
<div class="catalog__r-side">
  	<div class="catalog__r-info">
      <div class="orderby-block">
        <span>Сортировать по:</span>
          <div class="orderby-blocks">
            <?php
                switch ($_GET['orderby']) :
                    case 'price' :
                        echo '	<a href="?orderby=price-desc" class="orderby-link orderby-desc-active">По цене</a>';
                    break;
                    case 'price-desc' :
                        echo '<a href="?orderby=price" class="orderby-link orderby-asc-active">По цене</a>';
                    break;
                    default:
                    echo '<a href="?orderby=price" class="orderby-link">По цене</a>';
                endswitch;		
                switch ($_GET['orderby']) :
                    case 'name' :
                        echo '	<a href="?orderby=name-desc" class="orderby-link orderby-asc-active">По названию</a>';
                    break;
                    case 'name-desc' :
                        echo '<a href="?orderby=name" class="orderby-link orderby-desc-active">По названию</a>';
                    break;
                    default:
                    echo '<a href="?orderby=name" class="orderby-link">По названию</a>';
                endswitch;	
              ?>
          </div>
        </div>
      <div class="filter_bl">Фильтры</div>
  	</div>	
  <div class="card__list--blocks">