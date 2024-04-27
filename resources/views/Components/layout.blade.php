<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #logo {
            height: 90px !important;
        }

        .navbar {
            background-image: linear-gradient(to bottom left, #413555, #262130, #19180D);

        }

        .navbar .nav-link {
            color: #F9E1B5 !important;
            border-radius: 30px;
        }

        .box {
            width: 47px !important;
            background: #F9E1B5;
            border-radius: 30px;
            cursor: pointer;
            align-items: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 10px;
            transition: 0.8s;
            justify-content: flex-end;
        }

        .box input {
            width: 0;
            outline: none;
            border: none;
            font-weight: 500;
            transition: 0.8s;
            background: transparent;
        }

        .box:hover input,
        .box:hover {
            width: 300px !important;
        }

        .box:hover {
            justify-content: flex-end;
        }

        .box a i {
            color: #270c52 !important;
            font-size: 18px;
            padding-right: 5px;
        }

        .customUl {
            margin-right: 10px !important;
            padding-right:
        }

        .dropdown-menu {
            background-color: #eee !important;
        }

        .dropdown-item {
            transition: 0.1s;
        }

        .dropdown-item:hover {
            border-radius: 30px !important;
        }

        footer {
            background-image: linear-gradient(to bottom left, #413555, #262130, #19180D);
        }

        .link-light {
            color: #F9E1B5 !important;
        }

        .iconHover {
            border-radius: 50px;
            height: 32px;
            width: 32px;
            color: #F9E1B5 !important;
        }

        .specialHover {
            border-radius: 30px;
        }

        .iconHover:hover,
        .specialHover:hover,
        .navbar .nav-link:hover {
            background-color: #F9E1B5;
            color: #413555 !important;
        }

        .slot {
            padding-bottom: 50px;
        }

        .text-hover {
            transition: .1s;
        }

        .text-hover:hover {
            color: #19180d6e;
        }

        .autocomplete-dropdown {
            display: none;
        }
    </style>

    <style>
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.5s ease-out;
        }

        #navbarSupportedContent {
            position: relative;
        }

        .autocomplete-dropdown {
            position: absolute;
            width: 25%;
            left: 68.5%;
            top: 80%;
            border-radius: 0 0 30px 30px;
            background-color: #F9E1B4 !important;
            padding-inline-end: 40px !important;
        }

        .autocomplete-dropdown li {
            list-style-type: none !important;
            padding: 10px 0;
            cursor: pointer;
            transition: .1s;
            text-align: center;
        }

        .autocomplete-dropdown li a{
            text-decoration: none;
            color: inherit;
        }
        .autocomplete-dropdown li:hover {
            background-color: #413555 !important;
            color: #F9E1B4 !important;
            border-radius: 30px;
        }
    </style>


    @yield('css')

