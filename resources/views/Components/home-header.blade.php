<header class="bg-dark py-5 customHeader d-flex flex-column align-items-center">
    <p class="fw-bold col-lg-8 col-xl-7 col-xxl-6 text-center" style="color: #413555c2"><i>BloomBox Flower-Market, 1342
            Abbott Spring,
            Westport, Montana, 55413, United
            States </i></p>
    <div class="container  fade-up px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bold  mb-2">Welcome to BloomBox – Your Haven of Blossoming Beauty!</h1>
                    <p class="lead fw-normal text-50 mb-4">Step inside our cozy corner of floral delights, where the
                        fragrance of fresh blooms fills the air and the vibrant colors of nature greet you at every
                        turn. At BloomBox, we're not just a flower shop – we're a cherished part of your community,
                        dedicated to bringing beauty and joy to your doorstep.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        @if (!Auth::user())
                            <a class="btn btn-primary btn-lg px-4 me-sm-3 customBtn" href="{{ route('login') }}">Get
                                Started</a>
                        @endif
                        <a class="btn btn-outline-light btn-lg px-4 lrnM" href=" {{ route('about-us') }} ">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                <img class="img-fluid rounded-3 my-5 customHeaderimg" src="{{ asset('img/headerimg3-nobg.png') }}"
                    alt="BloomBox" />
            </div>
        </div>
    </div>
</header>
