@extends('layouts.app')

@section('content')



<main>

    <!-- slider-area-start -->
    <section class="slider-area tpslider-delay">
       <div class="swiper-container tp-slider6">
          <div class="swiper-wrapper">
             <div class="swiper-slide tpslider__bg6" data-background="{{ asset('assets/img/slider/p1.jpg') }}" >
                <div class="container">
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="tpslider__five__wrapper pt-130 text-center">
                            <div class="tpslider__five__brand mb-10">
                               {{-- <img src="{{  asset('assets/img/logo/fresh.png')}}" alt="logo"> --}}
                            </div>
                            <div class="tpslider__five__contact">
                               <h3 class="tpslider__five__title mb-25">Top Quality</h3>
                               <p>Our top quality material.</p>
                               <div class="tpslider__five__btn">
                                  <a class="btn btn-danger py-2 rounded-5 px-4" href="{{ route('products') }}">Shop Now</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="swiper-slide tpslider__bg6" data-background="{{ asset('assets/img/slider/p4.jpg') }}">
                <div class="container">
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="tpslider__five__wrapper pt-130 text-center">
                            <div class="tpslider__five__brand mb-10">
                               {{-- <img src="{{  asset('assets/img/logo/quality.png')}}" alt="logo"> --}}
                            </div>
                            <div class="tpslider__five__contact">
                               <h3 class="tpslider__five__title mb-25">High Quality</h3>
                               <p>Our high quality materia.</p>
                               <div class="tpslider__five__btn">
                                 <a class="btn btn-danger py-2 rounded-5 px-4" href="{{ route('products') }}">Shop Now</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="swiper-slide tpslider__bg6" data-background="{{ asset('assets/img/slider/p3.jpg')}}">
                <div class="container">
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="tpslider__five__wrapper pt-130 text-center">
                            <div class="tpslider__five__brand mb-10">
                               {{-- <img src="{{  asset('assets/img/logo/fresh.png')}}" alt="logo"> --}}
                            </div>
                            <div class="tpslider__five__contact">
                               <h3 class="tpslider__five__title mb-25">Strong Material</h3>
                               <p>Our strong material</p>
                               <div class="tpslider__five__btn">
                                 <a class="btn btn-danger py-2 rounded-5 px-4" href="{{ route('products') }}">Shop Now</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="tpslider__arrow d-none  d-xxl-block">
                <button class="tpsliderarrow tpslider__arrow-prv  tpslider__prv6">
                   <i class="icon-chevron-left bg-danger"></i>
                </button>
                <button class="tpsliderarrow tpslider__arrow-nxt tpslider__nxt6">
                   <i class="icon-chevron-right bg-danger"></i>
                </button>
             </div>
             <div class="slider-pagination-6"></div>
          </div>
       </div>
    </section>
    <!-- slider-area-end -->



   

    <!-- product-area-start -->
    <section class="weekly-product-area whight-product pt-75 pb-75 fix">
       <div class="container">
          <div class="row">
             <div class="col-lg-12 text-center">
                <div class="tpsection mb-20">
                   {{-- <h4 class="tpsection__sub-title">~ Special Products ~</h4> --}}
                   <h4 class="tpsection__title text-danger">Trending Products</h4>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-lg-12">
                <div class="tpnavtab__area pb-40">
                   <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active text-danger" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All Products</button>
    
                      </div>
                   </nav>
                   <div class="tab-content" id="nav-tabContent">

                      <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
                         <div class="tpproduct__arrow p-relative">
                            <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                               <div class="swiper-wrapper">

                                 @foreach($products as $product)
                                  <div class="swiper-slide">
                                     <div class="tpproduct p-relative">
                                        <div class="tpproduct__thumb p-relative text-center">

                                        <a href="#"><img src="{{ $product->img }}"
                                                                    alt="" height="220" width="100%"></a>
                                                            <a class="tpproduct__thumb-img"
                                                                href="{{ route('product', $product->id) }}"><img
                                                                    src="{{ $product->img }}" alt="" height="220" width="100%"></a>
                                           <div class="tpproduct__shopping">
                                              <a class="tpproduct__shopping-wishlist" href="{{ route('cart') }}"><i class="icon-cart icons"></i></a>
                        
                                              <a class="tpproduct__shopping-cart" href="{{ route('product',$product->id) }}"><i class="icon-eye"></i></a>
                                           </div>
                                        </div>
                                        <div class="tpproduct__content">
                                       
                                           <h4 class="tpproduct__title">
                                              <a href="{{ route('product',$product->id) }}">{{ $product->name }}</a>
                                           </h4>
                                          
                                           <div class="tpproduct__price">
                                              <span>{{ number_format($product->price) }}</span>
                                              {{-- <del>$19.00</del> --}}
                                           </div>
                                        </div>
                                    
                                     </div>
                                  </div>
                                @endforeach
                                  
                           
                               </div>
                            </div>
                            <div class="tpproduct-btn">
                               <div class="tpprduct-arrow tpproduct-btn__prv"><a href="#"><i class="icon-chevron-left"></i></a></div>
                               <div class="tpprduct-arrow tpproduct-btn__nxt"><a href="#"><i class="icon-chevron-right"></i></a></div>
                            </div>
                         </div>
                      </div>


                      <div class="tab-pane fade" id="nav-meat" role="tabpanel" aria-labelledby="nav-meat-tab" tabindex="0">
                         <div class="tpproduct__arrow p-relative">
                            <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                               <div class="swiper-wrapper">
                                 
                           
                               </div>
                            </div>
                            <div class="tpproduct-btn">
                               <div class="tpprduct-arrow tpproduct-btn__prv"><a href="#"><i class="icon-chevron-left"></i></a></div>
                               <div class="tpprduct-arrow tpproduct-btn__nxt"><a href="#"><i class="icon-chevron-right"></i></a></div>
                            </div>
                         </div>
                      </div>





                  
                   </div>
                </div>
             </div>
          </div>
        
       </div>
    </section>
    <!-- product-area-end -->

    

    <!-- product-area-start -->
    <section class="product-area whight-product green-product-border pb-50">
       <div class="container">
          <div class="row">
             <div class="col-lg-12 text-center">
                <div class="tpsection mb-35">
                   <h4 class="text-danger"> International Products </h4>
                   <h4 class="tpsection__title text-danger">Find products outside your region</h4>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 col-lg-12">
                <div class="tpproduct__arrow double-product p-relative mb-30">
                   <div class="swiper-container tpproduct-active-5 tpslider-bottom p-relative">
                      <div class="swiper-wrapper">
                         
                         
                        @foreach($f_products as $product)
                         <div class="swiper-slide">
                            
                            <div class="tpproduct p-relative">
                               <div class="tpproduct__thumb p-relative text-center">

                                  <a href="{{ route('product',$product->id) }}"><img src="{{ $product->img }}" width="100%" alt="" height="200"></a>
                                  <a class="tpproduct__thumb-img" href="{{ route('product',$product->id) }}"><img src="{{ $product->img }}" width="100%" alt="" height="220"></a>
                                
                                  <div class="tpproduct__info bage">
                                     <span class="tpproduct__info-discount bage__discount">Foreign</span>
                                  </div>
                                  <div class="tpproduct__shopping">
                                     <a class="tpproduct__shopping-wishlist" href="{{ route('cart') }}"><i class="icon-heart cart"></i></a>
                                     <a class="tpproduct__shopping-cart" href="{{ route('product',$product->id) }}"><i class="icon-eye"></i></a>
                                  </div>
                               </div>
                               <div class="tpproduct__content">
                                  <span class="bg-danger text-white rounded-1 px-1">
                                      {{ $product->country }}
                                  </span>
                                  <h4 class="tpproduct__title">
                                     <a href="#">{{ $product->name }}</a>
                                  </h4>
                                 
                                  <div class="tpproduct__price">
                                     <span>₦ {{ number_format($product->price) }}</span>
                                  </div>
                               </div>
                             
                            </div>
                         </div>
                         @endforeach
                       
                      </div>
                   </div>
                </div>
             </div>
        
          </div>
       </div>
    </section>
    <!-- product-area-end -->
 </main>


@endsection