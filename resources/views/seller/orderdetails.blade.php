@extends('layouts.seller')
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="{{ route('myshop') }}">Home</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active">Order Details</span>
                                {{-- <span>{{ $cart->product->name }}</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <section class="shop-area-start grey-bg pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-12 col-md-12">
                        @include('seller.side')
                        <div class="tpshop__widget">
                            <div class="tpshop__sidbar-thumb mt-35">
                                <img src="assets/img/shape/sidebar-product-1.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="tpshop__top ml-60">

                            {{-- <div class="tpshop__banner mb-30 bg-success">
                                <div class="tpshop__content text-center">
                                    <h4 class="tpshop__content-title mb-20"> {{ $seller->shop_name }}</h4>
                                    
                                </div>
                            </div> --}}



                            <div class="tab-content " id="nav-tabContent">
                                <div class="tab-pane fade show active bg-white rounded-3 " id="nav-popular" role="tabpanel"
                                    aria-labelledby="nav-popular-tab">


                                    <div class="row">
                                        <div class="col-lg-6 p-5">

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    <p class="text-success mb-0">{{ session('success') }}</p>
                                                </div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    <p class="text-danger mb-0">{{ session('error') }}</p>
                                                </div>
                                            @endif
                                            <div class="tpproduct-details__nab">
                                                <div class="tab-content" id="nav-tabContents">
                                                    <div class="tab-pane fade show active w-img" id="nav-home"
                                                        role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                        <img src="{{ $cart->product->img }}" alt="">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 bg-light p-5">
                                            <div class="product__details">
                                                {{-- <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="tpproduct-details__nab">
                                                            <div class="tab-content" id="nav-tabContents">
                                                                <div class="tab-pane fade show active w-img" id="nav-home"
                                                                    role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                                    <img src="{{ $cart->product->img }}" alt="">
            
                                                                </div>
                                                            </div>
            
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-lg-12">
                                                        <div class="product__details">
                                                            <div class="product__details-price-box">
                                                                {{-- <h5 class="product__details-price">
                                                                    {{ number_format($cart->product->price) }}</h5> --}}
                                                                <ul class="product__details-info-list">
                                                                    <li><span class="fw-bold">Price: </span>
                                                                        {{ $cart->product->price }}</li>
                                                                    <li><span class="fw-bold">Delivery Address: </span>
                                                                        {{ $address->address }}</li>
                                                                    <li><span class="fw-bold">Order Number: </span>
                                                                        {{ $cart->order->order_number }}</li>
                                                                    <li> <span class="fw-bold">Order Quantity: </span>
                                                                        {{ $cart->qty }}</li>
                                                                </ul>
                                                            </div>
            
                                                            <div class="product__details-stock ">
                                                                <h6 class="fw-bold">Personal information</h6>
                                                                <ul>
                                                                    <li> Name: {{ $user->name }} </li>
                                                                    <li> Country: {{ $user->country }} </li>
                                                                    <li> State: {{ $user->state }} </li>
            
            
            
                                                                </ul>
                                                            </div>
                                                            <div class="product__details-cart">
                                                                <div class="product__details-quantity d-flex align-items-center my-3">
                                                                    @if (Auth::guard('sellers')->check())
                                                                        @if ($cart->status == 'Delivered')
                                                                          <button class="btn btn-success disabled">Order has been processed</button>
                                                                        @else
                                                                            @if ($cart->status == 'Completed')
                                                                                <form action="{{ route('accept') }}" method="POST">
                                                                                    @csrf
                                                                                    <input type="text" name="id"
                                                                                        value="{{ $cart->id }}" hidden>
                                                                                    <button type="submit"
                                                                                        class="btn btn-success">Accept
                                                                                        Order</button>
                                                                                </form>
                                                                            @else
                                                                                <form action="{{ route('reject') }}" method="POST">
                                                                                    @csrf
                                                                                    <input type="text" name="id"
                                                                                        value="{{ $cart->id }}" hidden>
            
                                                                                    <button class="btn btn-success">Cancel
                                                                                        Order</button>
                                                                                </form>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                </div>
            
                                                            </div>
            
            
            
                                                        </div>
                                                    </div>
                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- shop-details-area-start -->
      
        <!-- shop-details-area-end -->

        <!-- product-area-start -->

        <!-- product-area-end -->

        <!-- feature-area-end -->

    </main>
@endsection
