<div class="tpshop__leftbar">
    <div class="tpshop__widget mb-30 pb-25">
        <h4 class="tpshop__widget-title">Dashboard</h4>
            <div class="py-3">

                <p> <a href="{{ route('admindashboard') }}" class="@if(Route::is('admindashboard')) text-success  @endif"><i class="icon-home"></i> {{ "Home" }} </a></p>
                <p> <a href="{{ route('pendingsellers') }}" class="@if(Route::is('pendingsellers')) text-success  @endif"><i class="icon-users"></i> {{ "Pending Sellers" }} </a></p>
                <p> <a href="{{ route('verifiedsellers') }}" class="@if(Route::is('verifiedsellers')) text-success  @endif"><i class="icon-user-check"></i> {{ "Approved Sellers" }} </a></p>
                <p> <a href="{{ route('categories') }}" class="@if(Route::is('categories')) text-success  @endif"><i class="icon-box"></i> {{ "Categories" }} </a></p>
            </div>
    </div>
</div>