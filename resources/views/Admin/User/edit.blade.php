<x-admin-layout>
    <div class="container my-5">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <img src="{{ asset('img/user.webp') }}" style="width: 300px; margin: 0 auto; display: flex;">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger my-3 text-center alert-dismissible fade show">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <h1 class="text-center">Edit user</h1>
                        <form method="post" action="{{ route('users.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card customCard mt-5">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 140px; background-color: rgb(233, 236, 239); border-radius: 30px">
                                                        <img id="user-picture"
                                                            src="{{ asset('storage/' . $user->imgUrl) }}"
                                                            style="width: 100%; height: 140px; border-radius: 10px;"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class=" text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->name }}</h4>
                                                    <p class="mb-0">{{ '@' }}{{ $user->username }}</p>
                                                    <div class="mt-2">
                                                        <label for="file-upload" class="btn btn-primary">
                                                            <i class="fa fa-fw fa-camera"></i>
                                                            <span>Change Photo</span>
                                                        </label>
                                                        <input id="file-upload" type="file" style="display: none;"
                                                            name="imgUrl" id="imgUrl"
                                                            onchange="previewImage(event)">
                                                        <span id="file-name" class="ml-2"></span>
                                                    </div>
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <div class="text-muted"><small>Joined:
                                                            {{ $user->created_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input class="form-control" type="text"
                                                                            name="name" placeholder="John Smith"
                                                                            value="{{ $user->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input class="form-control" type="text"
                                                                            name="username" placeholder="johnny.s"
                                                                            value="{{ $user->username }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text"
                                                                            placeholder="user@example.com"
                                                                            name="email" value="{{ $user->email }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <div class="form-group">
                                                                        <label>Notes</label>
                                                                        <textarea class="form-control" rows="5" placeholder="My Bio">{{ $user->bio }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 mb-3">
                                                            <div class="mb-2"><b>Change Password</b></div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>New Password</label>
                                                                        <input class="form-control" type="password"
                                                                            placeholder="••••••" name="password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Confirm Password</label>
                                                                        <input class="form-control" type="password"
                                                                            placeholder="••••••"
                                                                            name="password_confirmation">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                            <div class="row  ">
                                                                <div class="col">
                                                                    <div
                                                                        class="custom-controls-stacked mt-4 px-2 mb-2">
                                                                        <div class="custom-control">
                                                                            <div class="mb-2"><b>Change Role</b>
                                                                            </div>
                                                                            <select name="role" id="role"
                                                                                class="form-control custom-form-input">
                                                                                <option value="" disabled>
                                                                                    --Role</option>
                                                                                <option value="user"
                                                                                    {{ $user->role == 'user' ? 'selected' : '' }}>
                                                                                    User</option>
                                                                                <option value="employee"
                                                                                    {{ $user->role == 'employee' ? 'selected' : '' }}>
                                                                                    Employee</option>
                                                                                <option value="admin"
                                                                                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                                                    Admin</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
</x-admin-layout>
