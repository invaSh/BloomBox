<x-admin-layout>
    <div class="container-fluid d-flex flex-column align-items-center mt-5">
        <div class="row">
            <div class="main-container col-lg-9 col-m-12">
                <form method="POST" id="contactForm" name="contactForm"
                    class="contactForm custom-form-container d-flex flex-column align-items-center"
                    action="{{ route('category.edit', $category->id) }}">
                    @csrf

                    <h5>Edit Category</h5>
                    <div class="row row-custom">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Category name: </label>
                                <input type="text" class="form-control custom-form-input" name="name"
                                    id="name" placeholder="Type name...." value="{{ $category->name }}"
                                    style="font-size: 13px">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="description">Category description: </label>
                                <textarea name="description" class="form-control custom-form-input" id="description" cols="30" rows="4"
                                    placeholder="Type description..." value="" style="resize: none; font-size: 13px">{{ $category->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-outline-light custom-form-submit">
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</x-admin-layout>
