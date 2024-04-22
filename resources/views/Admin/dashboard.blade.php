@section('css')
    <style>
        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #4099ff, #73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2ed8b6, #59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }

        .hover {
            font-size: 18px;
            cursor: pointer;
            color: #493953 !important;
            transition: .2s;

        }

        .hover:hover {
            transform: scale(1.1);
            color: #d39f5c !important;

        }

        .card img {
            height: 100%;
            width: 60px;
            margin-right: 1rem;
            border-radius: 50%;
            object-fit: contain;
        }

        hr {
            color: #493953 !important;
            border: 2px solid;
        }

        .active-bar {
            border: 3px solid #d39f5c;
            max-width: 13% !important;
            width: auto;
            margin-left: 35%;
            transition: 0.2s
        }


        .content-section {
            opacity: 0;
            height: 0;
            overflow: hidden;
            transition: opacity 0.5s ease, height 0.5s ease;
        }

        .fade-in {
            opacity: 1;
            height: auto;
        }

        .time {
            color: #1d0d0d83 !important;
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .active-bar {
                display: none;
            }
        }

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

        .card {
            animation: fadeUp 0.5s ease-out;
        }
    </style>
@endsection

<x-admin-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block text-light">
                        <h6 class="m-b-20">Orders Placed</h6>
                        <h2 class="d-flex justify-content-between"><i class="bi bi-basket"></i></i><span>{{ $dashboardData['orderNo'] }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block text-light">
                        <h6 class="m-b-20">Orders Delivered</h6>
                        <h2 class="d-flex justify-content-between"><i
                                class="bi bi-rocket-takeoff"></i><span>{{ $dashboardData['deliveredNo'] }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block text-light">
                        <h6 class="m-b-20">Users</h6>
                        <h2 class="d-flex justify-content-between"><i
                                class="bi bi-people"></i><span>{{ $dashboardData['userNo'] }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block text-light">
                        <h6 class="m-b-20">Products</h6>
                        <h2 class="d-flex justify-content-between"><i
                                class="bi bi-flower1"></i><span>{{ $dashboardData['productsNo'] }}</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3 text-dark">
            @php
                $hour = date('G');
                $greeting = '';
                $message = '';

                if ($hour < 12) {
                    $greeting = 'Good morning';
                    $message = 'Good day to stay productive. Check out recent sales!';
                } else {
                    $greeting = 'Good afternoon';
                    $message = 'Good job staying productive today.';
                }
            @endphp

            <div class="card py-3 col-6 text-center">
                <h1>{{ $greeting }}, {{ explode(' ', auth()->user()->name)[0] }}!</h1>
                <h5 class="text-muted">{{ $message }}</h5>
            </div>
        </div>

        <div class="row text-center mt-5">
            <div class="col-lg-6 fade-up">
                <canvas id="top_products"></canvas>
            </div>
            <div class="col-lg-6 fade-up">
                <canvas id="order_peaking"></canvas>
            </div>
        </div>


        <div class="row mt-5 justify-content-center text-center">
            <div class="col-lg-2 hover hover-container justify-content-center" id="recentActivity">
                <p>Recent Activity</p>
            </div>
            <div class="col-lg-2 hover hover-container" id="newOrders">
                <p>New Orders</p>
            </div>
        </div>
        <div class="active-bar mb-5" id="activeBar"></div>
        <div class="row justify-content-center mt-3">
            <section id="recentActivitySection" class="col-lg-8 content-section">
                <h3 class="text-center mb-5">Recent Activity</h3>
                @if ($activities->isNotEmpty())
                    @foreach ($activities as $item)
                        <div class="card mt-5">
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/product-img/' . $item->causer->imgUrl) }}"
                                        class="img" alt="">
                                    <div>
                                        @if ($item->log_name === 'low_stock')
                                            <h6>
                                                {{ $item->description }}
                                            </h6>
                                        @else
                                            <h6 class="mb-0">
                                                @if ($item->causer->isAdmin() || $item->causer->isEmployee())
                                                    Employee
                                                @endif
                                                <span class="text-info">
                                                    <a href=""
                                                        class="text-decoration-none">{{ $item->causer->name }}</a>
                                                </span>
                                                {{ $item->description }}
                                            </h6>
                                        @endif

                                        <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <p class="mt-2 mb-0">
                                    <a href="
                                        {{ $item->subject_type == 'App\Models\Occasion'
                                            ? route('occasion.edit', $item->subject_id)
                                            : ($item->subject_type == 'App\Models\Product'
                                                ? route('product.show', $item->subject_id)
                                                : ($item->subject_type == 'App\Models\Category'
                                                    ? route('category.edit', $item->subject_id)
                                                    : ($item->subject_type == 'App\Models\Order'
                                                        ? route('order.details', $item->subject_id)
                                                        : route('order.details', $item->subject_id)))) }}
                                    "
                                        class="text-decoration-none text-dark hover">
                                        View details <i class="bi bi-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h5>No recent activity.</h5>
                @endif
            </section>

            <section id="newOrdersSection" class="col-lg-8 content-section" style="display: none;">
                <h3 class="text-center mb-5">New Orders</h3>
                @if ($newOrders->isNotEmpty())
                    @foreach ($newOrders as $item)
                        <div class="card mt-5">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/product-img/' . $item->causer->imgUrl) }}"
                                        class="img" alt="">
                                    <h6 class="mb-0">User
                                        <span class="text-info">
                                            <a href=""
                                                class="text-decoration-none">{{ $item->causer->name }}</a>
                                        </span>
                                        {{ $item->description }}
                                        <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                    </h6>
                                </div>
                                <p class="mt-0 mb-0">
                                    <a href="{{ route('order.details', $item->subject_id) }}"
                                        class="text-decoration-none text-dark hover">
                                        View details <i class="bi bi-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h5>No new orders.</h5>
                @endif
            </section>
        </div>
    </div>


    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const recentActivityBtn = document.getElementById('recentActivity');
                const newOrdersBtn = document.getElementById('newOrders');
                const activityBar = document.getElementsByClassName('active-bar')[0];

                const recentActivitySection = document.getElementById('recentActivitySection');
                const newOrdersSection = document.getElementById('newOrdersSection');

                const setColor = (button, color) => {
                    button.querySelector('p:first-child').style.color = color;
                };

                const setActivityBarPosition = (position) => {
                    activityBar.style.marginLeft = position;
                };

                const handleClick = (clickedBtn) => {
                    // Set button colors
                    recentActivityBtn === clickedBtn ? setColor(newOrdersBtn, '') : setColor(recentActivityBtn, '');
                    setColor(clickedBtn, "#d39f5c");
                    localStorage.setItem('activeButton', clickedBtn.id);

                    // Set activity bar position
                    if (recentActivityBtn === clickedBtn) {
                        setActivityBarPosition('35%');
                        localStorage.setItem('activityBarPosition', '35%');
                    } else {
                        setActivityBarPosition('52%');
                        localStorage.setItem('activityBarPosition', '52%');
                    }

                    // Show/hide sections with fade-in effect
                    if (recentActivityBtn === clickedBtn) {
                        fadeIn(recentActivitySection); // Show Recent Activity section
                        fadeOut(newOrdersSection); // Hide New Orders section
                    } else {
                        fadeIn(newOrdersSection); // Show New Orders section
                        fadeOut(recentActivitySection); // Hide Recent Activity section
                    }
                };

                // Function to fade in a section
                const fadeIn = (element) => {
                    element.style.display = 'block';
                    setTimeout(() => {
                            element.classList.add('fade-in');
                        },
                        50
                    ); // Add a small delay to allow the display property to take effect before adding the fade-in class
                };

                // Function to fade out a section
                const fadeOut = (element) => {
                    element.classList.remove('fade-in');
                    setTimeout(() => {
                        element.style.display = 'none';
                    }, 500); // Match the transition duration (0.5s) for a smooth transition
                };


                newOrdersBtn.addEventListener('click', () => {
                    handleClick(newOrdersBtn);
                });

                recentActivityBtn.addEventListener('click', () => {
                    handleClick(recentActivityBtn);
                });

                const lastClickedButton = localStorage.getItem('activeButton');
                if (lastClickedButton) {
                    const button = document.getElementById(lastClickedButton);
                    if (button) {
                        handleClick(button);
                    }
                }

                const activityBarPosition = localStorage.getItem('activityBarPosition');
                if (activityBarPosition) {
                    setActivityBarPosition(activityBarPosition);
                }

            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let top_products = document.getElementById('top_products').getContext('2d');

                let productLabels = [];
                let productQuantities = [];
                let backgroundColors = [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ];

                @foreach ($top5products as $index => $product)
                    productLabels.push('{{ $product->name }}');
                    productQuantities.push('{{ $product->quantity }}');
                @endforeach

                let topProductsChart = new Chart(top_products, {
                    type: 'bar',
                    data: {
                        labels: productLabels,
                        datasets: [{
                            label: 'Top products last 24h',
                            data: productQuantities,
                            backgroundColor: backgroundColors
                        }],
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    suggestedMin: Math.min(...productQuantities) -
                                        10 // Adjust the value as needed
                                }
                            }]
                        }
                    }
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let order_peaking = document.getElementById('order_peaking').getContext('2d');

                let orderLabels = [];
                let orderCounts = [];

                @foreach ($ordersPeak as $data)
                    orderLabels.push('{{ $data['date'] }}');
                    orderCounts.push('{{ $data['count'] }}');
                @endforeach

                const pastelColors = [
                    'rgba(255, 204, 204, 0.6)', // Pastel Red
                    'rgba(255, 229, 204, 0.6)', // Pastel Orange
                    'rgba(204, 255, 204, 0.6)', // Pastel Green
                    'rgba(204, 229, 255, 0.6)', // Pastel Blue
                    'rgba(255, 204, 255, 0.6)', // Pastel Purple
                    'rgba(255, 255, 204, 0.6)', // Pastel Yellow
                    'rgba(204, 204, 255, 0.6)', // Pastel Lavender
                    'rgba(255, 255, 255, 0.6)', // Pastel White
                ];

                const borderColor = 'rgba(255, 99, 132, 1)';

                let orderPeakingChart = new Chart(order_peaking, {
                    type: 'line',
                    data: {
                        labels: orderLabels,
                        datasets: [{
                            label: 'Sales this week',
                            data: orderCounts,
                            backgroundColor: pastelColors,
                            borderColor: borderColor,
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

            });
        </script>

       
    @endsection

</x-admin-layout>
