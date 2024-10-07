@extends('layouts.app')

@section('content')
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="card-body p-0 m-0">
                            <ul class="list-group">
                                <a href="{{ route('account') }}" class="list-group-item border-0  py-2"><i
                                        class="icon-user"></i> &nbsp; My Account</a>
                                <a href="{{ route('orders') }}"
                                    class="list-group-item border-0 text-white bg-success py-2"><i class="icon-box"></i>
                                    &nbsp; Orders</a>
                                <a href="{{ route('address') }}" class="list-group-item border-0 py-2"><i
                                        class="icon-map"></i> &nbsp; Address</a>
                                <a href="{{ route('profile') }}" class="list-group-item border-0 py-2"><i
                                        class="icon-edit"></i> &nbsp; Edit Profile</a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="list-group-item border-0  text-danger py-2"><i
                                                    class="icon-arrow-left-circle"></i>&nbsp; Logout</button>
                                        </form>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="card-header">
                            <a href="{{ route('orders') }}"> <i class="icon-arrow-left"></i> Order Details</a>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">

                                    @if ($carts->isEmpty())
                                        <h3 class="text-danger fs-4">You have not placed any order yet</h3>
                                    @else
                                        @foreach ($carts as $order)
                                            <div class="card mt-3">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-2 ">
                                                            <img src="{{ $order->product->img }}" height="100"
                                                                width="100" alt="">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="d-flex justify-content-between ">
                                                                <div>
                                                                    <h6>{{ $order->product->name }}</h6>
                                                                    <p class="text-muted">Order
                                                                        {{ $order->order->order_number }}
                                                                    </p>
                                                                    <p class="text-muted">Price
                                                                        {{ number_format($order->price) }}
                                                                        @if ($order->status == 'Completed')
                                                                            <span
                                                                                class="text-bg-warning px-2 rounded fw-lighter">
                                                                                Processing
                                                                            </span>
                                                                        @else
                                                                            <span
                                                                                class="text-bg-success px-2 rounded fw-lighter">
                                                                                Delivered
                                                                            </span>
                                                                        @endif
                                                                    </p>




                                                                </div>

                                                            </div>

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
@endsection
