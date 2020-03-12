<!DOCTYPE html>
<html lang=ru-ru dir=ltr vocab=http://schema.org/>
<head>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=/images/yootheme/favicon.ico>
    <link rel=apple-touch-icon-precomposed
          href=/templates/yootheme/vendor/yootheme/theme/platforms/joomla/assets/images/apple-touch-icon.png>
    <meta charset=utf-8/>
    <meta name=author content="Super User"/>
    <meta name=robots content="index, follow"/>
    <meta name=generator content="Joomla! - Open Source Content Management"/>
    <title>@yield('title')</title>
    <link rel=stylesheet href=/media/plg_jchoptimize/assets3/gz/0/17f0ff7938435c0d271523f589baa3e5.css>
    <script type=application/json class="joomla-script-options new">
        {"csrf.token":"ed3313db60fa2b01f2f3d974c9d08645","system.paths":{"root":"","base":""},"joomla.jtext":{"JLIB_FORM_FIELD_INVALID":"\u041d\u0435\u043a\u043e\u0440\u0440\u0435\u043a\u0442\u043d\u043e \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u043e \u043f\u043e\u043b\u0435:&#160;"}}
    </script>
    <script type=application/ld+json>
        {"@context":"https://schema.org","@type":"WebSite","url":"https://vid.uz","potentialAction":{"@type":"SearchAction","target":"https://vid.uz/index.php?option=com_search&searchphrase=all&searchword={search_term}","query-input":"required name=search_term"}}
    </script>
    <script type=application/ld+json>
        {"@context":"https://schema.org","@type":"Organization","url":"https://vid.uz","logo":"https://vid.uz/http://localhost:8888/vision/images/yootheme/logo.svg"}
    </script>
    <script type=application/ld+json>
        {"@context":"https://schema.org","@type":"Organization","name":"Биржа фриланса Узбекистана","url":"https://vid.uz","sameAs":["https://www.facebook.com/VIDadwert","https://twitter.com/VIDadwert","https://plus.google.com/communities/107091493812491428674","https://www.linkedin.com/company-beta/18050520","https://telegram.me/VIDadwert"]}
    </script>
    <script type=application/ld+json>
        {"@context":"https://schema.org","@type":"LocalBusiness","@id":"https://vid.uz","name":"Креативная студия Vision","image":"https://vid.uz/http://localhost:8888/vision/images/yootheme/logo.svg","url":"https://vid.uz","telephone":"+998 90 940 8196","priceRange":0,"address":{"@type":"PostalAddress","streetAddress":"ул.Мусаханова, М.Улугбекский р-н","addressLocality":"Ташкент","addressRegion":"Ташкентская","postalCode":100135,"addressCountry":"UZ"},"geo":{"@type":"GeoCoordinates","latitude":41.30091680000000309291863231919705867767333984375,"longitude":69.250277800000048955553211271762847900390625},"openingHoursSpecification":{"@type":"OpeningHoursSpecification","dayOfWeek":["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],"opens":"00:00","closes":"23:59"}}
    </script>

    <style>
        .menu-item-link-arrow {
            width: 100%;
            height: 14px;
            margin-top: 7px;
        }
        .menu-item-link-arrow > div {
            width: 14px;
            height: 14px;
            float: right;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2214%22%20height%3D%2214%22%20viewBox%3D%220%200%2014%2014%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolyline%20fill%3D%22none%22%20stroke%3D%22%23444%22%20stroke-width%3D%221.1%22%20points%3D%2210%201%204%207%2010%2013%22%20%2F%3E%0A%3C%2Fsvg%3E");
            background-repeat: no-repeat;
        }

        .menu-item-link-arrow-rotate {
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(90deg);
            transform: rotate(-90deg);
            -webkit-transform-origin: center center;
            -moz-transform-origin: center center;
            -ms-transform-origin: center center;
            -o-transform-origin: center center;
            transform-origin: center center;
        }
        .uk-nav-primary>li>a {
            font-size: 18px;
        }

        .uk-nav-parent-icon>.uk-parent>a::after {
            width: 1.5em;
            height: 1.5em;
        }

        ul.uk-nav li ul li.uk-parent a {
            font-size: 18px;
        }

        .uk-nav-sub li a {
            font-size: 18px;
        }
    </style>

</head>
<body class="">
<div class=tm-page>
    @include('studio.layouts.partials.header')
    @yield('content')
    @include('studio.layouts.partials.footer')
</div>
<noscript>
    <div><img src=//mc.yandex.ru/watch/35958065 style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let menuItemArrows = document.querySelectorAll('.menu-item-link-arrow');
        menuItemArrows.forEach(function (arrow) {
            arrow.addEventListener('click', function () {
                console.log(this);
                this.children[0].classList.toggle('menu-item-link-arrow-rotate');
                let dropdown = this.parentNode.nextElementSibling;
                dropdown.parentNode.classList.toggle('uk-open');
                if (dropdown.hasAttribute('hidden')) {
                    dropdown.removeAttribute('hidden');
                }
                else {
                    dropdown.setAttribute('hidden', 'hidden');
                }
            })
        });
        let needItems = document.querySelectorAll('.need-item');
        needItems.forEach(function (item) {
            item.addEventListener('click', function (event) {
                if (!event.target.classList.contains('menu-item-link-arrow')) {
                    menuItemArrows.forEach(function (arrow) {
                        arrow.classList.remove('menu-item-link-arrow-rotate');
                    });
                }
            })
        })
    })
</script>
<script src=/media/plg_jchoptimize/assets3/gz/0/eae221daa5c8a63b73ed741191cae68c.js async></script>
</body>
</html>
