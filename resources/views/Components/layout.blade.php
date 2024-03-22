<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <style>
        #logo {
            height: 80px !important;
        }

        .navbar {
            background-image: linear-gradient(to bottom left, #413555, #262130, #19180D);;
            
        }

        .navbar .nav-link {
            color: #F9E1B5 !important;
            border-radius: 30px;
        }

        .box{
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

        .box input{
            width: 0;
            outline: none;
            border: none;
            font-weight: 500;
            transition: 0.8s;
            background: transparent;
        }

        .box:hover input, .box:hover{
            width: 300px !important;
        }

        .box:hover{
            justify-content: flex-end;
        }

        .box a i{
            color:#270c52 !important;
            font-size: 18px;
            padding-right: 5px;
        }
        
        .customUl{
            margin-right: 10px !important;
            padding-right: 
        }

        .dropdown-menu{
            background-color: #F9E1B5 !important;
        }

        .dropdown-item{
            transition: 0.1s;
        }

        .dropdown-item:hover{
            border-radius: 30px !important;
        }

        footer{
            background-image: linear-gradient(to bottom left, #413555, #262130, #19180D);
        }
        
        .link-light{
            color:#F9E1B5 !important;
        }

        .iconHover{
            border-radius: 50px;
            height: 32px;
            width: 32px;
            color: #F9E1B5 !important;
        }
        .specialHover{
            border-radius: 30px;
        }

        .iconHover:hover, .specialHover:hover, .navbar .nav-link:hover{
            background-color: #F9E1B5;
            color:#413555 !important;
        }

    </style>

</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/newlogo.png') }}" id="logo" alt="BloomBox">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ms-auto d-flex justify-content-end customUl">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/shop-all')}}">Shop All</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{url('/occasions')}}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
                            <a class="nav-link active" aria-current="page" href="{{ url('/plants') }}">Plants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/about-us') }}">About us</a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                |
                            </a>
                        </li>
                        <li class="nav-item d-flex">
                            <a class="nav-link active iconHover" aria-current="page" href="#">
                                <i class="bi bi-suit-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item d-flex">
                            <a class="nav-link active iconHover" aria-current="page" href="#">
                                <i class="bi bi-basket"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active specialHover" aria-current="page" href="#">
                                Login/Register
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex box" role="search">
                        <input type="text" placeholder="Search...">
                        <a href="#">
                            <i class="bi bi-search logoI"></i>
                        </a>
                    </form>

                </div>
            </div>
        </nav>



        {{ $slot }}


        <footer class="bg-dark py-4 mt-auto">
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
                        <a class="link-light small" href="#!">Plants</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">About us</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
