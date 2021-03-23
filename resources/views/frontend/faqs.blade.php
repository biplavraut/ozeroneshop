<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>FAQs | {{ $seo->title }}</title>
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
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">FAQs</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="/">Home</a></li>
                            <li><a href="/products/all">Shop</a></li>
                            <li>FAQs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="wow animate__fadeIn">
            <div class="container">
            <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-five-bottom">
                        <h6 class="alt-font text-extra-dark-gray font-weight-500">Frequently Asked Questions</h6>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 col-md-10">
                        <div class="panel-group accordion-style-01 no-margin-bottom" id="accordion-style-01">
                            <!-- start accordion item -->
                            @foreach($faqs as $index => $faq)
                            <!-- <div class="toggle__item">
                            <input class="toggle__input" id="{{ $faq->slug }}" type="checkbox" name="toggle">
                            <label class="toggle__label" for="{{ $faq->slug }}"><i class="fas fa-question-circle blue"></i> {{ $faq->title }} <span></span></label>
                                <div class="toggle__content">
                                <p>{{ strip_tags($faq->excerpt) }}</p>
                                </div>
                            </div> -->
                            <div class="panel bg-transparent">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-style-01" href="#{{ $faq->slug }}">
                                        <div class="panel-title">
                                            <span class="text-extra-dark-gray font-weight-500 d-inline-block">
                                                <span class="d-inline-block margin-25px-right">Q.</span>{{ $faq->title }}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div id="{{ $faq->slug }}" class="panel-collapse collapse {{ $index == 0 ? 'show' : '' }} " data-parent="#accordion-style-01">
                                    <div class="panel-body">
                                        <div class="border-left border-width-2px border-color-fast-blue padding-40px-left">{{ strip_tags($faq->excerpt) }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
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