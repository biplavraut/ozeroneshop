<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <!-- title -->
        <title>Search| {{ $seo->title }}</title>
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
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
          
            gtag('config', 'G-ZYKVHRYQWH');
          </script>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '177597510622085');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=177597510622085&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    </head>
    <body data-mobile-nav-style="classic">
        @include('frontend.includes.header')
        <div class="main-content">
            <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb sm-padding-20px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block">Search</h1>
                        <span class="alt-font text-medium d-block d-md-inline-block sm-margin-5px-top">Explore our collection of electronics</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="padding-two-all">
            <div class="container">
                <div class="row justify-content-center xs-no-margin-lr">
                    <input class="text-dark alt-font" onkeyup="mySearching()" placeholder="Enter your keywords..." name="product-search" value="" type="text" autocomplete="on">
                                  
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="bg-gray shopping-left-side-bar pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-8 shopping-content padding-55px-left md-padding-15px-left sm-margin-30px-bottom">
                        <ul class="product-listing grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-2col gutter-large text-center" id="loadlist-products">
                            <li class="grid-sizer"></li>
                            @php
                                $count = 0;
                            @endphp
                            @foreach($products as $product)
                            @php
                                $endloop = 0;
                            @endphp
                            <li class="grid-item">
                                <div class="product-box border-radius-6px margin-25px-bottom xs-margin-15px-bottom box-shadow-small">
                                    <div class="product-image">
                                        <a href="/product-detail/{{$product->slug}}">
                                            @if(count($product->getImageRelation)>1)
                                                @foreach($product->getImageRelation as $display_image)
                                                    @if($display_image->primary == 1)
                                                    @php $image = $display_image->image; @endphp
                                                    <img class="default-image lazyload" src="/img/thumbnail.jpg" data-src="/img/product/{{ $product->slug }}/thumbs/{{ $image }}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/>
                                                    @endif
                                                    @if($display_image->primary != 1 && $endloop == 0)
                                                    @php $image = $display_image->image; $endloop = 1;  @endphp
                                                    <img class="hover-image lazyload" src="/img/thumbnail.jpg" data-src="/img/product/{{ $product->slug }}/thumbs/{{ $image }}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($product->getImageRelation as $display_image)
                                                @if($display_image->primary == 1)
                                                @php $image = $display_image->image  @endphp
                                                <img class="lazyload" src="/img/thumbnail.jpg" data-src="/img/product/{{ $product->slug }}/thumbs/{{ $image }}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/>
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
                        <div class="col-12 d-flex justify-content-center margin-7-half-rem-top md-margin-5-rem-top wow animate__fadeIn">
                            <div class="buttons buttons--centered mb-40">
                                <div id="loadMore" class="btn btn-large btn-fast-blue button button--more">View more</div>
                                <div id="showLess" class="button button--disabled">Search your products</div> 
                            </div>
                        </div>
                        <!-- end pagination -->
                    </div>
                    <!-- start sidebar -->
                    <aside class="col-12 col-lg-3 col-md-4 shopping-sidebar">
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Categories</span>
                            <ul class="list-style-07 filter-category">
                                @foreach($elect_categories as $elect_category)
                                    @if($elect_category->parent_id == 0)
                                    <li><a href="javascript:void(0);"><span class="product-cb product-category-cb"></span>{{$elect_category->title}}</a><span class="item-qty">25</span></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Brands</span>
                            <ul class="list-style-07 filter-category">
                                @foreach($brands as $brand)
                                    @if($brand->parent_id == 0)
                                    <li><a href="javascript:void(0);"><span class="product-cb product-category-cb"></span>{{$brand->title}}</a><span class="item-qty">25</span></li>
                                    @endif
                                @endforeach
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
        @include('frontend.includes.bottombanner')
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
        <script type="text/javascript" src="{{asset('desktop/js/jquery.lazyload.min.js')}}"></script>
        <script>
        $("img.lazyload").lazyload();
        $("#loadlist-products .grid-item").hide();
            $("#showLess").hide();
            var size_li = $("#loadlist-products .grid-item").length;
            var nrposts = 9;
            $('#loadlist-products .grid-item:lt(' + nrposts + ')').show();
            $('#loadMore').on('click', function(e) {
                nrposts = (nrposts + 6 <= size_li) ? nrposts + 6 : size_li;
                $('#loadlist-products .grid-item:lt(' + nrposts + ')').show();
                if (nrposts == size_li) {
                    $('#loadMore').hide();
                    $('#showLess').show();
                }
                // $(".page__content").animate({ scrollTop: $('.page__content').prop("scrollHeight")}, 1000);
        });
        </script>
        <script>
            function mySearching() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            var search_query = $("input[type=text][name=product-search]").val();
            //alert(search_query);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/searching",
                data: { search_query: search_query },
                success: function(data) {
                    console.log('Done');
                    var res = '';
                    $.each(data, function(key, value) {
                        res +=
                            '<li><a href="/product-detail/' + value.slug + '">' + value.title + '</a></li>';
                    });

                    $('#search_products').html(res);
                }
            });
        };
        </script>
    </body>
</html>