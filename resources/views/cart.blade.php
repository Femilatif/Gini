@extends('layouts.app')
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- cart area -->
        <section class="cart-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{-- <form action="#"> --}}
                        @if ($carts->isEmpty())
                            <h3 class="text-danger text-center p-5">Cart is empty</h3>
                        @else
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Name</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            @php
                                                $total += $cart->product->price * $cart->qty;
                                            @endphp
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="{{ route('product', $cart->product->id) }}">
                                                        <img src="{{ $cart->product->img }}" alt="">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a
                                                        href="{{ route('product', $cart->product->id) }}">{{ $cart->product->name }}</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">{{ number_format($cart->product->price) }}</span>
                                                </td>
                                                <td class="product-quantity text-center">
                                                    {{-- <span class="cart-minus">-</span> --}}
                                                    {{-- <b class="align-self-center">Qty:</b> --}}
                                                    <div class="d-flex justify-content-center">

                                                        <form action="{{ route('cartminus') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $cart->product->id  }}" hidden>
                                                            <input type="text" name="cart_id" value="{{ $cart->id }}"
                                                                hidden>


                                                            <button type="submit"
                                                                class=" btn btn-outline-secondary {{ $cart->qty < 2 ? 'disabled' : '' }}"><i
                                                                    class="far fa-minus"></i></button>

                                                        </form>
                                                       <div class="align-self-center mx-2">
                                                        <input class="cart-input border-0" type="text"
                                                        value="{{ $cart->qty }}" readonly>
                                                       </div>
                                                        {{-- <input class="tp-cart-input bg-transparent" type="text"
                                                            value="{{ $cart->qty ?? 0 }}" name="qty"> --}}

                                                        <form action="{{ route('cartplus') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $cart->product->id  }}" hidden>
                                                            <input type="text" name="cart_id"
                                                                value="{{ $cart->id }}" hidden>
                                                            <button type="submit"
                                                                class=" btn btn-outline-secondary {{ $cart->qty > 9 ? 'disabled' : '' }}"><i
                                                                    class="far fa-plus "></i></button>
                                                        </form>
                                                        {{-- <form action="{{ route('cartminus') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $cart->product->id }}" hidden>
                                                            <input type="text" name="cart_id" value="{{ $cart->id }}"
                                                                hidden>


                                                            <button type="submit" class=" btn "><i
                                                                    class="far fa-minus"></i></button>
                                                        </form>


                                                        <input class="cart-input align-self-center" type="text"
                                                            value="{{ $cart->qty }}">
                                                     
                                                        <form action="{{ route('cartplus') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $cart->product->id }}" hidden>
                                                            <input type="text" name="cart_id"
                                                                value="{{ $cart->id }}" hidden>
                                                            <button type="submit" class=" btn "><i
                                                                    class="far fa-plus"></i></button>
                                                        </form> --}}


                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span
                                                        class="amount">{{ number_format($cart->product->price * $cart->qty) }}</span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{ route('deleteCart', $cart->id) }}"
                                                        onclick="return confirm('Do you want to delete')"><i
                                                            class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="row justify-content-end">
                                <div class="col-md-5 ">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul class="mb-20">
                                            <li>Subtotal <span> {{ number_format($total) }}</span></li>
                                            <li>V.A.T <span>250.00</span></li>
                                            <li>Total <span>{{ number_format($total + 250) }}</span></li>
                                        </ul>
                                        <a href="{{ route('checkout') }}"
                                            class="btn-danger btn rounded-5 banner-animation">Proceed to
                                            Checkout</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- cart area end-->


        <!-- feature-area-start -->

        <!-- feature-area-end -->

    </main>
@endsection
