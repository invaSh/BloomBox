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
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Orders <span
                            class="text-muted fw-normal ms-2">({{ $orders->count() }})</span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table
                        class="table table-striped project-list-table table-nowrap align-middle table-borderless text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
                                    <td>{{ $loop->iteration }} </td>
                                    <td>#{{ $order->id }} </td>
                                    <td><span class="badge rounded-pill 
                                        {{ 
                                            $order->status == 'pending' ? 'bg-warning' :
                                                ($order->status == 'processing' ? 'bg-secondary' :
                                                ($order->status == 'shipped' ? 'bg-info' :
                                                ($order->status == 'delivered' ? 'bg-success' : 'bg-danger')))
                                        }}">
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
                                                        href="{{ route('order.details', $order->id) }}">View details</a>
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
    {{-- <div class="row g-0 align-items-center pb-4">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-end">
                <ul class="pagination mb-sm-0">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    </div>

</x-admin-layout>
