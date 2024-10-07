@extends('layouts.app')

@section('content')
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-0 m-0">
                            <ul class="list-group">
                                <a href="{{ route('account') }}" class="list-group-item border-0  py-2"><i
                                        class="icon-user"></i> &nbsp; My Account</a>
                                <a href="{{ route('orders') }}" class="list-group-item border-0 py-2"><i
                                        class="icon-box"></i> &nbsp; Orders</a>
                                <a href="{{ route('address') }}"
                                    class="list-group-item border-0 bg-danger text-white py-2"><i class="icon-map"></i>
                                    &nbsp; Address</a>
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
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h6 class="text-muted text-dark fw-bold"> <i class="arrow-back"></i> ACCOUNT DETAILS</h6>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    @if (isset($message))
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @endif

                                    <form action="{{ route('create-address') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Delivery Address</label>
                                            <textarea name="address" id="address" class="form-control mt-1" placeholder="Your address"
                                                autocomplete="street-address"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </form>

                                    {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="mb-1">Region</label>
                                                        <select name="" id="" class="w-100" name="region">
                                                            <option value="Home">Home</option>
                                                            <option value="Home">Home</option>
                                                            <option value="Home">Home</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="mb-1">City</label>
                                                        <select name="" id="" class="w-100" name="city">
                                                            <option value="Home">Home</option>
                                                            <option value="Home">Home</option>
                                                            <option value="Home">Home</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> --}}


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
