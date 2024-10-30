<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8" />
    <title>3. Gewiss Gála — Gewiss Guard Training</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
</head>

<body>
    <div id="page">
        <!-- Page Loader -->
        <div id="pageloader">
            <div class="loader-item fa fa-spin text-color"></div>
        </div>
        <div id="top-bar" style="padding: 5px;" class="top-bar-section top-bar-bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Top Contact -->
                        <div class="top-contact link-hover-black">
                            <a href="tel:+36707038827">
                                <i class="fa fa-phone"></i>+36707038827</a>
                            <a href="mailto:info@gewisstraining.hu">
                                <i class="fa fa-envelope"></i>info@gewisstraining.hu</a>
                        </div>
                        <!-- Top Social Icon -->
                        <div class="top-social-icon icons-hover-black">
                            <a href="https://www.facebook.com/events/1167096604469930">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.facebook.com/events/1167096604469930">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/@Z75Production">
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
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target=".navbar-collapse">
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
                                            <li>
                                                <a href="https://sportstream.hu/?page_id=806"
                                                    target="_blank">Streaming</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/#pricing') }}">Jegyek</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/#sponsors') }}">Támogatók</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/fighters') }}">Versenyzők</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/fight_cards') }}">Fight Card</a>
                                            </li>
                                            <li class="mega-menu">
                                                <a href="{{ url('/gewisstraining') }}">Gewiss Training SE</a>
                                            </li>
                                            <li>
                                                <a href="https://gewissguard.com/hu/kezdolap" target="_blank">Gewiss
                                                    GUARD</a>
                                            </li>
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