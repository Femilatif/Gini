@extends('admin.layout.app')
@section('content')
    <section class="shop-area-start grey-bg pb-200 pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-12 col-md-12">
                    @include('admin.side')

                </div>
                <div class="col-xl-10 col-lg-12 col-md-12 align-self-start">
                    <div class="tpshop__top ml-60 bg-white px-5 py-4 rounded-3">
                        <h4 class="tpshop__widget-title">Statistics</h4>
                        <div class="tab-content pb-3" id="nav-tabContent">
                            <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                aria-labelledby="nav-popular-tab">

                                <div class="row mb-5 py-3">
                                    <div class="col-md-4 col-lg-3">
                                        <a href="{{ route('pendingsellers') }}">
                                            <div class="card alert alert-info">
                                                <div class="card-body text-center">
                                                    <h4 class="tpproduct__title">Pending Sellers</h4>
                                                    <h3 class="tpproduct__title">{{ $pendingsellers }}</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <a href="{{ route('verifiedsellers') }}">
                                        <div class="card alert alert-success">
                                            <div class="card-body text-center">
                                                <h4 class="tpproduct__title">Verified Sellers</h4>
                                                <h3 class="tpproduct__title">{{ $verifiedsellers }}</h3>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                     
                                            <div class="card alert alert-warning">
                                                <div class="card-body text-center">
                                                    <h4 class="tpproduct__title">Total Category</h4>
                                                    <h3 class="tpproduct__title">{{ $categories }}</h3>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <div class="card alert alert-primary">
                                            <div class="card-body text-center">
                                                <h4 class="tpproduct__title">Total Users </h4>
                                                <h3 class="tpproduct__title">{{ $users }}</h3>
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
