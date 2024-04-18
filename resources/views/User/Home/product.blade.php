<x-layout>

    <section class="py-5 text-dark">
        @if (session('success'))
            <div class="container d-flex flex-column align-items-center">
                <div class="alert alert-success text-center alert-dismissible fade show mb-1 mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ asset('storage/' . $product->imgUrl) }}" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-3 d-flex align-items-center justify-content-between">
                        <h2 class="mt-3">${{ $product->price }}</h2>
                        <span
                            class="bg-primary text-light text-center py-1 px-3 rounded-3 customHover cursor-pointer">{{ $category->name }}</span>
                    </div>
                    <p class="lead">{{ $product->description }}</p>
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="d-flex">

                            <div class="d-flex align-items-center quantityBox">
                                <span class="fs-2 decrease-quantity"
                                    id="decrease-quantity-{{ $product->id }}">&#65293;</span>
                                <input class="text-center mx-3" id="inputQuantity-{{ $product->id }}" type="num"
                                    name="quantity" value="1" />
                                <span class="fs-3 increase-quantity"
                                    id="increase-quantity-{{ $product->id }}">&#65291;</span>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-4 mx-3" type="submit">
                                Add to basket
                                <i class="bi bi-basket"></i>
                            </button>
                        </div>
                    </form>
                    <p class="text-muted col-sm-12 my-2">
                        <i class="bi bi-check-circle-fill"></i>
                        Guaranteed timely delivery to your doorstep, ensuring your order arrives safely and securely.
                    </p>
                    <div class="row mt-3">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rown py-5 bg-light">
        <div class="px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4 text-center">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($relatedProducts as $product)
                    <div class="col-md-3 mb-5">
                        <div class="card customC h-100">
                            <img class="card-img-top" src="{{ asset('storage/' . $product->imgUrl) }}"
                                alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <p class="text-muted">{{ $product->description }}</p>
                                    <p>${{ $product->price }}</p>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent align-items-center">
                                <div class="text-center">
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <a class="btn btn-primary mt-auto mb-3"
                                            href="{{ route('product.show', $product->id) }}">View more</a>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input id="inputQuantity-{{ $product->id }}" type="num" name="quantity"
                                            value="1" hidden>
                                        <button type="submit" class="btn kartBtn">
                                            <i class="bi bi-basket"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No related products found.</p>
                @endforelse
            </div>

    </section>
</x-layout>
