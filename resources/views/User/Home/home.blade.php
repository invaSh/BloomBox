<x-layout>
    <section>
        <x-home-header></x-home-header>
    </section>

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder text-dark">Best Sellers</h2>
                        <p class="lead fw-normal text-muted mb-5">Handpicked Favorites: Discover Blooms Beloved by All
                        </p>
                    </div>
                </div>
            </div>

            <div class="row gx-5">
                @foreach($products as $product)
                <x-home-card :image="asset('storage/' . $product->imgUrl)" :name="$product->name" :description="$product->description" :id="$product->id"/>
                @endforeach
            </div>
            

            {{-- <div class="p-5 bg-light m-5">
                <div class="container">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 col-md-12">
                            <div class="text-center mb-8">
                                <h1 class="fw-bold text-dark mb-3">MOST RECENT REVIEWS
                                </h1>
                                <p class="text-muted">Our average call quality rating is 4.4 out of 5. That leads to
                                    happy
                                    reviews like these:</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <x-review-card>
                            
                        </x-review-card> 
                    </div>
                </div>
            </div> --}}


{{-- 
            <x-newsletter></x-newsletter> --}}
            
        </div>
    </section>


</x-layout>
