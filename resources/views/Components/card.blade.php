<div class="col-md-4 mb-5">
    <div class="card customC h-100">
        <img class="card-img-top" src="{{ $image }}" alt="..." />
        <div class="card-body p-4">
            <div class="text-center">
                <h5 class="fw-bolder">{{ $name }}</h5>
                <p class="text-muted">{{ $description }}</p>
                <p>${{ $price }}</p>
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent align-items-center">
            <div class="text-center">
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <a class="btn btn-primary mt-auto mb-3" href="{{ route('product.show', $id) }}">View more</a>
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    <input id="inputQuantity-{{ $id }}" type="num" name="quantity" value="1" hidden>
                    <button type="submit" class="btn kartBtn">
                        <i class="bi bi-basket"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
