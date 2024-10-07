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
                                <a href="{{ route('orders') }}" class="list-group-item border-0 py-2"><i
                                        class="icon-box"></i> &nbsp; Orders</a>
                                <a href="{{ route('address') }}" class="list-group-item border-0 py-2"><i
                                        class="icon-map"></i> &nbsp; Address</a>
                                <a href="{{ route('profile') }}"
                                    class="list-group-item border-0 bg-danger text-white py-2"><i class="icon-edit"></i>
                                    &nbsp; Edit Profile</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="list-group-item border-0  text-danger py-2"><i
                                            class="icon-arrow-left-circle"></i>&nbsp; Logout</button>
                                </form>
                                {{-- <a href="{{ route('logout') }}" class="list-group-item border-0  text-danger py-2"><i class="icon-arrow-left-circle"></i> &nbsp; Logout</a> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="card-header bg-white ">
                            <h6 class="fw-bold text-dark">ACCOUNT DETAILS</h6>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-0">


                                        <div class="card-body border-0">
                                            <form action="{{ route('update-user') }}" method="POST">
                                                @csrf
                                                <input type="text" name="id" value="{{ Auth::id() }}" hidden>
                                                <div class="mb-3">
                                                    <label for="fullname" class="mb-1">Fullname</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Email" class="mb-1">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="mb-1">Phone</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ Auth::user()->phone }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="country" class="mb-1">Country</label>
                                                    <input type="text" class="form-control" name="country"
                                                        value="{{ Auth::user()->country }}" readonly disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="city" class="mb-1">City</label>
                                                    <input type="text" class="form-control" name="city"
                                                        value="{{ Auth::user()->city }}" readonly disabled>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-danger float-end px-5">Update</button>
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
    </section>
@endsection
