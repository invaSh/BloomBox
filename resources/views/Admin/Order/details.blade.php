@section('css')
    <style>
        body {
            background-color: #eee;
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

        td,
        th,
        p,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #606975;
        }

        .hover {
            color: #606975;
            font-size: 16px
        }

        .hover:hover {
            color: #8665bd;
        }
    </style>
@endsection

<x-admin-layout>
    <div class="container mt-5">
        <div class="row mb-5">
            <h3 class="text-center">Order Details</h3>
        </div>
        <div class="row">
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
                                User's order has been confirmed.
                            @elseif($order->status === 'processing')
                                User's order is being processed..
                            @elseif($order->status === 'shipped')
                                User's order has been shipped.
                            @elseif($order->status === 'delivered')
                                User's order has been delivered.
                            @else
                                User's order has been cancelled.
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <h5 class="col-lg-6 bg-white text-center py-3">Order for user
                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                <a href="{{ route('order.invoice', $order->id) }}" class="dropdown-item mt-2 text-decoration-none">
                    <span class="text hover">
                        <i class="bi bi-receipt-cutoff mx-1"></i>
                        <u>Invoice</u>
                    </span>
                </a>
                <a class="dropdown-item" href="{{ route('order.edit', $order->id) }}">
                    <span class="hover">
                        <i class="bi bi-pencil-square mx-1"></i>
                        <u>Edit Order</u>
                    </span>
                </a>
                <a class="dropdown-item" href="{{ route('orders.list') }}">
                    <span class="hover">
                        <i class="bi bi-pencil-square mx-1"></i>
                        <u>Back to List</u>
                    </span>
                </a>
                @if ($payment->refunder)
                    <a class="dropdown-item mt-1">
                        @php
                            $refunder = \App\Models\User::find($payment->refunder);
                        @endphp
                        <span class="text-danger text-center hover">Employee {{ $refunder->name }} has issued a refund for
                            this order.</span>
                    </a>
                @endif
            </h5>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 d-flex">
                <div class="card flex-grow-1 border-0">
                    <div class="card-body ">
                        <h4 class="header-title mb-3">Items from Order #{{ $order->id }}</h4>
                        <div class="table-responsive ">
                            <table class="table mb-0 text-gray">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>$/piece</th>
                                        <th>$/Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->pivot->quantity }}</td>
                                            <td>${{ $item->price }}</td>
                                            <td>${{ $item->pivot->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Payment status: </td>
                                        <td>
                                            @if ($payment->payment_method === 'cash')
                                                <span
                                                    class="badge {{ $payment->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ strtoupper($payment->status) }}</span>
                                            @else
                                                <span
                                                    class="badge 
                                            {{ $payment->status == 'pending'
                                                ? 'bg-waring'
                                                : ($payment->status == 'completed'
                                                    ? 'bg-success'
                                                    : ($payment->status == 'refunded'
                                                        ? 'bg-info'
                                                        : ($payment->status == 'failed'
                                                            ? 'bg-danger'
                                                            : 'bg-secondary'))) }} rounded-pill">
                                                    {{ strtoupper($payment->status) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Order status: </td>
                                        <td>
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
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- end table-responsive -->

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Order Summary</h4>
                        <div class="table-responsive">
                            <table class="table table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sub Total :</td>
                                        <td>${{ $order->getTotalAmount() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge :</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax : </td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <th>Total :</th>
                                        <th>${{ $order->getTotalAmount() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row my-5">
            <div class="col-lg-4 d-flex">
                <div class="card border-0 flex-grow-1 d-flex flex-column">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Billing Information</h4>
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
                        <h4 class="header-title mb-3">Payment Information</h4>
                        @if ($card)
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <p class="mb-2"><span class="fw-bold me-2">Payment
                                            Type:</span>{{ strtoupper($payment->payment_method) }} ending in
                                        XXXX{{ substr($card->number, -4) }}</p>
                                    <p class="mb-2"><span class="fw-bold me-2">Expiration Date:</span>
                                        {{ $card->expiration_date }}</p>
                                    <p class="mb-2"><span class="fw-bold me-2">CVC:</span>XXX</p>
                                </li>
                            </ul>
                        @else
                            <p>Payment method: CASH</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex">
                <div class="card border-0 flex-grow-1 d-flex flex-column">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Shipping Information</h4>
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
