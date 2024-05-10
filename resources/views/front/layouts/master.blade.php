<!DOCTYPE html>

<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />

    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>karz.club</title>

    <meta name="author" content="vecuro" />

    <meta
      name="description"
      content="Travolo -  Travel Agency & Tour Booking HTML Template"
    />

    <meta
      name="keywords"
      content="Travolo -  Travel Agency & Tour Booking HTML Template"
    />

    <meta name="robots" content="INDEX,FOLLOW" />

    <!-- Mobile Specific Metas -->

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Favicons - Place favicon.ico in the root directory -->

    <link rel="icon" type="image/png" href="{{asset('assets/img/favicons/favicon.png')}}" />

    <meta name="msapplication-TileColor" content="#ffffff" />

    <meta name="theme-color" content="#ffffff" />

    <!--==============================

      Google Fonts

  ============================== -->

    <link rel="preconnect" href="https://fonts.googleapis.com/" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @stack('css')
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>

    @include('front.layouts.mobile-menu')
    @include('front.layouts.popup-search')
    @include('front.layouts.header')
    @yield('content')
    @include('front.layouts.footer')
    @include('front.layouts.sidemenu')
    @include('front.layouts.cart-sidebar')
    <a href="#" class="scrollToTop scroll-btn">
      <i class="far fa-arrow-up"></i>
    </a>
    @include('front.layouts.js')
    @stack('js')
  </body>
</html>

