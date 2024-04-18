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
        <div class="d-flex justify-content-center">
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
        <div class="row orders">
            <x-sidebar />
            <div class="col-md-9 col-lg-10 ">
                <div class="card p-3 rounded-2 mb-3">
                    <h2>Addresses</h2>
                </div>
                <div class="row gap-3 justify-content-center ">
                    @if ($addresses->isNotEmpty())
                        @foreach ($addresses as $item)
                            <div class="col-lg-3 p-3 text-center  hover border bg-white">
                                <h3 class="h6">Shipping Address
                                    {{ $loop->iteration }}</h3>
                                <p>
                                    {{ $item->street }}<br>
                                    {{ $item->city }}, {{ $item->state }}
                                    {{ $item->zip }}
                                </p>
                                </label>
                                <a href="#" class="mx-2 text-gray icon" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="bi bi-pencil"></i></a>
                                <a href="" class="mx-2 text-gray icon" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $item->id }}"><i class="bi bi-trash"></i></a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-between bg-primary text-light">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                            <button type="button" class="btn-close btn-outline-light"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editAddressForm" method="POST"
                                                action="{{ route('address.update', $item->id) }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="streetInput" class="form-label">Street:</label>
                                                    <input type="text" class="form-control" id="streetInput"
                                                        name="street" value="{{ $item->street }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cityInput" class="form-label">City:</label>
                                                    <input type="text" class="form-control" id="cityInput"
                                                        name="city" value="{{ $item->city }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stateInput" class="form-label">State:</label>
                                                    <input type="text" class="form-control" id="stateInput"
                                                        name="state" value="{{ $item->state }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="zipInput" class="form-label">ZIP Code:</label>
                                                    <input type="text" class="form-control" id="zipInput"
                                                        name="zip" value="{{ $item->zip }}" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-light">
                                            <h5 class="modal-title " id="deleteModalLabel{{ $item->id }}">
                                                Confirm deletion
                                            </h5>
                                            <button type="button" class="btn-close btn-outline-light"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <div class="modal-body text-dark">
                                                Are you sure you want to delete this address?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-dismiss="modal">Abort cancellation</button>
                                                <form action="{{ route('address.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Yes I am
                                                        sure.</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
