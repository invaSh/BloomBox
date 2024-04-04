<x-admin-layout>
    <div class="container d-flex flex-column align-items-center">
        <div class="row container-custom">
            <form method="POST" id="productCreate" class="productCreate  d-flex flex-column align-items-center">
                @csrf
                <img src="{{asset('img/form3.png')}}" id="productCreateImg" class="img-fluid" alt="">
                <fieldset class="pb-5 pt-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control custom-form-input" name="name"
                                id="name" placeholder="Type name...." style="font-size: 16px">
                                <label class="label" for="name">Product name: </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <textarea name="description" class="form-control custom-form-input" id="description" cols="30" rows="4"
                                placeholder="Type description..." style="resize: none; font-size: 16px"></textarea>
                                <label class="label" for="description">Product description: </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control custom-form-input" name="price"
                                id="price" placeholder="Type price...." style="font-size: 16px">
                                <label class="label" for="name">Product price: </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control custom-form-input" name="quantity"
                                id="quantity" placeholder="Type quantity...." style="font-size: 16px">
                                <label class="label" for="name">Product quantity: </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <select name="category" id="" class="form-control custom-form-input">
                                    <option value="" selected disabled>--Choose a category</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                <label class="label" for="name">Product category: </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <select name="category" id="" class="form-control custom-form-input">
                                    <option value="" selected disabled>--Choose an occasion</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                <label class="label" for="name">Product occasions: </label>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-5 addProductBtn">
                            <div class="form-group" id="form-group-custom">
                                <button type="submit" value=""
                                    class="btn btn-primary custom-form-submit">Add product</button>
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</x-admin-layout>
