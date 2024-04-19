@section('css')
    <style>
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .orders .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border-radius: 10px;
            border: transparent;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important;
        }

        .wrapper {
            margin-bottom: 150px !important;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding-top: 30px;
            position: fixed;
            top: 0;
            bottom: 20px;
            overflow-y: auto;
            height: 400px
        }

        .sidebar .nav-item.active {
            background-color: #f02d3a;
            color: white;
        }

        .sidebar .nav-item.active a {
            color: white;
        }

        .order-card {
            border: 1px solid #dee2e6;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .order-status {
            font-weight: bold;
        }

        .completed {
            color: green;
        }

        .pending {
            color: orange;
        }

        .canceled {
            color: red;
        }

        .no-bullets {
            list-style-type: none;
            padding-top: 2rem;
            flex-wrap: wrap;
        }

        .no-bullets li:nth-child(-n+2):after {
            content: "•";
            padding: 0 1rem;
        }

        .no-bullets li:last-child:before {
            content: "•";
            padding: 0 1rem;
        }

        .c-header {
            border-bottom: 1px solid #41355548;
            align-items: center;
        }

        .details {
            justify-content: flex-end;
            padding-right: 2rem;
        }
    </style>
@endsection

<x-admin-layout>
    <div class="container project-info">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-md-5 text-dark">
                <h1 class="mb-5 mx-4">User Details</h1>
                <div class="project-info-box mt-0">
                    <h5>Notes: </h5>
                    <p class="mb-0">{{ $user->bio }}</p>
                </div>
                <div class="project-info-box">
                    <p><b class="px-3">ID:</b> #{{ $user->id }}</p>
                    <hr>
                    <p><b class="px-3">Name:</b>{{ $user->name }}</p>
                    <hr>
                    <p><b class="px-3">Price:</b>{{ $user->email }}</p>
                    <hr>
                    <p><b class="px-3">Role:</b>{{ $user->role }}</p>
                    <hr>
                    <p><b class="px-3">Created:</b>{{ $user->created_at }}</p>
                    <hr>
                    <p><b class="px-3">Last updated:</b>{{ $user->updated_at }}</p>

                </div>
            </div><!-- / column -->
            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                            <h5 class="modal-title " id="deleteModalLabel{{ $user->id }}">
                                Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close btn-outline-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            <div class="modal-body text-dark">
                                Are you sure you want to delete this user?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light"
                                    data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('storage/' . $user->imgUrl) }}" id="detailsImg"
                            class="rounded img img-fluid w-100">
                    </div>
                </div>
            </div>
            @if (auth()->user()->isAdmin())
                <div class="container d-flex justify-content-center mb-0 mt-5">
                    <p>
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-primary btn-facebook btn-circle btn-icon mr-5 mb-0">Edit</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}"
                            class="btn btn-danger btn-twitter btn-circle btn-icon mr-5 mb-0">Delete</i></a>
                    </p>
                </div>
            @endif
            <div class="mt-5 col-12 text-center">
                <h3><b>Orders</b></h3>
                @if ($orders->isNotEmpty())
                    @foreach ($orders as $item)
                        <div class="order-card card pt-0">
                            <div class="row c-header">
                                <ul class="status pt-3 d-flex no-bullets col-lg-8 col-12">
                                    <li class="">#{{ $item->id }}</li>
                                    <li class="">{{ $item->created_at }} </li>
                                    <li
                                        class="order-status 
                                        {{ $item->status == 'pending'
                                            ? 'text-warning'
                                            : ($item->status == 'processing'
                                                ? 'text-primary'
                                                : ($item->status == 'shipped'
                                                    ? 'text-info'
                                                    : ($item->status == 'delivered'
                                                        ? 'text-success'
                                                        : ($item->status == 'canceled'
                                                            ? 'text-danger'
                                                            : '')))) }}">
                                        {{ $item->status }}
                                    </li>
                                    <li class="">${{ $item->getTotalAmount() }}</li>
                                </ul>
                                <div class="details col-lg-4 col-12 d-flex">
                                    <a href="{{ route('order.details', $item->id) }}"
                                        class="text-dark text-decoration-none">View Details <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="row gap-1">
                                @foreach ($item->products as $product)
                                    <div class="col-lg-2 col-md-2">
                                        <img src="{{ asset('storage/' . $product->imgUrl) }}"
                                            alt="{{ $product->name }}" class="img-fluid py-3">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="mt-3 mx-3 text-dark">You don't have any orders yet!</h3>
                @endif
            </div>

        </div>
    </div>
</x-admin-layout>
