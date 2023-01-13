<?php
//select rooms for review
function rooms_metabox_callback($post){
	$rooms = get_posts(array('post_type' => 'post_rooms', 'numberposts' => 999));
	$roomsIds = get_post_meta($post->ID, 'room_id', true);
	if(!is_array($roomsIds)) $roomsIds = array($roomsIds);
	if ($rooms) {
		foreach ($rooms as $room) {
			if (in_array($room->ID, $roomsIds)) {
				echo '<input type="radio" value="'.$room->ID.'" checked  name="rooms"/>';
				echo '<span>'.$room->post_title.'</span>';
				echo '<br>';
			} else {
				echo '<input type="radio" value="'.$room->ID.'" name="rooms"/>';
				echo '<span>'.$room->post_title.'</span>';
				echo '<br>';
			}
		}
	}
}

function init_rooms_metabox() {
	add_meta_box(
		'room_list',
		'Апартаменты',
		'rooms_metabox_callback',
		['post_review'],
		'side',
		'high'
	);
}
add_action('add_meta_boxes', 'init_rooms_metabox');

function rooms_save($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
	if (!current_user_can('edit_post', $post_id)) {return;}
	$roomsIds = $_POST['rooms'];
	if($roomsIds){
		update_post_meta($post_id, 'room_id', $roomsIds);
	}
}
add_action('save_post', 'rooms_save');
//end select rooms for review


//select beds for rooms
function beds_metabox_callback($post){
	$beds = get_posts(array('post_type' => 'post_bed', 'numberposts' => 100));
	$bedsIds = get_post_meta($post->ID, 'bed_id', true);
	if(!is_array($bedsIds)) $bedsIds = array($bedsIds);

	if ($beds) {
		foreach ($beds as $bed) {
			if (in_array($bed->ID, $bedsIds)) {
				echo '<input type="checkbox" value="'.$bed->ID.'" checked  name="beds[]"/>';
				echo '<span>'.$bed->post_title.'</span>';
				echo '<br>';
			} else {
				echo '<input type="checkbox" value="'.$bed->ID.'" name="beds[]"/>';
				echo '<span>'.$bed->post_title.'</span>';
				echo '<br>';
			}
		}
	}
}

function init_beds_metabox() {
	add_meta_box(
		'bed_list',
		'Спальные места',
		'beds_metabox_callback',
		['post_rooms'],
		'side',
		'high'
	);
}
add_action('add_meta_boxes', 'init_beds_metabox');

function beds_save($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
	if (!current_user_can('edit_post', $post_id)) {return;}
	print_r($_POST['beds']);
	$bedsIds = $_POST['beds'];
	if($bedsIds){
		update_post_meta($post_id, 'bed_id', $bedsIds);
	}
}
add_action('save_post', 'beds_save');
//end select beds for rooms
?>