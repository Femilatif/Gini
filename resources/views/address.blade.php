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
                    <div class="card shadow border-0">
                        <div class="card-header bg-transparent d-flex justify-content-between">
                            <h6 class="text-dark fw-bold p-0 m-0 align-self-center">ADDRESS BOOK</h6>
                            <a href="{{ route('add-address') }}" class="btn btn-warning btn-sm ">ADD NEW ADDRESS</a>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                @if ($addresses->isEmpty())
                                    <p class="text-danger">You have not added a delivery address</p>
                                @else
                                    @foreach ($addresses as $address)
                                        <div class="col-md-6 mt-4">
                                            <div class="card" style="height: 190px">

                                                <div class="card-body">
                                                    <p class="m-0 p-0"> {{ $address->address }}</p>

                                                    @if ($address->active == 1)
                                                        <p class="text-success  disabled border-0 mt-1 p-0"> Default Address
                                                        </p>
                                                    @endif

                                                </div>
                                                <div class="card-footer bg-transparent ">
                                                    @if ($address->active != 1)
                                                        <div class="d-flex justify-content-between">
                                                            <form action="{{ route('set-default') }}" method="POST">
                                                                @csrf
                                                                <input type="text" id="" name="id"
                                                                    value="{{ $address->id }}" hidden>
                                                                <button type="submit"
                                                                    class="btn btn-outline-warning btn-sm border-0">Set
                                                                    Default
                                                                    Address</button>
                                                            </form>


                                                            <div>
                                                                <a href="{{ route('delete-address', $address->id) }}"
                                                                    class="btn btn-outline-danger btn-sm border-0"
                                                                    onclick="return confirm('Do you want to Delete?')"> <i
                                                                        class="icon-trash"></i></a>

                                                                <button class="btn btn-outline-warning btn-sm border-0"> <i
                                                                        class="icon-edit"></i> </button>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between">
                                                            <p class="m-0 p-0 text-muted small">Set Default Address</p>
                                                            <div>
                                                                @if ($total > 1)
                                                                    <a href="{{ route('delete-address', $address->id) }}"
                                                                        class="btn btn-outline-danger btn-sm border-0"
                                                                        onclick="return confirm('Do you want to Delete?')">
                                                                        <i class="icon-trash"></i></a>
                                                                @endif
                                                                <button class="btn btn-outline-warning btn-sm border-0"> <i
                                                                        class="icon-edit"></i> </button>
                                                            </div>
                                                        </div>
                                                    @endif
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
    </section>
@endsection
