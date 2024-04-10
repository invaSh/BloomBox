
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
        <img src="{{ asset('img/category.png') }}" style="width: 300px; margin: 2rem auto; display: flex;" alt="">
        <div class="row align-items-center">
            <h1 class="mb-5 text-center">All Categories</h1>
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Categories <span class="text-muted fw-normal ms-2">({{ $noCategories }})</span></h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <a href="{{ route('category.create') }}" class="btn btn-primary"><i
                                class="bx bx-plus me-1"></i> Add New</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table class="table text-center table-striped project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <th class="bg-primary text-light">#</th>
                            <th class="bg-primary text-light">ID</th>
                            <th class="bg-primary text-light">Name</th>
                            <th class="bg-primary text-light">Description</th>
                            <th class="bg-primary text-light">Options</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td class="fw-bold">{{ $loop->iteration }}</td>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary m-2 rounded-2">Edit</a>
                                    <button class="btn btn-outline-light m-2 rounded-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">Delete</button>
                                </td>
                            </tr>
                        
                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-light">
                                            <h5 class="modal-title " id="deleteModalLabel{{ $category->id }}">Confirm Deletion</h5>
                                            <button type="button" class="btn-close btn-outline-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            Are you sure you want to delete this category?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
    </div>

</x-admin-layout>
