<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>{{$product->title}} - Ozerone Shop, Online electronics shop in Nepal</title>
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

	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-bottom-nav">
	
		<header class="header header--gradient header--fixed header--change">	
				<div class="header__inner">	
                    <div class="header__icon"><a href="javascript:history.go(-1)"><img src="{{asset('mobile/assets/images/icons/white/arrow-back.svg')}}" alt="" title=""/></a></div>
                    <div class="header__logo header__logo--text">
						<a href="/home">
                        	<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
						</a>
					</div>
					<div class="header__icon header__icon--cart open-panel" data-panel="right"><img src="{{asset('mobile/assets/images/icons/white/cart.svg')}}" alt="" title=""/><span class="cart-items-nr">0</span></div>
				</div>
		</header>
	
		<!-- SLIDER SIMPLE -->
		<div class="page__content--with-header swiper-container slider-simple slider-simple slider-simple--vw-width slider-init" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
			<div class="swiper-wrapper">
                @foreach ($product->getImageRelation as $image)
				<div class="swiper-slide slider-simple__slide" style="background-image:url(../../img/product/{{ $product->slug }}/{{ $image->image }});">
				</div> 
				@endforeach
			</div>
			<div class="swiper-pagination slider-simple__pagination"></div>
			@auth
			<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/blue/love.svg" alt="Wishlist" title="Wishlist"/></a></div>
			<div class="shop-details-share"><a href="#" data-popup="social" class="open-popup"><img src="{{asset('mobile/assets/images/icons/white/love.svg')}}" alt="" title=""/></a></div>
			@else
			<div class="shop-details-share"><a href="#" data-popup="wishlist" class="open-popup"><img src="{{asset('mobile/assets/images/icons/white/love.svg')}}" alt="Wishlist" title="Wishlist"/></a></div>
			@endif
		</div>

		<div class="d-flex justify-space align-items-center">
			<h2 class="page__title mb-0">{{$product->title}}</h2>
			<div class="product-details-price">NPR {{ number_format($product->price) }}</div>
		</div>
		<div class="product-excerpt">
			{!! $product->excerpt !!}
		</div>		
        @if (count($product->getStorageRelation) >= 1)
		<h3>Storage Option</h3>
        <div class="size-selectors">
            @foreach ($product->getStorageRelation as $product_storage)                
            <div class="size-selectors__input"> 
				<input id="{{ $product_storage->ram }}" type="radio" name="ram" value="{{ $product_storage->ram }}" {{ ($loop->index == 0) ? "checked" : "" }}>  
				<label for="{{ $product_storage->ram }}">{{ $product_storage->ram.' RAM-'. $product_storage->storage }}</label>
            </div>
            @endforeach	
        </div> 
        @endif
        @if (count($product->getColorRelation) >= 1)
		<h3>Select color</h3>
		<div class="color-selectors">   
            @foreach ($product->getColorRelation as $product_color) 
			<div class="size-selectors__input"> 				
				<input id="{{ $product_color->color }}" type="radio" name="color" value="{{ $product_color->color }}" {{ ($loop->index == 0) ? "checked" : "" }}>  
				<label for="{{ $product_color->color }}" class="gray" style="background-color: {{ $product_color->hex }};"></label>
			</div>
            @endforeach
        </div> 
        @endif	
		<h3>Product Informations</h3>
		<div class="cards cards--11" id="loadlist-shop">	
			@if (count($product->getDetailRelation) >= 1)
				@foreach ($product->getDetailRelation as $product_detail) 
				<div class="card mb-0">
					<h4>{{ $product_detail->title }}</h3>
					<div class="detail-content">{!! $product_detail->excerpt !!}</div>
				</div>
				
				@endforeach 	
				<div class="buttons buttons--centered">
					<div id="loadMore" class="button button--more">More Detail</div>
					<div id="showLess" class="button button--disabled">No More Detail</div> 
				</div>
			@endif
		</div>
	</div>


</div>
<!-- PAGE END -->

<!-- Bottom navigation -->
<div id="bottom-toolbar-shop" class="bottom-toolbar">
	<div class="bottom-navigation">
		<div class="bottom-navigation__shop">
			<div class="bottom-navigation__shop-qty">
				<form id="myform" method="POST" action="#" class="quantity">
					<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity" />
					<input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity" value="1" class="quantity__input" />
					<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity" />
				</form>
            </div>
            <div class="header__icon"><a href="tel:+977 9860469153"><img src="{{asset('mobile/assets/images/icons/white/call.svg')}}" alt="" title=""/></a></div>
			<div class="bottom-navigation__shop-cart button button--small button--detail addtocart">ADD TO CART</div>
		</div>
	</div>	
</div>

<!-- Social Icons Popup -->
<div id="popup-social"></div>
 
<!-- Alert --> 
<div id="popup-alert"></div>  

<!-- Notifications --> 
<div id="popup-notifications"></div>  

<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>