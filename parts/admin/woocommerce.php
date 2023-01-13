<?php
//поддержка вукомерс
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
	// Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['home'] = 'Магазин';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text', 20 );

/*function altera_setup() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'altera_setup' );*/

add_action( 'woocommerce_product_options_general_product_data', 'art_woo_add_custom_fields' );
function art_woo_add_custom_fields() {
    global $product, $post;
    echo '<div class="options_group">';// Группировка полей

    ?>

    </div>
    <div class="options_group">
        <h2><strong>Габариты</strong></h2>
        <p class="form-field custom_field_type">
            <label for="custom_field_type"><?php echo 'Размер (мм)'; ?></label> <span class="wrap">
      <input placeholder="Высота" class="input-text" type="text" name="_pack_length"
             value="<?php echo get_post_meta( $post->ID, 'pack_length', true ); ?>"
             style="width: 15.75%;margin-right: 2%;"/>
      <input placeholder="Ширина" class="input-text" type="text" name="_pack_width"
             value="<?php echo get_post_meta( $post->ID, 'pack_width', true ); ?>"
             style="width: 15.75%;margin-right: 2%;"/>
      <input placeholder="Глубина" class="input-text" type="text" name="_pack_height"
             value="<?php echo get_post_meta( $post->ID, 'pack_height', true ); ?>"
             style="width: 15.75%;margin-right: 0;"/>
   </span>
        </p>
    </div>
    <?php
}

add_action( 'woocommerce_process_product_meta', 'art_woo_custom_fields_save', 10 );
function art_woo_custom_fields_save( $post_id ) {

    // Вызываем объект класса
    $product = wc_get_product( $post_id );

    // Сохранение области тектса
    $textarea_field = isset( $_POST['textarea-field'] ) ?  $_POST['textarea-field'] : '';
    $product->update_meta_data( '_textarea', $textarea_field );


    // Сохранение габариты
    $pack_length = isset( $_POST['_pack_length'] ) ? $_POST['_pack_length'] : '';
    $pack_width  = isset( $_POST['_pack_width'] ) ? ( $_POST['_pack_width'] ) : '';
    $pack_height = isset( $_POST['_pack_height'] ) ? ( $_POST['_pack_height'] ) : '';

    $product->update_meta_data( 'pack_length', $pack_length );
    $product->update_meta_data( 'pack_width', $pack_width );
    $product->update_meta_data( 'pack_height', $pack_height );

    // Сохраняем все значения
    $product->save();

}


add_filter( 'woocommerce_valid_order_statuses_for_payment', 'filter_function_name_7561', 10, 2 );
function filter_function_name_7561( $array, $that ){
	wc_integration_bitrix24_write_log("woocommerce_valid_order_statuses_for_payment\n");
	wc_integration_bitrix24_write_log($that->ID);
	wc_integration_bitrix24_write_log("\n");

	$deal_id = CRest::call(
		 'crm.deal.list',
		 [
				'filter' => ["UF_CRM_1632675126" => $that->ID]
		 ]);
	if (!count($deal_id['result'])) {
		wc_integration_bitrix24_write_log("YES\n");
		send_order_for_bitrix24($that);
	}
	else{
		wc_integration_bitrix24_write_log("NO\n");
	}

	return $array;
}

add_action('woocommerce_order_status_completed', 'wc_integration_bitrix24_completed');
add_action('woocommerce_order_status_pending', 'wc_integration_bitrix24_pending');
add_action('woocommerce_order_status_failed', 'wc_integration_bitrix24_failed');
add_action('woocommerce_order_status_on', 'wc_integration_bitrix24_on');
add_action('woocommerce_order_status_processing', 'wc_integration_bitrix24_processing');
add_action('woocommerce_order_status_refunded', 'wc_integration_bitrix24_refunded');
add_action('woocommerce_order_status_cancelled', 'wc_integration_bitrix24_cancelled');

function wc_integration_bitrix24_write_log($text) {
	$filename = __DIR__ . '/file.txt';
	$fh = fopen($filename, 'a');
	fwrite($fh, $text);
}
function wc_integration_bitrix24_completed($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - completed\n");
}
function wc_integration_bitrix24_pending($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - pending\n");
}
function wc_integration_bitrix24_failed($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - failed\n");
}
function wc_integration_bitrix24_on($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - on\n");
}
function wc_integration_bitrix24_processing($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - processing ($order_id)\n");
	$order = wc_get_order($order_id);
	send_order_for_bitrix24($order);
}
function wc_integration_bitrix24_refunded($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - refunded\n");
}
function wc_integration_bitrix24_cancelled($order_id) {
	wc_integration_bitrix24_write_log("wc_integration_bitrix24 - cancelled\n");
}

function send_order_for_bitrix24($order){
	wc_integration_bitrix24_write_log("$order\n");
	$items = $order->get_items();
	$products = "";
	foreach ( $items as $item ) {
		$products .= $item->get_name()." - ". $item->get_quantity()."<br>";
	}
	wc_integration_bitrix24_write_log($products);

	$first_name = $order->get_billing_first_name();
	$last_name = $order->get_billing_last_name();
	$data = [];
	if (!($first_name || $last_name)) {
		return;
	}
	$email = $order->get_billing_email();
	$phone = $order->get_billing_phone();

	$fields = [
	 'TITLE' => 'Альтера. Заказ',
	 'SOURCE_ID' => '51',
	 // 'TRACE' =>  $trace,
	 'CATEGORY_ID' => 4,
	 'ASSIGNED_BY_ID' => 3270
	];
	$fields_contact = ['ASSIGNED_BY_ID' => 3270];
	if ($first_name) $fields_contact['NAME'] = $first_name;
	if ($last_name) $fields_contact['LAST_NAME'] = $last_name;
	if ($email) $fields_contact['EMAIL'] = [['VALUE' => $email, 'VALUE_TYPE' => 'WORK']];
	if ($phone) $fields_contact['PHONE'] = [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']];
	$id_contact = CRest::call(
		 'crm.contact.add',
		 [
				'fields' =>$fields_contact
		 ])['result'];
	 $fields['CONTACT_IDS'] = [$id_contact];
	 if (!isset($id_contact)) {
		 return;
	 }

	 wc_integration_bitrix24_write_log("Контакт: ".$id_contact);


	$city = $order->get_shipping_city();
	$country = $order->get_shipping_country();
	$postcode = $order->get_shipping_postcode();
	$state = $order->get_shipping_state();
	$address = $order->get_shipping_address_1();

	$comments = '';

	if ($country) $comments .= "Страна: ".$country."<br>";
	if ($state) $comments .= "Область: ".$state."<br>";
	if ($city) $comments .= "Город: ".$city."<br>";
	if ($address) $comments .= "Адрес: ".$address."<br>";
	if ($postcode) $comments .= "Посткод: ".$postcode."<br>";
	if ($products) $comments .= "<br>Продукты:<br>".$products."<br>";

	$fields['COMMENTS'] = $comments;

wc_integration_bitrix24_write_log($order->ID."\n");
	$fields['UF_CRM_1632675126'] = $order->ID;
	$deal_id = CRest::call(
		 'crm.deal.add',
		 [
				'fields' => array_merge($fields, UTM::get_utms(['UTM_SOURCE' => 'SEO']))
		 ]);
		 if (isset($deal_id['result'])) {
		 	wc_integration_bitrix24_write_log("Сделка: ".$deal_id['result']);
		 }



	wc_integration_bitrix24_write_log("\n");
}
?>
