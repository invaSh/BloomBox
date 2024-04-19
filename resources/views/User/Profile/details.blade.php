@section('css')
    <style>
        body {
            background: #eee;
        }

        .sidebar {
            padding: 30px 15px;
            border: transparent;
        }

        .icon {
            color: grey !important;

        }

        .hover:hover {
            border: 2px solid #413555 !important;
            cursor: pointer;
        }

        .icon:hover {
            color: #413555 !important;
        }
    </style>
@endsection


<x-layout>
    <main class="container wrapper my-5">
        <div class="d-flex justify-content-center mb-3">
            @if (session('success'))
                <div class="alert alert-success text-center alert-dismissible fade show mb-1 mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger text-center alert-dismissible fade show mb-1 mt-5" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row orders gap-3 justify-content-center">
            <x-sidebar />
            <div class="col-lg-8">
                <div class="row gap-3 justify-content-center">
                    @if ($user)
                        <div class="col-lg-11 p-3 text-center border bg-white">
                            <h2>Your personal info</h2>
                            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf 

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $user->username }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}">
                                </div>

                                <div class="mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="imgUrl" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" id="imgUrl" name="imgUrl">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                            
                        </div>
                @else
                    <h3 class="mt-3 mx-3 text-dark">You don't have any addresses yet!</h3>
                    @endif
                </div>

            </div>
        </div>
    </main>

    @section('scripts')
        <script>
            const myModal = document.getElementById('myModal');
            const myInput = document.getElementById('myInput');

            myModal.addEventListener('shown.bs.modal', () => {
                myInput.focus(); // Ensure focus when modal is shown
            });
        </script>
    @endsection

</x-layout>
