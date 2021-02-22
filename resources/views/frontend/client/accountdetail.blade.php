
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Update Account Detail – Ozerone Shop, Online electronics shop in Nepal</title>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Ozeroneshop">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
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
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">Update Account</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="/">Home</a></li>
                            <li><a href="/dashboard">Dashboard</a> </li>
                            <li>Account Setting</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        
        <!-- start section -->
        <section class="wow animate__fadeIn">
        @auth
        <!-- start section -->
        <section class="border-top border-width-1px border-color-medium-gray pt-0 wow animate__fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0 tab-style-07">
                        <ul class="nav nav-tabs justify-content-center text-center alt-font font-weight-500 text-uppercase margin-4-rem-bottom border-bottom border-color-medium-gray md-margin-50px-bottom sm-margin-35px-bottom">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#accountinformation">Account information</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#updatepassword">Update Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center xs-no-margin-lr">
                @if(Session::has('success_message'))
                <!-- start message box item -->
                <div class="col-12 col-md-9 col-lg-7 margin-35px-bottom alert alert-success alert-dismissible fade in show" role="alert">
                    <button type="button" class="close line-height-unset" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Success!</strong> {{ Session::get('success_message') }}
                </div>
                <!-- end message box item -->
                @endif
                @if(Session::has('error_message'))
                <div class="col-12 col-md-9 col-lg-7 margin-35px-bottom alert alert-warning alert-dismissible fade in show" role="alert">
                    <button type="button" class="close line-height-unset" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Warning!</strong> {{ Session::get('error_message') }}
                </div>
                @endif
                </div>
                <div class="tab-content">
                    <!-- start tab item -->
                    <div id="accountinformation" class="tab-pane fade in active show">
                        <div class="row justify-content-center">
                            <div class="col-12 col-xl-5 col-md-6 lg-padding-30px-lr md-padding-15px-lr sm-margin-40px-bottom">
                                <form method="post" action="/accountupdate">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Name <span class="text-radical-red">*</span></label>
                                            <input class="small-input" type="text" name="name" value="{{$customer->name}}" required placeholder="Name">
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Email address <span class="text-radical-red">Can not edit</span></label>
                                            <input class="small-input" type="text" name="email" value="{{$customer->email}}" placeholder="Email" disabled>
                                        </div>                                 
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Primary Phone <span class="text-radical-red">*</span></label>
                                            <input class="small-input" type="text" name="primary_phone" value="{{$customer->primary_phone}}" placeholder="Primary Phone" required>
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Secondary Phone </label>
                                            <input class="small-input" type="text" name="secondary_phone" value="{{$customer->secondary_phone}}" placeholder="Secondary Phone">
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Gender </label>
                                            <select name="gender" class="small-input">
                                                <option {{ ($customer->gender == null) ? "selected" : "" }} disabled="disabled">Select Gender</option>
                                                <option value="Male" {{ ($customer->gender == 'Male') ? "selected" : "" }}>Male</option>
                                                <option value="Female" {{ ($customer->gender == 'Female') ? "selected" : "" }}>Female</option>
                                                <option value="Other" {{ ($customer->gender == 'Other') ? "selected" : "" }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                        <label class="margin-15px-bottom">Date of Birth </label>
                                            <input type="date" name="dob" value="{{$customer->dob}}" class="small-input required" placeholder="Birth Date" />
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Street address <span class="text-radical-red">*</span></label>
                                            <textarea class="medium-input" rows="5" cols="5" name="address" placeholder="District, Area, Landmarks, House number and street name">{{$customer->address}}</textarea>
                                        </div>
                                        <button class="btn btn-medium btn-fancy btn-fast-blue w-100" type="submit">{{ __('Update') }}</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end tab item -->
                    <!-- start tab item -->
                    <div id="updatepassword" class="tab-pane fade">                        
                        <div class="row justify-content-center">
                            <div class="col-12 col-xl-5 col-md-6 lg-padding-30px-lr md-padding-15px-lr sm-margin-40px-bottom">
                                <form method="post" action="#">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12 margin-10px-bottom">
                                            <label class="margin-15px-bottom">Old Password <span class="text-radical-red">*</span></label>
                                            <input class="small-input" type="text" name="old_password" value="" required placeholder="Name">
                                        </div>
                                        <div class="col-12 margin-10px-bottom">
                                            <label for="password" class="margin-15px-bottom">{{ __('Password') }} <span class="required-error text-radical-red">*</span></label>
                                            <input id="password" class="small-input bg-white margin-20px-bottom required @error('password') is-invalid @enderror" type="password" name="new_password" placeholder="Enter your password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>                                 
                                        <div class="col-12 margin-10px-bottom">
                                            <label for="password-confirm" class="margin-15px-bottom">{{ __('Confirm Password') }} <span class="required-error text-radical-red">*</span></label>
                                            <input id="password-confirm" class="small-input bg-white margin-20px-bottom required" type="password" name="password_confirmation" placeholder="Re-Enter your password" required autocomplete="new-password">
                                            
                                        </div>
                                        <button class="btn btn-medium btn-fancy btn-fast-blue w-100" type="submit">{{ __('Update Password') }}</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end tab item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        @endif
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="cover-background wow animate__fadeIn" style="background: url('{{asset('desktop/materials/footer-background.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6 col-lg-7 wow animate__fadeIn">
                        <div class="margin-25px-bottom text-white opacity-6 alt-font">We are a Nepal based online electronics shop.</div>
                        <h3 class="alt-font text-white font-weight-500 margin-40px-bottom">We deliver Happiness at your Doorstep. <br>Live Smart Live Easy</h3>
                        <a href="mailto:info@yourdomain.com" class="btn btn-large btn-expand-ltr text-white lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr">info@ozeroneshop.com<span class="bg-transparent-black"></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
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