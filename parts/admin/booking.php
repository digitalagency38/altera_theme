<?php
function getBookingForm(){
	parse_str($_POST['data'], $data);

	$newLine = "<br/>";

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: От кого письмо <from@example.com>\r\n";
	$headers .= "Reply-To: filonenko0406@gmail.com\r\n";

	$to      = 'kopelev.i@yandex.ru, ooolechis@yandex.ru';
	$subject = 'Новая бронь с сайта';
	$message = '';
	$message .= 'Апартаменты: '. '<<'.$data['room_name'].'>>'.$newLine;

	if(isset($data['countGouwup'])){
		$message .= 'Колличество взрослых: '. $data['countGouwup'].$newLine;
	}

	if(isset($data['countChild'])){
		$message .= 'Колличество детей: '. $data['countChild'].$newLine;
	}

	$message .= 'Даты: '.$data['userDate'].$newLine;
	$message .= 'Имя: '.$data['userName'].$newLine;

	if(isset($data['userEmail'])){
		$message .= 'E-mail: '.$data['userEmail'].$newLine;
	}

	$message .= 'Телефон: '.$data['userPhone'].$newLine;

	if(isset($data['userMessage'])){
		$message .= 'Сообщение: '.$data['userMessage'].$newLine;
	}

	if(isset($data['whatsapp']) || isset($data['viber']) || isset($data['telegram']) || isset($data['wechat'])){
		$message .= 'Мессенджер: ';
	}

	if(isset($data['whatsapp'])){
		$message .= ' whatsapp ';
	}
	if(isset($data['viber'])){
		$message .= ' viber ';
	}
	if(isset($data['telegram'])){
		$message .= ' telegram ';
	}
	if(isset($data['wechat'])){
		$message .= ' wechat ';
	}

	print_r($message);


	mail($to, $subject, $message, $headers);
}

add_action('wp_ajax_nopriv_booking', 'getBookingForm' );
add_action('wp_ajax_booking', 'getBookingForm' );
?>
