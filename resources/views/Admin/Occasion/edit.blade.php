<x-admin-layout>
    <div class="container-fluid d-flex flex-column align-items-center mt-5">
        <div class="row">
            <div class="main-container col-lg-9 col-m-12 bg-customm">
                <form method="POST" action="{{ route('occasion.update', $occasion->id) }}" id="contactForm" name="contactForm"
                    class="contactForm custom-form-container d-flex flex-column align-items-center">
                    @csrf
                    <h5>Edit Occasion</h5>
                    <div class="row row-custom">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="name">Occasion name: </label>
                                <input type="text" class="form-control custom-form-input" name="name"
                                    id="name" placeholder="Type name...." style="font-size: 13px"
                                    value="{{ $occasion->name }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="label" for="description">Occasion description: </label>
                                <textarea name="description" class="form-control custom-form-input" id="description" cols="30" rows="4"
                                    placeholder="Type description..." style="resize: none; font-size: 13px">
                                    {{ $occasion->description }}
                                </textarea>
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

            @if (session('error'))
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
