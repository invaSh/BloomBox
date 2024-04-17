@section('css')
    <style>
        body {
            margin-top: 20px;
            background-color: #f1f3f7;
        }

        .card {
            margin-bottom: 24px;

            .card {
                position: relative;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: transparent;
            }

            img {
                object-fit: cover;
            }

            .activity-checkout {
                list-style: none
            }

            .activity-checkout .checkout-icon {
                position: absolute;
                top: -4px;
                left: -24px
            }

            .activity-checkout .checkout-item {
                position: relative;
                padding-bottom: 24px;
                padding-left: 35px;
                border: transparent;
            }

            .activity-checkout .checkout-item.active {}

            .activity-checkout .checkout-item.crypto-activity {
                margin-left: 50px
            }

            .activity-checkout .checkout-item .crypto-date {
                position: absolute;
                top: 3px;
                left: -65px;
            }

            .avatar-xs {
                height: 1rem;
                width: 1rem
            }

            .avatar-sm {
                height: 2rem;
                width: 2rem
            }

            .avatar {
                height: 3rem;
                width: 3rem
            }

            .avatar-md {
                height: 4rem;
                width: 4rem
            }

            .avatar-lg {
                height: 5rem;
                width: 5rem
            }

            .avatar-xl {
                height: 6rem;
                width: 6rem
            }

            .avatar-title {
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                background-color: #413555;
                color: #fff;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                font-weight: 500;
                height: 100%;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                width: 100%
            }


            .avatar-group {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                padding-left: 8px
            }

            .avatar-group .avatar-group-item {
                margin-left: -8px;
                border: 2px solid #fff;
                border-radius: 50%;
                -webkit-transition: all .2s;
                transition: all .2s
            }

            .avatar-group .avatar-group-item:hover {
                position: relative;
                -webkit-transform: translateY(-2px);
                transform: translateY(-2px)
            }

            .card-radio {
                background-color: #fff;
                border: 2px solid #eff0f2;
                border-radius: .75rem;
                padding: .5rem;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                display: block
            }

            .card-radio:hover {
                cursor: pointer
            }

            .card-radio-label {
                display: block
            }

            .edit-btn {
                width: 35px;
                height: 35px;
                line-height: 40px;
                text-align: center;
                position: absolute;
                right: 25px;
                margin-top: -50px
            }

            .card-radio-input {
                display: none
            }

            .card-radio-input:checked+.card-radio {
                border-color: #413555 !important
            }


            .font-size-16 {
                font-size: 16px !important;
            }

            .text-truncate {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            a {
                text-decoration: none !important;
            }


            .form-control {
                display: block;
                width: 100%;
                padding: 0.47rem 0.75rem;
                font-size: .875rem;
                font-weight: 400;
                line-height: 1.5;
                color: #545965;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #e2e5e8;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.75rem;
                -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
                transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            }

            .edit-btn {
                width: 35px;
                height: 35px;
                line-height: 40px;
                text-align: center;
                position: absolute;
                right: 25px;
                margin-top: -50px;
            }

            .ribbon {
                position: absolute;
                right: -26px;
                top: 20px;
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
                color: #fff;
                font-size: 13px;
                font-weight: 500;
                padding: 1px 22px;
                font-size: 13px;
                font-weight: 500
            }

            #shipping-info-section,
            #payment-info-section {
                opacity: 0;
                transition: max-height 0.5s ease-in-out, opacity 0.5s ease-in-out;
                display: none;
            }

            #shipping-info-section.active,
            #payment-info-section.active {
                opacity: 1;
                display: block;
            }

            .custom-border {
                -webkit-box-shadow: 0 2px 3px #e4e8f0;
                box-shadow: 0 2px 3px #e4e8f0;
                border: 1px solid #eff0f2;
                border-radius: 1rem;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
                cursor: pointer;
            }

            .custom-border-card {
                flex-direction: row;
            }

            .billing-radio-button,
            .card-radio-button,
            .shipping-radio-button {
                display: none;
            }

            .billing-radio-button:checked+.billing-address-label,
            .shipping-radio-button:checked+.shipping-address-label,
            .card-radio-button:checked+.card-label {
                border: 2.5px solid #413555;

            }
    </style>
@endsection

