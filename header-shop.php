<!DOCTYPE html>
<html lang="ru">
<head>
	<?php wp_head(); ?>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<meta name="format-detection" content="telephone=no" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i&display=swap&subset=cyrillic-ext" rel="stylesheet">
	<title>Altera</title>
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="" />
    <?php if(false): ?>
	    <meta name="google-site-verification" content="MZhwcE-xzzfQT0EUP5gEv0CtXXd-o2j6u6-KwbqPfJM" />
    <?php endif; ?>

				<!-- Facebook Pixel Code -->
				<script>
		  		!function(f,b,e,v,n,t,s)
		  		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		  		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		  		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		  		n.queue=[];t=b.createElement(e);t.async=!0;
		  		t.src=v;s=b.getElementsByTagName(e)[0];
		  		s.parentNode.insertBefore(t,s)}(window,document,'script',
		  		'https://connect.facebook.net/en_US/fbevents.js');

		  		fbq('init', '1936741036425722');
		  		fbq('track', 'PageView');
		  		</script>
		  		<noscript>
		  		<img height="1" width="1"
		  		src="https://www.facebook.com/tr?id=1936741036425722&ev=PageView
		  		&noscript=1"/>
				</noscript>
				<!-- End Facebook Pixel Code -->

		   <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(39642225, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39642225" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-192984956-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-192984956-1');
		</script>


</head>
<body>
<?require_once ('parts/views/svg.php')?>
<?require_once ('parts/views/modal.php')?>
<div class="sub-header">
	<div class="container">
		<div class="sub-header-content">
			<div class="mail">
				<a href="mailto:sale@altera.irk.ru">sale@irk-altera.ru</a>
			</div>
			<div class="phone">
				<a href="tel:+ 7(3952) 50-42-01">+ 7(3952) 50-42-01</a>
			</div>
			<div class="sub-header__buttons">
				
				<a href="#" class="sub-header__button sub-header__button--mail call-back-open">
          <img src="<?= get_template_directory_uri() ?>/img/svg/mail.svg" alt="">
        </a>
				<a href="tel:+7(3952)50-42-01" class="sub-header__button sub-header__button--phone">
          <img src="<?= get_template_directory_uri() ?>/img/svg/phone.svg" alt="">
          <span>Заказать звонок</span>
        </a>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<header class="header">
		<a href="/" class="logo">
			<img src="<?php echo get_template_directory_uri()?>/img/logo/logo.png" alt="logo">
		</a>
		<nav class="nav nav_shop">
			<?php wp_nav_menu(array('theme_location'=>'Main', 'menu_class' => 'nav_header') );?>
		</nav>
		<div class="mobile_menu">
			<?php wp_nav_menu(array('theme_location'=>'Main', 'menu_class' => 'nav_header') );?>
		</div>
		<div class="burger"><span></span><span></span><span></span></div>
	</header>
</div>
