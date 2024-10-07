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
                                <span class="tp-breadcrumb__active"><a href="{{ route('myshop') }}">Dashboard</a></span>
                                {{-- <span class="dvdr">/</span> --}}
                                {{-- <span>Shop</span> --}}
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
                                        <h4 class="tpshop__content-title mb-20"> {{ $seller->shop_name }}</h4>
                                        <p>{{ $seller->shop_address }}
                                        <p>
                                    </div>
                                </div>

                                <div class="row mb-5 py-3">
                                    <div class="col-md-4 col-lg-3">
                                        <a href="{{ route('sellerorders') }}">
                                            <div class="card alert alert-info">
                                                <div class="card-body text-center">
                                                    <h4 class="tpproduct__title">Pending Orders</h4>
                                                    <h3 class="tpproduct__title">{{ $placed_orders }}</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <div class="card alert alert-success">
                                            <div class="card-body text-center">
                                                <h4 class="tpproduct__title">Revenue </h4>
                                                <h3 class="tpproduct__title">{{ number_format($total) }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <a href="{{ route('completedorders') }}">
                                            <div class="card alert alert-warning">
                                                <div class="card-body text-center">
                                                    <h4 class="tpproduct__title">Compeleted Orders </h4>
                                                    <h3 class="tpproduct__title">{{ $completed_orders }}</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <div class="card alert alert-primary">
                                            <div class="card-body text-center">
                                                <h4 class="tpproduct__title">Total Products </h4>
                                                <h3 class="tpproduct__title">{{ $totalproducts }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content " id="nav-tabContent">
                                    <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                        aria-labelledby="nav-popular-tab">
                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            <p class="text-success mb-0">{{ session('success') }}</p>
                                        </div>
                                        @endif
                                        <h4 class="mb-3 ">My Products</h4 class="mb-3">
                                        <div
                                            class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">


                                            @if ($products->isEmpty())
                                                <div class="w-100">
                                                    <p class="text-danger fs-4">No product has been added in your store</p>
                                                    <a href="{{ route('newproduct') }}" class="btn btn-success">Add Product</a>
                                                </div>
                                            @else
                                                @foreach ($products as $product)
                                                    <div class="col">
                                                        <div class="tpproduct p-relative mb-20">
                                                            <div class="tpproduct__thumb p-relative text-center">
                                                                <a href="{{ route('sellerproduct', $product->id) }}"><img src="{{ $product->img }}"
                                                                        alt="" height="200"></a>
                                                                {{-- <a class="tpproduct__thumb-img"
                                                                    href=" {{ route('sellerproduct', $product->id) }}"><img
                                                                        src="{{ $product->img }}" alt=""></a> --}}
                                                                <div class="tpproduct__info bage">

                                                                    <span class="tpproduct__info-hot bage__hot">My Product</span>
                                                                </div>
                                                                <div class="tpproduct__shopping">
                                                                    <a class="tpproduct__shopping-wishlist" onclick="return confirm('Are you sure you want to delete {{ $product->name }}')"
                                                                        href="{{ route('deleteproduct',$product->id) }}"><i
                                                                            class="icon-trash icons"></i></a>

                                                                    <a class="tpproduct__shopping-cart"
                                                                        href="{{ route('sellerproduct', $product->id) }}"><i
                                                                            class="icon-eye"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="tpproduct__content">
                                                                <span class="tpproduct__content-weight">
                                                                    <h4 class="tpproduct__title">Category:
                                                                        {{ $product->category->name }}</h4>

                                                                </span>
                                                                <h4 class="tpproduct__title">
                                                                    <a href="{{ route('sellerproduct', $product->id) }}">Name:
                                                                        {{ $product->name }}</a>
                                                                </h4>
                                                                <h4 class="tpproduct__title">
                                                                    Quantity: {{ $product->qty }}
                                                                </h4>
                                                                <div class="tpproduct__price">
                                                                    Price: <span>{{ number_format($product->price) }}</span>

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
