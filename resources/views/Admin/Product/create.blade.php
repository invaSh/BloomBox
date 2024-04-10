<x-admin-layout>
    @if (session('error'))
        <div class="alert alert-danger my-3 text-center alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row container-custom">
        <div class="container d-flex flex-column align-items-center">
            <form method="POST" id="productCreate" action=" {{ route('product.store') }} "
                class="productCreate  d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <img src="{{ asset('img/form3.png') }}" id="productCreateImg" class="img-fluid" alt="">
                <fieldset class="pb-5 pt-3 mb-4 text-center">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product name: </label>
                                <input type="text" class="form-control custom-form-input" name="name"
                                    id="name" placeholder="Type name...." style="font-size: 16px"
                                    value="{{ old('name', session('productInput.name')) }}">

                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="description">Product description: </label>
                                <textarea name="description" class="form-control custom-form-input" id="description" cols="30" rows="4"
                                    placeholder="Type description..." style="resize: none; font-size: 16px">{{ old('description', session('productInput.description')) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product price: </label>
                                <input type="text" class="form-control custom-form-input" name="price"
                                    id="price" placeholder="Type price...." style="font-size: 16px"
                                    value="{{ old('price', session('productInput.price')) }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product quantity: </label>
                                <input type="text" class="form-control custom-form-input" name="quantity"
                                    id="quantity" placeholder="Type quantity...." style="font-size: 16px"
                                    value="{{ old('quantity', session('productInput.quantity')) }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3  text-center">
                            <div class="form-group">
                                <label class="label" for="imgUrl">Product image:</label>
                                <input type="file" class="form-control-file" id="imgUrl" name="imgUrl"
                                    value="{{ old('imgUrl') }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Product category: </label>
                                <select name="category" id="" class="form-control custom-form-input">
                                    <option value="" selected disabled>--Choose a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
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
                                        <option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-5 addProductBtn">
                            <div class="form-group" id="form-group-custom">
                                <button type="submit" class="btn btn-primary custom-form-submit">Add
                                    product</button>
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</x-admin-layout>
