<footer class="footer">
    <div class="container container-footer-logo">
      <a href="/" class="logo">
          <img class="svg" src="<?php echo get_template_directory_uri()?>/img/logo/logo_white.svg" alt="png">
      </a>
    </div>
    <div class="container">
        <div class="box box_menu">

	        <?php wp_nav_menu(array('theme_location'=>'Footer') );?>
        </div>
        <div class="box box_contact">
            <p>Иркутск, ул. Партизанская,<br>63, МЦ «Эталон», 4 этаж.</p>
            <p><a href="mailto:sale@irk-altera.ru">sale@irk-altera.ru</a></p>
            <p><a href="tel:+7(3952)504-201">+7(3952)504-201</a><!--<br><a href="tel:+79148995787">+7(914)899-57-87</a>--></p>
        </div>
    </div>

    <div class="container additional-footer">
        <div class="box box_menu">
            <?php wp_nav_menu(array('theme_location'=>'Additional Footer') );?>
        </div>
        <div class="">
            <div class="pay-image">
                <img src="https://altera-irkutsk.ru/wp-content/uploads/2021/10/ab.png" alt="Оплата банковскими картами осуществляется через АО «АЛЬФА-БАНК»" />
            </div>
            <div class="pay-image">
                <img src="https://altera-irkutsk.ru/wp-content/uploads/2020/10/mastercard-logo.svg_.png" alt="Оплата банковскими mastercard картами осуществляется через АО «АЛЬФА-БАНК»" />
                <img src="https://altera-irkutsk.ru/wp-content/uploads/2020/10/visa.png" alt="Оплата банковскими картами visa осуществляется через АО «АЛЬФА-БАНК»" />
                <img src="https://altera-irkutsk.ru/wp-content/uploads/2021/10/mir.png" alt="Оплата банковскими картами mir осуществляется через АО «АЛЬФА-БАНК»" />
            </div>
        </div>
    </div>
</footer>
<?require_once ('svg.php')?>

<?php //require_once ('parts/views/fortune.php'); ?>

<?php wp_footer(); ?>

</body>
</html>
