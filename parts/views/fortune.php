<div class="h-wrapper _hide js-h-wrapper" style="display: none;">
  <div class="h-wrapper__overlay js-overlay"></div>
    <div class="h-wrapper__content">
    <div class="wheel js-wheel">
        <h2 class="wheel__title">
            Испытай свою удачу <br>- получи <span>подарок</span> от "Компания Альтера"
        </h2>
        <div class="wheel__content">
            <div class="wheel__wheel-wrpapper">
                <div id="wheel-elem" class="wheel__elem" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/fortune/wheel.svg)"></div>
                <img src="<?php echo get_template_directory_uri() ?>/img/fortune/arrow.svg" class="wheel__arrow" width="47" height="64" alt="Срелка">
                <div class="wheel__logo" width="184" height="63" >
                  <img src="<?php echo get_template_directory_uri() ?>/img/fortune/logo.svg" alt="Логотип">
                </div>
            </div>
            <div class="wheel__actions">
              <button id="start" class="wheel__btn wheel__btn_mb">Пуск</button>
              <button id="stop" class="wheel__btn" disabled>Стоп</button>
            </div>
        </div>
      <button class="close wheel__close js-close">
          <svg width="29" height="27" viewBox="0 0 29 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="2.70711" y1="1.29289" x2="27.7071" y2="26.2929" stroke="#ff8006" stroke-width="2"/>
            <line x1="1.29289" y1="26.2929" x2="26.2929" y2="1.29289" stroke="#ff8006" stroke-width="2"/>
          </svg>
        </button>
    </div>


    <div class="h-form _hide js-h-form" style="display: none;">
      <div class="h-form__header">
        <h3 class="h-form__title">
          Поздравляем!
        </h3>
        <h4 class="h-form__subtitle">
          Вы стали счастливым обладателем <br>сертификата на скидку в <span>10%</span>
        </h4>
      </div>
      <div class="h-form__after-header">
        <p>
          Заполните анкету и наш менеджер свяжется <br>с Вами в ближайшее время для уточнения деталей
        </p>
      </div>

      <a href="/anketa" class="h-form__link">Заполнить анкету</a>

      <button class="close h-form__close js-close">
          <svg width="29" height="27" viewBox="0 0 29 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="2.70711" y1="1.29289" x2="27.7071" y2="26.2929" stroke="#ff8006" stroke-width="2"/>
            <line x1="1.29289" y1="26.2929" x2="26.2929" y2="1.29289" stroke="#ff8006" stroke-width="2"/>
          </svg>
      </button>
    </div>

    <audio id="check">
      <source src="<?php echo get_template_directory_uri() ?>/img/fortune/click888.ogg" type="audio/ogg; codecs=vorbis">
      <source src="<?php echo get_template_directory_uri() ?>/img/fortune/click888.aac" type="audio/aac">
    </audio>
    <audio id="final">
      <source src="<?php echo get_template_directory_uri() ?>/img/fortune/ding888.ogg" type="audio/ogg; codecs=vorbis">
      <source src="<?php echo get_template_directory_uri() ?>/img/fortune/ding888.aac" type="audio/aac">
    </audio>
  </div>
</div>
