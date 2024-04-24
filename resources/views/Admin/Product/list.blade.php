@section('css')
    <style>
        .page-link {
            color: #77536e !important;
        }

        .active>.page-link,
        .page-link.active {
            background-color: #77536e;
            border-color: #77536e;
            color: #faebc2 !important;
        }
    </style>
@endsection


<x-admin-layout>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success text-center alert-dismissible fade show mb-1 mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center alert-dismissible fade show mb-1 mt-5" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <img src="{{ asset('img/product.webp') }}" style="width: 300px; margin: 2rem auto; display: flex;"
            alt="">
        <h1 class="mb-5 text-center">All Products</h1>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-3">
                <div class="mb-3">
                    <h5 class="card-title">Products <span class="text-muted fw-normal ms-2">({{ $noProducts }})</span>
                    </h5>
                </div>
            </div>
            <div class="col-lg-5 d-flex justify-content-between">
                <form action="{{ route('product.list') }}" method="GET" class="mb-4">
                    <label for="search">Search:</label>
                    <input id="search" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search" name="search">
                </form>
                <form action="{{ route('product.list') }}" method="GET" class="mb-4">
                    <label for="order">Sort by:</label>
                    <select id="order" name="orderBy" class="form-select" onchange="this.form.submit()">
                        <option value="newest" {{ Request::input('orderBy') == 'newest' ? 'selected' : '' }}>Newest
                        </option>
                        <option value="highest_price"
                            {{ Request::input('orderBy') == 'highest_price' ? 'selected' : '' }}>Highest Price</option>
                        <option value="lowest_price"
                            {{ Request::input('orderBy') == 'lowest_price' ? 'selected' : '' }}>Lowest Price</option>
                    </select>
                </form>

                <div class="mt-4">
                    <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i>
                        Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table
                        class="table table-striped project-list-table table-nowrap align-middle table-borderless text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>#{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <div class="dropdown drop-custom">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="fs-5" style="">&vellip;</span>
                                            </button>
                                            <ul class="dropdown-menu text-primary"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item"
                                                        href=" {{ route('product.details', $product->id) }}">View
                                                        details</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('product.edit', $product->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $product->id }}"
                                                        href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-light">
                                                <h5 class="modal-title " id="deleteModalLabel{{ $product->id }}">
                                                    Confirm Deletion
                                                </h5>
                                                <button type="button" class="btn-close btn-outline-light"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Are you sure you want to delete this product?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('product.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0 align-items-center pb-4 my-5">
        <div class="col-sm-6 justify-content-center">
            <div class="float-sm-end">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @if ($products->onFirstPage())
                        @else
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $products->previousPageUrl() . '&orderBy=' . Request::input('orderBy') }}"
                                    rel="prev" aria-label="Previous">&laquo;</a>
                            </li>
                        @endif

                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ $url . '&orderBy=' . Request::input('orderBy') }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $products->nextPageUrl() . '&orderBy=' . Request::input('orderBy') }}"
                                    rel="next" aria-label="Next">&raquo;</a>
                            </li>
                        @else
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</x-admin-layout>
