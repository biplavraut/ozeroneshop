<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Login – Ozerone Shop, Online electronics shop in Nepal</title>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Ozeroneshop">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name='robots' content='noindex,nofollow'>
        <!-- description -->
        <meta name="description" content="">
        <!-- keywords -->
        <meta name="keywords" content="">
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
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">Account Login</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="/">Home</a></li>
                            <li>Login</li>
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
                    <div class="col-12 col-xl-5 col-md-6 lg-padding-30px-lr md-padding-15px-lr sm-margin-40px-bottom">
                        <h6 class="alt-font font-weight-500 text-extra-dark-gray">Login</h6>
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
                        <br>
                        <span>OR</span>
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
                            <input type="hidden" name="redirect" value="/dashboard">
                            <button class="btn btn-medium btn-fancy btn-fast-blue w-100 submit" type="submit">{{ __('Login') }}</button>
                            @if (Route::has('password.request'))
                            <p class="text-right margin-20px-top mb-0"><a href="{{ route('password.request') }}" class="btn btn-link  btn-medium text-extra-dark-gray">{{ __('Forgot Your Password?') }}</a></p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        @include('frontend.includes.bottombanner')
        </div>
        @include('frontend.includes.footer')
        <!-- end footer -->
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
