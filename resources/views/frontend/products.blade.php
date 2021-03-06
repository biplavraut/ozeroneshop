<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <!-- title -->
        <title>{{$title}} | {{ $seo->title }}</title>
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
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/critical.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/font-icons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/theme-vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/responsive.css')}}" />
    </head>
    <body data-mobile-nav-style="classic">
        @include('frontend.includes.header')
        <div class="main-content">
            <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb sm-padding-20px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block">{{$title}}</h1>
                        <span class="alt-font text-medium d-block d-md-inline-block sm-margin-5px-top">{{ strip_tags($tagline) }}</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="padding-two-all">
            <div class="container">
                <div class="row justify-content-center xs-no-margin-lr">
                    <div class="swiper-container swiper-auto-slide padding-15px-tb black-move" data-slider-options='{ "slidesPerView": "auto",  "spaceBetween": 90, "scrollbar": {"el": ".swiper-scrollbar"} ,"navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 55000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            @if (request()->route()->getName() == 'brand.products')
                                @foreach($brands as $brand)
                                    @if($brand->parent_id == 0)
                                    <div class="swiper-slide">
                                        <div class="col text-center padding-40px-tb box-shadow-small-hover border-radius-6px transition wow animate__fadeIn {{ (request()->route()->slug == $brand->slug) ? 'active-category' : '' }}" data-wow-delay="0.1s">
                                            <a href="/brand/{{$brand->slug}}"><img class="margin-25px-bottom" src="{{asset('img/brand/'. $brand->image .'')}}" width="92px" alt="{{$brand->title}}" title="{{$brand->title}}"/></a>
                                            <span class="text-extra-medium font-weight-500 text-extra-dark-gray d-block mx-auto xs-w-100">{{$brand->title}}</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                @foreach($elect_categories as $elect_category)
                                    @if($elect_category->parent_id == 0)
                                    <div class="swiper-slide">
                                        <div class="col text-center padding-40px-tb box-shadow-small-hover border-radius-6px transition wow animate__fadeIn {{ (request()->route()->slug == $elect_category->slug) ? 'active-category' : '' }}" data-wow-delay="0.1s">
                                            <a href="/products/{{$elect_category->slug}} "><img class="margin-25px-bottom" src="{{asset('img/electronics/'. $elect_category->image .'')}}" width="92px" alt="{{$elect_category->title}}" title="{{$elect_category->title}}"/></a>
                                            <span class="text-extra-medium font-weight-500 text-extra-dark-gray d-block mx-auto xs-w-100">{{$elect_category->title}}</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif                            
                        </div>
                        <!-- start slider navigation -->
                        <div class="swiper-scrollbar"></div>
                        <!-- end slider navigation -->
                    </div>                 
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="bg-gray shopping-left-side-bar pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-8 shopping-content padding-55px-left md-padding-15px-left sm-margin-30px-bottom">
                        <ul class="product-listing shop-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large text-center">
                            <li class="grid-sizer"></li>
                            @php
                                $count = 0;
                            @endphp
                            @foreach($products as $product)
                            @php
                                $endloop = 0;
                            @endphp
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.{{$count}}s">
                                <div class="product-box border-radius-6px margin-25px-bottom xs-margin-15px-bottom box-shadow-small">
                                    <div class="product-image">
                                        <a href="/product-detail/{{$product->slug}}">
                                            @if(count($product->getImageRelation)>1)
                                                @foreach($product->getImageRelation as $display_image)
                                                    @if($display_image->primary == 1)
                                                    @php $image = $display_image->image; @endphp
                                                    <img class="default-image"  src="/img/product/{{ $product->slug }}/thumbs/{{ $image }}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/>
                                                    @endif
                                                    @if($display_image->primary != 1 && $endloop == 0)
                                                    @php $image = $display_image->image; $endloop = 1;  @endphp
                                                    <img class="hover-image" src="/img/product/{{ $product->slug }}/thumbs/{{ $image }}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($product->getImageRelation as $display_image)
                                                @if($display_image->primary == 1)
                                                @php $image = $display_image->image  @endphp
                                                <img src="/img/product/{{ $product->slug }}/thumbs/{{ $image }}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/>
                                                @endif
                                                @endforeach
                                            @endif
                                            @if($product->discount)<span class="product-badge green">sale</span>@endif
                                        </a>
                                        @php
                                            if ($product->discount > 0){
                                                $marked_price = $product->price;
                                                $discount = $product->discount;
                                                $price = round($marked_price - ($discount/100*$marked_price));
                                            }else{
                                                $price = $product->price;
                                            }
                                        @endphp
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-30px-tb">
                                            @if(count($product->getStorageRelation) > 0)
                                                <a href="/product-detail/{{$product->slug}}" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="feather  icon-feather-external-link"></i></a>
                                            @else
                                                <a href="javascript:void(0);" onclick="addtocart({{$product->id}}, '{{$product->title}}', {{$price}}, '{{ $image }}' )" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Bag"><i class="feather icon-feather-shopping-cart"></i></a>
                                            @endif
                                            
                                                <!-- <a href="javascript:void(0);" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a> -->
                                            @auth
                                                <a href="javascript:void(0);" onclick="addtowishlist({{$product->id}}, {{ $price }})" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                            @else
                                                <a href="javascript:void(0);" onclick="addtowishlist({{$product->id}}, {{ $price }})" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please Login"><i class="feather icon-feather-heart"></i></a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="product-footer bg-light-blue text-center padding-25px-tb xs-padding-10px-tb">
                                        <a href="/product-detail/{{$product->slug}}" class="text-extra-dark-gray font-weight-500 d-inline-block" title="{{ $product->title }}">{{ substr($product->title, 0, 30)}}</a>
                                        <div class="product-price text-medium">@if ($product->discount > 0)NPR <del>{{number_format($marked_price)}} </del> {{ number_format($price)}} @else NPR {{number_format($price)}} @endif</div>
                                    </div>
                                </div>
                            </li>
                            @php
                            if($count == 6){
                            $count == 0;
                            }else{
                                $count+=2;
                            }
                            @endphp
                            @endforeach  
                            
                        </ul>
                        <!-- start pagination -->
                        <!-- <div class="col-12 d-flex justify-content-center margin-7-half-rem-top md-margin-5-rem-top wow animate__fadeIn">
                            <ul class="pagination pagination-style-01 text-small font-weight-500 align-items-center">
                                <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-left icon-extra-small d-xs-none"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">01</a></li>
                                <li class="page-item active"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#">04</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-right icon-extra-small  d-xs-none"></i></a></li>
                            </ul>
                        </div> -->
                        <!-- end pagination -->
                    </div>
                    <!-- start sidebar -->
                    <aside class="col-12 col-lg-3 col-md-4 shopping-sidebar">
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Product Filter</span>
                            <ul class="list-style-07 filter-category">
                                @if (request()->route()->getName() == 'brand.products')
                                    @foreach($elect_categories as $elect_category)
                                        @if($elect_category->parent_id == 0)
                                        <li><a href="/products/{{$elect_category->slug}}"><span class="product-cb product-category-cb"></span>{{$elect_category->title}}</a><span class="item-qty">25</span></li>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($brands as $brand)
                                        @if($brand->parent_id == 0)
                                        <li><a href="/brand/{{$brand->slug}}"><span class="product-cb product-category-cb"></span>{{$brand->title}}</a><span class="item-qty">25</span></li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by price</span>
                            <span class="price-filter d-block margin-10px-top"></span>
                            <div class="price-filter-details">
                                <button type="submit" class="btn-filter btn">Filter</button>
                                <span class="price-filter-amount">
                                    <label class="mb-0" for="price-amount">Price:</label>
                                    <input type="text" class="price-amount mb-0" id="price-amount" readonly>
                                </span>
                            </div>
                        </div>
                        <div class="wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Product tags</span>
                            <div class="tag-cloud d-inline-block margin-10px-top">
                                <a href="#">New</a>
                                <a href="#">Sale</a>
                                <a href="#">Hot</a>
                                <a href="#">Trending</a>
                                <a href="#">Remove Filter</a>
                            </div>
                        </div>
                    </aside>
                    <!-- end sidebar -->
                </div>
            </div>
        </section>
        <!-- end section -->
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
        <!-- javascript libraries -->
        <!-- javascript -->
        <script type="text/javascript" src="{{asset('desktop/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('desktop/js/theme-vendors.min.js')}}"></script>
        <script type="text/javascript" src="/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{asset('desktop/js/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('desktop/js/custom.js')}}"></script>

    </body>
</html>