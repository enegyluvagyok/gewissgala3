<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8" />
    <title>Gewiss Training SE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Gewiss Gála" />
    <meta name="author" content="Seres Zoltán" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css' />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/hover-dropdown-menu.css') }}" rel="stylesheet" />
    <!-- Icomoon Icons -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
    <!-- Revolution Slider -->
    <link href="{{ asset('css/revolution-slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('rs-plugin/css/settings.css') }}" rel="stylesheet" />
    <!-- Animations -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/owl/owl.carousel.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/owl/owl.theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/owl/owl.transitions.css') }}" rel="stylesheet" />
    <!-- PrettyPhoto Popup -->
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" />
    <!-- Custom Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    <!-- Color Scheme -->
    <link href="{{ asset('css/color.css') }}" rel="stylesheet" />
    <style>
        .video-placeholder {
            position: relative;
            width: 560px;
            height: 315px;
            background: url('https://img.youtube.com/vi/YOUR_VIDEO_ID/0.jpg') center center no-repeat;
            background-size: cover;
            cursor: pointer;
        }

        .container {
            max-width: 100% !important;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            position: relative;
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: #000;
            cursor: pointer;
        }

    </style>
    <style>
        /* Paletta: #000, #e7e7e7, #c0974a, #0f1a1f */
        /* külső térköz */
        #schedule {
            padding: 60px 0;
        }

        /* swiper konténer */
        .schedule-board.swiper {
            width: 100%;
            padding: 10px 0 30px;
        }

        /* egy nap kártyája */
        .schedule-day {
            background: radial-gradient(1200px 400px at 20% -10%, rgba(192, 151, 74, .08), transparent),
                linear-gradient(180deg, #101a1f, #0d161a);
            border: 2px solid rgba(192, 151, 74, .8);
            border-radius: 14px;
            padding: 16px;
            min-height: 320px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .35);
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .swiper-slide:hover .schedule-day {
            transform: translateY(-4px);
            border-color: #d8b55d;
            box-shadow: 0 16px 34px rgba(0, 0, 0, .45), 0 0 0 4px rgba(192, 151, 74, .08) inset;
        }

        /* fejléc “badge” */
        .schedule-header {
            align-self: center;
            padding: 10px 18px;
            background: #151f25;
            border: 2px solid rgba(192, 151, 74, .9);
            border-radius: 10px;
            color: #c0974a;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
            box-shadow: 0 2px 0 rgba(192, 151, 74, .25) inset;
        }

        /* órablokkok */
        .schedule-cell {
            background: rgba(12, 18, 22, .75);
            border: 1px solid rgba(192, 151, 74, .35);
            border-radius: 10px;
            padding: 12px;
            min-height: 74px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .schedule-cell+.schedule-cell {
            margin-top: 10px;
        }

        /* vékony díszvonal a tetején */
        .schedule-cell:before {
            content: "";
            position: absolute;
            left: 10px;
            right: 10px;
            top: 6px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(192, 151, 74, .5), transparent);
        }

        /* idő és címkék */
        .schedule-cell .time {
            font-size: .88rem;
            color: #e7e7e7;
            opacity: .9;
            margin-bottom: 4px;
        }

        .schedule-cell .label {
            font-weight: 700;
            color: #e7e7e7;
            letter-spacing: .02em;
        }

        .schedule-cell .label small {
            display: block;
            margin-top: 2px;
            opacity: .85;
        }

        /* swiper navigáció */
        .schedule-section .swiper-button-prev,
        .schedule-section .swiper-button-next {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: 2px solid #c0974a;
            background: #0f1a1f;
            color: #e7e7e7;
            box-shadow: 0 6px 16px rgba(0, 0, 0, .35);
        }

        .schedule-section .swiper-button-prev:after,
        .schedule-section .swiper-button-next:after {
            font-size: 16px;
            font-weight: 900;
        }

        .schedule-section .swiper-button-prev:hover,
        .schedule-section .swiper-button-next:hover {
            filter: brightness(1.06);
            border-color: #d8b55d;
        }

        /* swiper pagination (pöttyök) */
        .schedule-section .swiper-pagination-bullet {
            background: rgba(192, 151, 74, .45);
            opacity: 1;
            width: 10px;
            height: 10px;
        }

        .swiper-pagination {
            position: static !important;
        }

        .schedule-section .swiper-pagination-bullet-active {
            background: #c0974a;
            box-shadow: 0 0 0 3px rgba(192, 151, 74, .25);
        }

        /* reszponzív finomhangolás */
        @media (max-width: 991px) {
            .schedule-day {
                min-height: 300px;
            }
        }

        @media (max-width: 768px) {
            .schedule-day {
                padding: 14px;
            }

            .schedule-header {
                font-size: 1rem;
                padding: 8px 14px;
            }

            .schedule-cell {
                padding: 10px;
                min-height: 68px;
            }

            .schedule-cell .time {
                font-size: .85rem;
            }

            .schedule-cell .label {
                font-size: .9rem;
            }
        }


        .lang-switch {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 18px 0 8px;
        }

        .lang-btn {
            background: #0f1a1f;
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 6px;
            line-height: 0;
            cursor: pointer;
            transition: border-color .2s, transform .1s;
        }

        .lang-btn:hover {
            transform: translateY(-1px);
        }

        .lang-btn.active {
            border-color: #c0974a;
        }

        .lang-btn img {
            display: block;
            border-radius: 4px;
        }

        /* Paletta: #000, #e7e7e7, #c0974a, #0f1a1f */
        .contact-section {
            color: #e7e7e7;
        }

        .contact-section .title {
            color: #e7e7e7;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .contact-card {
            background: #0f1a1f;
            border: 2px solid #c0974a;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 5px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .25);
        }

        .contact-card i {
            width: 20px;
            text-align: center;
            margin-right: 8px;
            color: #c0974a;
        }

        .contact-card a {
            color: #e7e7e7;
            text-decoration: none;
            border-bottom: 1px dashed transparent;
        }

        .contact-card a:hover {
            border-bottom-color: #c0974a;
            color: #e7e7e7;
        }

        .map-wrap {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 300px;
            border: 2px solid #c0974a;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .25);
        }

        .map-wrap iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        /* popup alapok */
        .popup {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
        }

        .popup.is-open {
            display: block;
        }

        .popup__overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .7);
        }

        .popup__box {
            position: relative;
            z-index: 1;
            max-width: min(92vw, 640px);
            margin: 8vh auto 0;
            background: #0f1a1f;
            color: #e7e7e7;
            border: 2px solid #c0974a;
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .35);
            transform: translateY(10px);
            opacity: 0;
            transition: all .18s ease;
        }

        .popup.is-open .popup__box {
            transform: translateY(0);
            opacity: 1;
        }

        .popup__title {
            margin: 0 0 8px;
            color: #c0974a;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .popup__close {
            position: absolute;
            top: 8px;
            right: 10px;
            border: 2px solid #c0974a;
            background: #0f1a1f;
            color: #e7e7e7;
            border-radius: 8px;
            width: 34px;
            height: 34px;
            line-height: 30px;
            text-align: center;
            cursor: pointer;
        }

        .popup__close:hover {
            filter: brightness(1.1);
        }

        /* gombok (ha kell) */
        .btn-gold {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 8px;
            border: 2px solid #c0974a;
            background: #c0974a;
            color: #0f1a1f;
            font-weight: 700;
            text-decoration: none;
        }

        .btn-gold:hover,
        .btn-gold:visited {
            background: #d3aa55;
            color: #0f1a1f;
        }

    </style>

    <style>
        /* Desktop stílus */
        #hero-desktop,
        #hero-mobile {
            padding: 20px;
            color: #e7e7e7;
            text-align: left;
            /* BALRA húzás */
        }

        #hero-desktop h1 span,
        #hero-mobile h1 span {
            color: #c0974a;
            border-radius: 6px;
            font-size: 4rem;
            line-height: 1;
        }

        #hero-desktop h2,
        #hero-mobile h2 {
            font-size: 2.3rem;
            font-weight: 600;
            margin: 0px;
        }

        #hero-desktop b,
        #hero-mobile b {
            font-size: 1.5rem;
            font-weight: 400;
            margin-top: 5px;
            color: #e7e7e7;
            letter-spacing: .02em;
            display: block;
        }

        /* mobilon kisebb betűk + mottó tördelés */
        @media (max-width: 576px) {
            #hero-mobile h1 span {
                font-size: 1.4rem;
            }

            #hero-mobile h2 {
                font-size: 1.1rem;
                margin: 0px 0;
            }

            #hero-mobile b {
                font-size: .85rem;
                line-height: 1.4;
            }

            .navbar-collapse {
                min-height: 550px !important;
            }
        }

        /* alapértelmezetten a mobil verzió látszik */
        #hero-desktop {
            display: none;
        }

        #hero-mobile {
            display: block;
        }

        /* >=768px: csak a desktop verzió látszik */
        @media (min-width: 768px) {
            #hero-desktop {
                display: block;
            }

            #hero-mobile {
                display: none;
            }
        }

    </style>
