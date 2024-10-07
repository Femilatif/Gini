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
                                    class="list-group-item border-0 text-white bg-danger py-2"><i class="icon-box"></i>
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
                        <div class="card-header bg-white">
                            <h6>Orders</h6>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">

                                    @if ($completed_orders->isEmpty())
                                        <h3 class="text-danger fs-4">You have not placed any order yet</h3>
                                    @else
                                        @foreach ($completed_orders as $order)
                                            <div class="card mt-3">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-2 ">
                                                            <img src="{{ asset('assets/img/animate/basket.gif') }}" height="100"
                                                                width="100" alt="">
                                                        </div>
                                                        <div class="col-md-10 align-self-center">
                                                            <div class="d-flex justify-content-between ">
                                                                <div>
                                                                    <h6>{{ $order->status }}</h6>
                                                                    <p class="text-muted">Order
                                                                        {{ $order->order_number }}
                                                                    </p>

                                                                    {{-- <span class="text-bg-danger px-2 rounded fw-lighter">
                                                                        @if ($order->status = 'Completed')
                                                                            Processing
                                                                        @else
                                                                            Delivered
                                                                        @endif
                                                                    </span> --}}
                                                                </div>
                                                                <a href="{{ route('order',$order->order_number) }}" class="text-capitalize text-primary" >See Details</a>
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
