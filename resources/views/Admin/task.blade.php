<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <main style="padding: 10rem">
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
        <section>
            <h1>Create</h1>
            <form method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form6Example1" name="name" class="form-control" />
                            <label class="form-label" for="form6Example1"> name</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
            </form>
        </section>
        <section>
            <h1>Create</h1>
            <form method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="name" id="form6Example1" class="form-control" />
                            <label class="form-label" for="form6Example1"> name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="" id="form6Example2" class="form-control" />
                            <label class="form-label" for="form6Example2">smth</label>
                        </div>
                    </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <select name="" class="form-control">
                        <option value="" disabled selected>Select
                            smth</option>
                        <option value="">smth</option>
                        <option disabled>nothing here</option>
                    </select>
                    <label class="form-label" for="form6Example3">smth</label>
                </div>


                <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
            </form>
        </section>
        <hr>
        <section>
            <h1>List, Delete</h1>
            <table
                class="table text-center table-striped project-list-table table-nowrap align-middle table-borderless">
                <thead>
                    <th class="bg-primary text-light">ID</th>
                    <th class="bg-primary text-light">Name</th>
                    <th class="bg-primary text-light">smth</th>
                    <th class="bg-primary text-light">smth</th>
                    <th class="bg-primary text-light"></th>
                </thead>
                <tbody>
                            <tr>
                                <td><strong>ex</strong></td>
                                <td>ex</td>
                                <td>ex</td>
                                <td>ex</td>
                                <td>
                                    <form method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                </tbody>
            </table>
        </section>
        <hr>
        <section>
            <h1>Edit</h1>
                    <form method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" name="name" id="form6Example1" class="form-control"
                                        value="" />
                                    <label class="form-label" for="form6Example1"> name</label>
                                </div>
                            </div>

                        </div>
                        <button data-mdb-ripple-init type="submit"
                            class="btn btn-primary btn-block mb-4">Submit</button>
                    </form>
                    <hr>
                <h5>Nothing here</h5>
        </section>
    </main>
</body>

</html>
