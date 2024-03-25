<div class="col-lg-4 mb-5">
    <div class="card text-dark h-100 shadow border-0 customC">
        <img class="card-img-top" src="{{ $image }}" alt="..." />
        <div class="card-body p-4">
            <a class="text-decoration-none link-dark stretched-link" href="#!">
                <h5 class="card-title mb-3">{{$name}}</h5>
            </a>
            <p class="card-text mb-0">{{$description}}</p>
            <p class="fs-5 fw-bold mt-3">${{$price}}</p>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent align-items-center">
            <div class="text-center">
                <a class="btn btn-primary mt-auto mb-3" href="#">View more</a>
                <a href="#" class="btn kartBtn">
                    <i class="bi bi-basket"></i>
                </a>
                <a href="#" class="btn kartBtn">
                    <i class="bi bi-suit-heart"></i>
                </a>
            </div>
        </div>
    </div>
</div>
