@section('css')
    <style>
        body {
            background: #eee;
        }

        .invoice {
            padding: 30px;
        }

        .invoice h2 {
            margin-top: 0px;
            line-height: 0.8em;
        }

        .invoice .small {
            font-weight: 300;
        }

        .invoice hr {
            margin-top: 10px;
            border-color: #ddd;
        }

        .invoice .table tr.line {
            border-bottom: 1px solid #ccc;
        }

        .invoice .table td {
            border: none;
        }

        .invoice .identity {
            margin-top: 10px;
            font-size: 1.1em;
            font-weight: 300;
        }

        .invoice .identity strong {
            font-weight: 600;
        }


        .grid {
            position: relative;
            width: 100%;
            background: #fff;
            color: #666666;
            border-radius: 2px;
            margin-bottom: 25px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

<x-layout>
    <div class="container mt-5">
        <div class="row">
            <!-- BEGIN INVOICE -->
            <div class="col-12">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">

                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>invoice<br>
                                        <span class="small">order #{{ $order->id }}</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{ $billing->name }}<br>
                                    {{ $billing->address }}<br>
                                    {{ $billing->city }}, {{ $billing->state }} {{ $billing->zip }}<br>
                                    <abbr title="Phone">P:</abbr> {{ $billing->phone }}
                                </address>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <address>
                                    <strong>Payment To:</strong><br>
                                    BloomBox FlowerMarket LLC.<br>
                                    1342 Abbott Spring,<br>
                                    Westport, Montana 55413<br>
                                    <abbr title="Phone">P:</abbr> (123) 345-6789
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    @if ($payment->payment_method == 'cash')
                                        {{ strtoupper($payment->payment_method) }}<br>
                                    @else
                                      {{ strtoupper($payment->payment_method) }} ending in XXXX{{ substr($card->number, -4) }} <br>
                                    @endif
                                    {{ $billing->email }}<br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex">
                                <address>
                                    <strong>Shipping To:</strong><br>
                                    {{ $address->street }},<br>
                                    {{ $address->city }}, {{ $address->state }} {{ $address->zip }}<br>
                                    <abbr title="Phone">P:</abbr> {{ $billing->phone }}
                                </address>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <h3>ORDER SUMMARY</h3>
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ $order->created_at->format('m/d/Y') }}
                                    </address>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="line">
                                            <td><strong>#</strong></td>
                                            <td><strong>Product</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-center"><strong>Price per piece</strong></td>
                                            <td><strong>SUM</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $item->name }}</strong></td>
                                                <td class="text-center">{{ $item->pivot->quantity }}</td>
                                                <td class="text-center">${{ $item->price }}</td>
                                                <td>${{ $item->pivot->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong></strong></td>
                                            <td class="text-right"><strong></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Taxes</strong></td>
                                            <td class="text-right"><strong>N/A</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Shipping</strong></td>
                                            <td class="text-right"><strong>-</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Total</strong></td>
                                            <td class="text-right"><strong>${{ $total }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right identity">
                                <span>* This invoice is a legally binding document under the laws of the State of
                                    Montana,
                                    USA. Any services rendered include the warranties specified in our Service
                                    Agreement.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
    </div>
</x-layout>