</head>

<body>
    <div id="page">
        <!-- Page Loader -->
        <div id="pageloader">
            <div class="loader-item fa fa-spin text-color"></div>
        </div>
        <div id="top-bar" style="padding: 0px;" class="top-bar-section top-bar-bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Top Contact -->
                        <div class="top-contact link-hover-black">
                            <a href="tel:+36707038827">
                                <i class="fa fa-phone"></i>+36707038827</a>
                            <a href="mailto:gewisstraining2017@gmail.com">
                                <i class="fa fa-envelope"></i>gewisstraining2017@gmail.com</a>
                        </div>
                        <!-- Top Social Icon -->
                        <div class="top-social-icon icons-hover-black">
                            <a href="https://www.facebook.com/profile.php?id=61566811710352">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/gewisstraining/">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/watch?v=it-LhvjU1xA">
                                <i class="fa fa-youtube"></i>
                            </a>
                            <a href="https://gewissguard.com/">
                                <i class="fa fa-globe"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- transparent header -->
        <div class="header">
            <!-- Sticky Navbar -->
            <header id="sticker" class="sticky-navigation fixed-header dark-header">
                <!-- Sticky Menu -->
                <div class="sticky-menu relative">
                    <!-- navbar -->
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="navbar-header">
                                        <!-- Button For Responsive toggle -->
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span></button>
                                        <!-- Logo -->

                                        <a class="navbar-brand" href="{{url('/')}}">
                                            <img class="site_logo" alt="Site Logo" src="{{ asset('img/logo.png') }}" />
                                        </a>
                                    </div>
                                    <!-- Navbar Collapse -->
                                    <div class="navbar-collapse collapse">
                                        <!-- nav -->
                                        <ul class="nav navbar-nav">
                                            <li class="mega-menu">
                                                <a href="{{ url('/#about') }}">Rólunk</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/#schedule') }}">Órarend</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/gallery') }}">Galéria</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/gala') }}">Gewiss Gála</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/team') }}">Csapatunk</a>
                                            </li>
                                            <li>
                                                <a href="https://gewissguard.com/hu/kezdolap" target="_blank">Gewiss
                                                    GUARD</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url(path: '/media') }}">Médiamegjelenések</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/donate') }}">Támogass minket!</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/#contact') }}">Kapcsolat</a>

                                        </ul>
                                        <!-- Right nav -->
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- navbar -->
                </div>
                <!-- Sticky Menu -->
            </header>
            <!-- Sticky Navbar -->
        </div>

        <div id="popup-basic" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-basic-title">
            <div class="popup__overlay js-close-popup" aria-hidden="true"></div>
            <div class="popup__box" role="document">
                <button class="popup__close js-close-popup" aria-label="Bezárás">&times;</button>
                <h3 id="popup-basic-title" class="popup__title">Szponzoráció</h3>
                <div class="popup__content">
                    <p>Írj nekünk: <a href="mailto:info@gewisstraining.hu">info@gewisstraining.hu</a></p>
                    <p>Telefon: <a href="tel:+36301234567">+36 30 123 4567</a></p>
                    <p>Letölthető csomag: <a href="{{ asset('docs/szponzor-csomag.pdf') }}" target="_blank">PDF</a></p>
                </div>
            </div>
        </div>

        <section class="slider" id="home">
            <div id="main-slider" class="carousel">
                <div id="carousel-example-generic1" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            @if(str_contains(request()->path(), 'gala'))
                            <img src="img/sections/bg/background3.jpg" alt="" title="" width="100%" height="100%" />
                            @else
                            <img src="img/sections/bg/background2.jpg" alt="" title="" width="100%" height="100%" />
                            @endif
                            <div class="carousel-caption top-30 text-left">
                                <div class="row">
                                    <div id="hero-desktop" class="col-md-6 col-sm-6">
                                        <h1 class="upper animation animated-item-1">
                                            <span>Gewiss Training SE</span>
                                        </h1>
                                        <h2 class="upper animation animated-item-2">
                                            Muay thai &amp; Boxing -
                                            <a href="https://www.instagram.com/gewisstraining/">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                            <a href="https://www.facebook.com/profile.php?id=61566811710352">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </h2>
                                        <b>Founded by Sandor Zilai. Elevating fighters, shaping champions</b>
                                    </div>

                                    <!-- MOBILE -->
                                    <div id="hero-mobile" class="col-12">
                                        <h1 class="upper animation animated-item-1">
                                            <span>Gewiss Training SE</span>
                                        </h1>
                                        <h2 class="upper animation animated-item-2">
                                            Muay thai &amp; Boxing - 
                                            <a href="https://www.instagram.com/gewisstraining/">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                            <a href="https://www.facebook.com/profile.php?id=61566811710352">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </h2>
                                        <b>Founded by Sandor Zilai.<br>Elevating fighters, <br> shaping champions</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
