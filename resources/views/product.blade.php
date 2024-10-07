@extends('layouts.app')
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active"><a
                                        href="{{ route('category', $product->category->id) }}">{{ $product->category->name }}</a></span>
                                <span class="dvdr">/</span>
                                <span>{{ $product->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area-start -->
        <section class="shopdetails-area grey-bg pb-50">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                        <div class="tpdetails__area mr-60 pb-30">
                            <div class="tpdetails__product mb-30">
                                <div class="tpdetails__title-box">
                                    <h3 class="tpdetails__title">{{ $product->name }}</h3>
                                    <ul class="tpdetails__brand">
                                        <li> Shop: <a href=" {{ route('shop', $product->seller->id) }}">
                                            <span class="text-danger">  {{ $product->seller->shop_name }} </span>
                                            </a> </li>
                                        <li> Country: {{ $product->seller->country }}</li>
                                        <li> Shop Address: <a href=" {{ route('shop', $product->seller->id) }}">
                                               <span class="text-danger">
                                                {{ $product->seller->shop_address }}
                                            </span> 

                                            </a> </li>
                                    </ul>
                                </div>
                                <div class="tpdetails__box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tpproduct-details__nab">
                                                <div class="tab-content" id="nav-tabContents">
                                                    <div class="tab-pane fade show active w-img" id="nav-home"
                                                        role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                        <img src="{{ $product->img }}" alt="">
                                                        {{-- <div class="tpproduct__info bage">
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div> --}}
                                                    </div>
                                                    <div class="tab-pane fade w-img" id="nav-profile" role="tabpanel"
                                                        aria-labelledby="nav-profile-tab" tabindex="0">
                                                        <img src="assets/img/product/product-details-2.png" alt="">
                                                        <div class="tpproduct__info bage">
                                                            <span
                                                                class="tpproduct__info-discount bage__discount">-90%</span>
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade w-img" id="nav-contact" role="tabpanel"
                                                        aria-labelledby="nav-contact-tab" tabindex="0">
                                                        <img src="assets/img/product/product-details-3.png" alt="">
                                                        <div class="tpproduct__info bage">
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product__details">
                                                <div class="product__details-price-box">
                                                    <h5 class="product__details-price">₦ {{ $product->price }}</h5>
                                                    <ul class="product__details-info-list">
                                                        <li>Delicious non - dairy cheese sauce</li>
                                                        <li>Vegan & Allergy friendly</li>
                                                        <li>Smooth, velvety dairy free cheese sauce</li>
                                                    </ul>
                                                </div>
                                                <div class="product__details-cart">
                                                    <div class="product__details-quantity d-flex align-items-center mb-15">
                                                        @if ($product->qty > 0)

                                                            @if (isset(Auth::user()->id))

                                                                @if (empty($cart))
                                                                    <form action="{{ route('addToCart') }}" method="POST">
                                                                        @csrf
                                                                        <div class="product__details-count mr-10">
                                                                            <span class="cart-minus"
                                                                                data-product-id="{{ $product->id }}"><i
                                                                                    class="far fa-minus"></i></span>
                                                                            <input class="tp-cart-input" type="text"
                                                                                value="{{ $cart->qty ?? 1 }}"
                                                                                name="qty">
                                                                            <span class="cart-plus"
                                                                                data-product-id="{{ $product->id }}"><i
                                                                                    class="far fa-plus"></i></span>
                                                                        </div>
                                                                        <input type="text" name="product_id"
                                                                            value="{{ $product->id }}" hidden>

                                                                        <input type="text" name="price"
                                                                            value="{{ $product->price }}" hidden>
                                                                        <input type="text" name="seller_id"
                                                                            value="{{ $product->seller_id }}" hidden>

                                                                        <input type="text" name="user_id"
                                                                            value="{{ Auth::user()->id }}" hidden>


                                                                        <button
                                                                            class="btn btn-danger rounded-pill p-2 px-5">Add
                                                                            to Cart</button>

                                                                    </form>
                                                                @else
                                                                    <div
                                                                        class="product__details-count bg-transparent border-0  p-0 mr-10 d-flex">
                                                                        {{-- <b class="align-self-center">Qty:</b> --}}
                                                                        <form action="{{ route('cartminus') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="text" name="product_id"
                                                                                value="{{ $product->id }}" hidden>
                                                                            <input type="text" name="cart_id"
                                                                                value="{{ $cart->id }}" hidden>


                                                                            <button type="submit"
                                                                                class=" btn btn-danger {{ $cart->qty < 2 ? 'disabled' : '' }}"><i
                                                                                    class="far fa-minus"></i></button>

                                                                        </form>

                                                                        <input class="tp-cart-input bg-transparent"
                                                                            type="text" value="{{ $cart->qty ?? 0 }}"
                                                                            name="qty">

                                                                        <form action="{{ route('cartplus') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="text" name="product_id"
                                                                                value="{{ $product->id }}" hidden>
                                                                            <input type="text" name="cart_id"
                                                                                value="{{ $cart->id }}" hidden>
                                                                            <button type="submit"
                                                                                class=" btn btn-danger {{ $cart->qty > 9 ? 'disabled' : '' }}"><i
                                                                                    class="far fa-plus "></i></button>
                                                                        </form>


                                                                        <span
                                                                            class="align-self-center ms-3">({{ $cart->qty }}
                                                                            item(s)
                                                                            added)</span>

                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="">
                                                                    <a href="{{ route('login') }}"
                                                                        class="btn btn-danger px-5 rounded-pill py-2">Sign
                                                                        in to add to cart</a>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="d-grid">
                                                                <a href="{{ route('cart') }}"
                                                                    class="btn btn-outline-danger rounded-pill disabled ">Out
                                                                    of Stock</a>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="product__details-stock mb-25">
                                                    <ul>
                                                        <li>
                                                            Availability:
                                                            @if ($product->qty > 0)
                                                                {{-- {{ $product->qty }} --}}
                                                                 <i> Instock</i>
                                                            @else
                                                                <i class="text-danger"> Out of stock</i>
                                                            @endif
                                                        </li>
                                                        <li>Category: <span>{{ $product->category->name }}</span>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tpdescription__box">
                                <div class="tpdescription__box-center d-flex align-items-center justify-content-center">
                                    <nav>
                                        <div class="nav nav-tabs" role="tablist">
                                            <button class="nav-link text-danger" id="nav-description-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-description" type="button" role="tab"
                                                aria-controls="nav-description" aria-selected="true">Product
                                                Description</button>

                
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab" tabindex="0">
                                        <div class="tpdescription__content">
                                            <p>
                                                @if ($product->description == null)
                                                    <p class="text-danger">Product has no description</p>
                                                @else
                                                    <p>{{ $product->description }}</p>
                                                @endif
                                            </p>
                                            
                                        </div>


                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">


                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- product-area-start -->
        <section class="product-area whight-product pt-75 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="tpdescription__product-title mb-20">Related Products</h5>
                    </div>
                </div>
                <div class="tpproduct__arrow double-product p-relative">
                    <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                        <div class="swiper-wrapper">
                            @foreach ($related_products as $related)
                                <div class="swiper-slide">
                                    <div class="tpproduct p-relative">
                                        <div class="tpproduct__thumb p-relative text-center">
                                            <a href="{{ route('product', $related->id) }}"><img
                                                src="{{ $related->img  }}" alt="" height="220" width="100%"></a>
                                        <a class="tpproduct__thumb-img"
                                            href="{{ route('product', $related->id) }}"><img
                                                src="{{ $related->img  }}" alt="" height="220" width="100%"></a>
                                         
                                            <div class="tpproduct__shopping">
                                                <a class="tpproduct__shopping-wishlist"
                                                    href="{{ route('product', $related->id) }}"><i
                                                        class="icon-heart icons"></i></a>
                                               
                                                <a class="tpproduct__shopping-cart"
                                                    href="{{ route('product', $related->id) }}"><i
                                                        class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="tpproduct__content">
                                            <span class="bg-danger rounded-2 px-1 text-white">
                                                {{ $related->country }}
                                            </span>
                                            <h4 class="tpproduct__title">
                                                <a href="{{ route('product', $related->id) }}">{{ $related->name }}</a>
                                            </h4>
                                            <div class="tpproduct__price">
                                                <span>₦ {{ $related->price }}</span>
                                               
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-area-end -->

        <!-- feature-area-end -->

    </main>
@endsection
