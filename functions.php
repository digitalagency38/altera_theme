<?php
session_start();


//styles
function enqueue_styles(){
    wp_enqueue_style('reset', get_template_directory_uri() .'/css/reset.css', null, false);
    wp_enqueue_style('swiper', get_template_directory_uri() .'/css/swiper.css', null, false);
    wp_enqueue_style('main', get_template_directory_uri() .'/css/main.css', array('reset', 'swiper'), null, false);
    wp_enqueue_style('fortune_css', get_template_directory_uri() .'/css/fortune.css', array('reset', 'swiper', 'main'), null, false);
    wp_enqueue_style('service', get_template_directory_uri() .'/css/service.css', array(), null, false);
    wp_enqueue_style('custom', get_template_directory_uri() .'/css/custom.css', array('main'), null, false);
    wp_enqueue_style('slick', get_template_directory_uri() .'/new/css/slick.css', array('main'), null, false);
    wp_enqueue_style('style', get_template_directory_uri() .'/new/css/style.css', array('main'), null, false);
  	wp_enqueue_style('redesign', get_template_directory_uri() .'/css/redesign.css', array('main'), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
//scripts
function enqueue_script(){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery-3.2.1.min.js', null, true);

    wp_enqueue_script('scroll', get_template_directory_uri() .'/js/scrollLock.js', array('jquery'), null, true);
    wp_enqueue_script('map', get_template_directory_uri() .'/js/map.js', array('jquery', 'map_api', 'scroll'), null, true);
    wp_enqueue_script('main', get_template_directory_uri() .'/js/main.js', array('jquery', 'scroll'), null, true);
    wp_enqueue_script('fortune_js', get_template_directory_uri() .'/js/fortune.js', array('jquery', 'scroll', 'main'), null, true);
    wp_enqueue_script('ajax_custom', get_template_directory_uri() .'/js/ajax.js', array('jquery'), null, true);
    wp_enqueue_script('swiperLib', get_template_directory_uri() .'/js/swiper.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper', get_template_directory_uri() .'/js/swiper-main.js', array(), null, true);
    wp_enqueue_script('service', get_template_directory_uri() .'/js/service.js', array('swiper'), null, true);
    wp_enqueue_script('slick', get_template_directory_uri() .'/new/js/slick.js', array('main'), null, true);
    wp_enqueue_script('main2', get_template_directory_uri() .'/new/js/main.js', array('main'), null, true);

    wp_localize_script( 'main', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'enqueue_script');


//header_menu
register_nav_menu('Main', 'Основное меню');
register_nav_menu('Mobile', 'Мобильное меню');
register_nav_menu('Footer', 'Футер меню');
register_nav_menu('Additional Footer', 'Дополнительное футер меню');
register_nav_menu('Shop', 'Магазин');

//add thumbnails
add_theme_support( 'post-thumbnails' );
//add support excerpt
add_post_type_support( 'page', 'excerpt' );

require_once ('parts/admin/helpers.php');
require_once ('parts/admin/post_types.php');
require_once ('parts/admin/ajax.php');
require_once ('parts/admin/woocommerce.php');
//require_once ('parts/admin/custom_fields.php');
//require_once ('parts/admin/booking.php');

add_theme_support( 'title-tag' );

add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7', 10, 3 );
function custom_shortcode_atts_wpcf7( $out, $pairs, $atts ) {
    if( isset($atts['title_service']) )
        $out['title_service'] = $atts['title_service'];

    return $out;
}

add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

// настройки темы
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Основные настройки',
        'menu_title'	=> 'Настройки темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

require_once ('parts/admin/bitrix24.php');






/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home']     = 'Главная'; // текст ссылки "Главная"
    $text['category'] = '%s'; // текст для страницы рубрики
    $text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author']   = 'Статьи автора %s'; // текст для страницы автора
    $text['404']      = 'Ошибка 404'; // текст для страницы 404
    $text['page']     = 'Страница %s'; // текст 'Страница N'
    $text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
    $wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
    $sep            = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
    $before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
    $after          = '</span>'; // тег после текущей "крошки"

    $show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_url       = home_url('/');
    $link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link          .= '<meta itemprop="position" content="%3$s" />';
    $link          .= '</span>';
    $parent_id      = ( $post ) ? $post->post_parent : '';
    $home_link      = sprintf( $link, $home_url, $text['home'], 1 );

    if ( is_home() || is_front_page() ) {

        if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ( $show_home_link ) {
            $position += 1;
            echo $home_link;
        }
        if ( is_category() ) {

            $parents = get_ancestors( get_query_var('cat'), 'category' );
            foreach ( array_reverse( $parents ) as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_search() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $show_home_link ) echo $sep;
                echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_time('Y') . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_month() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_day() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
            $position += 1;
            echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {

                $position += 1;
                $post_type = get_post_type_object( get_post_type() );
                $post_type_name=$post_type->name;
                $post_type_link=$post_type_name=='post_service'?'/post_service/':get_post_type_archive_link( $post_type_name );
                if ( $position > 1 ) echo $sep;

                echo sprintf( $link,$post_type_link , $post_type->labels->name, $position );
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
            } else {
                $cat = get_the_category(); $catID = $cat[0]->cat_ID;
                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'cpage' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                    echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {
                    if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                    elseif ( $show_last_sep ) echo $sep;
                }
            }

        } elseif ( is_post_type_archive() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . $post_type->label . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
            $parents = get_ancestors( $catID, 'category' );
            $parents = array_reverse( $parents );
            $parents[] = $catID;
            foreach ( $parents as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            $position += 1;
            echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_title() . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_page() && $parent_id ) {
            $parents = get_post_ancestors( get_the_ID() );
            foreach ( array_reverse( $parents ) as $pageID ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
            }
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $tagID = get_query_var( 'tag_id' );
                echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_author() ) {
            $author = get_userdata( get_query_var( 'author' ) );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . $text['404'] . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()

function mytheme_customize_register( $wp_customize ) {
/*
Добавляем секцию в настройки темы
*/
  $wp_customize->add_section(
      // ID
      'data_sale_section',
      // Arguments array
      array(
          'title' => 'Настройки акционного блока в шапке',
          'capability' => 'edit_theme_options',
          'description' => "Тут можно настройки блока"
      )
  );
  $wp_customize->add_setting(
      // ID
      'sale_image',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  // Add Controls
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_image_control', array(
        'label' => "Картинка",
        'section' => 'data_sale_section',
          // This last one must match setting ID from above
          'settings' => 'sale_image'   
    )));
/*
Добавляем поле телефона site_telephone
*/
  $wp_customize->add_setting(
      // ID
      'sale_title',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'sale_title_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Заголовок",
          'section' => 'data_sale_section',
          // This last one must match setting ID from above
          'settings' => 'sale_title'
      )
  );
  $wp_customize->add_setting(
      // ID
      'sale_text',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'sale_text_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Текст",
          'section' => 'data_sale_section',
          // This last one must match setting ID from above
          'settings' => 'sale_text'
      )
  );
  $wp_customize->add_setting(
      // ID
      'sale_link',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  $wp_customize->add_control(
      // ID
      'sale_link_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Ссылка",
          'section' => 'data_sale_section',
          // This last one must match setting ID from above
          'settings' => 'sale_link'
      )
  );
  $wp_customize->add_section(
      // ID
      'data_footer_section',
      // Arguments array
      array(
          'title' => 'Настройки ссылок в футере',
          'capability' => 'edit_theme_options',
          'description' => ""
      )
  );
  $wp_customize->add_setting(
      // ID
      'footer_of',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  
  $wp_customize->add_control(
      // ID
      'footer_of_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Оферта Альтера",
          'section' => 'data_footer_section',
          // This last one must match setting ID from above
          'settings' => 'footer_of'
      )
  );
  $wp_customize->add_setting(
      // ID
      'footer_pol',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  
  $wp_customize->add_control(
      // ID
      'footer_pol_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Положение",
          'section' => 'data_footer_section',
          // This last one must match setting ID from above
          'settings' => 'footer_pol'
      )
  );
  $wp_customize->add_setting(
      // ID
      'footer_polit',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  
  $wp_customize->add_control(
      // ID
      'footer_polit_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Политика перс. данных",
          'section' => 'data_footer_section',
          // This last one must match setting ID from above
          'settings' => 'footer_polit'
      )
  );
  $wp_customize->add_setting(
      // ID
      'footer_cook',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  
  $wp_customize->add_control(
      // ID
      'footer_cook_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Политика cookie",
          'section' => 'data_footer_section',
          // This last one must match setting ID from above
          'settings' => 'footer_cook'
      )
  );
  $wp_customize->add_section(
      // ID
      'data_mag_section',
      // Arguments array
      array(
          'title' => 'Настройки ссылок в магазине',
          'capability' => 'edit_theme_options',
          'description' => ""
      )
  );
  $wp_customize->add_setting(
      // ID
      'mag_link',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  
  $wp_customize->add_control(
      // ID
      'mag_link_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Ссылка на страницу доставки",
          'section' => 'data_mag_section',
          // This last one must match setting ID from above
          'settings' => 'mag_link'
      )
  );
  $wp_customize->add_setting(
      // ID
      'ras_link',
      // Arguments array
      array(
          'default' => '',
          'type' => 'option'
      )
  );
  
  $wp_customize->add_control(
      // ID
      'ras_link_control',
      // Arguments array
      array(
          'type' => 'text',
          'label' => "Ссылка на страницу рассрочки",
          'section' => 'data_mag_section',
          // This last one must match setting ID from above
          'settings' => 'ras_link'
      )
  );
}
add_action( 'customize_register', 'mytheme_customize_register' );

add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>
<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		if (event.detail.contactFormId == '31848' ) {
			 ym(39642225,'reachGoal','pool');
		}
		if (event.detail.contactFormId == '31849' ) {
			 ym(39642225,'reachGoal','bathhouse');
		}
		if (event.detail.contactFormId == '31850' ) {
			 ym(39642225,'reachGoal','hammam');
		}
		if (event.detail.contactFormId == '31852' ) {
			 ym(39642225,'reachGoal','frame_pool');
		}
		if (event.detail.contactFormId == '31851' ) {
			 ym(39642225,'reachGoal','service');
		}
	}, false );
