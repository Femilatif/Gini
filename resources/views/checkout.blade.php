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
                                <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        

        <!-- checkout-area start -->
        <section class="checkout-area pb-50">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="checkout-form-list">
                                        <label>Delivery Type <span class="required">*</span></label>
                                        <select name="order_type" class="" id="order_type">
                                            <option value="home_delivery">Home delivery</option>
                                            <option value="pick_up_Delivery">Pick up delivery</option>
                                        </select>
                                        {{-- <input type="text" value="{{ Auth::user()->country }}" placeholder="" readonly> --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Country <span class="required">*</span></label>
                                        <input type="text" value="{{ Auth::user()->country }}" placeholder="" readonly>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>FullName <span class="required">*</span></label>
                                        <input type="text" value="{{ Auth::user()->name }}" placeholder="" readonly>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>City</label>
                                        <input type="text" value="{{ Auth::user()->state }}" placeholder="" readonly>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <textarea class="form-control shadow-sm" readonly> {{ $address->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                </div>


                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" value=" {{ Auth::user()->email }}" readonly>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" value=" {{ Auth::user()->phone }}" placeholder="" readonly>
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="your-order mb-30 border-danger">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($products as $product)
                                            @php
                                                $total += $product->price;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $product->product->name }} <strong class="product-quantity"> ×
                                                        {{ $product->qty }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{ number_format($product->price) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">{{ number_format($total) }}</span></td>
                                        </tr>
                                        {{-- <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <input type="radio" name="shipping" checked>
                                                        <label>
                                                            Flat Rate: <span class="amount">500.00</span>
                                                        </label>
                                                    </li>
                                                   
                                                </ul>
                                            </td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{ number_format($total) }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="order-button-payment mt-20">
                                <a href="{{ route('pay') }}" class="btn-danger btn rounded-5 w-100 banner-animation">Place Order</a>
                                {{-- <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <input type="text" name="total" value="{{ $total }}" hidden>
                                    <button type="submit" class="btn-danger btn rounded-5 w-100 banner-animation">Place Order</button>
                                </form> --}}
                            </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- checkout-area end -->


        <!-- feature-area-end -->

    </main>

@endsection
