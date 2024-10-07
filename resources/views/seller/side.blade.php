<div class="tpshop__leftbar">
    <div class="tpshop__widget mb-30 pb-25">
        <h4 class="tpshop__widget-title">Navigation Menu</h4>


     <div class="py-3">

        <p> <a href="{{ route('myshop') }}" class="@if(Route::is('myshop')) text-success  @endif"><i class="icon-home"></i> {{ "Home" }} </a></p>
        <p> <a href="{{ route('newproduct') }}" class="@if(Route::is('newproduct')) text-success  @endif"><i class="icon-plus-circle"></i> {{ "Add Product" }} </a></p>
        <p> <a href="{{ route('allproducts') }}" class="@if(Route::is('allproducts')) text-success  @endif"><i class="icon-box"></i> {{ "Products" }} </a></p>
        <p> <a href="{{ route('sellerorders') }}" class="@if(Route::is('sellerorders')) text-success  @endif"><i class="icon-clock"></i> {{ "Pending Orders" }} </a></p>
        <p> <a href="{{ route('completedorders') }}" class="@if(Route::is('completedorders')) text-success  @endif"><i class="icon-check-circle"></i> {{ "Completed Orders" }} </a></p>
        <p> <a href="{{ route('selleraccount') }}" class="@if(Route::is('selleraccount')) text-success  @endif"><i class="icon-user"></i> {{ "Account" }} </a></p>
        <!-- <p>
            <form action="{{route('sellerlogout')}}" method="post">
                @csrf 
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </p> -->
        {{-- <p> <i class="icon-mail"></i> {{ $seller->email }}</p>
        <p> <i class="icon-phone"></i> {{ $seller->phone }}</p>
        <p> <i class="icon-flag"></i> {{ $seller->country ?? 'Country not set' }}</p>
        <p> <i class="icon-map"></i> {{ $seller->city ?? 'City not set' }}</p> --}}
    </div>
    </div>





</div>