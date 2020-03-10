<!doctype html>
<html lang="ru">
<head>
    <meta name="theme-color" content="#5933F2">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('meta')


    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/16x16" >
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">

    @yield('css')
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <!-- END Icons -->
    <title>
        @yield('title') | vid.uz
    </title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let menuItems = document.querySelectorAll('.menu-item-li');
            menuItems.forEach(function (item) {
                item.addEventListener('click', function (event) {
                    if (!event.target.classList.contains('menu-item-link-arrow')
                        && !event.target.classList.contains('menu-item-link-arrow-image')) {
                        event.stopPropagation();
                    }
                }, true);
            });
        })
    </script>
    <script src="{{ asset('assets/js/uikit.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138129426-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138129426-3');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(60708610, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/60708610" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    @yield('header')

    @include('site.layouts.partials.mobile_menu')

    @yield('content')

    @include('site.layouts.partials.footer')

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
</body>
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Store",
      "image": [
        "https://lh3.googleusercontent.com/proxy/RomJGetxyExSuPoNnZJKatWVJtl5XU3OFfcnpg57HN12QIQ9yG6uoK4gDm74Cu6OK088oxzsi_ls_IExxfZ5spEj5TZwR9oILWSPkR00SA9UF8GnntVLiLf-VWb5FSI2PdlfJg"
       ],
      "@id": "vid.uz",
      "name": "Каталог фриланс исполнителей и компаний для продвижения бизнеса",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Yunusobod 13",
        "addressLocality": "Tashkent",
        "addressRegion": "UZ",
        "postalCode": "100114",
        "addressCountry": "UZ"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Murad Ikramhodjaev"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 41.2825125,
        "longitude": 69.1392828
      },
      "url": "https://www.vid.uz",
      "telephone": "+998909408196",
      "priceRange": "$$$",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday"
          ],
          "opens": "9:00",
          "closes": "22:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Wednesday",
            "Thursday",
            "Friday"
          ],
          "opens": "9:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "9:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Sunday",
          "opens": "9:00",
          "closes": "22:00"
        }
      ]

    }
    </script>
</html>
