<x-layout>

    <x-header>
        <x-slot name="image">img/headerimg4-nobg.png</x-slot>
        <x-slot name="subtitle">Expressing Sentiments: A Floral Collection for Every Milestone and Moment</x-slot>
        <x-slot name="page">Shop All</x-slot>
    </x-header>

    <div class="d-flex justify-content-center">
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

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row my-5 justify-content-end">
                <form action="{{ route('shop-all') }}" method="GET" class="col-md-4">
                    <label for="sort">Order by:</label>
                    <select id="sort" name="orderBy" class="form-select">
                        <option value="newest" {{ Request::input('orderBy') == 'newest' ? 'selected' : '' }}>Newest
                        </option>
                        <option value="highest_price"
                            {{ Request::input('orderBy') == 'highest_price' ? 'selected' : '' }}>Highest Price
                        </option>
                        <option value="lowest_price"
                            {{ Request::input('orderBy') == 'lowest_price' ? 'selected' : '' }}>Lowest Price
                        </option>
                        <option value="best_selling"
                            {{ Request::input('orderBy') == 'best_selling' ? 'selected' : '' }}>Best Selling
                        </option>
                    </select>
                </form>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @foreach ($allProducts as $product)
                    <x-card :image="asset('storage/' . $product->imgUrl)" :name="$product->name" :description="$product->description" :price="$product->price" :id="$product->id">
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('sort').addEventListener('change', function() {
                    this.form.submit();
                });
            });
        </script>
    @endsection
</x-layout>
