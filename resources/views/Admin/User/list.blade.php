@section('css')
    <style>
        #icon {
            height: 80px;
            width: auto;
            object-fit: contain;
            border-radius: 50%;
        }

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
        <img src="{{ asset('img/user.webp') }}" style="width: 300px; margin: 2rem auto; display: flex;" alt="">
        <div class="row align-items-center">
            <h1 class="mb-5 text-center">All Users</h1>
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Users <span class="text-muted fw-normal ms-2">({{ $noUsers }})</span>
                    </h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-2">
                    <form action="{{ route('users.list') }}" method="GET" class="mb-4">
                        <label for="search">Search:</label>
                        <input id="search" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search" name="search">
                    </form>
                    <form action="{{ route('users.list') }}" method="GET" class="mb-4">
                        <label for="order">Sort by:</label>
                        <select id="order" name="orderBy" class="form-select" onchange="this.form.submit()">
                            <option value="" selected disabled>--Select role</option>
                            <option value="all" {{ Request::input('orderBy') == 'highest_price' ? 'selected' : '' }}>
                                All users
                            </option>
                            <option value="admin" {{ Request::input('orderBy') == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="employee" {{ Request::input('orderBy') == 'employee' ? 'selected' : '' }}>
                                Employee
                            </option>
                            <option value="user" {{ Request::input('orderBy') == 'user' ? 'selected' : '' }}>User
                            </option>
                        </select>
                    </form>
                    <div>
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i
                                    class="bx bx-plus me-1"></i>
                                Add New</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table
                        class="table table-striped project-list-table table-nowrap align-middle table-borderless text-center">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created</th>
                                <th scope="col">Options</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td><img src="{{ asset('storage/product-img/' . $user->imgUrl) }}" id="icon"
                                            alt=""></td>
                                    <td><strong>#{{ $user->id }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <div class="dropdown drop-custom">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="fs-5" style="">&vellip;</span>
                                            </button>
                                            <ul class="dropdown-menu text-primary"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('users.show', $user->id) }}">View details</a>
                                                </li>
                                                @if (auth()->user()->isAdmin())
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('users.edit', $user->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $user->id }}"
                                                            href="#">Delete</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-light">
                                                <h5 class="modal-title " id="deleteModalLabel{{ $user->id }}">
                                                    Confirm Deletion
                                                </h5>
                                                <button type="button" class="btn-close btn-outline-light"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                <div class="modal-body text-dark">
                                                    Are you sure you want to delete this user?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-light"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
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
                        @if ($users->onFirstPage())
                        @else
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $users->previousPageUrl() . '&orderBy=' . Request::input('orderBy') }}"
                                    rel="prev" aria-label="Previous">&laquo;</a>
                            </li>
                        @endif

                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            <li class="page-item {{ $users->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ $url . '&orderBy=' . Request::input('orderBy') }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $users->nextPageUrl() . '&orderBy=' . Request::input('orderBy') }}"
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
