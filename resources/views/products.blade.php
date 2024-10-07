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
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="tpshop__details">
                            


                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                    aria-labelledby="nav-popular-tab">
                                    <div
                                        class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">

                                        @if (!$products->isEmpty())
                                            @foreach ($products as $product)
                                                <div class="col">
                                                    <div class="tpproduct p-relative mb-20">
                                                        <div class="tpproduct__thumb p-relative text-center">
                                                            <a href="#"><img src="{{ $product->img }}"
                                                                    alt=""  height="220" width="100%"></a>
                                                            <a class="tpproduct__thumb-img"
                                                                href="{{ route('product', $product->id) }}"><img
                                                                    src="{{ $product->img }}" alt=""  height="220" width="100%"></a>

                                                            <div class="tpproduct__shopping">
                                                                <a class="tpproduct__shopping-wishlist"
                                                                href="{{route('cart')}}"><i
                                                                    class="icon-heart icons"></i></a>
                                                          
                                                            <a class="tpproduct__shopping-cart" href="{{ route('product',$product->id) }}"><i
                                                                    class="icon-eye"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="tpproduct__content">
                                                            <span class="tpproduct__content-weight">
                                                                <a href="shop-details-3.html">Fresh Fruits</a>
                                                            </span>
                                                            <h4 class="tpproduct__title">
                                                                <a
                                                                    href="{{ route('product', $product->id) }}">{{ $product->name }}</a>
                                                            </h4>

                                                            <div class="tpproduct__price">
                                                                <span>₦ {{ number_format($product->price) }}</span>
                                                                {{-- <del>$19.00</del> --}}
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col w-100">
                                                <div class=" p-relative mb-20 p-3 alert alert-danger">
                                                    <h1 class="text-danger fs-5">No product has been added yet</h1>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            {{-- <div class="basic-pagination text-center mt-35">
                                <nav>
                                    <ul>
                                        <li>
                                            <span class="current">1</span>
                                        </li>
                                        <li>
                                            <a href="blog.html">2</a>
                                        </li>
                                        <li>
                                            <a href="blog.html">3</a>
                                        </li>
                                        <li>
                                            <a href="blog.html">
                                                <i class="icon-chevrons-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#addToCartButton').on('click', function(event) {
                    event.preventDefault();
                    var product_id = 1; // Get the product ID dynamically
                    var user_id = 1; // Get the user ID dynamically
                    var qty = 1; // Get the quantity from your UI
                    var price = 10.99; // Get the price from your UI

                    $.ajax({
                        url: '/add-to-cart',
                        method: 'POST',
                        data: {
                            product_id: product_id,
                            user_id: user_id,
                            qty: qty,
                            price: price
                        },
                        success: function(response) {
                            // Handle success
                            window.location.reload();
                            // console.log(response.message);
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            window.location.reload();
                            console.error(error);
                        }
                    });
                });
            });
        </script>

    </main>
@endsection
