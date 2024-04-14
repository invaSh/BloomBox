<x-layout>
    @if (session('success'))
        <div class="container d-flex flex-column align-items-center">
            <div class="alert alert-success text-center alert-dismissible fade show mb-1 mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2 customBorder">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h3 class="fw-bold mb-0 text-black">Shopping Cart</h3>
                                            <h6 class="mb-0 text-muted">
                                                @php
                                                    $itemsC = 0;
                                                    foreach ($products as $item) {
                                                        $itemsC += $item->pivot->quantity;
                                                    }
                                                @endphp
                                                {{ $itemsC }} items
                                            </h6>
                                        </div>
                                        <hr class="my-4">

                                        @if ($products->isNotEmpty())
                                            @foreach ($products as $item)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="{{ asset('storage/' . $item->imgUrl) }}"
                                                            class="img-fluid rounded-3" alt="">
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        {{ $item->name }}
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        Price per one: {{ $item->price }}
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <div class="d-flex align-items-center quantityBox"
                                                            style="border: transparent" data-price="{{ $item->price }}"
                                                            id="price-{{ $item->id }}">
                                                            <span class="fs-2 decrease-quantity"
                                                                id="decrease-quantity-{{ $item->id }}">&#65293;</span>
                                                            <input class="text-center mx-3"
                                                                id="inputQuantity-{{ $item->id }}" type="num"
                                                                name="quantity" value="{{ $item->pivot->quantity }}" />
                                                            <span class="fs-3 increase-quantity"
                                                                id="increase-quantity-{{ $item->id }}">&#65291;</span>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('cart.destroy', $item->id) }}"
                                                        method="post"
                                                        class="col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center">
                                                        @csrf
                                                        <button type="submit"
                                                            class="p-2 btn btn-outline-light text-center rounded-5"
                                                            style="text-decoration: none;">Remove<i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        @else
                                            <h1 class="text-center text-muted">Shopping cart empty!</h2>
                                                <hr class="my-4">
                                        @endif
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="#" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-primary text-light gradient-custom-2 text-center">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Subtotal:</h5>
                                            <h5 id="product-totals">${{ $productTotal }}</h5>
                                            </h5>
                                        </div>
                                        @if ($products->isNotEmpty())
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-outline-light btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Proceed to checkout</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
