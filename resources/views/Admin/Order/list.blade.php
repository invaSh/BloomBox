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
        <img src="{{ asset('img/orders.webp') }}" style="width: 300px; margin: 2rem auto; display: flex;"
            alt="">
        <div class="row align-items-center">
            <h1 class="mb-5 text-center">All Orders</h1>
            <div class="mb-3 row justify-content-between align-items-center">
                <h5 class="card-title col-lg-3">Orders <span
                        class="text-muted fw-normal ms-2">({{ $orders->count() }})</span>
                </h5>
                <form action="{{ route('orders.list') }}" method="GET" class="col-lg-3">
                    <label for="search">Search:</label>
                    <input id="search" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search" name="search">
                </form>
                <form action="{{ route('orders.list') }}" method="GET" class="col-lg-3">
                    <label for="order">Order by:</label>
                    <select id="order" name="orderBy" class="form-select">
                        <option value="" selected disabled>--Select order</option>
                        <option value="newest" {{ Request::input('orderBy') == 'newest' ? 'selected' : '' }}>Newest to
                            oldest</option>
                        <option value="oldest" {{ Request::input('orderBy') == 'oldest' ? 'selected' : '' }}>Oldest to
                            newest</option>
                    </select>
                    <input type="hidden" name="sortBy" value="{{ Request::input('sortBy') }}">
                </form>

                <form action="{{ route('orders.list') }}" method="GET" class="col-lg-3">
                    <label for="sort">Sort by status:</label>
                    <select id="sort" name="sortBy" class="form-select">
                        <option value="" selected disabled>--Select status</option>
                        <option value="all" {{ Request::input('sortBy') == 'all' ? 'selected' : '' }}>All</option>
                        <option value="pending" {{ Request::input('sortBy') == 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="processing" {{ Request::input('sortBy') == 'processing' ? 'selected' : '' }}>
                            Processing</option>
                        <option value="shipped" {{ Request::input('sortBy') == 'shipped' ? 'selected' : '' }}>Shipped
                        </option>
                        <option value="delivered" {{ Request::input('sortBy') == 'delivered' ? 'selected' : '' }}>
                            Delivered</option>
                    </select>
                    <input type="hidden" name="orderBy" value="{{ Request::input('orderBy') }}">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table
                        class="table table-striped project-list-table table-nowrap align-middle table-borderless text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Address ID</th>
                                <th scope="col">order ID</th>
                                <th scope="col">Date created</th>
                                <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }} </td>
                                    <td><span
                                            class="badge rounded-pill 
                                        {{ $order->status == 'pending'
                                            ? 'bg-warning'
                                            : ($order->status == 'processing'
                                                ? 'bg-secondary'
                                                : ($order->status == 'shipped'
                                                    ? 'bg-info'
                                                    : ($order->status == 'delivered'
                                                        ? 'bg-success'
                                                        : 'bg-danger'))) }}">
                                            {{ strtoupper($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->address_id }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <div class="dropdown drop-custom">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="fs-5" style="">&vellip;</span>
                                            </button>
                                            <ul class="dropdown-menu text-primary"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.details', $order->id) }}">View
                                                        details</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('order.edit', $order->id) }}">Edit</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
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
                        @if ($orders->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev"
                                    aria-label="Previous">&laquo;</a>
                            </li>
                        @endif

                        @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                            <li class="page-item {{ $orders->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ $url }}&orderBy={{ Request::input('orderBy') }}&sortBy={{ Request::input('sortBy') }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($orders->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $orders->nextPageUrl() }}" rel="next"
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

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search');
                const userTable = document.querySelector('.project-list-table');
                const tableRows = userTable.getElementsByTagName('tr');

                searchInput.addEventListener('keyup', function() {
                    const query = searchInput.value.trim().toLowerCase();

                    for (let i = 0; i < tableRows.length; i++) {
                        const row = tableRows[i];

                        let rowContainsQuery = false;

                        for (let j = 0; j < row.cells.length; j++) {
                            const cell = row.cells[j];
                            const cellContent = cell.textContent.trim().toLowerCase();

                            if (cellContent.includes(query)) {
                                rowContainsQuery = true;
                                break;
                            }
                        }

                        if (rowContainsQuery) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });
        </script>
    @endsection

</x-admin-layout>