</script>
<?php
}


add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
	function wpa83367_price_html( $price, $product ){
	return '<div class="card__prices--price">' . str_replace( '<ins>', '</div><div class="card__prices--price-old">', $price);
}


// Shortcode Callback function 
function display_random_products_shortcode() { 
  
 
} 
// register shortcode
add_shortcode('display_random_products_woocommerce', 'display_random_products_shortcode'); 

function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }
 
    return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );


// Add catalog order by arguments
function wc_add_catalog_orderby_args( $sort_args ) {

	$orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

	switch( $orderby_value ) {

		case 'name':
			$sort_args['orderby'] = 'title';
			$sort_args['order']   = 'asc';
		break;

		case 'name-desc':
			$sort_args['orderby']  = 'title';
			$sort_args['order']    = 'desc';
		break;

		case 'price':
			WC()->query->remove_ordering_args();    // remove ordering queries
			$sort_args['meta_key'] = '_price';
			$sort_args['orderby']  = ['meta_value_num' => 'asc', 'title' => 'asc'];
		break;

		case 'price-desc':
			WC()->query->remove_ordering_args();    // remove ordering queries
			$sort_args['meta_key'] = '_price';
			$sort_args['orderby']  = ['meta_value_num' => 'desc', 'title' => 'asc'];
		break;
	}

	return $sort_args;
}
add_filter( 'woocommerce_get_catalog_ordering_args', 'wc_add_catalog_orderby_args' );

// Custom default catalog orderby options
function wc_custom_catalog_orderby_options( $orderby ) {

	// Remove "Default sorting"
	if ( isset( $orderby['menu_order'] ) )      unset( $orderby['menu_order'] );

        // Remove "Sort by popularity"
	if ( isset( $orderby['popularity'] ) )      unset( $orderby['popularity'] );

        // Remove "Sort by average rating"
	if ( isset( $orderby['rating'] ) )          unset( $orderby['rating'] );

        // Remove "Sort by newness"
	if ( isset( $orderby['date'] ) )            unset( $orderby['date'] );

        // Remove "Sort by price: low to high"
	if ( isset( $orderby['price'] ) )           unset( $orderby['price'] );

        // Remove "Sort by price: high to low"
	if ( isset( $orderby['price-desc'] ) )      unset( $orderby['price-desc'] );

	$orderby['name']        = "Sort by Name: A to Z";
	$orderby['name-desc'] 	= "Sort by Name: Z to A";
	$orderby['price'] 	= "Sort by Price: low to high";
	$orderby['price-desc'] 	= "Sort by Price: high to low";

	return $orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'wc_custom_catalog_orderby_options' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'wc_custom_catalog_orderby_options' );




