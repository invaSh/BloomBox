<div class="col-lg-4  fade-up mb-5">
    <div class="card text-dark h-100 shadow border-0 customHover">
        <img class="card-img-top" src="{{$image}}" alt="..." />
        <div class="card-body p-4">
            <a class="text-decoration-none link-dark stretched-link" href="{{ route('product.show', $id) }}">
                <h5 class="card-title mb-3">{{$name}}</h5>
            </a>
            <p class="card-text mb-0">{{$description}}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('product.show', $id) }}" class="text-dark">Read more</a>
        </div>
    </div>
</div>