<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic page needs ============================================ -->
    <title>TopDeal</title>
    <meta charset="utf-8">
    <meta name="keywords"
        content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description"
        content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile specific metas ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon ============================================ -->
    <link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png" />

    <!-- Libs CSS ============================================ -->
    <link href="{{ asset('public') }}/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/lib.css" rel="stylesheet">
    <link href="{{ asset('public') }}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/js/minicolors/miniColors.css" rel="stylesheet">
    <link href="{{ asset('public') }}/js/slick-slider/slick.css" rel="stylesheet">

    <!-- Theme CSS ============================================ -->
    <link href="{{ asset('public') }}/css/themecss/so_sociallogin.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/so-categories.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/so-category-slider.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/footer/footer3.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/header/header6.css" rel="stylesheet">
    
    {{--  <link id="color_scheme" href="{{ asset('public') }}/css/theme.css" rel="stylesheet">  --}}
    <link id="color_scheme" href="{{ asset('public') }}/css/home6.css" rel="stylesheet">

    <link href="{{ asset('public') }}/css/responsive.css" rel="stylesheet">
    <link href="{{ asset('public') }}/css/quickview/quickview.css" rel="stylesheet">

    {{--  <link rel="stylesheet" href="{{ asset('public') }}/theme.css"> --}}

    <!-- Google web fonts ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body {
            font-family: Roboto, sans-serif;
        }

    </style>

</head>

<body class="common-home ltr layout-6">
    <div id="application">
        <div id="wrapper" class="wrapper-full banners-effect-7">
            <!-- Header Container  -->
            <header-component></header-component>
            <!-- // Header Container  -->

            <!-- Main Container  -->
            <router-view></router-view>
            <!-- // Main Container -->

            <!-- Footer Container -->
            <footer-component></footer-component>
            <!-- // Footer Container -->
        </div>
        <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
        <!-- //end Footer Container -->
    </div>

    {{--  Vue Public.js  --}}
    <script type="text/javascript" src="{{ asset('public') }}/js/public.js"></script>

    <!-- End Color Scheme ============================================ -->
    <!-- Include Libs & Plugins ============================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{ asset('public') }}/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/themejs/so_megamenu.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/slick-slider/slick.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/themejs/libs.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/unveil/jquery.unveil.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('public') }}/js/datetimepicker/moment.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/datetimepicker/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('public') }}/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/modernizr/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/minicolors/jquery.miniColors.min.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/jquery.nav.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/quickview/jquery.magnific-popup.min.js"></script>
    <!-- Theme files ============================================ -->
    <script type="text/javascript" src="{{ asset('public') }}/js/themejs/application.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/themejs/homepage.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/themejs/custom_h3.js"></script>
    <script type="text/javascript" src="{{ asset('public') }}/js/themejs/addtocart.js"></script>
    
</body>

</html>