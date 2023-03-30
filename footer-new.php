		<footer class="footer">
            <div class="footer__top">
                <div class="footer__in center_block">
                    <div class="footer__l-side">
                        <a href="/" class="footer__logo"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/footer_logo.svg" alt=""></a>
                        <div class="footer__hide">
                            <a href="<?= get_option('footer_of'); ?>" class="footer__lnk">Оферта Альтера</a>
                            <a href="<?= get_option('footer_pol'); ?>" class="footer__lnk">Положение ИМ Альтера</a>
                            <div class="footer__copy">© 2022 Альтера | Все права защищены</div>
                            <div class="footer__revs">
                                <a href="https://yandex.ru/maps/org/altera/1215495443/?ll=104.306738%2C52.277655&z=17" target="_blank" class="footer__rev"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/rev1.svg" alt=""></a>
                            <a href="https://2gis.ru/irkutsk/firm/1548640652892207" target="_blank" class="footer__rev"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/rev2.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <nav class="footer__menu">
                        <?php
                          wp_nav_menu(
                            array(
                              'menu'            => 'Футер',
                              'theme_location'  => '',
                              'container'       => 'ul'
                            )
                          );
                      	?>
                    </nav>
                    <div class="footer__info">
                        <div class="footer__address">Иркутск, ул. Партизанская, 63, <br> МЦ «Эталон», 4 этаж.</div>
                        <a href="mailto:sale@irk-altera.ru" class="footer__mail">sale@irk-altera.ru</a>
                        <a href="73952504201" class="footer__tel">+7 (3952) 50-42-01</a>
                    </div>
                    <div class="footer__hide mob">
                        <a href="<?= get_option('footer_of'); ?>" class="footer__lnk">Оферта Альтера</a>
                        <a href="<?= get_option('footer_pol'); ?>" class="footer__lnk">Положение ИМ Альтера</a>
                        <div class="footer__copy">© 2022 Альтера | Все права защищены</div>
                        <div class="footer__revs">
                            <a href="https://yandex.ru/maps/org/altera/1215495443/?ll=104.306738%2C52.277655&z=17" target="_blank" class="footer__rev"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/rev1.svg" alt=""></a>
                            <a href="https://2gis.ru/irkutsk/firm/1548640652892207" target="_blank" class="footer__rev"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/rev2.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__in center_block">
                    <a href="<?= get_option('footer_polit'); ?>" class="footer__link">Политика обработки персональных данных</a>
                    <a href="<?= get_option('footer_cook'); ?>" class="footer__link">Политика обработки файлов cookie</a>
                    <div class="footer__pays">
                        <div class="footer__pay"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/spay1.svg" height="100%" alt=""></div>
                        <div class="footer__pay"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/spay2.svg" height="100%" alt=""></div>
                        <div class="footer__pay"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/spay3.svg" height="100%" alt=""></div>
                        <div class="footer__pay"><img src="<?php echo get_theme_file_uri()?>/header-assets/img/spay4.svg" height="50px" style="width: auto;" alt=""></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<?require_once ('svg.php')?>
<?php wp_footer(); ?>
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8" async></script>
</body>
</html>