</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container  fade-up">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/newlogo.png') }}" id="logo" alt="BloomBox">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ms-auto d-flex justify-content-end customUl">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/shop-all') }}">Shop All</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ url('/occasions') }}" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Occasions
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Flowers
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/flowers">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/about-us') }}">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                |
                            </a>
                        </li>
                        @auth
                            <li class="nav-item dropdown me-3">
                                @php
                                    $user = App\Models\User::where('id', auth()->user()->id)->first();
                                    $notifs = $user->notifs();
                                    $count = $user->notifs()->count();
                                @endphp
                                <a class="nav-link dropdown-toggle iconHover customPos" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-bell"></i>
                                    @if ($count > 0)
                                        <span class="bg-danger">{{ $count }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-0" style="width: 30vw; cursor: pointer;">
                                    @if ($notifs->isNotEmpty())
                                        @foreach ($notifs as $item)
                                            <li class="p-3 {{ $notifs->count() > 1 ? 'border-bottom' : '' }}">
                                                <h5>{{ $item->description }}.</h5>
                                                <a class="text-muted"
                                                    href="{{ route('order.show', $item->subject_id) }}">
                                                    <p class="text-hover">
                                                        Click to view details
                                                        <i class="bi bi-arrow-right ms-1"></i>
                                                    </p>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="text-muted ms-2">Nothing to see here..</li>
                                    @endif
                                </ul>
                            </li>

                        @endauth
                        <li class="nav-item d-flex">
                            <a class="nav-link active iconHover customPos" aria-current="page"
                                href="{{ route('cart.index') }}">
                                <i class="bi bi-basket"></i>
                                @if (auth()->check())
                                    @php
                                        $userId = auth()->id();
                                        $cart = \App\Models\Cart::where('user_id', $userId)->with('products')->first();
                                    @endphp
                                    @if ($cart && $cart->totalQuantity > 0)
                                        <span class="bg-danger">{{ $cart->totalQuantity }}</span>
                                    @endif
                                @endif

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                |
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">

                                <a class="nav-link active specialHover" aria-current="page" href="/login">
                                    Login/Register
                                </a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->username }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('profile.show', auth()->user()->id) }}">Your Profile</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('order.list', auth()->user()->id) }}">Orders</a></li>
                                    <hr style="margin: 10px;">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <li><button class="dropdown-item" type="submit">Log out<i
                                                    class="bi bi-door-open mx-1"></i></button></li>
                                    </form>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                    <form action="" role="search">
                        <div class="d-flex box mx-3">
                            <input type="search" placeholder="Search..." id="searchInput" aria-label="Search">
                            <a href="#">
                                <i class="bi bi-search logoI"></i>
                            </a>
                        </div>
                        <div class="autocomplete-dropdown bg-light">
                            <ul id="autocompleteList">

                            </ul>
                        </div>
                    </form>

                </div>
            </div>
        </nav>
    </main>

    <main class="slot">
        {{ $slot }}
    </main>


    <footer class="bg-dark">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="link-light small m-0 text-white">Copyright &copy; BloomBox 2024</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Shop All</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Occasions</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Flowers</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">About us</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productTotals = document.getElementById('product-totals');
            const items = document.querySelectorAll('.quantityBox');

            items.forEach(item => {
                const increaseButton = item.querySelector('.increase-quantity');
                const decreaseButton = item.querySelector('.decrease-quantity');
                const quantityInput = item.querySelector('input[type="num"]');
                const id = increaseButton.id.split('-').pop();

                increaseButton.addEventListener('click', () => {
                    quantityInput.value = parseInt(quantityInput.value) + 1;
                    if (productTotals) {
                        updateSubtotal();
                    }
                });

                decreaseButton.addEventListener('click', () => {
                    if (quantityInput.value > 1) {
                        quantityInput.value = parseInt(quantityInput.value) - 1;
                        if (productTotals) {
                            updateSubtotal();
                        }
                    }
                });
            });

            if (productTotals) {
                function updateSubtotal() {
                    let total = 0;
                    items.forEach(item => {
                        const price = parseFloat(item.dataset.price);
                        const quantity = parseInt(item.querySelector('input[type="num"]').value);
                        total += price * quantity;
                    });
                    productTotals.innerText = `$${total.toFixed(2)}`;
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            swup.on('animationIn', () => {
                const cards = document.querySelectorAll('.card');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.animation = 'fadeUp 0.5s ease-out';
                    }, index * 100);
                });

                const otherElements = document.querySelectorAll('.slot');
                otherElements.forEach((element, index) => {
                    setTimeout(() => {
                        element.style.animation = 'fadeUp 0.5s ease-out';
                    }, index * 100);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var searchInput = document.getElementById('searchInput');
            var autocompleteList = document.getElementById('autocompleteList');
            var dropdown = document.querySelector('.autocomplete-dropdown');

            var boxContainer = document.querySelector('.box');
            var inputField = boxContainer.querySelector('input');

            function toggleBox() {
                var hasText = inputField.value.trim().length > 0;
                var isFocused = document.activeElement === inputField;

                if (hasText || isFocused) {
                    boxContainer.style.minWidth = '300px';
                    inputField.style.minWidth = '300px';
                    inputField.style.textAlign = 'center';
                } else {
                    boxContainer.style.width = '47px';
                    inputField.style.minWidth = '47px';
                }
            }

            inputField.addEventListener('input', () => {
                toggleBox();
            });

            searchInput.addEventListener('keyup', () => {
                var query = searchInput.value.trim();

                if (query.length === 0) {
                    autocompleteList.innerHTML = '';
                    dropdown.style.display = 'none'; 
                    return;
                }

                fetch("/autocomplete?query=" + query)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok.");
                        }
                        return response.json();
                    })
                    .then(data => {
                        autocompleteList.innerHTML = '';
                        console.log(data)
                        console.log(data.name)

                        data.forEach(product => {
                            var listItem = document.createElement("li");
                            var anchor = document.createElement("a");
                            anchor.textContent = product.name;
                            anchor.href = `/product/${product.id}`;
                            listItem.appendChild(anchor);
                            autocompleteList.appendChild(listItem);
                        });

                        dropdown.style.display = 'block';
                    })
                    .catch(error => {
                        console.error("Fetch error: ", error);
                    });
            });
        });
    </script>



    @yield('scripts')

</body>

</html>
