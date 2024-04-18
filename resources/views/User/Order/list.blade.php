@section('css')
    <style>
        body {
            background: #eee;
        }

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

<x-layout>
    <main class="container wrapper my-5">
        <div class="row orders">
            <x-sidebar/>
            <div class="col-md-9 col-lg-10">
                <div class="card p-3 rounded-2 mb-3">
                    <h2>Orders</h2>
                </div>
                @if ($orders->isNotEmpty())
                    @foreach ($orders as $item)
                        <div class="order-card card pt-0">
                            <div class="row c-header">
                                <ul class="status pt-3 d-flex no-bullets col-lg-8 col-12">
                                    <li class="">#{{ $item->id }}</li>
                                    <li class="">{{ $item->created_at }} </li>
                                    <li
                                        class="order-status {{ $item->status == 'pending' || $item->status == 'processing' || $item->status == 'shipped' ? 'pending' : ($item->status == 'delivered' ? 'completed' : ($item->status == 'canceled' ? 'canceled' : '')) }}">
                                        {{ $item->status }}</li>
                                    <li class="">${{ $orderTotals[$item->id] }}</li>
                                </ul>
                                <div class="details col-lg-4 col-12 d-flex">
                                    <a href="{{ route('order.show', $item->id) }}" class="text-dark text-decoration-none">View Details <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="row gap-1">
                                @foreach ($item->products as $product)
                                    <div class="col-lg-2 col-md-2">
                                        <img src="{{ asset('storage/' . $product->imgUrl) }}" alt="{{ $product->name }}"
                                            class="img-fluid py-3">
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
    </main>
</x-layout>
