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
                                <span class="tp-breadcrumb__active"><a href="{{ route('allproducts') }}">{{ "Products" }}</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active"><a href="">{{ $product->name }}</a></span>

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
                                            <h3 class="tpdetails__title"><span class="text-dark"> {{ $product->name }}</h3>
                                            <div class="tpproduct-details__nab">
                                                <div class="tab-content" id="nav-tabContents">
                                                    <div class="tab-pane fade show active w-img" id="nav-home"
                                                        role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                        <img src="{{ $product->img }}" alt="">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 bg-light p-5">
                                            <div class="product__details">
                                                <div class="">
                                                    {{-- <h5 class="product__details-price">
                                                            {{ number_format($cart->product->price) }}</h5> --}}
                                                    {{-- <ul class="product__details-info-list">
                                                            <li><span class="fw-bold">Price: </span>
                                                                {{ $product->price }}</li>
                                                          
                                                          
                                                        </ul> --}}
                                                    <form action="{{ route('updateproduct') }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="id" value="{{ $product->id }}"
                                                            hidden>
                                                        <div class="mb-2">
                                                            <label for="Name">Name</label>
                                                            <input type="text" class="form-control shadow-sm"
                                                                name="name" value="{{ $product->name }}">
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="Price">Price</label>
                                                            <input type="text" class="form-control shadow-sm"
                                                                name="price" value="{{ $product->price }}">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="Price">Quantity</label>
                                                            <input type="text" class="form-control shadow-sm"
                                                                name="qty" value="{{ $product->qty }}">
                                                        </div>


                                                        <div class="mb-2">
                                                            <label for="Description">Description</label>
                                                            <textarea name="description" id="" class="form-control shadow-sm"
                                                                placeholder="{{ $product->description ?? 'No description' }}"> {{ $product->description ?? '' }}</textarea>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="Category">Category</label>
                                                            <select name="category_id" class="w-100 shadow-sm">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        @if ($category->id == $product->category_id) selected @endif>
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <button type="submit" class="btn btn-success mt-3 float-end">Update
                                                            Product</button>
                                                    </form>


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


        <!-- product-area-start -->

        <!-- product-area-end -->

        <!-- feature-area-end -->

    </main>
@endsection
