<x-admin-layout>
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            
            <div class="card customForm mt-3">
                <img src="{{ asset('img/user.webp') }}" style="width: 300px; margin: 0 auto; display: flex;">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger my-3 text-center alert-dismissible fade show">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <div class="e-profile">
                        <h1 class="text-center my-3">Create User</h1>
                        <div class="tab-content pt-3">
                            <div class="tab-pane active">
                                <form class="form" id="user-form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Full Name<span class="muted text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="name"
                                                            placeholder="Your full name here..." value="{{ old('name', session('userInput.name')) }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Username<span class="muted text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="username"
                                                            placeholder="Your username here.." value="{{ old('username', session('userInput.username')) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email<span class="muted text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="email"
                                                            placeholder="user@example.com" value="{{ old('email', session('userInput.email')) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label>About</label>
                                                        <textarea class="form-control" rows="5" placeholder="Notes.." name="bio">{{ old('bio', session('userInput.bio')) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Create Password<span class="muted text-danger">*</span></label>
                                                        <input class="form-control" type="password" placeholder="••••••"
                                                            name="password" id="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Confirm password<span class="muted text-danger">*</span></label>
                                                        <input class="form-control" type="password" placeholder="••••••"
                                                            name="password_confirmation" id="pass_confirm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-danger" id="pass_warning"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-controls-stacked px-2 mb-2">
                                                        <div class="custom-control">
                                                            Choose role
                                                            <select name="role" id="role"
                                                                class="form-control custom-form-input">
                                                                <option value="" selected disabled>
                                                                    --Role</option>
                                                                <option value="user">User</option>
                                                                <option value="employee">Employee</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="custom-controls-stacked px-2">
                                                        Add profile picture
                                                        <div class="custom-control">
                                                            <input type="file" name="imgUrl" id="imgUrl">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>



    </div>

</x-admin-layout>
