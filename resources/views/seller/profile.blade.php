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
                                <span class="tp-breadcrumb__active"><a href="{{ route('myshop') }}">Dashboard</a></span>
                                {{-- <span class="dvdr">/</span> --}}
                                {{-- <span>Shop</span> --}}
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

                                <div class="tpshop__banner mb-30 bg-success">
                                    <div class="tpshop__content text-center">
                                        <h4 class="tpshop__content-title mb-20"> {{ "Seller Profile"}}</h4>
                                        <p>{{ $seller->shop_address }}
                                        <p>
                                    </div>
                                </div>

                                

                                <div class="tab-content " id="nav-tabContent">
                                    <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                        aria-labelledby="nav-popular-tab">
                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            <p class="text-success mb-0">{{ session('success') }}</p>
                                        </div>
                                        @endif
                                      
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="card border-0 rounded-3">
   
                                                    <div class="card-body">
                                                        <h4 class="mb-3 ">Personal Information</h4 class="mb-3">
                                                        <p> <span class="fw-bold">Name: </span> {{ $seller->fullname }}</p>
                                                        <p> <span class="fw-bold">Email: </span> {{ $seller->email }}</p>
                                                        <p> <span class="fw-bold">Phone: </span> {{ $seller->phone }}</p>
                                                        <p> <span class="fw-bold">Address: </span> {{ $seller->address}}</p>
                                                        <p> <span class="fw-bold">Country: </span> {{ $seller->country ?? 'No Set'}}</p>
                                                        <p> <span class="fw-bold">State: </span> {{ $seller->state ?? 'Not Set'}}</p>
                                                        <p> <span class="fw-bold">City: </span> {{ $seller->city ?? 'Not Set'}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card border-0 rounded-3">
   
                                                    <div class="card-body">
                                                        <h4 class="mb-3 ">Shop Information</h4 class="mb-3">
                                                        <p> <span class="fw-bold">Shop name: </span> {{ $seller->shop_name }}</p>
                                                        <p> <span class="fw-bold">Shope number: </span> {{ $seller->shop_number }}</p>
                                                        <p> <span class="fw-bold">Shop Address: </span> {{ $seller->shop_address}}</p>
                                                        <p> <span class="fw-bold">Shop Status: </span>
                                                           <span  class="fw-bold @if($seller->status == "Verified") text-success @else text-warning  @endif"> <i class="icon-check-circle"></i> {{ $seller->status}}</span>  
                                                        </p>
                                                      
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

     
        <!-- shop-area-end -->



    </main>
@endsection
