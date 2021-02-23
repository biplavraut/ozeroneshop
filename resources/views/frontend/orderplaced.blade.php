<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Order Placed | {{ $seo->title }}</title>
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
    <body data-mobile-nav-style="classic" class="body-reload" data-page="shoppingcart">
        @include('frontend.includes.header')
        <div class="main-content">
        <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">Order Placed</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="/">Home</a></li>
                            <li><a href="/products/all">Shop</a></li>
                            <li>Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="big-section wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-seven-bottom">
                        <h6 class="alt-font text-extra-dark-gray font-weight-500">Order has been placed</h6>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
                    <!-- start process step item -->
                    <div class="col text-center process-step-style-01 last-paragraph-no-margin md-margin-50px-bottom wow animate__fadeIn">
                        <div class="process-step-icon-box margin-40px-bottom sm-margin-30px-bottom">
                            <span class="process-step-bfr bg-dark-gray w-80px h-1px opacity-2 d-none d-sm-block"></span>
                            <div class="process-step-icon bg-white"><i class="line-icon-Gift-Box icon-large text-gradient-light-purple-light-orange"></i></div>
                        </div>
                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-10px-bottom">Order Placed</span>
                        <p class="w-85 d-inline-block lg-w-100 md-w-70 sm-w-90">Your order has been placed.</p>
                    </div>
                    <!-- end process step item -->
                    <!-- start process step item -->
                    <div class="col text-center process-step-style-01 last-paragraph-no-margin md-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="process-step-icon-box margin-40px-bottom sm-margin-30px-bottom">
                            <span class="process-step-bfr bg-dark-gray w-80px h-1px opacity-2 d-none d-lg-block"></span>
                            <div class="process-step-icon bg-white"><i class=" line-icon-Headset icon-large text-gray"></i></div>
                        </div>
                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-10px-bottom">Order Confirmation</span>
                        <p class="w-85 d-inline-block lg-w-100 md-w-70 sm-w-90">We will call you on the provided number to confirm your order. </p>
                    </div>
                    <!-- end process step item -->
                    <!-- start process step item -->
                    <div class="col text-center process-step-style-01 last-paragraph-no-margin xs-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                        <div class="process-step-icon-box margin-40px-bottom sm-margin-30px-bottom">
                            <span class="process-step-bfr bg-dark-gray w-80px h-1px opacity-2 d-none d-sm-block"></span>
                            <div class="process-step-icon bg-white"><i class=" line-icon-Truck icon-large text-gray"></i></div>
                        </div>
                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-10px-bottom">Shipping</span>
                        <p class="w-85 d-inline-block lg-w-100 md-w-70 sm-w-90">As soon as we confirm order we will process it for delivery.</p>
                    </div>
                    <!-- end process step item -->
                    <!-- start process step item -->
                    <div class="col text-center process-step-style-01 last-paragraph-no-margin wow animate__fadeIn" data-wow-delay="0.6s">
                        <div class="process-step-icon-box margin-40px-bottom sm-margin-30px-bottom">
                            <span class="process-step-bfr bg-dark-gray w-80px h-1px opacity-2"></span>
                            <div class="process-step-icon bg-white"><i class=" line-icon-Friendster icon-large text-gray"></i></div>
                        </div>
                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-10px-bottom">Delivered</span>
                        <p class="w-85 d-inline-block lg-w-100 md-w-70 sm-w-90">Thank you for shopping with us. Visit us again.</p>
                    </div>
                    <!-- end process step item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="cover-background wow animate__fadeIn" style="background: url('{{asset('desktop/materials/footer-background.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6 col-lg-7 wow animate__fadeIn">
                        <div class="margin-25px-bottom text-white opacity-6 alt-font">We are a Nepal based online electronics shop.</div>
                        <h3 class="alt-font text-white font-weight-500 margin-40px-bottom">We deliver Happiness at your Doorstep. <br>Live Smart Live Easy</h3>
                        <a href="mailto:info@ozeroneshop.com" class="btn btn-large btn-expand-ltr text-white lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr">info@ozeroneshop.com<span class="bg-transparent-black"></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
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
    </body>
</html>