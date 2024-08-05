<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Ekka - Ecommerce HTML Template + Admin Dashboard.</title>
    <meta name="keywords"
          content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="/shop/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="/shop/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="/shop/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="/shop/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="/shop/css/plugins/animate.css" />
    <link rel="stylesheet" href="/shop/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/shop/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="/shop/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="/shop/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="/shop/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="/shop/css/demo1.css" />
    <link rel="stylesheet" href="/shop/css/style.css" />
    <link rel="stylesheet" href="/shop/css/responsive.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="/shop/css/backgrounds/bg-4.css">
</head>

<body>
<!-- Header start  -->
@include('shop.layouts.header.header')
<!-- Header End  -->

@yield('contents')


<!-- Vendor JS -->
<script src="/shop/js/vendor/jquery-3.5.1.min.js"></script>
<script src="/shop/js/vendor/popper.min.js"></script>
<script src="/shop/js/vendor/bootstrap.min.js"></script>
<script src="/shop/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="/shop/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="/shop/js/plugins/swiper-bundle.min.js"></script>
<script src="/shop/js/plugins/countdownTimer.min.js"></script>
<script src="/shop/js/plugins/scrollup.js"></script>
<script src="/shop/js/plugins/jquery.zoom.min.js"></script>
<script src="/shop/js/plugins/slick.min.js"></script>
<script src="/shop/js/plugins/infiniteslidev2.js"></script>
<script src="/shop/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="/shop/js/plugins/jquery.sticky-sidebar.js"></script>
<!-- Google translate Js -->
<script src="/shop/js/vendor/google-translate.js"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<!-- Main Js -->
<script src="/shop/js/vendor/index.js"></script>
<script src="/shop/js/main.js"></script>
</body>

</html>
