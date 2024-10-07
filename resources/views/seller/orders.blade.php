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
                                <span>Pending Orders</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-area-start -->

        @if ($seller->status == 'Pending')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="text-center card my-5">
                            <div class="card-body p-5">
                                <img src="{{ asset('assets/img/animate/wait.gif') }}" height="80px" alt="">
                                <h4 class="text-danger my-3">Your account have not been verified</h4>
                                <p>Accounts reveiw can take up to 24 hours after registration. Before you can start
                                    uploading your products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
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

                                <div class="tpshop__banner mb-30 bg-success">
                                    <div class="tpshop__content text-center">
                                        <h4 class="tpshop__content-title mb-20"> {{ 'Pending Orders' }}</h4>
                                        {{-- <p>{{ $seller->shop_address }}
                                        <p> --}}
                                    </div>
                                </div>



                                <div class="tab-content " id="nav-tabContent">
                                    <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                        aria-labelledby="nav-popular-tab">
                                        @if ($placed_orders->isNotEmpty())
                                            <h4 class="mb-3 ">Pending Orders</h4 class="mb-3">
                                        @endif
                                        <div
                                            class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">


                                            @if ($placed_orders->isEmpty())
                                                <div class="w-100">
                                                    <p class="text-danger fs-4">No Order has been placed
                                                    </p>
                                                </div>
                                            @else
                                                @foreach ($placed_orders as $product)
                                                    <div class="col">
                                                        <div class="tpproduct p-relative mb-20">
                                                            <div class="tpproduct__thumb p-relative text-center">
                                                                <a href="{{ route('orderdetails', $product->id) }}" ><img src="{{ $product->product->img }}"
                                                                    alt=""></a>
                                                                {{-- <a class="tpproduct__thumb-img"
                                                                    href=" {{ route('orderdetails', $product->id) }}"><img
                                                                        src="{{ $product->product->img }}"
                                                                        alt=""></a> --}}
                                                                <div class="tpproduct__info bage">

                                                                    <span class="tpproduct__info-hot bage__hot">Pending
                                                                        Order</span>
                                                                </div>
                                                                <div class="tpproduct__shopping">
                                                                    <a class="tpproduct__shopping-wishlist"
                                                                        href="{{ route('cart') }}"><i
                                                                            class="icon-cart icons"></i></a>
                                                                    <a class="tpproduct__shopping-cart"
                                                                        href="{{ route('orderdetails', $product->id) }}"><i
                                                                            class="icon-eye"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="tpproduct__content">
                                                                <span class="tpproduct__content-weight">
                                                                    <h4 class="tpproduct__title">Order Status:
                                                                        <span class="bg-warning badge badge-pill">
                                                                            @if ($product->status == 'Completed')
                                                                                Waiting Approval
                                                                            @endif
                                                                        </span>
                                                                    </h4>

                                                                </span>

                                                                <h4 class="tpproduct__title">
                                                                    <a href="{{ route('orderdetails', $product->id) }}">Product
                                                                        Name:
                                                                        {{ $product->product->name }}</a>
                                                                </h4>
                                                                <h4 class="tpproduct__title">
                                                                    Ordered Quantity: {{ $product->qty }}
                                                                </h4>
                                                                <div class="tpproduct__price">
                                                                    Purchased Cost:
                                                                    <span>{{ number_format($product->price) }}</span>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif


                                        </div>
                                    </div>





                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        @endif
        <!-- shop-area-end -->



    </main>
@endsection
