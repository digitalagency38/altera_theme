<?php
require_once(get_template_directory().'/crest.php');

class UTM{
  public static $utms = [
    'utm_source',
    'utm_medium',
    'utm_campaign',
    'utm_term',
    'utm_content'
  ];

  public static function init(){
    if (count(array_intersect(self::$utms, array_keys($_GET)))) {
      foreach (self::$utms as $utm) {
        unset($_SESSION[$utm]);
        if (isset($_GET[$utm])) {
          $_SESSION[$utm] = $_GET[$utm];
        }
      }
    }
  }

  public static function get_utms($default = []){
    $result = [];
    foreach (self::$utms as $utm) {
      if (isset($_SESSION[$utm])) {
        $result[strtoupper($utm)] = $_SESSION[$utm];
      }
    }
    return count($result)?$result:$default;
  }
}
UTM::init();

add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );
function your_wpcf7_mail_sent_function( $contact_form ) {

  $title = $contact_form->title;
  $id = $contact_form->id;
  $submission = WPCF7_Submission::get_instance();
  $posted_data = $submission->get_posted_data();
  $trace = $posted_data['TRACE'];
  $fio = isset($posted_data['fio'])?$posted_data['fio']:(
     isset($posted_data['phone'])?$posted_data['phone']:(
        isset($posted_data['email'])?$posted_data['email']:""
      )
   );
  $email = isset($posted_data['email'])?$posted_data['email']:"";
  $phone = isset($posted_data['phone'])?$posted_data['phone']:"";
  $comments = isset($posted_data['comments'])?"Комментарий: ".$posted_data['comments']."<br>":"";
  foreach ($posted_data as $key => $value) {
    if (in_array($key, ["TRACE", "kc_captcha", "kc_honeypot", "fio", "phone", "email", "comments"])) {
      continue;
    }
    $comments .= $key.": ".$value."<br>";
  }

  $fields = [
   'TITLE' => 'Альтера. '.$title,
   'SOURCE_ID' => '51',
   'TRACE' =>  $trace,
   'CATEGORY_ID' => 4,
   'ASSIGNED_BY_ID' => 3270,
 ];

 $id_contact = CRest::call(
    'crm.contact.add',
    [
       'fields' =>[
          "NAME" => $fio,
          'EMAIL' => [['VALUE' => $email, 'VALUE_TYPE' => 'WORK']],
          'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']],
          'ASSIGNED_BY_ID' => 3270,
       ]
    ])['result'];
  if (isset($id_contact)) {
    $fields['CONTACT_IDS'] = [$id_contact];
  }


  if (23458 == $id ) {
      $comments = "Вопрос :".$posted_data['comments'];
   }
   if ($id == 708 ) { //Получить консультацию
       $comments = $posted_data['title_service'];
    }
    if ($id == 23755 ) { //Консультация
        $comments = $posted_data['title_service'];
     }
     if ($id == 21915 ) { //Главная слайдер
         $comments = $posted_data['form-info'];
      }
      if ($id == 716 ) { //Квиз
          $comments = "Вид услуги:
    ".$posted_data['radio-1']."

    Начало работ:
    ".$posted_data['radio-2'];

       }

    if ($comments) {
      $fields['COMMENTS'] = $comments;
    }
    if ($fio) {
      CRest::call(
         'crm.deal.add',
         [
            'fields' => array_merge($fields, UTM::get_utms(['UTM_SOURCE' => 'SEO']))
         ]);
    }
}
$deal_id = CRest::call(
	 'crm.deal.list',
	 [
			'filter' => ["UF_CRM_1632675126" => 50]
	 ]);
	 // var_dump($deal_id['result']);
