<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Account - Ozerone Shop, Online electronics shop in Nepal</title>
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


<div class="page page--main" data-page="checkout">
	
	<header class="header header--page header--fixed">	
        <div class="header__inner">	
            <div class="header__icon"><a href="javascript:history.go(-1)"><img src="{{asset('mobile/assets/images/icons/white/arrow-back.svg')}}" alt="" title=""/></a></div>
            <div class="header__logo header__logo--text">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
            </div>
			<div class="header__icon header__icon--cart open-panel" data-panel="right"><img src="{{asset('mobile/assets/images/icons/white/shopping-bag.svg')}}" alt="Ozerone Cart" title="Shopping Cart"/><span class="cart-items-nr"><b id="cart-count">{{Cart::count() }}</b></span></div>	
			
        </div>
	</header>
	
	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-header">
    @auth
		<h2 class="page__title mt-20">Hello! {{ $customer->name }}</h2>
		<div class="fieldset">
            <div style="display:flex;">
                <h3>Account Detail</h3>
                <a href="/accountdetail" style="position:absolute; right: 40px;"><span> Setting <i class="fas fa-cog"></i> </span></a>
            </div>
            <p>Name: {{ $customer->name }}</p>
            <p>Email: {{ $customer->email }}</p>
            <p>Phone: {{ $customer->primary_phone }}</p>
            <p>Address: {{ $customer->address }}</p>
			
		</div>
        <div class="fieldset">
            <div style="display:flex;">
                <h3>Shipping Detail</h3>
                <a href="/shippingdetail" style="position:absolute; right: 40px;"><span> Edit Detail <i class="fas fa-edit"></i> </span></a>
            </div>
            <p>Name: {{ $shipping->name }}</p>
            <p>Email: {{ $shipping->email }}</p>
            <p>Phone: {{ $shipping->primary_phone }}</p>
            <p>Address: {{ $shipping->address }}</p>
			
		</div>
		@if(count($wishlists) > 0)
        <div class="page__title-bar">
			<h2 class="page__title">Wishlist</h2>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
			<!-- Top featured products -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
				@foreach($wishlists as $wishlist)
				@if(count($wishlist->getImageRelation) > 0)
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h featured-card-shadow">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					
					@foreach($wishlist->getImageRelation as $display_image)
						@if($display_image->primary == 1)
						@php $image = $display_image->image  @endphp
						<a href="/product-detail/{{$wishlist->getProductRelation[0]->slug}}"><img src="img/product/{{ $wishlist->getProductRelation[0]->slug }}/thumbs/{{ $image }}" alt="{{$wishlist->getProductRelation[0]->title}}" title="{{$wishlist->getProductRelation[0]->title}}"/></a>					
						@endif
					@endforeach
					@if ($wishlist->discount > 0)<div class="slider-thumbs__discount"><span>-{{$wishlist->getProductRelation[0]->discount}}%</span></div>@endif
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
						if ($wishlist->getProductRelation[0]->discount > 0){
							$marked_price = $wishlist->getProductRelation[0]->price;
							$discount = $wishlist->getProductRelation[0]->discount;
							$price = round($marked_price - ($discount/100*$marked_price));
						}else{
							$price = $wishlist->getProductRelation[0]->price;
						}
						@endphp
						<div class="slider-thumbs__bottom-right-info">
							@if($wishlist->price > $price)
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/gradient-green/arrow-down.svg" alt="Price Decreased" title="Price Decreased"/></a></div>
							@elseif($wishlist->price < $price)
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/red/arrow-up.svg" alt="Price Increased" title="Price Increased"/></a></div>
							@else
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/blue/equal.svg" alt="Price Equal" title="Price Equal"/></a></div>
							@endif
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">{{ substr($wishlist->getProductRelation[0]->title, 0, 55)}}</h2>
							<a class="caption__price" href="#">@if ($wishlist->getProductRelation[0]->discount > 0)NPR <span>{{number_format($marked_price)}} </span> {{ number_format($price)}} @else NPR {{number_format($price)}} @endif</a>
							@if(count($wishlist->getStorageRelation) > 0)
								<a class="caption__cart" href="/product-detail/{{$wishlist->getProductRelation[0]->slug}}" >View Options</a>
							@else
								<a class="caption__cart" href="#" onclick="addtocart('{{$wishlist->getProductRelation[0]->id}}', '{{$wishlist->getProductRelation[0]->title}}', {{$price}}, '{{ $image }}' )">Buy Now</a>
							@endif
						</div>
					</div>
					
				</div> 
				@endif
				@endforeach				 
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
	
			</div>
			
			<!-- Wishlist -->
		</div>
		@else
		<div class="fieldset">
			<p>No products in Wishlist.</p>			
		</div>
		@endif

        <h2>Orders</h2>					
		<div class="table table--8cols mb-40">
			<div class="table__inner">	
				<div class="table__row">
					<div class="table__section table__section--header">Nr</div>
					<div class="table__section table__section--header">Title</div>
					<div class="table__section table__section--header">Value</div>
					<div class="table__section table__section--header">Option</div>	
					<div class="table__section table__section--header">Option</div>
					<div class="table__section table__section--header">Option</div>
					<div class="table__section table__section--header">Option</div>					
					<div class="table__section table__section--header">Button</div> 						
				</div>
				<div class="table__row">
					<div class="table__section">01</div>
					<div class="table__section">Title 01</div>
					<div class="table__section">$100</div> 
					<div class="table__section">Yes</div>
					<div class="table__section">No</div>
					<div class="table__section">Yes</div>
					<div class="table__section">No</div>
					<div class="table__section"><a href="#" class="button button--main button--ex-small">BUY</a></div>
				</div>
				<div class="table__row">
					<div class="table__section">02</div>
					<div class="table__section">Title 02</div>
					<div class="table__section">$200</div> 
					<div class="table__section">Yes</div>
					<div class="table__section">No</div>
					<div class="table__section">Yes</div>
					<div class="table__section">No</div>
					<div class="table__section"><a href="#" class="button button--main button--ex-small">BUY</a></div>
				</div>
				<div class="table__row">
					<div class="table__section">03</div>
					<div class="table__section">Title 03</div>
					<div class="table__section">$300</div> 
					<div class="table__section">Yes</div>
					<div class="table__section">No</div>
					<div class="table__section">Yes</div>
					<div class="table__section">No</div>
					<div class="table__section"><a href="#" class="button button--main button--ex-small">BUY</a></div>
				</div>
			</div>
		</div>
		 
	@endif	
	</div>
			  



</div>
<!-- PAGE END --> 
@include('mobile.includes.bottombar')

<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/jquery/jquery.validate.min.js')}}" ></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>