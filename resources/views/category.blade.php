@extends('layouts.app')
@section('content')
    <main>

        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-area-start -->
        <section class="shop-area-start grey-bg pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-12 col-md-12">
                        <div class="tpshop__leftbar">
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">Product Categories</h4>
                                <ul class="list-group">
                                    @foreach ($categories as $cat)
                                        <div class="form-check">
                                            @if ($cat->id == $category_id)
                                                <input class="form-check-input" type="checkbox" value="" checked
                                                    id="flexCheckDefault9" disabled>
                                            @endif
                                            <a href="{{ route('category', $cat->id) }}"
                                                class=" @if ($cat->id == $category_id) text-decoration-underline text-primary fw-bold @endif"
                                                for="flexCheckDefault9">
                                                {{ $cat->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tpshop__widget">
                            <div class="tpshop__sidbar-thumb mt-35">
                                <img src="assets/img/shape/sidebar-product-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="tpshop__top ml-60">
                            <div class="tpshop__banner mb-30 bg-danger">
                                <div class="tpshop__content text-center">
                                    <span>Category</span>
                                    <h4 class="tpshop__content-title mb-20"> {{ $category->name }}</h4>
                                    <p>Displaying product from {{ $category->name }}</p>
                                </div>
                            </div>


                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                    aria-labelledby="nav-popular-tab">
                                    <div
                                        class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">


                                        @if ($products->isEmpty())
                                            <div class="w-100">
                                                <p class="text-danger fs-4">No product has been added in the
                                                    {{ $category->name }} category</p>
                                            </div>
                                        @else
                                            @foreach ($products as $product)
                                                <div class="col">
                                                    <div class="tpproduct p-relative mb-20">
                                                        <div class="tpproduct__thumb p-relative text-center">
                                                            <a href="#"><img src="{{ $product->img }}"
                                                                    alt=""></a>
                                                            <a class="tpproduct__thumb-img"
                                                                href=" {{ route('product', 1) }}"><img
                                                                    src="{{ $product->img }}" alt=""></a>
                                                            <div class="tpproduct__info bage">

                                                                <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                            </div>
                                                            <div class="tpproduct__shopping">
                                                                <a class="tpproduct__shopping-wishlist"
                                                                    href="{{ route('cart') }}"><i
                                                                        class="icon-cart icons"></i></a>
                                                                <a class="tpproduct__shopping-cart"
                                                                    href="{{ route('product', $product->id) }}"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="tpproduct__content">
                                                            <span class="tpproduct__content-weight">
                                                                <a
                                                                    href="{{ route('category', $product->category->id) }}">{{ $product->category->name }}</a>,

                                                            </span>
                                                            <h4 class="tpproduct__title">
                                                                <a
                                                                    href="{{ route('product', $product->id) }}">{{ $product->name }}</a>
                                                            </h4>
                                                            <div class="tpproduct__price">
                                                                <span>$56.00</span>
                                                                <del>$19.00</del>
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
        <!-- shop-area-end -->



    </main>
@endsection
