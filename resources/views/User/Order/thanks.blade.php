<x-layout>
    <main class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/Thank You!.png') }}" alt="Thank You" class="img-fluid"
                    style="max-width: 100%; height: auto;">
            </div>
            <div class="col-lg-6 text-center">
                <h1><i>Thank You for Your Choosing BloomBox!</i></h1>
                <p class="lead">Your transaction has been completed, and a receipt for your purchase has been emailed
                    to you.</p>
                <p>Click below, or visit your profile to view the details of this transaction and track your order.</p>
                <a href="{{ route('shop-all') }}" class="btn btn-primary">Continue Shopping</a>
                <a class="btn btn-outline-light mx-2" href="{{ route('order.list', auth()->user()->id) }}">View your Orders</a>
            </div>
        </div>
    </main>
</x-layout>
