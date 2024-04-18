@section('css')
    <style>
        body {
            background: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important;
        }

        a {
            color: #5465ff;
            text-decoration: none;
        }

        .customT .border-bottom {
            border-bottom: 1px solid #41355569 !important;
        }
    </style>
@endsection


<x-layout>
    <div class="container-fluid">

        <div class="d-flex flex-column align-items-center my-3">
            @if (session('success'))
                <div class="alert alert-success text-center alert-dismissible fade show mb-1" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-warning text-center alert-dismissible fade show mb-1" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3 card my-4">
                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{ $order->id }}</h2>
            </div>
            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">Date placed: {{ $order->created_at }}</span>
                                </div>
                                <div class="d-flex">
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 text-muted" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('order.invoice', $order->id) }}"
                                                class="dropdown-item"><span
                                                    class="text"><i class="bi bi-receipt-cutoff mx-2"></i> Invoice</span></a>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $order->id }}" href="#"><i
                                                        class="bi bi-x-circle-fill mx-2"></i></i>
                                                    Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-light">
                                            <h5 class="modal-title " id="deleteModalLabel{{ $order->id }}">
                                                Confirm Cancellation
                                            </h5>
                                            <button type="button" class="btn-close btn-outline-light"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <div class="modal-body text-dark">
                                                Are you sure you want to cancel this order?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">Abort cancellation</button>
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
                            <table class="table table-striped customT">
                                <tbody class="border-bottom">
                                    @foreach ($order->products as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('storage/' . $item->imgUrl) }}"
                                                            alt="{{ $item->name }}" width="35" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class="small mb-0"><a href="#"
                                                                class="text-reset">{{ $item->name }}</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ $item->price }} x {{ $item->pivot->quantity }}</td>
                                            <td class="text-end">${{ $item->pivot->price }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td class="text-end">${{ $total }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td colspan="2">Shipping</td>
                                        <td class="text-end">free</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td colspan="2">TOTAL</td>
                                        <td class="text-end">${{ $total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Payment -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3 class="h6">Payment Method</h3>
                                    <p>{{ strtoupper($payment->payment_method) }} <br>
                                        Total: ${{ $payment->amount }}
                                        <span
                                            class="badge {{ $payment->status == 'pending' ? 'bg-warning' : ($payment->status == 'completed' ? 'bg-success' : 'bg-danger') }} rounded-pill">
                                            {{ strtoupper($payment->status) }}
                                        </span>
                                </div>
                                <div class="col-lg-4">
                                    <h3 class="h6">Billing address</h3>
                                    <address>
                                        <strong>{{ $billing->name }}</strong><br>
                                        {{ $billing->address }}<br>
                                        {{ $billing->city }}, {{ $billing->state }} {{ $billing->zip }}<br>
                                        <abbr title="Phone">P:</abbr> {{ $billing->phone }}
                                    </address>
                                </div>
                                <div class="col-lg-4">
                                    <h3 class="h6">Order Status</h3>
                                    <address>
                                        <span class="badge {{
                                            $order->status == 'pending' ? 'bg-warning' :
                                            ($order->status == 'completed' ? 'bg-success' :
                                            ($order->status == 'shipped' ? 'bg-info' :
                                            ($order->status == 'canceled' ? 'bg-danger' : 'bg-secondary')))
                                        }}" rounded-pill">
                                            {{ strtoupper($order->status) }}
                                        </span>
                                        
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6"><u>Notice</u></h3>
                            <p>All orders are eligble for cancelling until the package has been shipped. After shipping,
                                cancellations <strong>will not</strong> be excepted.</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 class="h6">Shipping Information</h3>
                            <strong>FedEx</strong>
                            <span><a href="#" class="text-decoration-underline"
                                    target="_blank">FF1234567890</a>
                                <i class="bi bi-box-arrow-up-right"></i> </span>
                            <hr>
                            <h3 class="h6">Address</h3>
                            <address>
                                <strong>{{ $billing->name }}</strong><br>
                                {{ $address->street }}<br>
                                {{ $address->city }}, {{ $address->state }} {{ $address->zip }}<br>
                                <abbr title="Phone">P:</abbr> {{ $billing->phone }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
