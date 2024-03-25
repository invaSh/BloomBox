<x-layout>

    <x-header>
        <x-slot name="image">img/headerimg5-nobg .png</x-slot>
        <x-slot name="subtitle">Nurturing Nature: Discover the Tranquility of Indoor Greenery with Our Plant Collection</x-slot>
        <x-slot name="page">Plants</x-slot>
    </x-header>
    
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @foreach($allProducts as $product)
                    <x-card :image="$product->imageUrl" :name="$product->name" :description="$product->description" :price="$product->price"></x-card>
                @endforeach
            </div>
        </div>
    </section>

</x-layout>
