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
                        <h4 class="tpshop__widget-title">Categories</h4>
                        <div class="tab-content pb-3" id="nav-tabContent">
                            <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                aria-labelledby="nav-popular-tab">

                                <div class="row mb-5 py-3">
                                    <div class="col-md-5 col-lg-5">
                                        <form action="{{ route('addcategory') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="Category Name">Category Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('description') }}" placeholder="Category name">
                                                    @error('name')
                                                        <p class="text-danger small">{{ $message }}</p>
                                                    @enderror 
                                            </div>
                                            <div class="mb-3">
                                                <label for="Description">Description <span
                                                        class="text-muted">(Optional)</span></label>
                                                <textarea name="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror 
                                            </div>
                                            <div class="float-end">
                                                <button class="btn btn-success ">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-7 col-lg-7">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                          <tr>
                                                              <td>{{ $category->name }}</td>
                                                              <td>{{ $category->description }}</td>
                                                              <td class="d-flex">
                                                                  {{-- <form action="{{ route('deletecategory') }}" method="POST">
                                                                       @csrf 
                                                                       <input type="text" name="id" value="{{ $category->id }}" hidden>
                                                                       <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete {{ $category->name }}')"><i class="icon-trash"></i></button>
                                                                  </form> --}}
                                                                  {{-- <form action="" class="ms-1">
                                                                       @csrf 
                                                                       <input type="text" name="id" value="{{ $category->id }}" hidden>
                                                                       <button class="btn btn-sm btn-success"><i class="icon-edit"></i></button> --}}
                                                                       <a href="{{ route('editcategory',$category->id) }}" class="btn btn-sm btn-success"><i class="icon-edit"></i>  </a>
                                                                  </form>
                                                              </td>
                                                          </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
