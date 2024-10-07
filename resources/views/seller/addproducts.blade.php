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
                                <span class="tp-breadcrumb__active"><a href="{{ route('myshop') }}">Home</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active"><a href="">{{ 'Add a Product' }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        @if ($seller->status == 'Pending')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="text-center card my-5">
                            <div class="card-body p-5">
                                <img src="{{ asset('assets/img/animate/wait.gif') }}" height="80px" alt="">
                                <h4 class="text-danger my-3">Your account have not been verified</h4>
                                <p>Accounts reveiw can take up to 24 hours after registration. Before you can start
                                    uploading your products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
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

                                <div class="tab-content " id="nav-tabContent">
                                    <div class="tab-pane fade show active bg-white  rounded-3" id="nav-popular"
                                        role="tabpanel" aria-labelledby="nav-popular-tab">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                <p class="text-success mb-0">{{ session('success') }}</p>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="tpproduct-details__nab p-5">
                                                    <h4 class="mb-3 fw-bold">Add Product</h4 class="mb-3">
                                                    <div class="tab-content" id="nav-tabContents">
                                                        <div class="tab-pane fade show active w-img" id="nav-home"
                                                            role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                            <img src="{{ asset('assets/img/animate/nopicture.webp') }}"
                                                                alt="" id="previewImage">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 bg-light py-3 px-5">
                                                <div class="product__details">

                                                    {{-- <h5 class="product__details-price">
                                                            {{ number_format($cart->product->price) }}</h5> --}}

                                                    <form action="{{ route('addproduct') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="text" name="seller_id"
                                                            value="{{ Auth::guard('sellers')->id() }}" hidden>
                                                        <input type="text" name="country"
                                                            value="{{ \App\Models\Seller::find(Auth::guard('sellers')->id())->country }}" hidden>
                                                        <div class="mb-2">
                                                            <label for="Name">Image</label>
                                                            <input type="file" class="form-control shadow-sm"
                                                                name="img" value="{{ old('img') }}" id="imgInp"
                                                                accept=".jpg,.png,.webp,.svg,.jpeg">
                                                            @error('img')
                                                                <p class="small text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="Name">Name</label>
                                                            <input type="text" class="form-control shadow-sm"
                                                                name="name" value="{{ old('name') }}">
                                                            @error('name')
                                                                <p class="small text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="Price">Price</label>
                                                            <input type="text" class="form-control shadow-sm"
                                                                name="price" value="{{ old('price') }}">
                                                            @error('price')
                                                                <p class="small text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="Price">Quantity</label>
                                                            <input type="text" class="form-control shadow-sm"
                                                                name="qty" value="{{ old('qty') }}">
                                                            @error('qty')
                                                                <p class="small text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>


                                                        <div class="mb-2">
                                                            <label for="Description">Description <span
                                                                    class="text-muted">(Optional)</span></label>
                                                            <textarea name="description" id="" class="form-control shadow-sm" placeholder="Description"> {{ old('description') }}</textarea>
                                                            @error('description')
                                                                <p class="small text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="Category">Category</label>
                                                            <select name="category_id" class="w-100 shadow-sm">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <p class="small text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-success mt-3 float-end">Add
                                                            Product</button>
                                                    </form>









                                                </div>
                                            </div>
                                        </div>





                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        @endif
      
        <!-- shop-details-area-end -->

        <!-- product-area-start -->

        <!-- product-area-end -->

        <!-- feature-area-end -->

    </main>
    <script>
        document.getElementById('imgInp').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImage').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
