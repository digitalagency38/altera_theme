<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="format-detection" content="telephone=no" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="" />
<script src="https://cdn-ru.bitrix24.ru/b14838556/crm/tag/call.tracker.js?<?= time() ?>"></script>
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



<?php wp_head(); ?>
<?php if(false): ?>
    <meta name="google-site-verification" content="MZhwcE-xzzfQT0EUP5gEv0CtXXd-o2j6u6-KwbqPfJM" />
<?php endif; ?>
	
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KKBFMPX');</script>
<!-- End Google Tag Manager -->
	
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-192984956-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-192984956-1');
</script>

<!-- Global site tag (gtag.js) - Google Ads: 399479905 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-399479905"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-399479905');
</script>

    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/header-assets/css/waslidemenu.min.css">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/header-assets/css/style.css">
    <script src="<?php echo get_theme_file_uri(); ?>/header-assets/js/jquery.waslidemenu.min.js"></script>
    <script src="<?php echo get_theme_file_uri(); ?>/header-assets/js/main.js"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKBFMPX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        <div class="site-panel-wrap header_flow">
            <div class="burger-wrap">
                <div class="burger-btn"></div>
                <div class="burger-body">
                    <div class="burger-body__top">
                        <a href="/" class="header__logo">
                      		<img src="<?php echo get_theme_file_uri()?>/img/logo/logo.svg" alt="logo">
                      	</a>
                        <div class="burger-close-btn"></div>
                    </div>
                    <div class="burger-body__body">
                        <div class="slide_menu">
                            <nav id="js_menu">
                              <?php
                                  wp_nav_menu(
                                  array(
                                    'menu'            => 'main_cat',
                                    'theme_location'  => '',
                                    'container'       => 'ul'
                                  )
                                );
                              ?>
                            </nav>
                        </div>
                        <div class="burger-body__info">
                            <div class="burger-body__cat">Каталог</div>
                          	<?php echo do_shortcode('[wcas-search-form]');?>                            
                        </div>
                        <nav class="burger-body__menu">
                            <?php
                              wp_nav_menu(
                                array(
                                  'menu'            => 'Главное меню (новое)',
                                  'theme_location'  => '',
                                  'container'       => 'ul'
                                )
                              );
                            ?>
                        </nav>
                        <a href="tel:73952504201" class="header__tel">+7 (3952) 50-42-01</a>
                        <div class="burger-body__bottom">
                            <a href="#" class="header__button">Заказать звонок</a>
                            <a href="https://vk.com/altera_irkutsk" target="_blank" class="header__soc">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 0.5C5.8725 0.5 0.5 5.8725 0.5 12.5C0.5 19.1275 5.8725 24.5 12.5 24.5C19.1275 24.5 24.5 19.1275 24.5 12.5C24.5 5.8725 19.1275 0.5 12.5 0.5ZM17.115 14.0388C17.115 14.0388 18.1763 15.0863 18.4375 15.5725C18.445 15.5825 18.4488 15.5925 18.4513 15.5975C18.5575 15.7763 18.5825 15.915 18.53 16.0187C18.4425 16.1912 18.1425 16.2763 18.04 16.2838H16.165C16.035 16.2838 15.7625 16.25 15.4325 16.0225C15.1788 15.845 14.9288 15.5537 14.685 15.27C14.3213 14.8475 14.0063 14.4825 13.6888 14.4825C13.6484 14.4824 13.6083 14.4888 13.57 14.5013C13.33 14.5788 13.0225 14.9213 13.0225 15.8338C13.0225 16.1188 12.7975 16.2825 12.6388 16.2825H11.78C11.4875 16.2825 9.96375 16.18 8.61375 14.7563C6.96125 13.0125 5.47375 9.515 5.46125 9.4825C5.3675 9.25625 5.56125 9.135 5.7725 9.135H7.66625C7.91875 9.135 8.00125 9.28875 8.05875 9.425C8.12625 9.58375 8.37375 10.215 8.78 10.925C9.43875 12.0825 9.8425 12.5525 10.1663 12.5525C10.227 12.5518 10.2866 12.5363 10.34 12.5075C10.7625 12.2725 10.6837 10.7662 10.665 10.4537C10.665 10.395 10.6637 9.78 10.4475 9.485C10.2925 9.27125 10.0287 9.19 9.86875 9.16C9.93351 9.07064 10.0188 8.99818 10.1175 8.94875C10.4075 8.80375 10.93 8.7825 11.4488 8.7825H11.7375C12.3 8.79 12.445 8.82625 12.6488 8.8775C13.0613 8.97625 13.07 9.2425 13.0338 10.1538C13.0225 10.4125 13.0113 10.705 13.0113 11.05C13.0113 11.125 13.0075 11.205 13.0075 11.29C12.995 11.7537 12.98 12.28 13.3075 12.4963C13.3502 12.523 13.3996 12.5373 13.45 12.5375C13.5638 12.5375 13.9063 12.5375 14.8338 10.9463C15.1198 10.4341 15.3684 9.90185 15.5775 9.35375C15.5963 9.32125 15.6513 9.22125 15.7163 9.1825C15.7642 9.15805 15.8174 9.1456 15.8712 9.14625H18.0975C18.34 9.14625 18.5063 9.1825 18.5375 9.27625C18.5925 9.425 18.5275 9.87875 17.5113 11.255L17.0575 11.8538C16.1363 13.0613 16.1363 13.1225 17.115 14.0388V14.0388Z" fill="#0095D9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="header header_flow">
            <div class="header__in center_block">
                <div class="header__top">
                    <a href="/" class="header__logo"><img src="<?php echo get_theme_file_uri()?>/img/logo/logo.svg" alt="logo"></a>
                  	
                    <?php echo do_shortcode('[wcas-search-form]');?>
                    <a href="https://vk.com/altera_irkutsk" target="_blank" class="header__soc">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 0.5C5.8725 0.5 0.5 5.8725 0.5 12.5C0.5 19.1275 5.8725 24.5 12.5 24.5C19.1275 24.5 24.5 19.1275 24.5 12.5C24.5 5.8725 19.1275 0.5 12.5 0.5ZM17.115 14.0388C17.115 14.0388 18.1763 15.0863 18.4375 15.5725C18.445 15.5825 18.4488 15.5925 18.4513 15.5975C18.5575 15.7763 18.5825 15.915 18.53 16.0187C18.4425 16.1912 18.1425 16.2763 18.04 16.2838H16.165C16.035 16.2838 15.7625 16.25 15.4325 16.0225C15.1788 15.845 14.9288 15.5537 14.685 15.27C14.3213 14.8475 14.0063 14.4825 13.6888 14.4825C13.6484 14.4824 13.6083 14.4888 13.57 14.5013C13.33 14.5788 13.0225 14.9213 13.0225 15.8338C13.0225 16.1188 12.7975 16.2825 12.6388 16.2825H11.78C11.4875 16.2825 9.96375 16.18 8.61375 14.7563C6.96125 13.0125 5.47375 9.515 5.46125 9.4825C5.3675 9.25625 5.56125 9.135 5.7725 9.135H7.66625C7.91875 9.135 8.00125 9.28875 8.05875 9.425C8.12625 9.58375 8.37375 10.215 8.78 10.925C9.43875 12.0825 9.8425 12.5525 10.1663 12.5525C10.227 12.5518 10.2866 12.5363 10.34 12.5075C10.7625 12.2725 10.6837 10.7662 10.665 10.4537C10.665 10.395 10.6637 9.78 10.4475 9.485C10.2925 9.27125 10.0287 9.19 9.86875 9.16C9.93351 9.07064 10.0188 8.99818 10.1175 8.94875C10.4075 8.80375 10.93 8.7825 11.4488 8.7825H11.7375C12.3 8.79 12.445 8.82625 12.6488 8.8775C13.0613 8.97625 13.07 9.2425 13.0338 10.1538C13.0225 10.4125 13.0113 10.705 13.0113 11.05C13.0113 11.125 13.0075 11.205 13.0075 11.29C12.995 11.7537 12.98 12.28 13.3075 12.4963C13.3502 12.523 13.3996 12.5373 13.45 12.5375C13.5638 12.5375 13.9063 12.5375 14.8338 10.9463C15.1198 10.4341 15.3684 9.90185 15.5775 9.35375C15.5963 9.32125 15.6513 9.22125 15.7163 9.1825C15.7642 9.15805 15.8174 9.1456 15.8712 9.14625H18.0975C18.34 9.14625 18.5063 9.1825 18.5375 9.27625C18.5925 9.425 18.5275 9.87875 17.5113 11.255L17.0575 11.8538C16.1363 13.0613 16.1363 13.1225 17.115 14.0388V14.0388Z" fill="#0095D9"/>
                        </svg>
                    </a>
                    <a href="tel:73952504201" class="header__tel">+7 (3952) 50-42-01</a>
                    <a href="#" class="header__button btn-popup">Заказать звонок</a>
                </div>
                <div class="header__bottom">
                    <div class="header__cat">
                        <div class="header__but">Каталог</div>
                        <div class="popups">
                            <div class="popups__in center_block">
                                <nav class="popups__menu">
                                    <?php
                                        wp_nav_menu(
                                            array(
                                                'menu'            => 'main_cat',
                                                'theme_location'  => '',
                                                'container'       => 'ul'
                                            )
                                        );
                                    ?>
                                </nav>
                                <div class="popups__block">
                                    <div class="popups__img"><img src="<?= get_option('sale_image'); ?>" alt=""></div>
                                    <div class="popups__title"><?= get_option('sale_title'); ?></div>
                                    <div class="popups__text">
                                      <?= get_option('sale_text'); ?>
                                    </div>
                                    <a href="<?= get_option('sale_link'); ?>" class="popups__btn">Узнать подробности</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="header__nav">
                        <?php
                          wp_nav_menu(
                            array(
                              'menu'            => 'Главное меню (новое)',
                              'theme_location'  => '',
                              'container'       => 'ul'
                            )
                          );
                      	?>
                    </nav>
                  
                  
					<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                </div>
            </div>
        </header>