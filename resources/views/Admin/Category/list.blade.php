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
        <img src="{{ asset('img/category.png') }}" style="width: 300px; margin: 2rem auto; display: flex;"
            alt="">
        <div class="row align-items-center">
            <h1 class="mb-5 text-center">All Categories</h1>
            <div class="col-lg-6">
                <div class="mb-3">
                    <h5 class="card-title">Categories <span
                            class="text-muted fw-normal ms-2">({{ $noCategories }})</span></h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <form action="{{ route('orders.list') }}" method="GET" class="col-lg-3">
                        <label for="search">Search:</label>
                        <input id="search" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search" name="search">
                    </form>
                    <div class="mt-4">
                        <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i>
                            Add New</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table
                        class="table text-center table-striped project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <th class="bg-primary text-light">ID</th>
                            <th class="bg-primary text-light">Name</th>
                            <th class="bg-primary text-light">Description</th>
                            <th class="bg-primary text-light">Options</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><strong>{{ $category->id }}</strong></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-primary m-2 rounded-2">Edit</a>
                                        <button class="btn btn-outline-light m-2 rounded-2" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $category->id }}">Delete</button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-light">
                                                <h5 class="modal-title " id="deleteModalLabel{{ $category->id }}">
                                                    Confirm Deletion</h5>
                                                <button type="button" class="btn-close btn-outline-light"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Are you sure you want to delete this category?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('category.destroy', $category->id) }}"
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
                        @if ($categories->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $categories->previousPageUrl() }}" rel="prev"
                                    aria-label="Previous">&laquo;</a>
                            </li>
                        @endif

                        @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            <li class="page-item {{ $categories->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($categories->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $categories->nextPageUrl() }}" rel="next"
                                    aria-label="Next">&raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</x-admin-layout>
