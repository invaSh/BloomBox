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

        .steps .step {
            display: block;
            width: 100%;
            margin-bottom: 35px;
            text-align: center
        }

        .steps .step .step-icon-wrap {
            display: block;
            position: relative;
            width: 100%;
            height: 80px;
            text-align: center
        }

        .steps .step .step-icon-wrap::before,
        .steps .step .step-icon-wrap::after {
            display: block;
            position: absolute;
            top: 50%;
            width: 50%;
            height: 3px;
            margin-top: -1px;
            background-color: #e1e7ec;
            content: '';
            z-index: 1
        }

        .steps .step .step-icon-wrap::before {
            left: 0
        }

        .steps .step .step-icon-wrap::after {
            right: 0
        }

        .steps .step .step-icon {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            border: 1px solid #e1e7ec;
            border-radius: 50%;
            background-color: #f5f5f5;
            color: #374250;
            font-size: 38px;
            line-height: 81px;
            z-index: 5
        }

        .steps .step .step-title {
            margin-top: 16px;
            margin-bottom: 0;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .steps .step:first-child .step-icon-wrap::before {
            display: none
        }

        .steps .step:last-child .step-icon-wrap::after {
            display: none
        }

        .steps .step.completed .step-icon-wrap::before,
        .steps .step.completed .step-icon-wrap::after {
            background-color: #413555
        }

        .steps .step.completed .step-icon {
            border-color: #413555;
            background-color: #413555;
            color: #fff
        }

        @media (max-width: 576px) {

            .flex-sm-nowrap .step .step-icon-wrap::before,
            .flex-sm-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 768px) {

            .flex-md-nowrap .step .step-icon-wrap::before,
            .flex-md-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 991px) {

            .flex-lg-nowrap .step .step-icon-wrap::before,
            .flex-lg-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 1200px) {

            .flex-xl-nowrap .step .step-icon-wrap::before,
            .flex-xl-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        .bg-faded,
        .bg-secondary {
            background-color: #f5f5f5 !important;
        }
    </style>
@endsection


<x-layout>
    <div class="container-fluid">

        <div class="d-flex flex-column align-items-center my-3">
            @if (session('success'))
                @if ($payment->payment_method === 'card')
                    <div class="alert alert-success text-center alert-dismissible fade show mb-1" role="alert">
                        {{ session('success') }} You will recieve your refund shortly.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    <div class="alert alert-success text-center alert-dismissible fade show mb-1" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                                                    class="dropdown-item"><span class="text"><i
                                                            class="bi bi-receipt-cutoff mx-2"></i> Invoice</span></a>
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
                                <tbody>
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
                                            class="badge {{ $payment->status == 'pending'
                                                ? 'bg-warning'
                                                : ($payment->status == 'completed'
                                                    ? 'bg-success'
                                                    : ($payment->status == 'refunded'
                                                        ? 'bg-info'
                                                        : 'bg-danger')) }} rounded-pill">
                                            {{ strtoupper($payment->status) }}
                                        </span>
                                    </p>
                                    @if ($order->status === 'canceled')
                                        @if ($payment->status === 'refunded')
                                            <p class="text-success">Your refund has been submitted.</p>
                                        @else
                                            <p class="text-danger">Your refund will be submitted shortly.</p>
                                        @endif
                                    @endif
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
                                        <span
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
                                cancellations <strong>will not</strong> be accepted.</p>
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

                <div class="card">
                    <input type="hidden" id="orderStatus" value="{{ $order->status }}">
                    <div class="p-4 text-center text-dark text-lg rounded-top"><span class="text-uppercase">Order
                            Tracker</span></div>
                    <div class="card-body">
                        <div
                            class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                            <div class="step step1 completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                                </div>
                                <h4 class="step-title">Confirmed Order</h4>
                            </div>
                            <div class="step step2">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                                </div>
                                <h4 class="step-title">Processing Order</h4>
                            </div>
                            <div class="step step3">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                                </div>
                                <h4 class="step-title">Product Dispatched</h4>
                            </div>
                            <div class="step step4">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="pe-7s-home"></i></div>
                                </div>
                                <h4 class="step-title">Product Delivered</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                @if ($order->status === 'pending')
                                    Your order has been confirmed!
                                @elseif($order->status === 'processing')
                                    Your order is being processed..
                                @elseif($order->status === 'shipped')
                                    Your order is on it's way!
                                @elseif($order->status === 'delivered')
                                    Yay! Your order has been delivered!
                                @else
                                    Your order was cancelled.
                                @endif
                            </div>

                        </div>
                    </div>
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

</x-layout>
