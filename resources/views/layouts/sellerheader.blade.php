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
    <!-- Scroll-top-end-->

    <!-- header-area-start -->
    <header>
        {{-- <div class="header__top theme-bg-1 d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="header__top-left">
                            <span>Free <strong>Delivery</strong> for purchases about 100,000</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="header__top-right d-flex align-items-center">
                            <div class="header__top-link">
                                <a href="#">Store Location</a>
                                <a href="#">Order Tracking</a>
                                <a href="faq.html">FAQs</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
                                        <li><a href="{{ route('myshop') }}">Home</a></li>
                                        <li><a href="{{ route('newproduct') }}">Add Product</a></li>
                                        <li><a href="{{ route('sellerorders') }}">Pending Orders</a></li>
                                        <li><a href="{{ route('completedorders') }}">Completed Orders</a></li>
                                        <li><a href="{{ route('allproducts') }}">My products</a></li>
                                       



                                        {{-- <li><a href="about.html">About Us</a></li>
                                 <li><a href="contact.html">Contact Us</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="header__info d-flex align-items-center">
                               
                                <div class="header__info-user tpcolor__yellow ml-10">
                                    <a href="{{ Auth::guard('sellers') == null ? route('login') : route('selleraccount') }}"><i
                                            class="icon-user"></i></a>
                                </div>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header-search -->
       

       


        <!-- header-cart-end -->

        <!-- mobile-menu-area -->
        <div id="header-sticky-2" class="tpmobile-menu secondary-mobile-menu d-xl-none">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-3 col-sm-3">
                        <div class="mobile-menu-icon">
                            <button class="tp-menu-toggle"><i class="icon-menu1"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                        <div class="header__logo text-center">
                            <a href="/"><img src=" {{ asset('assets/img/logo/logo.png') }}"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-3 col-sm-5">
                        <div class="header__info d-flex align-items-center">
                            
                         
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body-overlay"></div>
        <!-- mobile-menu-area-end -->

        <!-- sidebar-menu-area -->
        <div class="tpsideinfo">
            <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
            <div class="tpsideinfo__search text-center pt-35">
                {{-- <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span> --}}
                {{-- <form action="#">
                    <input type="text" placeholder="Search Products...">
                    <button><i class="icon-search"></i></button>
                </form> --}}
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
