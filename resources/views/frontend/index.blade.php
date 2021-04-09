<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>{{ $seo->title }}</title>
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
        <!-- revolution slider -->
        <!-- <link rel='stylesheet' href='revolution/revolution-addons/bubblemorph/css/revolution.addon.bubblemorph.css' type='text/css' media='all' /> -->
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/revolution/css/settings.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/revolution/css/layers.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/revolution/css/navigation.css')}}">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZYKVHRYQWH"></script>
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
        
        <!-- start subscription popup -->
        <div id="subscribe-popup" class="mfp-hide subscribe-popup">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 col-md-10 bg-light-gray modal-popup-main">
                        <div class="row">
                            <div class="col-12 col-sm-7 order-2 order-sm-1 newsletter-popup padding-4-rem-all lg-padding-4-rem-all xs-padding-3-rem-all" style="line-height: 25px !important;">
                                <span class="text-extra-large font-weight-900 text-extra-dark-gray d-block margin-10px-bottom">Happy New Year 2078</span>
                                <p class="margin-10px-bottom hidden-sm-down">Every end marks a new beginning. Keep your spirits and determination unshaken, and you shall always walk the glory road. With courage, faith and great effort, you shall achieve everything you desire. We wish you a Happy New Year.</p>
                                <p class="margin-10px-bottom">Sign up to get updates, benefits, offers and much more from our website.                                </p>
                                <p><b>This New Year enter promo code: <span style="color:#cc0000 ;">HNY2078</span>  to get cashbacks upto RS. 20,000</b></p>
                                <small>*valid till 18th April 2021</small>

                            </div>
                            <div class="col-12 col-sm-5 cover-background order-1 order-sm-2 xs-h-150px" style="background-image:url('/promo/newyear.webp');">
                                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- end subscription popup -->
        <div class="main-content">
        <!-- SLIDER EXAMPLE -->
        <section class="p-0 home-furniture-shop">
            <article class="content">
                <div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper" data-alias="mask-showcase" data-source="gallery" style="background:#f6f6f6;padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                    <div id="rev_slider_34_1" class="rev_slider tiny_bullet_slider" style="display:none;" data-version="5.4.1">
                        <ul>	<!-- SLIDE  -->
                            @php $slider_counter = 73 @endphp
                            @foreach($sliders as $slider)
                            <li data-index="rs-{{$slider_counter}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <!-- <img src="images/shop-slide-01.jpg" alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina> -->
                                <!-- LAYERS -->
                                
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500"
                                     data-x="['left','left','center','center']" data-hoffset="['124','102','0','0']" 
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-145','-120','-410','-300']" 
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text" 
                                     data-responsive_offset="on" 
                                     data-frames='[{"delay":100,"speed":500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:0.7;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[10,10,10,10]"
                                     data-paddingright="[20,20,20,20]"
                                     data-paddingbottom="[10,10,10, 10]"
                                     data-paddingleft="[20,20,20,20]"
                                     style="z-index: 7; text-transform: uppercase; letter-spacing: 2px;">{{$slider->title}}</div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption alt-font text-extra-dark-gray"
                                     data-x="['left','left','center','center']" data-hoffset="['0','100','0','0']" 
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-40','-10','-290','-220']" 
                                     data-fontsize="['75','70','70','50']"
                                     data-lineheight="['70','70','70','50']"
                                     data-width="auto"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text" 
                                     data-responsive="on"
                                     data-responsive_offset="on" 
                                     data-frames='[{"delay":300,"speed":500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[20,20,20,20]"
                                     data-paddingright="[20,20,20,20]"
                                     data-paddingbottom="[30,30,30,30]"
                                     data-paddingleft="[20,20,20,20]"
                                     style="z-index: 8;letter-spacing: 1px; font-weight: 800;">@php echo wordwrap($slider->sub_title,12,"<br><span style='color:#e83a4f;'>\n"); @endphp</div>    

                                <!-- LAYER NR. 1 -->
                                <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr"
                                   href="{{$slider->link}}"
                                   data-x="['left','left','center','center']" data-hoffset="['144','122','0','0']" 
                                   data-y="['middle','middle','middle','middle']" data-voffset="['95','120','-160','-110']" 
                                   data-width="none"
                                   data-height="none"
                                   data-fontsize="['14','14','14','13']"
                                   data-whitespace="nowrap"
                                   data-type="button" 
                                   data-responsive_offset="on"
                                   data-responsive="on"
                                   data-frames='[{"delay":600,"speed":500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                   data-textAlign="['inherit','inherit','inherit','inherit']"
                                   data-paddingtop="[11,10,10,10]"
                                   data-paddingright="[27,25,25,22]"
                                   data-paddingbottom="[11,10,10,10]"
                                   data-paddingleft="[27,25,25,22]"
                                   style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.1);">Shop now</a>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                                     data-x="['center','center','center','center']" data-hoffset="['300','200','0','0']" 
                                     data-y="['middle','middle','middle','middle']" data-voffset="['40','20','180','150']" 
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="image" 
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":1000,"speed":500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 6;"><img src="/img/slider/{{$slider->image}}" alt="" data-ww="['529px','420px','420px','290px']" data-hh="['auto','auto','auto','auto']" width="529" height="594" data-no-retina></div>
                            </li>
                            @php $slider_counter++; @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </article>
        </section>
        <!-- end revolution slider -->
        
        <!-- start section -->
        <section class="padding-three-tb">
            <div class="container">
                {{-- <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 text-center margin-2-half-rem-bottom sm-margin-1-half-rem-bottom">
                            <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-5px-bottom">Featured Products</h5>
                            <p>Explore our collection of electronics</p>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-12 px-lg-0 wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="swiper-container padding-15px-tb portfolio-classic position-relative" data-slider-options='{"loop": true, "slidesPerView": 1.5, "spaceBetween": 10,"scrollbar": {"el": ".swiper-scrollbar","hide": "false"}, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5,"spaceBetween": 20 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">                                
                                <!-- start slide item -->
                                @foreach($featured as $feature)
                                @if(count($feature->getImageRelation) > 0)
                                <div class="swiper-slide overflow-hidden featured-box-shadow">
                                    <div class="portfolio-box border-radius-6px text-center">
                                        <div class="portfolio-image bg-transparent">
                                            @foreach($feature->getImageRelation as $display_image)
                                                @if($display_image->primary == 1)
                                                @php $image = $display_image->image  @endphp
                                                <a href="/product-detail/{{$feature->slug}}">
                                                    <img class="lazyload" src="/img/thumbnail.jpg" data-src="img/product/{{ $feature->slug }}/{{ $image }}"/>
                                                </a>
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
                                        <div class="portfolio-caption bg-light-blue padding-10px-all sm-padding-5px-all">
                                            <a href="/product-detail/{{$feature->slug}}" class="alt-font text-small text-black font-weight-500 text-uppercase d-inline-block margin-5px-bottom" title="{{ $feature->title }}">{{ substr($feature->title, 0, 30)}}</a>
                                            <span class="d-block text-dark-gray text-small line-height-18px text-uppercase">@if ($feature->discount > 0)NPR <del>{{number_format($marked_price)}}</del> {{ number_format($price)}} @else NPR {{number_format($price)}} @endif</span>
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
        
        <!-- start section -->
        <section class="half-section bg-light-gray">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-7 col-sm-10 text-center text-lg-left md-margin-3-rem-top md-margin-3-rem-bottom wow animate__fadeIn" data-wow-delay="0.1s">
                        <h4 class="alt-font font-weight-600 text-dark-gray mb-0">Get Latest updates about offer, products, tips and news.</h4>
                    </div>
                    <div class="col-12 col-lg-5 padding-6-rem-left lg-padding-15px-left md-margin-3-rem-bottom text-center text-lg-left wow animate__fadeIn" data-wow-delay="0.3s">
                        <span class="alt-font text-extra-dark-gray text-extra-medium d-block margin-5px-bottom">Join us for convenient shopping!</span>
                        <a href="/register" class="btn btn-extra-large btn-transparent-dark-gray btn-box-shadow-flat">Register Now</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-0 pt-3 padding-five-lr lg-no-padding-lr">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-12 col-lg-12 col-sm-10 blog-content no-padding-lr">
                        <ul class="blog-simple blog-wrapper grid grid-3col xl-grid-3col lg-grid-3col md-grid-1col sm-grid-1col xs-grid-1col gutter-large">
                            <li class="grid-sizer"></li>
                            <!-- start blog item -->
                            @foreach($body_featured as $key=>$body_feature)
                            @if ($key < 3)
                            <li class="grid-item wow animate__fadeIn">
                                <div class="bg-light-gray blog-post-content overflow-hidden text-center no-padding-lr wow animate__fadeIn">
                                    <a href="{{$body_feature->link}}"><img src="/img/featured/thumbs/{{$body_feature->image}}" alt=""/></a>
                                    <div class="blog-text d-inline-block w-100">
                                        <div class="content padding-1-half-rem-bottom lg-padding-1-half-rem-bottom xs-padding-10px-lr position-relative mx-auto w-90 lg-w-100">
                                            <div class="blog-details-overlap">
                                                <span class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500">{{$body_feature->title}}</span>
                                            </div>
                                            <h6 class="alt-font font-weight-700 no-margin-bottom"><a href="{{$body_feature->link}}" class="text-extra-dark-gray text-fast-blue-hover" style='color:{{$body_feature->sub_title_color}}; line-height:2;'>
                                                @php echo wordwrap($body_feature->sub_title,33,"<br><span style='color:#e83a4f;'>\n"); @endphp 
                                            </a></h6>
                                            {{-- <p>{!! substr(strip_tags($body_feature->excerpt),0,180) !!}</p> --}}
                                            <a href="{{$body_feature->link}}" class="btn btn-small btn-transparent-fast-blue btn-round-edge btn-slide-up-bg">View More <span class="bg-extra-dark-blue"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->

        @foreach($body_featured as $key=>$body_feature)
        @if ($key == 3)
        <section class="padding-three-all">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-10 col-md-6 text-center sm-margin-30px-bottom wow animate__fadeIn" data-wow-delay="0.1s">
                        <img class="md-padding-30px-right lazyload" data-src="/img/featured/{{$body_feature->image}}" alt="{{$body_feature->title}}"/>
                    </div>
                    <div class="col-10 col-xl-4 col-lg-5 offset-lg-1 col-md-6 pl-lg-0 text-center text-md-left wow animate__fadeIn" data-wow-delay="0.3s">
                        <span class="alt-font font-weight-600 text-gradient-magenta-orange-2 letter-spacing-1px d-inline-block text-uppercase margin-20px-bottom sm-margin-10px-bottom">{{$body_feature->title}}</span>
                        <h5 class="alt-font font-weight-500 text-medium-slate-blue">{{$body_feature->sub_title}}</h5>
                        <p>{!! $body_feature->excerpt !!}</p>
                        <a href="{{$body_feature->link}}" class="btn btn-large btn-fast-blue btn-slide-right-bg margin-15px-top btn-round-edge">View More<span class="bg-white"></span></a>
                    </div>
                </div>
            </div>
        </section>
        @endif        
        @endforeach
        
        <!-- end section -->
        
        <!-- start section -->
        {{-- <section class="p-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2">
                    @foreach($body_featured as $key=>$body_feature)
                        @if ($key > 3)
                        @if ($key%2 != 0)
                        <div class="col bg-very-light-orange padding-5-rem-tb padding-eight-lr xl-padding-six-lr lg-padding-three-lr md-padding-eight-lr wow animate__fadeIn" data-wow-delay="0.2s">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-7 xs-margin-30px-bottom">
                                    <a href="#"><img class="lazyload" data-src="/img/featured/{{$body_feature->image}}" alt="{{$body_feature->title}}"></a>
                                </div>
                                <div class="col-12 col-sm-5 padding-ten-left xl-padding-three-left md-padding-nine-left xs-padding-15px-left">
                                    <span class="alt-font font-weight-500 text-dark-orange d-block margin-15px-bottom text-uppercase"><span class="w-10px h-1px bg-dark-orange d-inline-block align-middle margin-5px-right"></span> Only NPR 7,000</span>
                                    <span class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500">{{$body_feature->title}}</span>
                                    <h4 class="alt-font text-extra-dark-gray letter-spacing-minus-1px"><span class="font-weight-600">{{$body_feature->sub_title}}</span></h4>
                                    <p>{!! $body_feature->excerpt !!}</p>
                                    <a href="{{$body_feature->link}}" class="btn btn-small btn-fancy btn-box-shadow btn-white margin-5px-top">Shop now</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col bg-very-light-pink padding-5-rem-tb padding-eight-lr xl-padding-six-lr lg-padding-three-lr md-padding-eight-lr wow animate__fadeIn" data-wow-delay="0.4s">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-7 xs-margin-30px-bottom">
                                    <a href="#"><img class="lazyload" data-src="/img/featured/{{$body_feature->image}}" alt="{{$body_feature->title}}"></a>
                                </div>
                                <div class="col-12 col-sm-5 padding-ten-left xl-padding-three-left md-padding-nine-left xs-padding-15px-left">
                                    <span class="alt-font font-weight-500 text-dark-orange d-block margin-15px-bottom text-uppercase"><span class="w-10px h-1px bg-dark-orange d-inline-block align-middle margin-5px-right"></span> Only NPR 13,990</span>
                                    <span class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500">{{$body_feature->title}}</span>
                                    <h4 class="alt-font text-extra-dark-gray letter-spacing-minus-1px"><span class="font-weight-600">{{$body_feature->sub_title}}</span></h4>
                                    <p>{!! $body_feature->excerpt !!}</p>
                                    <a href="{{$body_feature->link}}" class="btn btn-small btn-fancy btn-box-shadow btn-white margin-5px-top">Shop now</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </section> --}}
        <section class="p-0 pt-3 padding-five-lr lg-no-padding-lr">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-12 col-lg-12 col-sm-10 blog-content no-padding-lr">
                        <ul class="blog-simple blog-wrapper grid grid-2col xl-grid-2col lg-grid-2col md-grid-1col sm-grid-1col xs-grid-1col gutter-large">
                            <li class="grid-sizer"></li>
                            <!-- start blog item -->
                            @foreach($body_featured as $key=>$body_feature)
                            @if ($key > 3 && $key < 6)
                            <li class="grid-item wow animate__fadeIn">
                                <div class="bg-light-gray blog-post-content overflow-hidden text-center no-padding-lr wow animate__fadeIn">
                                    <a href="{{$body_feature->link}}"><img src="/img/featured/thumbs/{{$body_feature->image}}" alt=""/></a>
                                    <div class="blog-text d-inline-block w-100">
                                        <div class="content padding-2-half-rem-bottom lg-padding-2-half-rem-bottom xs-padding-20px-lr position-relative mx-auto w-90 lg-w-100">
                                            <div class="blog-details-overlap">
                                                <span class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500">{{$body_feature->title}}</span>
                                            </div>
                                            <h6 class="alt-font font-weight-700 no-margin-bottom"><a href="{{$body_feature->link}}" class="text-extra-dark-gray text-fast-blue-hover" style='color:{{$body_feature->sub_title_color}}; line-height:2;'>
                                                @php echo wordwrap($body_feature->sub_title,33,"<br><span style='color:#e83a4f;'>\n"); @endphp 
                                            </a></h6>
                                            {{-- <p>{!! substr(strip_tags($body_feature->excerpt),0,90) !!}</p> --}}
                                            <a href="{{$body_feature->link}}" class="btn btn-small btn-transparent-fast-blue btn-round-edge btn-slide-up-bg margin-10px-top">View More <span class="bg-extra-dark-blue"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- start section -->
        <section class="padding-three-tb border-bottom border-color-extra-light-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-4 col-lg-5 col-md-7 col-sm-9 text-center last-paragraph-no-margin margin-5-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">
                        <h4 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-1px margin-20px-bottom sm-margin-10px-bottom">Recently Added</h4>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 filter-content">
                    <ul class="product-listing shop-wrapper grid grid-4col xl-grid-4col lg-grid-4col md-grid-2col sm-grid-2col xs-grid-2col gutter-large text-center">
                            <li class="grid-sizer"></li>
                            <!-- start shop item -->
                            @php
                                $count = 0;
                            @endphp
                            @foreach($all_products as $all_product)
                            @php
                                $endloop = 0;
                            @endphp
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.{{$count}}s">
                                <div class="product-box border-radius-6px margin-25px-bottom xs-margin-15px-bottom box-shadow-large">
                                    <div class="product-image">
                                        <a href="/product-detail/{{$all_product->slug}}">
                                            @if(count($all_product->getImageRelation)>1)
                                                @foreach($all_product->getImageRelation as $display_image)
                                                    @if($display_image->primary == 1)
                                                    @php $image = $display_image->image; @endphp
                                                    <img class="default-image" src="img/product/{{ $all_product->slug }}/thumbs/{{ $image }}" alt="{{ $all_product->slug }}" title="{{ $display_image->image }}"/>
                                                    @endif
                                                    @if($display_image->primary != 1 && $endloop == 0 )
                                                    @php $image = $display_image->image; $endloop = 1;  @endphp
                                                    <img class="hover-image" src="img/product/{{ $all_product->slug }}/thumbs/{{ $image }}" alt="{{ $all_product->slug }}" title="{{ $display_image->image }}"/>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($all_product->getImageRelation as $display_image)
                                                @if($display_image->primary == 1)
                                                @php $image = $display_image->image  @endphp
                                                <img src="img/product/{{ $all_product->slug }}/thumbs/{{ $image }}" alt="{{ $all_product->slug }}" title="{{ $display_image->image }}"/>
                                                @endif
                                                @endforeach
                                            @endif
                                            @if($all_product->discount)<span class="product-badge green">sale</span>@endif
                                        </a>
                                        @php
                                            if ($all_product->discount > 0){
                                                $marked_price = $all_product->price;
                                                $discount = $all_product->discount;
                                                $price = round($marked_price - ($discount/100*$marked_price));
                                            }else{
                                                $price = $all_product->price;
                                            }
                                        @endphp
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-30px-tb">
                                            @if(count($all_product->getStorageRelation) > 0)
                                                <a href="/product-detail/{{$all_product->slug}}" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="feather  icon-feather-external-link"></i></a>
                                            @else
                                                <a href="javascript:void(0);" onclick="addtocart({{$all_product->id}}, '{{$all_product->title}}', {{$price}}, '{{ $image }}' )" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Bag"><i class="feather icon-feather-shopping-cart"></i></a>
                                            @endif
                                            
                                                <!-- <a href="javascript:void(0);" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a> -->
                                            @auth
                                                <a href="javascript:void(0);" onclick="addtowishlist({{$all_product->id}}, {{ $price }})" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                            @else
                                                <a href="javascript:void(0);" onclick="addtowishlist({{$all_product->id}}, {{ $price }})" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please Login"><i class="feather icon-feather-heart"></i></a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="product-footer bg-light-blue text-center padding-15px-tb sm-padding-5px-all">
                                        <a href="/product-detail/{{$all_product->slug}}" class="text-extra-dark-gray text-small font-weight-500 d-inline-block" title="{{ $all_product->title }}">{{ substr($all_product->title, 0, 22)}}</a>
                                        <div class="product-price text-medium">@if ($all_product->discount > 0)NPR <del>{{number_format($marked_price)}} </del> {{ number_format($price)}} @else NPR {{number_format($price)}} @endif</div>
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
                    </div>
                </div>
            </div>
        </section>
        
        <!-- start section -->
        {{-- <section class="bg-light-gray padding-100px-tb md-padding-75px-tb sm-padding-40px-tb wow animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container text-center" data-slider-options='{ "slidesPerView": 2.5, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 3 } } }'>
                            <div class="swiper-wrapper">
                            @foreach($brands as $brand)
                                @if($brand->parent_id == 0)
                                <div class="swiper-slide"><a href="/brand/{{$brand->slug}}"><img class="lazyload" alt="{{$brand->title}}" data-src="{{asset('img/brand/'. $brand->image .'')}}" title="{{$brand->title}}" width="100px"></a></div>
                                @endif
                            @endforeach
                                
                            </div>
                        </div>
                        <div class="swiper-button-next-nav swiper-button-next  rounded-circle light slider-navigation-style-07 box-shadow-double-large"><i class="feather icon-feather-arrow-right"></i></div>
                        <div class="swiper-button-previous-nav swiper-button-prev rounded-circle light slider-navigation-style-07 box-shadow-double-large"><i class="feather icon-feather-arrow-left"></i></div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- end section -->
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
        <!-- revolution js files -->
        <script type="text/javascript" src="/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/revolution/js/jquery.themepunch.revolution.min.js"></script>
        
        <!-- BUBBLEMORPH ADD-ON FILES -->
        <script type='text/javascript' src="/revolution/revolution-addons/bubblemorph/js/revolution.addon.bubblemorph.min.js"></script>
        <script type="text/javascript">
        $("img.lazyload").lazyload();
        var revapi263,
                tpj;
        (function () {
            if (!/loaded|interactive|complete/.test(document.readyState))
                document.addEventListener("DOMContentLoaded", onLoad);
            else
                onLoad();
            function onLoad() {
                if (tpj === undefined) {
                    tpj = jQuery;
                    if ("off" == "on")
                        tpj.noConflict();
                }
                if (tpj("#rev_slider_34_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_34_1");
                } else {
                    var revOffset = tpj(window).width() <= 991 ? '73px' : '';
                    revapi263 = tpj("#rev_slider_34_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "/revolution/js/",
                        sliderLayout: "auto",
                        dottedOverlay: "none",
                        delay:0,
                        navigation: {
                            keyboardNavigation: "on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                touchOnDesktop: "off",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            bullets: {
                                enable: false,
                                hide_onmobile: false,
                                style: "hermes",
                                hide_onleave: false,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 40,
                                space: 12,
                                tmp: ''
                            },
                            arrows: {

                                enable: true,
                                style: 'uranus',
                                tmp: '',
                                rtl: false,
                                hide_onleave: false,
                                hide_onmobile: true,
                                hide_under: 767,
                                hide_over: 9999,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                left: {
                                    container: 'slider',
                                    h_align: 'left',
                                    v_align: 'center',
                                    h_offset: 64,
                                    v_offset: 0
                                },
                                right: {
                                    container: 'slider',
                                    h_align: 'right',
                                    v_align: 'center',
                                    h_offset: 64,
                                    v_offset: 0
                                }

                            }
                        },
                        responsiveLevels: [1240, 1025, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 550, 960, 720],
                        lazyType: "single",
                        shadow: 0,
                        spinner: "",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: revOffset,
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
                ; /* END OF revapi call */
            }
            ; /* END OF ON LOAD FUNCTION */
        }());/* END OF WRAPPING FUNCTION */
        </script>
    </body>
</html>