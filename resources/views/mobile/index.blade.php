<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui,user-scalable=0">
<title>Ozerone Shop, Online electronics shop in Nepal</title>
<!-- Favicon -->
<link rel="icon" href="{{asset('logo/favicon.png')}}" type="image/png">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('mobile/vendor/swiper/swiper.min.css')}}">
<link rel="stylesheet" href="{{asset('css/mobile.css')}}">
<link rel="stylesheet" href="{{asset('mobile/custom.css')}}">
</head>
<body>
	
    <!-- Overlay panel -->
    <div class="body-overlay"></div>
    @include('mobile.includes.sidebar')
    @include('mobile.includes.cart')
    @include('mobile.includes.search')
    @include('mobile.includes.popups')

    <div class="page page--main" data-page="shop">
        <!-- HEADER -->
        <header class="header header--fixed header--change">	
            <div class="header__inner">	
                <div class="header__icon header__icon--menu open-panel" data-panel="left"><span></span><span></span><span></span><span></span></a></div>
                <div class="header__logo header__logo--text">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
                </div>	
                
                <div class="header__icon header__icon--cart open-panel" data-panel="right"><img src="{{asset('mobile/assets/images/icons/white/shopping-bag.svg')}}" alt="Ozerone Cart" title="Shopping Cart"/><span class="cart-items-nr"><b id="cart-count">{{Cart::count() }}</b></span></div>
                </div>
        </header>
        <!-- SLIDER SIMPLE -->
        <div class="page__content page__content--with-header">
            <div class="swiper-container slider-simple slider-simple slider-simple--vw-width slider-simple--full-height slider-init mb-20" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                    <div class="swiper-slide slider-simple__slide" style="background-image:linear-gradient(#29293560 0%, rgba(0, 0, 0, 0.0) 100%), url(img/slider/{{$slider->image}});">
                        <div class="slider-simple__caption caption caption--centered">
                            <div class="caption__content">
                                <!-- <h2 class="caption__title caption__title--centered">{{$slider->sub_title}}</h2> -->
                                <a href="{{$slider->link}}" target="_blank" class="button button--main button--ex-small btn-bottom-center">View Product</a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
                <div class="swiper-pagination slider-simple__pagination"></div>
            </div>
            <div class="page__title-bar">
                <h2 class="page__title">Featured Products</h2>
                
                <div class="page__title-right">
                    <div class="swiper-button-prev slider-thumbs__prev"></div>
                    <div class="swiper-button-next slider-thumbs__next"></div>
                </div>
            </div>
            
            <!-- Top featured products -->
            <div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
                <div class="swiper-wrapper">
                    @foreach($featured as $feature)
                    @if(count($feature->getImageRelation) > 0)
                    <div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h featured-card-shadow">
                        <div class="slider-thumbs__image slider-thumbs__image--round-corners">
                        
                        @foreach($feature->getImageRelation as $display_image)
                            @if($display_image->primary == 1)
                            @php $image = $display_image->image  @endphp
                            <a href="/product-detail/{{$feature->slug}}"><img src="img/product/{{ $feature->slug }}/thumbs/{{ $image }}" alt="{{$feature->title}}" title="{{$feature->title}}"/></a>					
                            @endif
                        @endforeach
                        @if ($feature->discount > 0)<div class="slider-thumbs__discount"><span>-{{$feature->discount}}%</span></div>@endif
                            <div class="slider-thumbs__top-right-info">
                                <div class="slider-thumbs__rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star"></span>
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
                            <div class="slider-thumbs__bottom-right-info">
                                @auth
                                <div class="slider-thumbs__wishlist"><a href="#" onclick="addtowishlist({{$feature->id}}, {{ $price }})"><img src="mobile/assets/images/icons/blue/love.svg" alt="Wishlist" title="Wishlist"/></a></div>
                                @else
                                <div class="slider-thumbs__wishlist"><a href="#" data-popup="wishlist" class="open-popup"><img src="mobile/assets/images/icons/blue/love.svg" alt="Wishlist" title="Wishlist"/></a></div>
                                @endif
                            </div>
                        </div>
                        <div class="slider-thumbs__caption caption">
                            <div class="caption__content">
                                <h2 class="caption__title">{{ substr($feature->title, 0, 55)}}</h2>
                                
                                <a class="caption__price" href="#">@if ($feature->discount > 0)NPR <span>{{number_format($marked_price)}} </span> {{ number_format($price)}} @else NPR {{number_format($price)}} @endif</a>
                                @if(count($feature->getStorageRelation) > 0)
                                    <a class="caption__cart" href="/product-detail/{{$feature->slug}}" >View Options</a>
                                @else
                                    <a class="caption__cart" href="#" onclick="addtocart({{$feature->id}}, '{{$feature->title}}', {{$price}}, '{{ $image }}' )">Buy Now</a>
                                @endif
                            </div>
                        </div>
                        
                    </div> 
                    @endif
                    @endforeach				 
                </div>
                <div class="swiper-pagination slider-thumbs__pagination"></div>
        
            </div>
            <!-- End of Featured -->
            <div class="page__title-bar">
                <h3>We deliver Happiness at your Doorstep.<span> Live Smart Live Easy</span></h3>
            </div>
            <div class="cards cards--11">			
                <div class="card card--style-cover card--style-round-corners" style="background-image:url(img/promo/prmo-1.png);  background-repeat: no-repeat;  background-size: cover; min-height:150px;">
                    <!-- <div class="promo__gradient"></div> -->

                    <!-- <div class="card__icon card__icon--centered"><img src="mobile/assets/images/icons/brands/xiaomi.svg" alt="" title=""/></div>
                    <h4 class="card__title card__title--centered">PROMO CODE O01-XOMI10</h4>
                    <p class="card__text card__text--centered">Get flat 10% on XIAOMI Phone</p> -->
                    <div class="card__top-right-info">
                        <div class="view__more"><a href="#"><img src="logo/logo.svg" style="width:25px;" alt="" title=""/></a></div>
                    </div>
                    
                </div>
            </div>
            
            <!-- <div class="page__title-bar">
                <h2 class="page__title">Latest News</h2>
            </div>
            @foreach($blogs as $blog)
            <div class="card card--style-thumb card--border-bottom mb-20">
                <div class="brand-line justify-space">
                    <img src="img/brand/{{$blog->getBrandRelation->image}}" alt="" title=""/>
                    <span><strong>{{$blog->title}}</strong><a href="#">{{ '@'.$blog->getBrandRelation->title }}</a></span>
                </div>
                <div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide slider-simple__slide" style="background-image:url(img/blog/{{$blog->image}});">
                        </div>
                    </div>
                    <div class="swiper-pagination slider-simple__pagination"></div>
                </div>
                    <a href="#"><h4 class="card__text">{{ substr(strip_tags($blog->excerpt), 0,100)  }}  ... <i>Read More</i> </h4></a>
                    
            </div>
            @endforeach -->
                
            <!-- <div class="fieldset">
                <h2 class="page__title">Top Brands</h2>
                <div class="cards cards--14">
                    @foreach($brands as $brand)
                    @if($brand->parent_id == 0)
                    <div class="card card--style-thumb">
                        <div class="card__thumb brand-thumb">
                            <a href=""><img src="{{asset('img/brand/'. $brand->image .'')}}" alt="" title=""/> </a>
                        </div>
                        <a href=""><h4 class="card__title card__title--centered">{{$brand->title}}</h4></a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div> -->
            <div class="fieldset">
                <h2 class="page__title">Brands</h2>
                <div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
                    <div class="swiper-wrapper">
                        @foreach($brands as $brand)
                            @if($brand->parent_id == 0)
                            
                            <div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
                                <div class="slider-thumbs__icon slider-thumbs__icon--round-corners">
                                    <a href="/brand/{{$brand->slug}}">
                                    <img src="{{asset('img/brand/'. $brand->image .'')}}" alt="{{$brand->title}}" title="{{$brand->title}}"/>
                                    </a>
                                </div>
                                <div class="my-slider-thumbs cap">
                                    <div class="caption__content">
                                        <h2 class="caption__title caption__title--smaller caption__title--centered"> {{$brand->title}}</h2>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination slider-thumbs__pagination"></div>
                </div>
            </div>
            <div class="page__title-bar">
                <h2 class="page__title">Smart Phones</h2>
            </div>
            <div class="product-view cards cards--12">
                @foreach($smart_phones as $smart_phone)
                <div class="card card--style-thumb">
                    <div class="card__thumb card__thumb--round-corners product">
                        @if(count($smart_phone->getImageRelation)>10)
                        <div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
                            <div class="swiper-wrapper">
                                @foreach($smart_phone->getImageRelation as $display_image)
                                <div class="swiper-slide slider-simple__slide" style="background-image:url(img/product/{{ $smart_phone->slug }}/{{ $display_image->image }});">
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination slider-simple__pagination"></div>
                        </div>
                        @else
                            @foreach($smart_phone->getImageRelation as $display_image)
                            @if($display_image->primary == 1)
                            @php $image = $display_image->image  @endphp
                            <a href="/product-detail/{{$smart_phone->slug}}"><img src="img/product/{{ $smart_phone->slug }}/thumbs/{{ $image }}" alt="{{ $smart_phone->slug }}" title="{{ $display_image->image }}"/></a>					
                            @endif
                            @endforeach
                        @endif
                        @if($smart_phone->id==1)<div class="card_latest"><span>Latest</span></div>@endif
                        <!-- <div class="card__top-right-info">
                            <div class="card__rating">
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                            </div>
                        </div> -->
                        @php
                            if ($smart_phone->discount > 0){
                                $marked_price = $smart_phone->price;
                                $discount = $smart_phone->discount;
                                $price = round($marked_price - ($discount/100*$marked_price));
                            }else{
                                $price = $smart_phone->price;
                            }
                        @endphp
                        <div class="card__bottom-right-info">
                            @auth
                            <div class="card_wishlist"><a href="#" onclick="addtowishlist({{$smart_phone->id}}, {{ $price }})"><img src="{{asset('mobile/assets/images/icons/blue/love.svg')}}" alt="Ozerone Wishlist" title="Add to Wishlist"/></a></div>
                            @else
                            <div class="card_wishlist"><a href="#" data-popup="wishlist" class="open-popup"><img src="{{asset('mobile/assets/images/icons/blue/love.svg')}}" alt="Ozerone Wishlist" title="Add to Wishlist"/></a></div>
                            @endif
                        </div>
                    </div>
                    <div class="card-detail">
                        <h4 class="card__title">{{ substr($smart_phone->title, 0, 55)}}</h4>
                        <div style="display:flex;">
                            
                            <p class="card_price">NPR {{number_format($price)}}</p>
                            <a class="card_cart" href="#" onclick="addtocart({{$smart_phone->id}}, '{{$smart_phone->title}}', {{$price}}, '{{ $image }}')">Add to Cart</a>
                        </div>
                        <div class="card__rating">
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                            </div>
                    </div>
                        
                </div>
                @endforeach
                <div class="buttons buttons--centered mb-40">
                    <a href="/products/smart-phone" class="button button--more"> Show All <i class="fas fa-arrow-right"></i> </a>
                </div>
                
            </div>

            <div class="page__title-bar">
                <h2 class="page__title">Best Selling</h2>
            </div>
            <div class="product-view cards cards--12" id="loadlist-shop">
                @foreach($all_products as $all_product)
                <div class="card card--style-thumb">
                    <div class="card__thumb card__thumb--round-corners product">
                        @if(count($all_product->getImageRelation)>10)
                        <div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
                            <div class="swiper-wrapper">
                                @foreach($all_product->getImageRelation as $display_image)
                                <div class="swiper-slide slider-simple__slide" style="background-image:url(img/product/{{ $all_product->slug }}/{{ $display_image->image }});">
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination slider-simple__pagination"></div>
                        </div>
                        @else
                            @foreach($all_product->getImageRelation as $display_image)
                            @if($display_image->primary == 1)
                            @php $image = $display_image->image  @endphp
                            <a href="/product-detail/{{$all_product->slug}}"><img src="img/product/{{ $all_product->slug }}/thumbs/{{ $image }}" alt="{{ $all_product->slug }}" title="{{ $display_image->image }}"/></a>					
                            @endif
                            @endforeach
                        @endif
                        @if($all_product->id==1)<div class="card_latest"><span>Latest</span></div>@endif
                        <!-- <div class="card__top-right-info">
                            <div class="card__rating">
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                            </div>
                        </div> -->
                        @php
                            if ($all_product->discount > 0){
                                $marked_price = $all_product->price;
                                $discount = $all_product->discount;
                                $price = round($marked_price - ($discount/100*$marked_price));
                            }else{
                                $price = $all_product->price;
                            }
                        @endphp
                        <div class="card__bottom-right-info">
                            @auth
                            <div class="card_wishlist"><a href="#" onclick="addtowishlist({{$all_product->id}}, {{ $price }})"><img src="{{asset('mobile/assets/images/icons/blue/love.svg')}}" alt="Ozerone Wishlist" title="Add to Wishlist"/></a></div>
                            @else
                            <div class="card_wishlist"><a href="#" data-popup="wishlist" class="open-popup"><img src="{{asset('mobile/assets/images/icons/blue/love.svg')}}" alt="Ozerone Wishlist" title="Add to Wishlist"/></a></div>
                            @endif
                        </div>
                    </div>
                    <div class="card-detail">
                        <h4 class="card__title">{{ substr($all_product->title, 0, 55)}}</h4>
                        <div style="display:flex;">
                            
                            <p class="card_price">NPR {{number_format($price)}}</p>
                            <a class="card_cart" href="#" onclick="addtocart({{$all_product->id}}, '{{$all_product->title}}', {{$price}}, '{{ $image }}')">Add to Cart</a>
                        </div>
                        <div class="card__rating">
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                            </div>
                    </div>
                        
                </div>
                @endforeach
                
            </div>
            <div class="buttons buttons--centered mb-40">
                <div id="loadMore" class="button button--more">View more</div>
                <div id="showLess" class="button button--disabled">Search your products</div> 
            </div>
        </div>
        <!-- PAGE END -->
    </div>
	@include('mobile.includes.bottombar')
	<!-- <script src="{{asset('js/mobile.js')}}"></script> -->
	<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
	<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
	<script>
		// $.ajaxSetup({
		// 	headers: {
		// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 	}

		// });
		function addtocart(id, title, price, image){
			var id = id;
			var title = title;
			var price = price;
			var image = image;
			var color = 'Not Available';
			var storage = 'Not Available';
			$.ajax({
				type:'POST',
				url:"{{ route('cartstore.post') }}",
				data:{"_token": "{{ csrf_token() }}", id:id, title:title, price:price, image:image, color:color, storage:storage},
				success:function(data){
					console.log(data.success);
					$("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
					$("#cart-count").load(location.href + " #cart-count");

					$('.cart-items-nr').addClass('animate');
					setTimeout(function() {
						$('.cart-items-nr').removeClass('animate');
					}, 1500);
					
				}
			});
		};

		function addtowishlist(id, price){
			var id = id;
			var price = price;
			$.ajax({
				type:'POST',
				url:"{{ route('addwishlist.post') }}",
				data:{"_token": "{{ csrf_token() }}", id:id, price:price},
				success:function(data){
					if(data.message == 'wishlist_added'){
						var popup = $('.popup--' + 'added');
						popup.css({display: 'block'}).addClass('active');
					}else{
						if(data.message == 'wishlist_exist'){
							var popup = $('.popup--' + 'exist');
							popup.css({display: 'block'}).addClass('active');
						}else{
							var popup = $('.popup--' + 'error');
							popup.css({display: 'block'}).addClass('active');
						}
					}
					
					
										
				}
			});
		};
	</script>
</body>
</html>