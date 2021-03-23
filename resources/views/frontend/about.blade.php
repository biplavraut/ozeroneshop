<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>About | {{ $seo->title }}</title>
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
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
          
            gtag('config', 'G-ZYKVHRYQWH');
          </script>
    </head>
    <body data-mobile-nav-style="classic">
        @include('frontend.includes.header')
        <div class="main-content">
        <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">About Us</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="/">Home</a></li>
                            <li><a href="/products/all">Shop</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="wow animate__fadeIn">
            <div class="container">
                <h2 class="mt-20">Hello,</h2>
                <h3>We are Ozerone</h3>
                <p class="welcome">
                    At Ozerone we try to solve problems that consumers face in buying electronics products: unsatisfactory products.
                </p>
                <p>Consumers need to know what products to buy, how to make the most out of them, and where to buy them. Consumers tend to buy cheap products to save some cash only to be upset and irritated by how bad the product is. Specially in buying online people tend to buy unsatisfactory products. Consumers need to identify the genuine product and not the products that are deceiving. We at Ozerone want to help people buy products that are truly valuable, products that actually are useful rather than giving unwanted problems without having to use it properly.</p>
                <p>Ozerone is an electronics and gadgets retail business that helps people by educating, entertaining and informing them about the latest products that will make their daily life livelier. </p>
                <!-- <blockquote>To empower people with the help of technologyand achieve great things together. </blockquote> -->
                <h3>Buy Smarter, Live Happier</h3>
                <p class="mb-40">We're proudly a fully immersive company, with Ozeroners working to make your buying choice smarter. We are on a mission to help our customers buy smarter from anywhere: both online and offline - and make their life more easy and productive.</p>
            
            </div>
        </section>
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
    </body>
</html>