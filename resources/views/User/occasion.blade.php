<x-layout>

    <x-header>
        <x-slot name="image">img/headerimg2-nobg.png</x-slot>
        <x-slot name="subtitle">Expressing Sentiments: Thoughtfully Crafted Floral Arrangements for Every
            Occasion..</x-slot>
        <x-slot name="page">{{ $occasion->name }}</x-slot>
    </x-header>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @foreach ($products as $item)
                    <x-card>
                        <x-slot name="image">{{ asset('storage/' . $item->imgUrl) }}</x-slot>
                        <x-slot name="name">{{ $item->name }}</x-slot>
                        <x-slot name="description">{{ $item->description }}</x-slot>
                        <x-slot name="price">{{ $item->price }}</x-slot>
                        <x-slot name="id">{{ $item->id }}</x-slot>
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

</x-layout>
