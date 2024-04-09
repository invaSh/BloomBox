<x-admin-layout>
    <div class="container project-info">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-md-5 text-dark">
                <div class="project-info-box mt-0">
                    <h5>Product description: </h5>
                    <p class="mb-0">{{ $product->description }}</p>
                </div>

                <div class="project-info-box">
                    <p><b class="px-3">ID:</b> {{ $product->id }}</p>
                    <hr>
                    <p><b class="px-3">Name:</b>{{ $product->name }}</p>
                    <hr>
                    <p><b class="px-3">Price:</b>{{ $product->price }}</p>
                    <hr>
                    <p><b class="px-3">Quantity:</b> {{ $product->quantity }}</p>
                    <hr>
                    <p><b class="px-3">Category:</b>{{ $category->name }}</p>
                    <hr>
                    <p><b class="px-3">Occasions:</b>
                        @foreach ($selectedOccasions as $occasion)
                            <span
                                class="btn btn-outline-light text-dark p-1 px-2 rounded-3">{{ $occasion->name }}</span>
                        @endforeach
                    </p>

                </div>


            </div><!-- / column -->
            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                            <h5 class="modal-title " id="deleteModalLabel{{ $product->id }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close btn-outline-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            Are you sure you want to delete this product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('storage/' . $product->imgUrl) }}" id="detailsImg"
                            class="rounded img img-fluid w-100">
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center mb-0 mt-5">
                <p>
                    <a href="{{ route('product.edit', $product->id) }}"
                        class="btn btn-primary btn-facebook btn-circle btn-icon mr-5 mb-0">Edit</a>
                    <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" href="#"
                        class="btn btn-danger btn-twitter btn-circle btn-icon mr-5 mb-0">Delete</i></a>
                </p>
            </div>
            <div class="project-info-box col-12 text-center">
                <p><b>Reviews:</b></p>
                <hr>
                <div class="container">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio voluptate cum cumque voluptatum.
                        Illo nisi eveniet aliquam itaque minus amet? Maiores amet hic dolorum nisi provident? Nam dolor
                        eveniet quasi.
                </div>
                <hr>
                <div class="container">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio voluptate cum cumque voluptatum.
                        Illo nisi eveniet aliquam itaque minus amet? Maiores amet hic dolorum nisi provident? Nam dolor
                        eveniet quasi.
                </div>
                <hr>
                <div class="container">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio voluptate cum cumque voluptatum.
                        Illo nisi eveniet aliquam itaque minus amet? Maiores amet hic dolorum nisi provident? Nam dolor
                        eveniet quasi.
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
