@extends('layouts.app')

@section('content')
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="card-body p-0 m-0">
                            <ul class="list-group">
                                <a href="{{ route('account') }}"
                                    class="list-group-item border-0 bg-danger text-white  py-2"><i class="icon-user"></i>
                                    &nbsp; My Account</a>
                                <a href="{{ route('orders') }}" class="list-group-item border-0 py-2"><i
                                        class="icon-box"></i> &nbsp; Orders</a>
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
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card " style="height: 200px">
                                        <div class="card-header bg-transparent ">
                                            <h6 class="text-muted fs-6">ACCOUNT DETAILS</h6>
                                        </div>
                                        <div class="card-body">
                                            <p class="m-0 p-0"> {{ Auth::user()->name }}</p>
                                            <p class="small m-0 p-0 text-muted pb-5"> {{ Auth::user()->email }}</p>

                                            <p class="p-0 m-0">Country: <span>{{ Auth::user()->country }}</span></p>
                                            <p class="p-0 m-0">City: <span>{{ Auth::user()->city }}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card" style="height: 200px">
                                        <div class="card-header bg-transparent ">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="text-muted fs-6">ADDRESS BOOK</h6>
                                                <i class="icon-edit align-self-center"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @if ($address == null)
                                                <p>You have not set a delivery address</p>
                                            @else
                                                {{ $address->address }}
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
    </section>
@endsection
