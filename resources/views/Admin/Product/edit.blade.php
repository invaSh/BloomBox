<x-admin-layout>
    @if (session('error'))
        <div class="alert alert-danger text-center alert-dismissible fade show mb-1 mt-5" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-3 mb-5 customForm">
        <div class="row">
            <form method="POST" id="productCreate" action=" {{ route('product.update', $product->id) }}"
                class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                <img src="{{ asset('img/banner.jpg') }}" class="img img-fluid" id="productListImg" style="height: 300px"
                    alt="">
                <h1 class="text-center text-dark mt-1">Edit Product</h1>
                @csrf
                <fieldset class="pb-5 pt-3 mb-4 text-center">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product name: </label>
                                <input type="text" class="form-control custom-form-input" name="name"
                                    id="name" placeholder="Type name...." style="font-size: 16px"
                                    value="{{ $product->name }}">

                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="description">Product description: </label>
                                <textarea name="description" class="form-control custom-form-input" id="description" cols="30" rows="4"
                                    placeholder="Type description..." style="resize: none; font-size: 16px">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product price: </label>
                                <input type="text" class="form-control custom-form-input" name="price"
                                    id="price" placeholder="Type price...." style="font-size: 16px"
                                    value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product quantity: </label>
                                <input type="text" class="form-control custom-form-input" name="quantity"
                                    id="quantity" placeholder="Type quantity...." style="font-size: 16px"
                                    value="{{ $product->quantity }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 text-center">
                            <div class="form-group">
                                <label class="label" for="imgUrl">Current image:</label>
                                @if ($product->imgUrl)
                                    <img src="{{ asset('storage/' . $product->imgUrl) }}" alt="Current Image"
                                        style="max-width: 100px; max-height: 100px;">
                                @endif
                                <input type="file" class="form-control-file mx-3" id="imgUrl" name="imgUrl">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product category: </label>
                                <select name="category" id="" class="form-control custom-form-input">
                                    <option value="" selected disabled>--Choose a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product occasions: </label>
                                <select name="occasion[]" id="" class="form-control custom-form-input"
                                    multiple>
                                    <option value="" selected disabled>--Choose an occasion</option>
                                    @foreach ($occasions as $occasion)
                                        <option value="{{ $occasion->id }}"
                                            {{ $product->productOccasions && $product->productOccasions->contains('id', $occasion->id) ? 'selected' : '' }}>
                                            {{ $occasion->name }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center addProductBtn">
                            <div class="form-group" id="form-group-custom">
                                <button type="submit" value="" class="btn btn-primary">Update</button>
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</x-admin-layout>
