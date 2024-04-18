<div class="col-md-3 col-lg-2 d-none d-md-block sidebar card">
    <div class="card-header mb-2">
        <h5>Hi there {{ auth()->user()->name }}!</h5>
        <h6>Thank you for choosing BloomBox!</h6>
    </div>
    <div class="list-group">
        <a href="{{ route('order.list', auth()->user()->id) }}" class="list-group-item list-group-item-action {{ request()->routeIs('order.list') ? 'active' : '' }}">Orders</a>
        <a href="" class="list-group-item list-group-item-action">Personal Information</a>
        <a href="{{ route('address.list', auth()->user()->id) }}" class="list-group-item list-group-item-action {{ request()->routeIs('address.list') ? 'active' : '' }}">Addresses</a>
        <a href="{{ route('billing.list', auth()->user()->id) }}" class="list-group-item list-group-item-action">Billing</a>
        <a href="{{ route('card.list', auth()->user()->id) }}" class="list-group-item list-group-item-action {{ request()->routeIs('card.list') ? 'active' : '' }}">Cards</a>
    </div>
</div>