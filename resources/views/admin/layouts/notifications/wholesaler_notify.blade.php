@auth
@if (Auth::user()->hasRole('Wholesaler'))
<div class="slimscroll notification-list">
    <!-- item-->
        @if ($wholesalerpo->count() > 0)
        @foreach ($wholesalerpo as $po)
        <a href="{{route('retailer.purchaselist')}}" class="dropdown-item notify-item active">
            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
            <p class="notify-details"> Raised Purchase Order
            <small class="text-muted">{{$po->status}}</small></p>
        </a>
        @endforeach
        @endif

</div>
@endif
@endauth