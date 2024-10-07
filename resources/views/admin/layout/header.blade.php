<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ isset($title) ? ucwords(str_replace('.', ' - ', $title)) : 'Gini' }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icon-dukamarket.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>

    <header>
       
        <div id="header-sticky" class="header__main-area d-none d-xl-block">
            <div class="container">
                <div class="header__for-megamenu p-relative">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <div class="header__logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/gini.svg') }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="header__menu main-menu text-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="{{ route('admindashboard') }}">Home</a></li>
                                        <li><a href="{{ route('pendingsellers') }}">Pending Sellers</a></li>
                                        <li><a href="{{ route('verifiedsellers') }}">Approved Seller</a></li>
                                        <li><a href="{{ route('categories') }}">Categories</a></li>
                                       

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>


        
        <div class="body-overlay"></div>

        <div class="tpsideinfo">
            <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
            <div class="tpsideinfo__search text-center pt-35">
   
            </div>
            
            <div class="tpsideinfo__nabtab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Menu</button>
                    </li>
                
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="mobile-menu"></div>
                    </div>
                   
                </div>
            </div>
      
        </div>
        <!-- sidebar-menu-area-end -->
    </header>
    <!-- header-area-end -->
