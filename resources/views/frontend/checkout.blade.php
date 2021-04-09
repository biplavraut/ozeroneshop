    <!doctype html>
    <html class="no-js" lang="en">
        <head>
            <!-- title -->
            <title>Checkout | {{ $seo->title }}</title>
            <meta charset="utf-8">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
            @include('frontend.includes.meta')
            <!-- favicon icon -->
            <link rel="shortcut icon" href="{{asset('desktop/logo/favicon.png')}}">
            <link rel="apple-touch-icon" href="{{asset('desktop/logo/apple-touch-icon-57x57.png')}}">
            <link rel="apple-touch-icon" sizes="72x72" href="{{asset('desktop/logo/apple-touch-icon-72x72.png')}}">
            <link rel="apple-touch-icon" sizes="114x114" href="{{asset('desktop/logo/apple-touch-icon-114x114.png')}}">
            <!-- style sheets and font icons  -->
            <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/font-icons.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/theme-vendors.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/style.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/responsive.css')}}" />
        </head>
        <body data-mobile-nav-style="classic">
            @include('frontend.includes.header')
            <div class="main-content">
            <!-- start page title -->
            <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-xl-8 col-lg-6">
                            <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">Checkout</h1>
                        </div>
                        <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                            <ul class="xs-text-center">
                                <li><a href="/">Home</a></li>
                                <li><a href="/products/all">Shop</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end page title -->
            <!-- start section -->
            @auth
            <section class="wow animate__fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7 col-md-6 padding-70px-right lg-padding-40px-right md-padding-15px-right">
                            <span class="alt-font text-large text-extra-dark-gray margin-40px-bottom d-inline-block font-weight-500">Billing details</span>
                            <div class="row justify-content-center">
                            <div class="col-12 margin-10px-bottom">
                                <div class="card">
                                    <div class="card-header">
                                        <div style="display:flex;">
                                            Account Detail
                                            <a href="/accountdetail" style="position:absolute; right: 40px;"><span> Setting <i class="fas fa-cog"></i> </span></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Name: {{ $customer->name }}</li>
                                            <li class="list-group-item">Email: {{ $customer->email }}</li>
                                            <li class="list-group-item">Primary Phone <span class="text-radical-red">*</span>: {{ $customer->primary_phone }}</li>
                                            <li class="list-group-item">Secondary Phone: {{ $customer->primary_phone }}</li>
                                            <li class="list-group-item">Address <span class="text-radical-red">*</span>: {{ $customer->address }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 margin-10px-bottom">
                                <div class="card">
                                    <div class="card-header">
                                        <div style="display:flex;">
                                            Shipping Detail
                                            <a href="/shippingdetail" style="position:absolute; right: 40px;"><span> Edit Detail <i class="fas fa-edit"></i> </span></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Name<span class="text-radical-red">*</span>: {{ $shipping->name }}</li>
                                            <li class="list-group-item">Email <span class="text-radical-red">*</span>: {{ $shipping->email }}</li>
                                            <li class="list-group-item">Primary Phone <span class="text-radical-red">*</span>: {{ $shipping->primary_phone }}</li>
                                            <li class="list-group-item">Secondary Phone: {{ $shipping->secondary_phone }}</li>
                                            <li class="list-group-item">Address <span class="text-radical-red">*</span>: {{ $shipping->address }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-12 col-lg-5 col-md-6">
                            <div class="bg-light-gray padding-45px-all lg-padding-30px-all sm-padding-20px-all">
                                <span class="alt-font text-large text-extra-dark-gray margin-25px-bottom d-inline-block font-weight-500">Your order</span>
                                <table class="total-price-table checkout-total-price-table">
                                    <thead class="border-bottom border-width-1px border-color-medium-gray text-extra-dark-gray">
                                        <tr>
                                            <th class="product-name font-weight-500 w-60">Product</th>
                                            <th class="product-total pr-0 font-weight-500">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if(Cart::count() > 0)
                                            @foreach(Cart::content() as $item)
                                            <tr>
                                                <td>{{$item->model->title}} × {{$item->qty}}<span class="d-block w-100">Color:Red</span></td>
                                                <td>NPR {{$item->subtotal}}</td>
                                            </tr>
                                            @php
                                                $total += $item->subtotal;
                                                $grand_total = $total;
                                            @endphp
                                            @endforeach
                                            @else
                                            <tr><td><b>No Product in Cart</b></td></tr>
                                        @endif
                                        <tr>
                                            <th class="font-weight-500 text-extra-dark-gray">Subtotal</th>
                                            <td class="text-extra-dark-gray">NPR {{Cart::subtotal()}}</td>
                                        </tr>
                                        <tr class="shipping">
                                            <th class="font-weight-500 text-extra-dark-gray">Shipping</th>
                                            <td>
                                                <ul class="margin-15px-bottom">
                                                    <li class="d-flex align-items-center md-margin-15px-bottom">
                                                        <input id="free_shipping" type="radio" name="shipping-option" class="d-block w-auto margin-10px-right mb-0" checked="checked">
                                                        <label class="md-line-height-18px" for="free_shipping">Free shipping</label>
                                                    </li>
                                                    <!-- <li class="d-flex align-items-center">
                                                        <input id="local_pickup" type="radio" name="shipping-option" class="d-block w-auto margin-10px-right mb-0">
                                                        <label class="md-line-height-18px" for="local_pickup">Local pickup</label>
                                                    </li> -->
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th class="font-weight-500 text-extra-dark-gray">Payment</th>
                                            <td>
                                                <ul class="margin-15px-bottom">
                                                    <li class="d-flex align-items-center md-margin-15px-bottom">
                                                        <input id="cod" type="radio" name="payment-option" class="d-block w-auto margin-10px-right mb-0" checked="checked">
                                                        <label class="md-line-height-18px" for="cod">Cash on Delivery</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="total-amount">
                                            <th class="font-weight-500 text-extra-dark-gray">Total</th>
                                            <td>
                                                <div id="promo-discount">
                                                    @auth
                                                        @php
                                                        $discount_amount = 0;
                                                        if (is_numeric((int)$total)) {
                                                            # code...
                                                            $discount_amount = (int)$total*0.06;
                                                        }
                                                        $grand_total = $total - $discount_amount;
                                                        @endphp
                                                        Promo discount: {{ round($discount_amount) }}
                                                    @else
                                                        <strong>Sign Up!</strong> and enter promo code to receive discount.
                                                    @endif
                                                    <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">NPR {{round($grand_total)}}</h6>
                                                    <span class="text-small text-extra-medium-gray">(Includes tax)</span>
                                                </div>
                                                <div id="no-promo-discount">
                                                    @php
                                                    $grand_total = $total;
                                                    @endphp
                                                    <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">NPR {{round($grand_total)}}</h6>
                                                    <span class="text-small text-extra-medium-gray">(Includes tax)</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="md-margin-50px-bottom sm-margin-20px-bottom"> 
                                    <div class="coupon-code-panel">
                                        <input type="text" placeholder="Coupon code" id="promo-code">
                                        <a href="#" onclick="promo()" class="btn apply-coupon-btn text-uppercase">Apply</a>
                                    </div>
                                </div>
                                <!-- <p class="text-small">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a class="text-decoration-underline" href="#">privacy policy.</a></p>
                                <p class="d-flex align-items-center">
                                    <input class="d-inline w-auto mb-0 margin-10px-right" type="checkbox" name="terms-and-condition">
                                    <span class="text-small">I have read and agree to the website <a class="text-decoration-underline" href="#">terms and conditions</a><span class="text-red ml-1">*</span></span>
                                </p> -->
                                @if($shipping->primary_phone == '' || $shipping->address == '' )
                                    <a href="#" onclick="lessinfo()" class="btn btn-fancy btn-fast-blue btn-extra-large w-100 margin-15px-top">Place an order</a>
                                @else
                                    <a href="/order" class="btn btn-fancy btn-fast-blue btn-extra-large w-100 margin-15px-top">Place an order</a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @else
            <!-- end section -->
            <!-- start section -->
            <section class="wow animate__fadeIn checkout">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12" id="accordion1">
                            <!--start tab content -->
                            <div class="d-sm-flex justify-content-center align-items-center padding-10px-bottom text-center">
                                <i class="feather icon-feather-user text-fast-blue margin-10px-right"></i>
                                <span class="text-extra-dark-gray alt-font">Registered customer?&nbsp;</span><a class="accordion-toggle text-extra-dark-gray text-decoration-underline" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne"><span class="alt-font">Click here to login</span></a>
                            </div>
                            <div id="collapseOne" class="collapse text-center" data-parent="#accordion1">
                                <div class="w-40 mx-auto margin-4-half-rem-tb text-left lg-w-50 sm-w-100">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center elements-social social-icon-style-08">
                                            <ul class="medium-icon">
                                                <li>
                                                    <a href="{{ route('login.facebook')}}" class="facebook">
                                                        <span class="brand-label alt-font text-uppercase">facebook</span>
                                                        <span class="brand-icon fab fa-facebook-f"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('login.google')}}" class="google">
                                                        <span class="brand-label alt-font text-uppercase">google</span>
                                                        <span class="brand-icon fab fa-google"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row margin-10px-bottom text-left">
                                    <form method="POST" action="{{ route('login') }}" class="bg-light-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all">
                                        @csrf    
                                        <label for="email" class="margin-15px-bottom">{{ __('E-Mail Address') }} <span class="required-error text-radical-red">*</span></label>
                                        <input class="small-input bg-white margin-20px-bottom required @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="password" class="margin-15px-bottom">{{ __('Password') }} <span class="required-error text-radical-red">*</span></label>
                                        <input id="password" class="small-input bg-white margin-20px-bottom required @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="margin-25px-bottom">
                                            <input class="d-inline-block align-middle w-auto mb-0 margin-5px-right" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="d-inline-block align-middle">{{ __('Remember Me') }}</span> 
                                        </label>
                                        <input type="hidden" name="redirect" value="/checkout">
                                        <button class="btn btn-medium btn-fancy btn-fast-blue w-100 submit" type="submit">{{ __('Login') }}</button>
                                        @if (Route::has('password.request'))
                                        <p class="text-right margin-20px-top mb-0"><a href="{{ route('password.request') }}" class="btn btn-link  btn-medium text-extra-dark-gray">{{ __('Forgot Your Password?') }}</a></p>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
            <!-- start section -->
            <section class="pt-0 wow animate__fadeIn">
                <div class="container">
                    <form class="" method="post" action="/nologinorder">
                    @csrf
                        <div class="row">
                            <div class="col-12 col-lg-7 col-md-6 padding-70px-right lg-padding-40px-right md-padding-15px-right">
                                <span class="alt-font text-large text-extra-dark-gray margin-40px-bottom d-inline-block font-weight-500">Billing Details</span>
                                
                                    <div class="row">
                                        <div class="col-md-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Name <span class="text-radical-red">*</span></label>
                                            <input id="cust_name" class="small-input required @error('cust_name') is-invalid @enderror" type="text" name="cust_name" value="" placeholder="Thanos Bahadur*" required>
                                            @error('cust_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Please provide correct information</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Email address <span class="text-radical-red">*</span></label>
                                            <input id="cust_email" class="small-input required @error('cust_email') is-invalid @enderror" type="text" name="cust_email" placeholder="iron@man.com*" value="" required>
                                            @error('cust_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>                                 
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Primary Phone <span class="text-radical-red">*</span></label>
                                            <input id="cust_primary_phone" class="small-input required @error('cust_primary_phone') is-invalid @enderror" name="cust_primary_phone" type="text" placeholder="Primary Phone*" value="" required>
                                            @error('cust_primary_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Please provide correct information</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Secondary Phone <span class="text-radical-red">*</span></label>
                                            <input id="cust_secondary_phone" class="small-input" name="cust_secondary_phone" type="text" placeholder="Secondary Phone*" value="">
                    
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Street address <span class="text-radical-red">*</span></label>
                                            <textarea id="cust_address" name="cust_address" class="medium-input required" rows="5" cols="5" placeholder="District, Area, Landmarks, House number and street name" required></textarea>
                                        </div>
                                        
                                        <!-- start tab content -->    
                                        <div class="col-md-12 checkout-accordion">
                                            <p class="title mb-2 d-flex">
                                                <label>
                                                    <input class="d-inline w-auto mb-0 mr-2 mt-1" onclick="sameShipAddress()" type="radio" name="account" value="1">
                                                    <span class="d-inline-block text-decoration-none">Ship to same address?</span> 
                                                    <a class="accordion-toggle text-black" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour"></a>
                                                </label>
                                            </p>
                                            <!-- <div id="collapseThree" class="collapse">
                                                <div class="padding-25px-left margin-2-half-rem-bottom md-no-padding-left">
                                                    <label class="margin-15px-bottom">The items will be delivered to billing address <span class="text-radical-red">*</span></label>
                                                        
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- end tab content -->
                                        <!-- start tab content -->
                                        <div class="col-md-12 checkout-accordion">
                                            <p class="title mb-2 d-flex">
                                                <label>
                                                    <input class="d-inline w-auto mb-0 mr-2 mt-1" type="radio" onclick="sameShipAddress()" name="account" value="0">
                                                    <span class=" d-inline-block text-decoration-none">Ship to a different address?</span> 
                                                    <a class="accordion-toggle text-black" data-parent="#accordion1"></a>
                                                </label>
                                            </p>
                                            <div id="collapseFour">
                                                <div class="padding-25px-left margin-2-half-rem-bottom md-no-padding-left">
                                                    <div class="row">
                                                    <div class="col-md-12 margin-10px-bottom">
                                                        <label class="margin-15px-bottom">Name <span class="text-radical-red">*</span></label>
                                                        <input id="ship_name" value="" class="small-input required @error('ship_name') is-invalid @enderror" type="text" name="ship_name" required>
                                                        @error('ship_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>Please provide correct information</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 margin-10px-bottom">
                                                        <label class="margin-15px-bottom">Email address</label>
                                                        <input id="ship_email" class="small-input" type="text" value="" name="ship_email">
                                                    </div>                                 
                                                    <div class="col-12 margin-10px-bottom">
                                                        <label class="margin-15px-bottom">Primary Phone <span class="text-radical-red">*</span></label>
                                                        <input id="ship_primary_phone" value="" class="small-input required @error('ship_primary_phone') is-invalid @enderror" type="text" name="ship_primary_phone" required>
                                                        @error('ship_primary_phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>Please provide correct information</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 margin-10px-bottom">
                                                        <label class="margin-15px-bottom">Secondary Phone (optional)</label>
                                                        <input id="ship_secondary_phone" class="small-input" name="ship_secondary_phone" value="" type="text">
                                                    </div>
                                                    <div class="col-12 margin-10px-bottom">
                                                        <label class="margin-15px-bottom">Street address <span class="text-radical-red">*</span></label>
                                                        <textarea id="ship_address" class="medium-input required" name="ship_address" rows="5" cols="5" placeholder="District, Area, Landmarks, House number and street name" required></textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end tab content -->
                                        <!-- <div class="col-12 margin-15px-top">
                                            <label class="margin-15px-bottom">Order notes (optional)</label>
                                            <textarea class="medium-input" rows="5" cols="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div> -->
                                    </div>
                                
                            </div>
                            <div class="col-12 col-lg-5 col-md-6">
                                <div class="bg-light-gray padding-45px-all lg-padding-30px-all sm-padding-20px-all">
                                    <span class="alt-font text-large text-extra-dark-gray margin-25px-bottom d-inline-block font-weight-500">Order Details</span>
                                    <table class="total-price-table checkout-total-price-table">
                                        <thead class="border-bottom border-width-1px border-color-medium-gray text-extra-dark-gray">
                                            <tr>
                                                <th class="product-name font-weight-500 w-60">Product</th>
                                                <th class="product-total pr-0 font-weight-500">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @if(Cart::count() > 0)
                                                @foreach(Cart::content() as $item)
                                                <tr>
                                                    <td>{{$item->model->title}} × {{$item->qty}}<span class="d-block w-100">Color:Red</span></td>
                                                    <td>NPR {{$item->subtotal}}</td>
                                                </tr>
                                                @php
                                                    $total += $item->subtotal;
                                                    $grand_total = $total;
                                                @endphp
                                                @endforeach
                                                @else
                                                <tr><td><b>No Product in Cart</b></td></tr>
                                            @endif
                                            <tr>
                                                <th class="font-weight-500 text-extra-dark-gray">Subtotal</th>
                                                <td class="text-extra-dark-gray">NPR {{Cart::subtotal()}}</td>
                                            </tr>
                                            <tr class="shipping">
                                                <th class="font-weight-500 text-extra-dark-gray">Shipping</th>
                                                <td>
                                                    <ul class="margin-15px-bottom">
                                                        <li class="d-flex align-items-center md-margin-15px-bottom">
                                                            <input id="free_shipping" type="radio" name="shipping-option" class="d-block w-auto margin-10px-right mb-0" checked>
                                                            <label class="md-line-height-18px" for="free_shipping">Free shipping</label>
                                                        <!-- </li>
                                                        <li class="d-flex align-items-center">
                                                            <input id="local_pickup" type="radio" name="shipping-option" class="d-block w-auto margin-10px-right mb-0">
                                                            <label class="md-line-height-18px" for="local_pickup">Local pickup</label>
                                                        </li> -->
                                                    </ul>
                                                    <!-- <p class="text-left text-small mb-0">Shipping options will be updated during checkout.</p> -->
                                                </td>
                                            </tr>
                                            <tr class="total-amount">
                                                <th class="font-weight-500 text-extra-dark-gray">Total</th>
                                                <td>
                                                    
                                                    <div id="promo-discount">
                                                        @auth
                                                            @php
                                                            $discount_amount = 0;
                                                            if (is_numeric((int)$total)) {
                                                                # code...
                                                                $discount_amount = (int)$total*0.06;
                                                            }
                                                            $grand_total = $total - $discount_amount;
                                                            @endphp
                                                            Promo discount: {{ round($discount_amount) }}
                                                        @else
                                                            <strong>Sign Up!</strong> and enter promo code to receive discount.
                                                        @endif
                                                        <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">NPR {{round($grand_total)}}</h6>
                                                        <span class="text-small text-extra-medium-gray">(Includes tax)</span>
                                                    </div>
                                                    <div id="no-promo-discount">
                                                        @auth
                                                            @php
                                                            $discount_amount = 0;
                                                            if (is_numeric((int)$total)) {
                                                                # code...
                                                                $discount_amount = (int)$total*0.06;
                                                            }
                                                            $grand_total = $total - $discount_amount;
                                                            @endphp
                                                            Promo discount: {{ round($discount_amount) }}
                                                        @else
                                                            <strong>Sign Up!</strong> and enter promo code to receive discount.
                                                        @endif
                                                        <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">NPR {{round($grand_total)}}</h6>
                                                        <span class="text-small text-extra-medium-gray">(Includes tax)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="md-margin-50px-bottom sm-margin-20px-bottom"> 
                                        <div class="coupon-code-panel">
                                            <input type="text" placeholder="Coupon code" id="promo-code">
                                            <a href="#" onclick="promo()" class="btn apply-coupon-btn text-uppercase">Apply</a>
                                        </div>
                                    </div>
                                    <div class="padding-40px-all bg-white box-shadow-large margin-20px-top margin-40px-bottom checkout-accordion lg-padding-30px-all md-padding-20px-all sm-padding-15px-lr">
                                        <div class="w-100" id="accordion-style-05">
                                            
                                            <!-- start tab content -->
                                            <div class="heading active-accordion">
                                                <label>
                                                    <input class="d-inline w-auto margin-10px-right mb-0" type="radio" name="payment-option" checked>
                                                    <span class="d-inline-block">Cash on delivery</span>
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-style-05" href="#style-5-collapse-3"></a>
                                                </label>
                                            </div>
                                            <div id="style-5-collapse-3" class="collapse collapse" data-parent="#accordion-style-05">
                                                <div class="padding-30px-all text-small bg-light-gray margin-20px-tb sm-padding-20px-lr sm-padding-25px-tb">Pay with cash upon delivery.</div>
                                            </div>
                                            <!-- end tab content -->
                                            
                                        </div>
                                    </div>
                                    <!-- <p class="text-small">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a class="text-decoration-underline" href="#">privacy policy.</a></p>
                                    <p class="d-flex align-items-center">
                                        <input class="d-inline w-auto mb-0 margin-10px-right" type="checkbox" name="terms-and-condition">
                                        <span class="text-small">I have read and agree to the website <a class="text-decoration-underline" href="#">terms and conditions</a><span class="text-red ml-1">*</span></span>
                                    </p> -->
                                    <button type="submit" class="btn btn-fancy btn-fast-blue btn-extra-large w-100 margin-15px-top">Place order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- end section -->
            @endif
            <!-- end section -->
            @include('frontend.includes.bottombanner')
            </div>
            @include('frontend.includes.footer')
            <!-- start scroll to top -->
            <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
            <!-- end scroll to top -->
            <!-- javascript -->
            <script type="text/javascript" src="{{asset('desktop/js/jquery.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('desktop/js/theme-vendors.min.js')}}"></script>
            <script type="text/javascript" src="/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="{{asset('desktop/js/main.js')}}"></script>
            <script type="text/javascript" src="{{asset('desktop/js/custom.js')}}"></script>
            <script>
            function lessinfo(){
                swal(
                    'Insufficient Information!',
                    'Please update your account information and shipping details.',
                    'warning'
                    )
            }
            function sameShipAddress(){
                if($('input[name="account"]:checked').val() == 1){
                    $('#ship_name').val($('#cust_name').val());
                    $('#ship_email').val($('#cust_email').val());
                    $('#ship_primary_phone').val($('#cust_primary_phone').val());
                    $('#ship_secondary_phone').val($('#cust_secondary_phone').val());
                    $('#ship_address').val($('#cust_address').val());
                } else{
                    $('#ship_name').val("");
                    $('#ship_email').val("");
                    $('#ship_primary_phone').val("");
                    $('#ship_secondary_phone').val("");
                    $('#ship_address').val("");
                }
            }
            </script>
            <script>
                $( document ).ready(function() {
                    if($('#promo-code').val() == 'hny2078'){
                        $('#no-promo-discount').hide();
                        $('#promo-discount').show();
                    }else{
                        $('#no-promo-discount').show();
                        $('#promo-discount').hide();
                    }
                });          
                
                function promo(){
                    if($('#promo-code').val() == 'hny2078'){
                        $('#no-promo-discount').hide();
                        $('#promo-discount').show();
                    }else{
                        $('#no-promo-discount').show();
                        $('#promo-discount').hide();
                    }
                }
            </script>
        </body>
    </html>