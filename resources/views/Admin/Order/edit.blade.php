@section('css')
    <style>
        body {
            background-color: #eee;
        }

        .quantity-input {
            width: 60px;
            height: 40px;
            margin-left: 1rem;
            border: 2px solid #b7bdc9;
            font-size: 22px;
            text-align: center;
            border-radius: 10px;
        }

        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: inner-spin-button !important;
            opacity: 1 !important;
        }

        .text-dark:hover {
            color: #4135556e !important;
        }
    </style>
@endsection

<x-admin-layout>
    <div class="container mt-5">
        <div class="d-flex justify-content-center mb-5">
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
        </div>
        <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title " id="deleteModalLabel{{ $order->id }}">
                            Confirm Cancellation
                        </h5>
                        <button type="button" class="btn-close btn-outline-light" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="modal-body text-dark">
                            Are you sure you want to cancel this order?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Abort
                                cancellation</button>
                            <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Yes I am
                                    sure.</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mt-3">Order #{{ $order->id }}</h4>
                        <a class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $order->id }}" href="#"><i
                                class="bi bi-x-circle-fill mx-2"></i></i>
                            Cancel</a>
                    </div>
                    <form action="{{ route('order.update', $order->id) }}" method="post"
                        class="d-flex flex-column align-items-center">
                        @csrf
                        <ul class="list-group list-group-flush">
                            @foreach ($products as $item)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('storage/' . $item->imgUrl) }}" alt="Product"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-7">
                                            <h5 class="mb-1">{{ $item->name }}</h5>
                                            <p class="mb-1">{{ $item->description }}</p>
                                        </div>
                                        <div class="col-3 text-end">
                                            <p class="mb-1 fw-bold">${{ $item->pivot->price }}</p>
                                            <p class="mb-1 text-muted d-flex justify-content-end">
                                                <span class="d-flex align-items-center"> ${{ $item->price }} X</span>
                                                <input type="number" min="1"
                                                    name="quantities[{{ $item->id }}]"
                                                    value="{{ $item->pivot->quantity }}" class="quantity-input">
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-primary my-3">Update quantity</button>
                    </form>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <p>User notes: </p>
                            </div>
                            <div class="col-6 fw-bold pe-4 d-flex justify-content-end">
                                <div>
                                    <p>Subtotal: ${{ $order->getTotalAmount() }}</p>
                                    <p>Shipping: -</p>
                                    <p>Taxes: -</p>
                                    <hr>
                                    <p>Total: ${{ $order->getTotalAmount() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="card py-3 text-center">
                        <form action="{{ route('status.update', $order->id) }}" method="post">
                            @csrf
                            <h2 class="mb-3">Order Status</h2>
                            <select name="status" class="form-control" id="status">
                                <option value="canceled" disabled {{ $order->status == 'canceled' ? 'selected' : '' }}>
                                    Canceled</option>
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                    Processing</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped
                                </option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                    Delivered</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Change</button>
                        </form>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="card text-center py-3">
                        <form action="{{ route('payment.update', $payment->transaction_id) }}" method="POST">
                            @csrf
                            <h2 class="mb-3">Payment Status</h2>
                            <select name="status" class="form-control" id="status">
                                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                                <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>
                                    Failed
                                </option>
                                <option value="refunded" {{ $payment->status == 'refunded' ? 'selected' : '' }}>
                                    Refunded
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Change</button>
                        </form>
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <a href="{{ route('order.details', $order->id) }}" class="text-decoration-none"><h5 class="bg-white p-3 text-dark text-center">View order details</h5></a>
                </div>
                <div class="row mt-3">
                    <a href="{{ route('orders.list') }}"" class="text-decoration-none"><h5 class="bg-white p-3 text-dark text-center">Back to list</h5></a>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-4 d-flex">
                <div class="card border-0 flex-grow-1 d-flex flex-column">
                    <div class="card-body">
                        <h4 class="header-title mb-3 d-flex justify-content-between">
                            Billing Information
                            <a href="#" class="text-dark" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $billing->id }}" data-edit-type="billing">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </h4>
                        <h5>{{ $billing->name }}</h5>
                        <address class="mb-0 font-14 address-lg">
                            {{ $billing->address }}<br>
                            {{ $billing->city }}, {{ $billing->state }} {{ $billing->zip }}<br>
                            <abbr title="Email">E:</abbr> {{ $billing->email }} <br />
                            <abbr title="Phone">P:</abbr> {{ $billing->phone }}
                        </address>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex">
                <div class="card border-0 flex-grow-1 d-flex flex-column">
                    <div class="card-body">
                        <h4 class="header-title mb-3 d-flex justify-content-between">
                            Shipping Information
                            <a href="#" class="text-dark" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $address->id }}" data-edit-type="shipping">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </h4>
                        <address class="mb-0 font-14 address-lg">
                            <p><strong>{{ $address->street }}</strong></p><br>
                            {{ $address->city }}, <br>
                            {{ $address->state }} {{ $address->zip }}<br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal{{ $address->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between bg-primary text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close btn-outline-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAddressForm" method="POST" action="{{ route('address.update', $address->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="streetInput" class="form-label">Street:</label>
                            <input type="text" class="form-control" id="streetInput" name="street"
                                value="{{ $address->street }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="cityInput" class="form-label">City:</label>
                            <input type="text" class="form-control" id="cityInput" name="city"
                                value="{{ $address->city }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stateInput" class="form-label">State:</label>
                            <input type="text" class="form-control" id="stateInput" name="state"
                                value="{{ $address->state }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="zipInput" class="form-label">ZIP Code:</label>
                            <input type="text" class="form-control" id="zipInput" name="zip"
                                value="{{ $address->zip }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal{{ $billing->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between bg-primary text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close btn-outline-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAddressForm" method="POST" action="{{ route('billing.update', $billing->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="streetInput" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="streetInput" name="name"
                                value="{{ $billing->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="streetInput" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="streetInput" name="email"
                                value="{{ $billing->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="streetInput" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="streetInput" name="address"
                                value="{{ $billing->address }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="cityInput" class="form-label">City:</label>
                            <input type="text" class="form-control" id="cityInput" name="city"
                                value="{{ $billing->city }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stateInput" class="form-label">State:</label>
                            <input type="text" class="form-control" id="stateInput" name="state"
                                value="{{ $billing->state }}" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const status = document.getElementById('orderStatus').value;
                //.steps .step.completed .step-icon-wrap::before
                if (status === 'processing') {
                    document.querySelector('.step2').classList.add('completed');
                } else if (status === 'shipped') {
                    document.querySelector('.step2').classList.add('completed');
                    document.querySelector('.step3').classList.add('completed');
                } else if (status === 'delivered') {
                    document.querySelector('.step2').classList.add('completed');
                    document.querySelector('.step3').classList.add('completed');
                    document.querySelector('.step4').classList.add('completed');
                } else if (status === 'canceled') {
                    document.querySelector('.step1').classList.remove('completed');
                }

            })
        </script>
    @endsection
</x-admin-layout>
