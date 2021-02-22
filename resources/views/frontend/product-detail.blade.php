<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Ozerone Shop, Online electronics shop in Nepal</title>
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
    <body data-mobile-nav-style="classic" data-spy="scroll" data-target="#myScrollspy" data-offset="150">
        @include('frontend.includes.header')
        <div class="main-content">
            <!-- start page title -->
        <section class="bg-white border-tb border-color-extra-light-gray padding-15px-tb page-title-small sticky-top">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-2 col-lg-2">
                        <!-- start page title -->
                        <h1 class="alt-font text-black font-weight-500 no-margin-bottom text-center text-lg-left">{{$product->title}}</h1>
                        <!-- end page title -->
                    </div>
                    <div class="col-12 col-xl-6 col-lg-6 justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top tab-style-05">
                        <!-- start breadcrumb -->
                        <!-- <ul class="xs-text-center">
                            <li><a href="#description" class="text-white-hover">Overview</a></li>
                            <li><a href="#specs" class="text-white-hover">Specs</a></li>
                            <li><b>NPR 1,99,999</b></li>
                            <li><a href="index.html" class="btn btn-small btn-fast-blue btn-round-edge">Buy Now</a></li>
                        </ul> -->
                        <div class="tab-box">
                            <!-- start tab navigation -->
                            <ul class="nav nav-tabs align-items-center justify-content-center font-weight-500 text-uppercase" id="myScrollspy">
                                <li class="nav-item alt-font"><a class="nav-link" href="#overview">Overview</a></li>
                                <li class="nav-item alt-font"><a class="nav-link" href="#specs">Specs</a></li>
                                <!-- <li class="nav-item alt-font"><a class="nav-link" href="#tab-nine3" data-toggle="tab">Additional infrmation</a></li> -->
                            </ul>
                            <!-- end tab navigation -->
                        </div>
                    </div>
                    @php
                        if ($product->discount > 0){
                            $marked_price = $product->price;
                            $discount = $product->discount;
                            $cart_price = round($marked_price - ($discount/100*$marked_price));
                        }else{
                            $cart_price = $product->price;
                        }
                    @endphp
                    <div class="col-12 col-xl-4 col-lg-4 text-right">
                        <span>
                            <b class="alt-font text-black font-weight-500 no-margin-bottom text-center text-lg-left">
                                NPR @if ($product->discount > 0)<del class="text-red" id="marked_price_display">{{number_format($marked_price)}} </del> <b class="text-large" id="price_display">{{ number_format($cart_price) }}</b> @else<b class="text-large" id="price_display">{{ number_format($cart_price) }}</b> @endif
                            </b>
                        </span>
                        <span><a href="javascript:void(0);" onclick="buynow()" class="btn btn-large btn-fast-blue">Buy</a> </span>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
        <section class="padding-two-all wow animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12 shopping-content d-flex flex-column flex-lg-row">
                        <div class="w-60 md-w-100">
                            <div class="product-images-box lightbox-portfolio row">
                                <div class="col-12 col-lg-9 px-lg-0 order-lg-2 product-image md-margin-10px-bottom">
                                    <div class="swiper-container product-image-slider" data-slider-options='{ "spaceBetween": 10, "watchOverflow": true, "navigation": { "nextEl": ".slider-product-next", "prevEl": ".slider-product-prev" }, "thumbs": { "swiper": { "el": ".product-image-thumb", "slidesPerView": "auto", "spaceBetween": 15, "direction": "vertical", "navigation": { "nextEl": ".swiper-thumb-next", "prevEl": ".swiper-thumb-prev" } } } }' data-thumb-slider-md-direction="horizontal">
                                        <div class="swiper-wrapper">
                                            @foreach ($product->getImageRelation as $product_image)
                                                @if($product_image->primary == 1)
                                                    @php $cart_image = $product_image->image  @endphp
                                                @endif
                                                <div class="swiper-slide">
                                                    <a class="gallery-link" href="/img/product/{{ $product->slug }}/{{ $product_image->image }}"><img class="w-100" src="/img/product/{{ $product->slug }}/{{ $product_image->image }}" alt="{{ $product_image->image }}"></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="slider-product-next swiper-button-next text-extra-dark-gray"><i class="fa fa-chevron-right"></i></div>
                                    <div class="slider-product-prev swiper-button-prev text-extra-dark-gray"><i class="fa fa-chevron-left"></i></div>
                                </div>
                                <div class="col-12 col-lg-3 order-lg-1 single-product-thumb md-margin-50px-bottom sm-margin-40px-bottom">
                                    <div class="swiper-container product-image-thumb slider-vertical padding-15px-lr padding-45px-bottom md-no-padding left-0px">
                                        <div class="swiper-wrapper">
                                            @foreach ($product->getImageRelation as $product_image)
                                                <div class="swiper-slide"><img class="w-100" src="/img/product/{{ $product->slug }}/{{ $product_image->image }}" alt="{{ $product_image->image }}"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- <div class="swiper-thumb-next-prev text-center">
                                        <div class="swiper-button-prev swiper-thumb-prev"><i class="fa fa-chevron-up"></i></div>
                                        <div class="swiper-button-next swiper-thumb-next"><i class="fa fa-chevron-down"></i></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="w-40 md-w-100 product-summary padding-7-rem-left lg-padding-5-rem-left md-no-padding-left">
                            <div class="breadcrumb text-small border-bottom border-color-extra-light-gray p-0">
                                <!-- start breadcrumb -->
                                <ul>
                                    <!-- <li><a href="./">Ozerone</a></li> -->
                                    <li><a href="/brand/{{$brand_title->slug}}">{{$brand_title->title}}</a></li>
                                    <li><a href="/products/{{$electronics_title->slug}}">{{$electronics_title->title}}</a></li>
                                    <li>{{$product->title}}</li>
                                </ul>
                                <!-- end breadcrumb -->
                            </div>
                            <!-- <div class="d-flex align-items-center md-margin-1-half-rem-tb">
                                <div class="text-right line-height-30px">
                                    <div><a href="#" class="letter-spacing-3px"><i class="fas fa-star text-very-small text-golden-yellow"></i><i class="fas fa-star text-very-small text-golden-yellow"></i><i class="fas fa-star text-very-small text-golden-yellow"></i><i class="fas fa-star text-very-small text-golden-yellow"></i><i class="fas fa-star text-very-small text-golden-yellow"></i></a></div>
                                    <span class="text-small"><span class="text-extra-dark-gray">SKU: </span>8552635</span>
                                </div>
                            </div> -->
                            <!-- <div class="margin-1-rem-tb paragraph-no-margin">
                                <p>{!! $product->excerpt !!}</p>
                            </div> -->
                            <label class="text-extra-dark-gray text-extra-small font-weight-500 alt-font text-uppercase w-60px">Storage</label>

                            <div class="row justify-content-center margin-2-rem-top">
                            @if (count($product->getStorageRelation) >= 1)
                            <!-- <h3>Storage Option</h3> -->
                            <div class="size-selectors">
                                @foreach ($product->getStorageRelation as $product_storage)                
                                <div class="size-selectors__input"> 
                                    @php
                                        if ($product->discount > 0){
                                            $storage_marked_price = $product_storage->price;
                                            $storage_discount = $product->discount;
                                            $storage_price = round($storage_marked_price - ($storage_discount/100*$storage_marked_price));
                                        }else{
                                            $storage_price = $product_storage->price;
                                        }
                                    @endphp
                                    @if ($product->discount > 0)
                                    <input id="{{ $product_storage->id }}" onclick="storagechangewithmp({{ $storage_marked_price }} , {{ $storage_price }})" data-marked-price="{{ $storage_marked_price }}" data-price="{{ $storage_price }}" type="radio" name="storage" value="{{ $product_storage->id }}" {{ ($loop->index == 0) ? "checked" : "" }}>  
                                    @else
                                    <input id="{{ $product_storage->id }}" onclick="storagechange({{ $storage_price }})" data-price="{{ $storage_price }}" type="radio" name="storage" value="{{ $product_storage->id }}" {{ ($loop->index == 0) ? "checked" : "" }}>  
                                    @endif
                                    <label for="{{ $product_storage->id }}">{{ $product_storage->ram.' RAM-'. $product_storage->storage }}</label>
                                </div>
                                @endforeach	
                            </div> 
                            @endif
                                <!-- start fancy text box item -->
                                <!-- <div class="col-12 margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                                    <div class="feature-box feature-box-left-icon-middle padding-one-tb bg-white box-shadow-small box-shadow-extra-large-hover border-radius-6px lg-padding-1-half-rem-lr xs-padding-2-rem-all">
                                        <div class="feature-box-icon ">
                                            <h4 class="alt-font text-blue text-large font-weight-400 padding-1-half-rem-all letter-spacing-minus-1px mb-0">NPR 35,000</h4>
                                        </div>
                                        <div class="feature-box-content alt-font line-height-28px border-left border-color-medium-gray padding-20px-lr lg-padding-15px-lr xs-padding-20px-left xs-no-padding-right last-paragraph-no-margin">
                                            <span class="text-extra-dark-gray font-weight-500">4 GB RAM</span>
                                            <p>64 GB STORAGE</p>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- end fancy text box item -->
                                <!-- start fancy text box item -->
                                <!-- <div class="col-12 margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                                    <div class="feature-box feature-box-left-icon-middle padding-one-tb bg-white box-shadow-small box-shadow-extra-large-hover border-radius-6px lg-padding-1-half-rem-lr xs-padding-2-rem-all">
                                        <div class="feature-box-icon ">
                                            <h4 class="alt-font text-blue text-large font-weight-400 padding-1-half-rem-all letter-spacing-minus-1px mb-0">NPR 35,000</h4>
                                        </div>
                                        <div class="feature-box-content alt-font line-height-28px border-left border-color-medium-gray padding-20px-lr lg-padding-15px-lr xs-padding-20px-left xs-no-padding-right last-paragraph-no-margin">
                                            <span class="text-extra-dark-gray font-weight-500">4 GB RAM</span>
                                            <p>64 GB STORAGE</p>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- end fancy text box item -->
                                
                            </div>
                            @if (count($product->getColorRelation) >= 1)
                            <div class="margin-2-rem-top">
                                <div class="margin-20px-bottom">
                                    <label class="text-extra-dark-gray text-extra-small font-weight-500 alt-font text-uppercase w-60px">color</label>
                                    <ul class="alt-font shop-color">
                                        @foreach ($product->getColorRelation as $product_color)
                                        <li>
                                            <input class="d-none" type="radio" onclick="colorchange('{{$product_color->image}}')" id="{{ $product_color->color }}" name="color" value="{{ $product_color->id }}" {{ ($loop->index == 0) ? "checked" : "" }} />
                                            <label for="{{ $product_color->color }}"><span style="background-color: {{ $product_color->hex }};"></span></label>
                                        </li> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div>
                            <!-- <span class="product-price text-extra-medium"><del>$480.00</del>£50.00</span> -->
                                <!-- <div class="quantity margin-15px-right">
                                    <label class="screen-reader-text">Quantity</label>
                                    <input type="button" value="-" class="qty-minus qty-btn" data-quantity="minus" data-field="quantity">
                                    <input class="input-text qty-text" type="number" name="quantity" value="1">
                                    <input type="button" value="+" class="qty-plus qty-btn" data-quantity="plus" data-field="quantity">
                                </div>
                                <a href="javascript:void(0);" class="btn btn-fast-blue btn-medium" onclick="buynow()">Buy</a> -->
                                <div class="margin-25px-top">
                                    <a href="#" class="text-uppercase text-extra-small alt-font margin-20px-right font-weight-500 "><i class="feather icon-feather-heart align-middle margin-5px-right"></i>Add to wishlist</a>
                                    <!-- <a href="#" class="text-uppercase text-extra-small alt-font margin-20px-right font-weight-500 "><i class="feather icon-feather-shuffle align-middle margin-5px-right"></i>Add to compare</a> -->
                                </div>
                            </div>
                            <div class="d-flex alt-font margin-1-rem-top align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-uppercase text-extra-small font-weight-500 text-extra-dark-gray d-block">SHARE: </span>
                                </div>
                                <div class="text-right social-icon-style-02 w-50">
                                    <ul class="extra-small-icon">
                                        <li><a class="text-extra-dark-gray facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="text-extra-dark-gray twitter" href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="text-extra-dark-gray linkedin" href="http://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a class="text-extra-dark-gray flickr" href="https://www.pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="pt-0 margin-15px-top lg-no-margin-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10"> 
                        <div class="row" id="overview">
                            <div class="col-12 margin-1-rem-tb paragraph-no-margin wow animate__fadeIn">
                                <h6 class="alt-font text-extra-dark-gray font-weight-500 margin-20px-bottom">Overview</h6>
                                <!-- <p>{!! $product->excerpt !!}</p> -->
                            </div>
                            @if (count($product->getDetailRelation) >= 1)
                                @foreach ($product->getDetailRelation as $product_detail) 
                                <div class="col-12 margin-1-rem-tb paragraph-no-margin wow animate__fadeIn">
                                    <h6 class="alt-font text-extra-dark-gray text-medium font-weight-500 margin-20px-bottom">{{ $product_detail->title }}</h6>
                                    <p>{!! $product_detail->excerpt !!}</p>
                                </div>
                                @endforeach
                            @endif
                            
                        </div>
                        <div class="row" id="specs">
                            <div class="col-12 margin-1-rem-tb paragraph-no-margin wow animate__fadeIn">
                                <h6 class="alt-font text-extra-dark-gray font-weight-500 margin-20px-bottom">Specs</h6>
                                <p>{!! $product->excerpt !!}</p>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="padding-three-all">
            <div class="container">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 text-center margin-2-half-rem-bottom sm-margin-1-half-rem-bottom">
                            <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-5px-bottom">Related Products</h5>
                            <p>You may also like</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-lg-0 wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="swiper-container padding-15px-tb portfolio-classic position-relative" data-slider-options='{"loop": true, "slidesPerView": 1, "spaceBetween": 30,"scrollbar": {"el": ".swiper-scrollbar","hide": "false"}, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">                                
                                <!-- start slide item -->
                                @foreach($related as $feature)
                                @if(count($feature->getImageRelation) > 0)
                                <div class="swiper-slide overflow-hidden">
                                    <div class="portfolio-box border-radius-6px text-center">
                                        <div class="portfolio-image bg-transparent">
                                            @foreach($feature->getImageRelation as $display_image)
                                                @if($display_image->primary == 1)
                                                @php $image = $display_image->image  @endphp
                                                <a href="/product-detail/{{$feature->slug}}"><img src="/img/product/{{ $feature->slug }}/thumbs/{{ $image }}" alt="{{$feature->title}}" title="{{$feature->title}}" /></a>
                                                @endif
                                            @endforeach
                                            
                                            <div class="portfolio-hover align-items-center justify-content-center d-flex">
                                                <div class="portfolio-icon">
                                                    <a href="/product-detail/{{$feature->slug}}" class="border-all border-width-2px rounded-circle border-color-white bg-white"><i class="ti-arrow-right text-extra-dark-gray"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        if ($feature->discount > 0){
                                            $marked_price = $feature->price;
                                            $discount = $feature->discount;
                                            $price = round($marked_price - ($discount/100*$marked_price));
                                        }else{
                                            $price = $feature->price;
                                        }
                                        @endphp
                                        <div class="portfolio-caption bg-light-blue padding-30px-tb sm-padding-15px-tb">
                                            <a href="/product-detail/{{$feature->slug}}" class="alt-font text-black font-weight-500 text-uppercase d-inline-block margin-5px-bottom">{{ substr($feature->title, 0, 55)}}</a>
                                            <span class="d-block text-medium-gray text-small line-height-18px text-uppercase">@if ($feature->discount > 0)NPR <del>{{number_format($marked_price)}}</del> {{ number_format($price)}} @else NPR {{number_format($price)}} @endif</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <!-- end slide item -->                                                             
                            </div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
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
        <input type="hidden" value="{{$product->id}}" name="product_id">
        <input type="hidden" value="{{$product->title}}" name="product_title">
        <input type="hidden" value="{{$cart_price}}" name="product_price">
        <input type="hidden" value="{{$cart_image}}" name="product_image">
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
        <script>
            $(function () {
                if($( "input[type=radio][name=storage]:checked" ).data("price")){
                    var price = $( "input[type=radio][name=storage]:checked" ).data("price");
                    var mp = $( "input[type=radio][name=storage]:checked" ).data("marked-price");
                    $( "input[type=hidden][name=product_price]" ).val(price);
                    $("#price_display").text(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#marked_price_display").text(mp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                }		
            })
            function storagechange(price){
                $( "input[type=hidden][name=product_price]" ).val(price);
                $("#price_display").text(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
            function storagechangewithmp(mp, price){
                $( "input[type=hidden][name=product_price]" ).val(price);
                $("#price_display").text(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#marked_price_display").text(mp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
            
            function colorchange(image){
                $( "input[type=hidden][name=product_image]" ).val(image);
                //$("#price_display").text(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
            function buynow(){
                var id = $( "input[type=hidden][name=product_id]" ).val();
                var title = $( "input[type=hidden][name=product_title]" ).val();
                var price = $( "input[type=hidden][name=product_price]" ).val();
                var image = $( "input[type=hidden][name=product_image]" ).val();
                var color = $( "input[type=radio][name=color]:checked" ).val();
                if(color == null){
                    color = 'Not Available'
                }
                var storage = $( "input[type=radio][name=storage]:checked" ).val();
                if(storage == null){
                    storage = 'Not Available'
                }
                swal("Please Wait! preceding...", {
                    buttons: false,
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                });
                $.ajax({
                    type:'POST',
                    url:"/cartstore",
                    data:{"_token": "{{ csrf_token() }}", id:id, title:title, price:price, image:image, color:color, storage:storage},
                    success:function(data){
                        console.log(data.success);
                        swal.close();
                        $("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
                        $("#cart-count").load(location.href + " #cart-count");

                        $('.cart-count').addClass('animate');
                        setTimeout(function() {
                            $('.cart-count').removeClass('animate');
                        }, 1500);
                        swal(
                            'Added!',
                            'Item has been added to cart.',
                            'success',{
                            buttons: [true, "Shopping Cart"],
                            }).then((result) => {
                                if (result == true) {
                                    window.location.replace("/cart");
                                }
                            })
                        
                    }
                });                
            };
        </script>
    </body>
</html>