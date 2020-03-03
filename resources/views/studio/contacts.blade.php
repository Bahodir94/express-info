@extends('studio.layouts.app')

@section('title', 'Контакты')

@section('content')
    <div id=system-message-container></div>
    <div class="uk-section-secondary uk-cover-container uk-section uk-section-small uk-flex uk-flex-middle"
         style="background-color: #111111;" tm-header-transparent=light tm-header-transparent-placeholder
         uk-height-viewport="offset-top: true;">
        <video width=2560 height=1440 uk-cover src=/images/yootheme/lets-talk-contact-bg.mp4 loop autoplay muted
               playsinline></video>
        <div class=uk-position-cover style="background-color: rgba(0, 0, 0, 0.7);"></div>
        <div class=uk-width-1-1>
            <div class="uk-container uk-container-large uk-position-relative">
                <div class=uk-grid-margin uk-grid>
                    <div class=uk-width-1-1@m>
                        <div class="uk-h1 uk-margin-xlarge uk-margin-remove-bottom uk-text-center"
                             uk-parallax="opacity: 1,0; viewport: 0.9;"><span
                                class=uk-text-background>Давайте поговорим</span></div>
                        <div class="uk-margin-large uk-text-left@m uk-text-center"
                             uk-parallax="opacity: 1,0; viewport: 0.9;">
                            <div
                                class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-2@l uk-grid-divider uk-grid-match"
                                uk-grid>
                                <div>
                                    <div class="el-item uk-panel uk-margin-remove-first-child">
                                        <div class="el-meta uk-text-meta uk-margin-top">SEO & Телеграмм боты & Мобильные
                                            приложения
                                        </div>
                                        <h3 class="el-title uk-margin-small-top uk-margin-remove-bottom"> Мурад
                                            Икрамходжаев </h3>
                                        <div class="el-content uk-panel uk-text-lead uk-margin-top"><p><a
                                                    href=https://t.me/Seo_of_vid_uz>@Seo_of_vid_uz</a></p>
                                            <p><a href=tel:+998909408196>+998 90 940 8196</a></p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="el-item uk-panel uk-margin-remove-first-child">
                                        <div class="el-meta uk-text-meta uk-margin-top">Бизнес & Вопросы</div>
                                        <h3 class="el-title uk-margin-small-top uk-margin-remove-bottom"> Батыр
                                            Садыков </h3>
                                        <div class="el-content uk-panel uk-text-lead uk-margin-top"><p><a
                                                    href=https://t.me/vovorus>@vovorus</a></p>
                                            <p><a href=tel:+998974248899>+998 97 424 8899</a></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-panel uk-margin-large">
                            <form enctype=multipart/form-data id=simplecallback-119
                                  action="https://vid.uz/index.php?option=com_ajax&module=simplecallback&format=json"
                                  class="uk-child-width-expand@s uk-grid form-inline uk-text-center simplecallback "
                                  method=post data-simplecallback-form>
                                <div class=form-group><label>
                                        <div class="textlabel col-form-label"> Ваше имя <span style=needreq>*</span>
                                        </div>
                                        <input type=text placeholder='Ваше имя' name=simplecallback_name required
                                               class="input-block-level form-control mr-sm-2" autocomplete=off/>
                                    </label></div>
                                <div class=form-group><label>
                                        <div class="textlabel col-form-label"> Телефон <span style=needreq>*</span>
                                        </div>
                                        <input placeholder=Телефон type=tel pattern='(\+?\d[- .]*){6,14}'
                                               name=simplecallback_phone required
                                               class="input-block-level form-control mr-sm-2" autocomplete=off/>
                                    </label></div>
                                <div class=form-group><label>
                                        <div class="textlabel col-form-label"> E-mail</div>
                                        <input type=text placeholder=E-mail name=simplecallback_emailclient
                                               class="input-block-level form-control mr-sm-2" autocomplete=off/>
                                    </label></div>
                                <div style=display:none id=redirectsuccesssimplecallback>noturl</div>
                                <div class="form-group uk-width-auto@s"><input type=text name=simplecallback_username
                                                                               class=simplecallback-username
                                                                               maxlength=10> <input type="hidden"
                                                                                                    name="70125eaa4983341c663ef5f8297b9f5b"
                                                                                                    value="1"/> <input
                                        type=hidden name=module_id value=119/> <input type=hidden name=Itemid value=113>
                                    <input type=hidden name=simplecallback_page_title value=Контакты> <input type=hidden
                                                                                                             name=simplecallback_page_url
                                                                                                             value=https://vid.uz/lets-talk>
                                    <input type=hidden name=simplecallback_custom_data value="">
                                    <button type=submit onClick="yaCounter35958065.reachGoal('buy_button');"
                                            class="el-button uk-button uk-button-default"> Отправить
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="uk-margin-large uk-text-center"
                             uk-parallax="y: 0,110; opacity: 1,0; viewport: 0.9;"><a class=uk-icon-link
                                                                                     uk-icon="icon: arrow-down; ratio: 1.5;"
                                                                                     href=#location uk-scroll></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=location class=uk-section-default>
        <div data-src=/images/yootheme/lets-talk-location-texture.svg uk-img
             class="uk-background-norepeat uk-background-center-left uk-background-image@l uk-section uk-section-xlarge"
             uk-parallax="bgx: 150,150;bgy: -100,100">
            <div class=uk-container>
                <div class=uk-grid-margin uk-grid>
                    <div class="uk-width-1-2@m uk-width-1-1@s"><h1 class="uk-text-left@m uk-text-center"
                                                                   uk-parallax="opacity: 0,1; media: @m; viewport: 0.3;">
                            Адресс </h1></div>
                    <div class="uk-width-expand@m uk-width-1-2@s"><h2 class="uk-h3 uk-text-left@m uk-text-center"
                                                                      uk-parallax="y: 20,0; opacity: 0,1; viewport: 0.3;">
                            Оффис </h2>
                        <div class="uk-margin uk-text-left@m uk-text-center"
                             uk-parallax="y: 20,0; opacity: 0,1; viewport: 0.3;">Отель Узбекистан,<br> 45,
                            ул.Мусаханова, М.Улугбекский р-н, г. Ташкент, Узбекистан.
                        </div>
                        <div class="uk-h4 uk-margin-remove-vertical uk-text-left@m uk-text-center"
                             uk-parallax="y: 20,0; opacity: 0,1; viewport: 0.3;"><a class="el-link uk-link-reset"
                                                                                    href=tel:+998974248899>+998 97 424
                                8899</a></div>
                        <div class="uk-margin-remove-vertical uk-text-left@m uk-text-center"
                             uk-parallax="y: 20,0; opacity: 0,1; viewport: 0.3;"><a class=el-content
                                                                                    href=mailto:info@vid.uz> <span
                                    id=cloakb74a8b26f99b572f075477d1445faa52>Этот адрес электронной почты защищён от спам-ботов. У вас должен быть включен JavaScript для просмотра.</span>
                                <script
                                    src=/media/plg_jchoptimize/assets3/gz/0/f23dfad97965a02837b6c7d3599014f1.js></script>
                                <script>document.getElementById('cloakb74a8b26f99b572f075477d1445faa52').innerHTML = '';
                                    var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
                                    var path = 'hr' + 'ef' + '=';
                                    var addyb74a8b26f99b572f075477d1445faa52 = '&#105;nf&#111;' + '&#64;';
                                    addyb74a8b26f99b572f075477d1445faa52 = addyb74a8b26f99b572f075477d1445faa52 + 'v&#105;d' + '&#46;' + '&#117;z';
                                    var addy_textb74a8b26f99b572f075477d1445faa52 = '&#105;nf&#111;' + '&#64;' + 'v&#105;d' + '&#46;' + '&#117;z';
                                    document.getElementById('cloakb74a8b26f99b572f075477d1445faa52').innerHTML += '<a ' + path + '\'' + prefix + ':' + addyb74a8b26f99b572f075477d1445faa52 + '\'>' + addy_textb74a8b26f99b572f075477d1445faa52 + '<\/a>';</script>
                            </a></div>
                        <h3 class="uk-h6 uk-text-muted uk-margin-large uk-margin-remove-bottom uk-text-left@m uk-text-center"
                            uk-parallax="opacity: 0,1; viewport: 0.2;"> Follow us </h3>
                        <div class="uk-margin uk-text-left@m uk-text-center"
                             uk-parallax="y: 20,0; opacity: 0,1; viewport: 0.2;">
                            <div class="uk-child-width-auto uk-flex-left@m uk-flex-center" uk-grid>
                                <div><a class=el-link target=_blank
                                        href=https://www.facebook.com/VIDofficial/ uk-icon="icon: facebook;"></a> </div>
                                <div><a class=el-link target=_blank href=https://telegram.me/VIDofficial
                                        uk-icon="icon: social;"></a></div>
                                <div><a class=el-link target=_blank href=https://twitter.com/VIDadvert
                                        uk-icon="icon: twitter;"></a></div>
                                <div><a class=el-link target=_blank href=https://www.linkedin.com/company-beta/18050520
                                        uk-icon="icon: linkedin;"></a></div>
                                <div><a class=el-link target=_blank
                                        href=https://plus.google.com/communities/107091493812491428674
                                        uk-icon="icon: google-plus;"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-expand@m uk-width-1-2@s"></div>
                </div>
            </div>
        </div>
    </div>
    <div class=uk-section-muted>
        <div data-src=/templates/yootheme/cache/lets-talk-careers-bg-39bd77a7.webp
             data-srcset="/templates/yootheme/cache/lets-talk-careers-bg-39bd77a7.webp 640w, /templates/yootheme/cache/lets-talk-careers-bg-6c675e55.webp 768w, /templates/yootheme/cache/lets-talk-careers-bg-dbc24e16.webp 1024w, /templates/yootheme/cache/lets-talk-careers-bg-6d9bfb83.webp 1280w"
             data-sizes="(min-width: 640px) 640px" uk-img
             class="uk-background-norepeat uk-background-bottom-right uk-background-image@xl uk-background-fixed uk-section uk-section-xlarge">
            <div class=uk-container>
                <div class=uk-margin-large uk-grid>
                    <div class=uk-width-1-1@m><h1 class="uk-text-left@m uk-text-center"
                                                  uk-parallax="opacity: 0,1; viewport: 0.3;"> Мы ищем навыки<br/>а не
                            профессии. </h1></div>
                </div>
                <div class="uk-grid-large uk-margin-large" uk-grid>
                    <div class=uk-width-expand@m>
                        <div
                            class="uk-panel uk-margin-remove-first-child uk-margin uk-width-large@s uk-margin-auto uk-text-left@m uk-text-center"
                            uk-parallax="opacity: 0,1; viewport: 0.3;"><h3
                                class="el-title uk-margin-top uk-margin-remove-bottom"> Навыки копирайтинга </h3>
                            <div class="el-content uk-panel uk-margin-top">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Как
                                понимаете его у нас нет. Пиши.
                            </div>
                        </div>
                        <div class="uk-h6 uk-text-muted uk-width-large@s uk-margin-auto uk-text-left@s uk-text-center"
                             uk-parallax="opacity: 0,1; viewport: 0.2;"> Требования
                        </div>
                        <ul class="uk-list uk-list-bullet uk-width-large@s uk-margin-auto"
                            uk-parallax="opacity: 0,1; viewport: 0.3;">
                            <li class=el-item>
                                <div class="el-content uk-panel">Уверенные навыки копирайтинга</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Практические навыки</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Умение писать интересные и не сухие текста</div>
                            </li>
                        </ul>
                    </div>
                    <div class=uk-width-expand@m>
                        <div
                            class="uk-panel uk-margin-remove-first-child uk-margin uk-width-large@s uk-margin-auto uk-text-left@m uk-text-center"
                            uk-parallax="opacity: 0,1; viewport: 0.3;"><h3
                                class="el-title uk-margin-top uk-margin-remove-bottom"> Фото и видео </h3>
                            <div class="el-content uk-panel uk-margin-top">Вы знаете, как записывать, редактировать и
                                создавать аудио и видео? Снимать и редактировать фотографии или создавать обширные
                                анимации? Свяжитесь с нами.
                            </div>
                        </div>
                        <div class="uk-h6 uk-text-muted uk-width-large@s uk-margin-auto uk-text-left@s uk-text-center"
                             uk-parallax="opacity: 0,1; viewport: 0.2;"> Требования
                        </div>
                        <ul class="uk-list uk-list-bullet uk-width-large@s uk-margin-auto"
                            uk-parallax="opacity: 0,1; viewport: 0.3;">
                            <li class=el-item>
                                <div class="el-content uk-panel">Уверенные навыки редактирования мультимедиа</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Практический опыт</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Профессиональные знания в Photoshop/Illustrator и
                                    видеоредакторах.
                                </div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Создание 2D/3D визуальных эффектов и анимаций</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Желание развиваться творчески и проффесионально</div>
                            </li>
                        </ul>
                    </div>
                    <div class=uk-width-expand@m>
                        <div
                            class="uk-panel uk-margin-remove-first-child uk-margin uk-width-large@s uk-margin-auto uk-text-left@m uk-text-center"
                            uk-parallax="opacity: 0,1; viewport: 0.3;"><h3
                                class="el-title uk-margin-top uk-margin-remove-bottom"> Навыки программирования
                                PHP </h3>
                            <div class="el-content uk-panel uk-margin-top">Если компьютерный язык, который другие люди
                                считают космическим, является для вас повседневным, то присоединяйтесь к нашей команде
                                разработчиков.
                            </div>
                        </div>
                        <h4 class="uk-h6 uk-text-muted uk-width-large@s uk-margin-auto uk-text-left@s uk-text-center"
                            uk-parallax="opacity: 0,1; viewport: 0.2;"> Требования </h4>
                        <ul class="uk-list uk-list-bullet uk-width-large@s uk-margin-auto"
                            uk-parallax="opacity: 0,1; viewport: 0.3;">
                            <li class=el-item>
                                <div class="el-content uk-panel">Уверенные знания в программировании</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Практический опыт</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Профессиональные знания в PHP</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Знание фреймворков Yii2/Laravel</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Работа с Бекендом либо Фронтендом</div>
                            </li>
                            <li class=el-item>
                                <div class="el-content uk-panel">Готовность работать по системе SCRUM</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=uk-margin-large uk-grid>
                    <div class=uk-width-1-1@m>
                        <hr uk-parallax="y: 20,0; opacity: 0,1; viewport: 0.3;">
                    </div>
                </div>
                <div class="uk-grid-large uk-margin-large" uk-grid>
                    <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m">
                        <div class=uk-panel>
                            <div class="uk-text-large uk-margin uk-width-large@m uk-text-left@m uk-text-center"
                                 uk-parallax="y: 40,0; opacity: 0,1; viewport: 0.4;">Пришлите нам свое резюме и ваше
                                портфолио.
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m">
                        <div class=uk-panel>
                            <div class="uk-margin uk-text-right@m uk-text-center"
                                 uk-parallax="y: 40,0; opacity: 0,1; viewport: 0.4;">
                                <div
                                    class="uk-flex-middle uk-grid-small uk-child-width-auto uk-flex-right@m uk-flex-center"
                                    uk-grid>
                                    <div class=el-item><a class="el-content uk-button uk-button-secondary"
                                                          href=mailto:info@vid.uz>
                                            Подать заявку по почте
                                        </a></div>
                                    <div class=el-item><a class="el-content uk-button uk-button-default"
                                                          href=https://t.me/vovorus>
                                            Подать заявку в telegram
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
