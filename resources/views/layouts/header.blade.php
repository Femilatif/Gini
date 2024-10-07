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
                                        <li><a href="/">Home</a></li>
                                        <li><a href="{{ route('international') }}">Internation Market</a></li>
                                        <li><a href="{{ route('products') }}">Local Market</a></li>
                                        @if (Auth::user())
                                          <li><a href="{{ route('profile') }}">Profile</a></li>
                                          <li>  <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class=" fw-semibold"></i>Logout</button>
                                        </form></li>
                                        @else
                                            <li><a href="/register">Register</a></li>
                                            <li><a href="/login">Login</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="header__info d-flex align-items-center">
                           
                                <div class="header__info-user tpcolor__yellow ml-10">
                                    <a href="{{ Auth::user() == null ? route('login') : route('account') }}"><i
                                            class="icon-user"></i></a>
                                </div>

                                <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                                    <button><i><img src=" {{ asset('assets/img/icon/cart-1.svg') }}"
                                                alt=""></i>
                                        <span>
                                            {{ \App\Models\Cart::where('user_id', Auth::id())->where('status', 'Pending')->count() }}
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="search-body-overlay"></div>
        <!-- header-search-end -->

        <!-- header-cart-start -->
        <div class="tpcartinfo tp-cart-info-area p-relative">
            <button class="tpcart__close"><i class="icon-x"></i></button>
            <div class="tpcart">
                <h4 class="tpcart__title">Your Cart</h4>
                <div class="tpcart__product">
                    <div class="tpcart__product-list">
                        <ul>
                            @php
                                $carts = \App\Models\Cart::where('user_id', Auth::id())
                                    ->where('status', 'Pending')
                                    ->with('product')
                                    ->get();
                                $total = 0;
                            @endphp
                            @if ($carts->isEmpty())
                                @if (Auth::id() == null)
                                    <p class="text-center">Kindly login to add item into cart</p>
                                    <a href="{{ route('login') }}" class="btn btn-success my-2  w-100">Login</a>
                                @else
                                    <h3 class="text-danger text-center p-5">Cart is empty</h3>
                                @endif
                            @else
                                @foreach ($carts as $cart)
                                    @php
                                        $total += $cart->product->price * $cart->qty;
                                    @endphp
                                    <li>
                                        <div class="tpcart__item">
                                            <div class="tpcart__img">
                                                <img src="{{ $cart->product->img }}" alt="">

                                                <div class="tpcart__del">
                                                    <a href="#"><i class="icon-x-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="tpcart__content">
                                                <span class="tpcart__content-title"><a
                                                        href="{{ route('product', $cart->product->id) }}">{{ $cart->product->name }}</a>
                                                </span>
                                                <div class="tpcart__cart-price">
                                                    <span class="quantity">{{ $cart->qty }} x</span>
                                                    <span class="new-price">{{ $cart->product->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    @if (!$carts->isEmpty())
                        <div class="tpcart__checkout">
                            <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                                <span> Subtotal:</span>
                                <span class="heilight-price"> ₦ {{ $total }}</span>
                            </div>
                            <div class="tpcart__checkout-btn">
                                <a class="btn btn-outline-danger rounded-5 w-100 mb-10" href="{{ route('cart') }}">View Cart</a>
                                <a class="btn-danger btn w-100 rounded-5" href="{{ route('checkout') }}">Checkout</a>
                            </div>
                        </div>
                    @endif
                </div>
                @if (!$carts->isEmpty())
                    <div class="bg-danger py-3 text-white text-center">
                        <span>Free shipping for orders <b>within 5km</b></span>
                    </div>
                @endif
            </div>
        </div>
        <div class="cartbody-overlay"></div>
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
                            <div class="header__info-search tpcolor__purple ml-10 d-none d-sm-block">
                                <button class="tp-search-toggle"><i class="icon-search"></i></button>
                            </div>
                            <div class="header__info-user tpcolor__yellow ml-10 d-none d-sm-block">
                                <a href="#"><i class="icon-user"></i></a>
                            </div>
                            <div class="header__info-wishlist tpcolor__greenish ml-10 d-none d-sm-block">
                                <a href="#"><i class="icon-heart icons"></i></a>
                            </div>
                            <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                                <button><i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                                    <span>

                                        {{ \App\Models\Cart::where('user_id', Auth::id())->where('status', 'Pending')->count() }}

                                    </span>
                                </button>
                            </div>
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
                <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span>
                <form action="#">
                    <input type="text" placeholder="Search Products...">
                    <button><i class="icon-search"></i></button>
                </form>
            </div>
            <div class="tpsideinfo__nabtab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Menu</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Categories</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="mobile-menu"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="tpsidebar-categories">
                            <ul>
                                <li><a href="shop-details.html">Dairy Farm</a></li>
                                <li><a href="shop-details.html">Healthy Foods</a></li>
                                <li><a href="shop-details.html">Lifestyle</a></li>
                                <li><a href="shop-details.html">Organics</a></li>
                                <li><a href="shop-details.html">Photography</a></li>
                                <li><a href="shop-details.html">Shopping</a></li>
                                <li><a href="shop-details.html">Tips & Tricks</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tpsideinfo__account-link">
                <a href="log-in.html"><i class="icon-user icons"></i> Login / Register</a>
            </div>
            <div class="tpsideinfo__wishlist-link">
                <a href="wishlist.html" target="_parent"><i class="icon-heart"></i> Wishlist</a>
            </div>
        </div>
        <!-- sidebar-menu-area-end -->
    </header>
    <!-- header-area-end -->