<x-layout>
    <div class="container mt-5">
        @if ($errors->any())
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    @if ($errors->count() > 2)
                        <div class="alert alert-danger text-center alert-dismissible fade show mb-1 mb-3 col-6"
                            role="alert">
                            All fields are required!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @else
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger text-center alert-dismissible fade show mb-1 mb-3 col-lg-4 col-12"
                                role="alert">
                                {{ $error }} field is required!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-8">
                <div class="card  d-flex flex-column align-items-center">
                    <div class="card-body">
                        <ol class="activity-checkout mb-0 px-4 mt-3">
                            <li class="checkout-item" id="billing-info-section">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-receipt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Billing Info</h5>
                                        <div class="mb-3">
                                            <div>
                                                @if ($userBillings)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <div class="row gap-3">
                                                                @foreach ($userBillings as $item)
                                                                    <div class="col-lg-4">
                                                                        <input type="radio"
                                                                            id="billingAddress{{ $loop->iteration }}"
                                                                            name="selectedBillingAddress"
                                                                            value="{{ $item->id }}"
                                                                            class="billing-radio-button" />
                                                                        <label
                                                                            for="billingAddress{{ $loop->iteration }}"
                                                                            class="custom-border billing-address-label"
                                                                            id="billing-label">
                                                                            <h3 class="h6">Billing address
                                                                                {{ $loop->iteration }}</h3>
                                                                            <address>
                                                                                <strong>{{ $item->name }}</strong>
                                                                                <br>{{ $item->address }}<br>
                                                                                {{ $item->city }}, {{ $item->state }}
                                                                                {{ $item->zip }}<br>
                                                                                <abbr title="Phone">P:</abbr>
                                                                                {{ $item->phone }}
                                                                            </address>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <form method="POST" action="{{ route('billing.store') }}"
                                                    id="billing-form" class="mt-3">
                                                    <div class="row">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="billing-name">Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="billing-name" name="name"
                                                                        placeholder="Enter name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="billing-email-address">Email
                                                                        Address</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control" id="billing-email-address"
                                                                        placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="billing-phone">Phone</label>
                                                                    <input type="text" name="phone"
                                                                        class="form-control" id="billing-phone"
                                                                        placeholder="Enter Phone no.">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-4">
                                                                <label class="form-label"
                                                                    for="billing-address">Address</label>
                                                                <textarea class="form-control" id="billing-address" rows="3" name="address" placeholder="Enter full address"></textarea>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-4 mb-lg-0">
                                                                    <label class="form-label">Country</label>
                                                                    <select class="form-control form-select"
                                                                        title="Country" name="country">
                                                                        <option value="" selected disabled>Select
                                                                            Country</option>
                                                                        <option value="US">United States</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-4 mb-lg-0">
                                                                    <label class="form-label"
                                                                        for="billing-city">City</label>
                                                                    <input type="text" class="form-control"
                                                                        id="billing-city" name="city"
                                                                        placeholder="Enter City">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-0">
                                                                    <label class="form-label"
                                                                        for="zip-code">Zip</label>
                                                                    <input type="text" class="form-control"
                                                                        id="zip-code" name="zip"
                                                                        placeholder="Enter Postal code">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-0">
                                                                    <label class="form-label"
                                                                        for="zip-code">State</label>
                                                                    <select name="state" class="form-control">
                                                                        <option value="" disabled selected>Select
                                                                            State</option>
                                                                        <option value="AL">Alabama</option>
                                                                        <option value="AK">Alaska</option>
                                                                        <option value="AZ">Arizona</option>
                                                                        <option value="AR">Arkansas</option>
                                                                        <option value="CA">California</option>
                                                                        <option value="CO">Colorado</option>
                                                                        <option value="CT">Connecticut</option>
                                                                        <option value="DE">Delaware</option>
                                                                        <option value="FL">Florida</option>
                                                                        <option value="GA">Georgia</option>
                                                                        <option value="HI">Hawaii</option>
                                                                        <option value="ID">Idaho</option>
                                                                        <option value="IL">Illinois</option>
                                                                        <option value="IN">Indiana</option>
                                                                        <option value="IA">Iowa</option>
                                                                        <option value="KS">Kansas</option>
                                                                        <option value="KY">Kentucky</option>
                                                                        <option value="LA">Louisiana</option>
                                                                        <option value="ME">Maine</option>
                                                                        <option value="MD">Maryland</option>
                                                                        <option value="MA">Massachusetts</option>
                                                                        <option value="MI">Michigan</option>
                                                                        <option value="MN">Minnesota</option>
                                                                        <option value="MS">Mississippi</option>
                                                                        <option value="MO">Missouri</option>
                                                                        <option value="MT">Montana</option>
                                                                        <option value="NE">Nebraska</option>
                                                                        <option value="NV">Nevada</option>
                                                                        <option value="NH">New Hampshire</option>
                                                                        <option value="NJ">New Jersey</option>
                                                                        <option value="NM">New Mexico</option>
                                                                        <option value="NY">New York</option>
                                                                        <option value="NC">North Carolina</option>
                                                                        <option value="ND">North Dakota</option>
                                                                        <option value="OH">Ohio</option>
                                                                        <option value="OK">Oklahoma</option>
                                                                        <option value="OR">Oregon</option>
                                                                        <option value="PA">Pennsylvania</option>
                                                                        <option value="RI">Rhode Island</option>
                                                                        <option value="SC">South Carolina</option>
                                                                        <option value="SD">South Dakota</option>
                                                                        <option value="TN">Tennessee</option>
                                                                        <option value="TX">Texas</option>
                                                                        <option value="UT">Utah</option>
                                                                        <option value="VT">Vermont</option>
                                                                        <option value="VA">Virginia</option>
                                                                        <option value="WA">Washington</option>
                                                                        <option value="WV">West Virginia</option>
                                                                        <option value="WI">Wisconsin</option>
                                                                        <option value="WY">Wyoming</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button type="submit"
                                                            class="btn btn-outline-light mt-3"id="">Store <i
                                                                class="bi bi-plus-square"></i></button>
                                                        @if ($userBillings->isNotEmpty())
                                                            <button type="button" class="btn btn-primary mt-3 mx-2"
                                                                id="shippingBtn">Continue..</button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="checkout-item section-show" style="display: none;" id="shipping-info-section">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-truck text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-3">Shipping Info</h5>
                                        <div class="mb-3">
                                            <div class="row gap-3">
                                                @if ($userAddresses)
                                                    @foreach ($userAddresses as $item)
                                                        <div class="col-lg-4">
                                                            <input type="radio"
                                                                id="shippingAddress{{ $loop->iteration }}"
                                                                name="selectedShippingAddress"
                                                                value="{{ $item->id }}"
                                                                class="shipping-radio-button" />
                                                            <label for="shippingAddress{{ $loop->iteration }}"
                                                                class="custom-border shipping-address-label">
                                                                <div class="p-3">
                                                                    <h3 class="h6">Shipping address
                                                                        {{ $loop->iteration }}</h3>
                                                                    <address>
                                                                        <strong>{{ $item->name }}</strong><br>
                                                                        {{ $item->street }}<br>
                                                                        {{ $item->city }}, {{ $item->state }}
                                                                        {{ $item->zip }}<br>
                                                                    </address>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <form method="post" action="{{ route('address.store') }}"
                                                    class="mt-3" id="address">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Street and building no.</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Street" name="street" />
                                                                    <span class="input-group-addon"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label><span class="hidden-xs">City</span>
                                                                </label>
                                                                <input type="text" name="city"
                                                                    class="form-control" placeholder="City" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>ZIP</label>
                                                                <input type="text" name="zip"
                                                                    placeholder="ZIP" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 pull-right">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <select name="state" class="form-control">
                                                                    <option value="" disabled selected>Select
                                                                        State</option>
                                                                    <option value="AL">Alabama</option>
                                                                    <option value="AK">Alaska</option>
                                                                    <option value="AZ">Arizona</option>
                                                                    <option value="AR">Arkansas</option>
                                                                    <option value="CA">California</option>
                                                                    <option value="CO">Colorado</option>
                                                                    <option value="CT">Connecticut</option>
                                                                    <option value="DE">Delaware</option>
                                                                    <option value="FL">Florida</option>
                                                                    <option value="GA">Georgia</option>
                                                                    <option value="HI">Hawaii</option>
                                                                    <option value="ID">Idaho</option>
                                                                    <option value="IL">Illinois</option>
                                                                    <option value="IN">Indiana</option>
                                                                    <option value="IA">Iowa</option>
                                                                    <option value="KS">Kansas</option>
                                                                    <option value="KY">Kentucky</option>
                                                                    <option value="LA">Louisiana</option>
                                                                    <option value="ME">Maine</option>
                                                                    <option value="MD">Maryland</option>
                                                                    <option value="MA">Massachusetts</option>
                                                                    <option value="MI">Michigan</option>
                                                                    <option value="MN">Minnesota</option>
                                                                    <option value="MS">Mississippi</option>
                                                                    <option value="MO">Missouri</option>
                                                                    <option value="MT">Montana</option>
                                                                    <option value="NE">Nebraska</option>
                                                                    <option value="NV">Nevada</option>
                                                                    <option value="NH">New Hampshire</option>
                                                                    <option value="NJ">New Jersey</option>
                                                                    <option value="NM">New Mexico</option>
                                                                    <option value="NY">New York</option>
                                                                    <option value="NC">North Carolina</option>
                                                                    <option value="ND">North Dakota</option>
                                                                    <option value="OH">Ohio</option>
                                                                    <option value="OK">Oklahoma</option>
                                                                    <option value="OR">Oregon</option>
                                                                    <option value="PA">Pennsylvania</option>
                                                                    <option value="RI">Rhode Island</option>
                                                                    <option value="SC">South Carolina</option>
                                                                    <option value="SD">South Dakota</option>
                                                                    <option value="TN">Tennessee</option>
                                                                    <option value="TX">Texas</option>
                                                                    <option value="UT">Utah</option>
                                                                    <option value="VT">Vermont</option>
                                                                    <option value="VA">Virginia</option>
                                                                    <option value="WA">Washington</option>
                                                                    <option value="WV">West Virginia</option>
                                                                    <option value="WI">Wisconsin</option>
                                                                    <option value="WY">Wyoming</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 pull-right">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="form-control" name="country">
                                                                    <option selected disabled>--Select Country
                                                                    </option>
                                                                    <option value="US">United States
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button type="submit" class="btn btn-outline-light mt-3"
                                                            id="">Store <i
                                                                class="bi bi-plus-square"></i></button>
                                                        @if ($userAddresses->isNotEmpty())
                                                            <button type="button" class="btn btn-primary mt-3 mx-2"
                                                                id="paymentBtn">Continue..</button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class="checkout-item section-show" style="display: none;" id="payment-info-section">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-3">Payment method</h5>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method"
                                                            id="pay-methodoption1" class="card-radio-input">
                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                            Credit / Debit Card
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method"
                                                            id="pay-methodoption3" class="card-radio-input"
                                                            checked="">

                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <i class="bx bx-money d-block h2 mb-3"></i>
                                                            <span>Cash on Delivery</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  gap-3 mt-3" id="card-pick" style="display: none">
                                        @if ($userCards)
                                            @foreach ($userCards as $item)
                                                <div class="col-lg-6">
                                                    <input type="radio" id="card{{ $loop->iteration }}"
                                                        name="card" value="{{ $item->id }}"
                                                        class="card-radio-button" />
                                                    <label for="card{{ $loop->iteration }}"
                                                        class="custom-border card-label d-flex">
                                                        <div class="p-3">
                                                            <h3 class="h6">Card
                                                                {{ $loop->iteration }}</h3>
                                                            <address">
                                                                <strong>Number: {{ $item->number }}</strong><br>
                                                                Exp: {{ $item->expiration_date }}<br>
                                                                CVC: {{ $item->cvc }}
                                                                Holder: {{ $item->holder }}
                                                                </address>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <form method="POST" action="{{ route('card.store') }}" class="mt-3"
                                        id="card-details">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>CARD NUMBER</label>
                                                    <div class="input-group">
                                                        <input type="tel" class="form-control"
                                                            placeholder="Valid Card Number" name="number" />
                                                        <span class="input-group-addon"><span
                                                                class="fa fa-credit-card"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7 col-md-7">
                                                <div class="form-group">
                                                    <label><span class="hidden-xs">EXPIRATION</span><span
                                                            class="visible-xs-inline">EXP</span> DATE</label>
                                                    <input type="date" name="expiration_date" class="form-control"
                                                        placeholder="MM / YY" />
                                                </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5 pull-right">
                                                <div class="form-group">
                                                    <label>CVC CODE</label>
                                                    <input type="tel" name="cvc" class="form-control"
                                                        placeholder="CVC" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>CARD OWNER</label>
                                                    <input type="text" name="holder" class="form-control"
                                                        placeholder="Card Owner Names" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-light mt-3"
                                            id="">Store <i class="bi bi-plus-square"></i></button>
                                    </form>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <form action="{{ route('order.store') }}" method="POST" id="mainOrderForm">
                        @csrf
                        <input type="hidden" id="postBilling" name="postBilling" value="">
                        <input type="hidden" id="postShipping" name="postShipping" value="">
                        <input type="hidden" id="postCard" name="postCard" value="">
                        <input type="hidden" name="total" value="{{ $productTotal }}">
                        @foreach ($products as $product)
                            <input type="hidden" name="productIds[]" value="{{ $product->id }}">
                            <input type="hidden" name="quantities[]" value="{{ $product->pivot->quantity }}">
                        @endforeach
                        <button type="submit" class="btn btn-primary my-3" id="cash-button"
                            style="display: none">Place
                            Order</button>
                    </form>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <a href="ecommerce-products.html" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->

                </div> <!-- end row-->
            </div>
            <div class="col-xl-4">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-3">
                            <h5 class="font-size-16 mb-0">Order Summary
                            </h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                        <th class="border-top-0" scope="col">Product Desc</th>
                                        <th class="border-top-0" scope="col">Price</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <hr>
                                        </td>
                                        <td>
                                            <hr>
                                        </td>
                                        <td>
                                            <hr>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr">
                                            <th scope="row"><img src="{{ asset('storage/' . $product->imgUrl) }}"
                                                    alt="product-img" title="product-img" class="avatar-lg rounded">
                                            </th>
                                            <td>
                                                <h5 class="font-size-16 text-truncate"><a href="#"
                                                        class="text-dark">{{ $product->name }}</a></h5>

                                                <p class="text-muted mb-0 mt-1">${{ $product->price }} x
                                                    {{ $product->pivot->quantity }}</p>
                                            </td>
                                            @php
                                                $productPrice = 0;
                                                $productPrice += $product->price * $product->pivot->quantity;
                                            @endphp
                                            <td>${{ $productPrice }}</td>
                                            </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <hr>
                                        </td>
                                        <td>
                                            <hr>
                                        </td>
                                        <td>
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Sub Total :</h5>
                                        </td>
                                        <td>
                                            ${{ $productTotal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                        </td>
                                        <td>
                                            Free shipping
                                        </td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>
                                            <hr>
                                        </td>
                                        <td>
                                            <hr>
                                        </td>
                                        <td>
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 fw-bold m-0">Total:</h5>
                                        </td>
                                        <td class="fw-bold">
                                            ${{ $productTotal }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cardOption = document.getElementById('pay-methodoption1');
                const cashOption = document.getElementById('pay-methodoption3');
                const cardDetailsForm = document.getElementById('card-details');
                const cashButton = document.getElementById('cash-button');

                const shippingBtn = document.getElementById('shippingBtn');
                const paymentBtn = document.getElementById('paymentBtn');

                const checkoutItem1 = document.querySelector('.activity-checkout .checkout-item:first-child');
                const checkoutItem2 = document.querySelector('.activity-checkout .checkout-item:nth-child(2)');
                const checkoutItem3 = document.querySelector('.activity-checkout .checkout-item:nth-child(3)');
                const getCard = document.getElementById('card-pick');
                const getCashButton = document.getElementById('cash-button');

                function manageSections(nextSectionId) {
                    const allSections = document.querySelectorAll('.section-show');
                    allSections.forEach(section => {
                        section.classList.remove('active');
                    });

                    const section = document.getElementById(nextSectionId);
                    if (section) {
                        section.style.display = 'block';
                        requestAnimationFrame(() => {
                            section.classList.add('active');

                        });
                    }
                }

                shippingBtn.addEventListener('click', () => {
                    manageSections('shipping-info-section');
                    console.log(checkoutItem1);
                    checkoutItem1.style.borderLeft = "2px solid #41355528";
                });

                paymentBtn.addEventListener('click', () => {
                    manageSections('payment-info-section');
                    console.log(checkoutItem2);
                    checkoutItem1.style.borderLeft = "2px solid #41355528";
                    checkoutItem2.style.borderLeft = "2px solid #41355528";
                    checkoutItem2.classList.add('active');
                    cashButton.style.display = 'block';

                });

                // Handle payment method toggling
                function toggleCardDetails() {
                    if (cardOption.checked) {
                        cardDetailsForm.style.display = 'block';
                        getCard.style.display = 'block';
                    } else {
                        cardDetailsForm.style.display = 'none';
                        getCard.style.display = 'none';
                    }
                }

                cardOption.addEventListener('change', toggleCardDetails);
                cashOption.addEventListener('change', toggleCardDetails);

                toggleCardDetails();
                manageSections('billing-info-section');
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const billingRadios = document.querySelectorAll('input[name="selectedBillingAddress"]');
                billingRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.checked) {
                            document.getElementById('postBilling').value = this.value;
                        }
                    });
                });

                const shippingRadios = document.querySelectorAll('input[name="selectedShippingAddress"]');
                shippingRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.checked) {
                            document.getElementById('postShipping').value = this.value;
                        }
                    });
                });

                const paymentRadios = document.querySelectorAll('input[name="card"]');
                paymentRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.checked) {
                            document.getElementById('postCard').value = this.value;
                        }
                    });
                });
            });
        </script>
    @endsection
</x-layout>
