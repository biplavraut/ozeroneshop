<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Shop, Online electronics shop in Nepal</title>
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

<div class="page page--main" data-page="products">
	
	<!-- HEADER -->
	<header class="header header--fixed header--change">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left"><span></span><span></span><span></span><span></span></a></div>
			<div class="header__logo header__logo--text">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
			</div>	
			
			<div class="header__icon header__icon--cart open-panel" data-panel="right"><img src="{{asset('mobile/assets/images/icons/white/shopping-bag.svg')}}" alt="" title=""/><span class="cart-items-nr"><b id="cart-count">{{Cart::count() }}</b></span></div>
			</div>
	</header>
	<!-- SLIDER SIMPLE -->
	<div class="page__content page__content--with-header">
        <!-- <div class="search__form mb-20">
            <form>
                <input type="text" class="search__input" id="" name="" value="" placeholder="SEARCH" />
                <input type="submit" class="search__submit" value="Send" />
            </form>		
        </div> -->
        <div class="mt-20"></div>
        <div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
            <div class="swiper-wrapper">
                @foreach($elect_categories as $elect_category)
                    @if($elect_category->parent_id == 0)
                    @php
                    if(request()->route()->slug == $elect_category->slug){
                        $cat_title = $elect_category->title;
                    }else{
                        $title = "All Products";
                    }
                    @endphp
                    <div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
                        <div class="slider-thumbs__icon slider-thumbs__icon--round-corners {{ (request()->route()->slug == $elect_category->slug) ? 'active-category' : '' }} "><a href="/products/{{$elect_category->slug}}"><img src="{{asset('img/electronics/'. $elect_category->image .'')}}" alt="{{$elect_category->title}}" title="{{$elect_category->title}}"/></a></div>
                        <div class="my-slider-thumbs cap">
                            <div class="caption__content">
                                <h2 class="caption__title caption__title--smaller caption__title--centered"> {{$elect_category->title}}</h2>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination slider-thumbs__pagination"></div>
        </div>

        <div class="page__title-bar">
            <h2 class="page__title">{{ (@$cat_title != null) ? $cat_title : $title }}</h2>
            <div class="product-view">
                <ul class="product-layout">
                    <li class="selected" data-products="11"><img src="{{asset('mobile/assets/images/icons/blue/gallery-switch-11.svg')}}" alt="" title="" /></li>
                    <li data-products="12"><img src="{{asset('mobile/assets/images/icons/blue/gallery-switch-12.svg')}}" alt="" title="" /></li>
                </ul>
            </div>
        </div>
        <div class="product-view cards cards--12" id="loadlist-shop">
			@foreach($products as $product)
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners product">
					@if(count($product->getImageRelation)>10)
					<div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
						<div class="swiper-wrapper">
							@foreach($product->getImageRelation as $display_image)
							<div class="swiper-slide slider-simple__slide" style="background-image:url(../img/product/{{ $product->slug }}/{{ $display_image->image }});">
							</div>
							@endforeach
						</div>
						<div class="swiper-pagination slider-simple__pagination"></div>
					</div>
					@else
						@foreach($product->getImageRelation as $display_image)
                        @if($display_image->primary == 1)
                        @php $image = $display_image->image  @endphp
						<a href="/product-detail/{{$product->slug}}"><img src="{{asset('img/product/'.$product->slug.'/thumbs/'. $image .'')}}" alt="{{ $product->slug }}" title="{{ $display_image->image }}"/></a>					
						@endif
						@endforeach
					@endif
                    @if($product->id==1)<div class="card_latest"><span>Latest</span></div>@endif
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
						if ($product->discount > 0){
							$marked_price = $product->price;
							$discount = $product->discount;
							$price = round($marked_price - ($discount/100*$marked_price));
						}else{
							$price = $product->price;
						}
					@endphp
                    <div class="card__bottom-right-info">
                        @auth
                        <div class="card_wishlist"><a href="#"  onclick="addtowishlist({{$product->id}}, {{ $price }})"><img src="{{asset('mobile/assets/images/icons/blue/love.svg')}}" alt="Ozerone Wishlist" title="Add to Wishlist"/></a></div>
                        @else
                        <div class="card_wishlist"><a href="#" data-popup="wishlist" class="open-popup"><img src="{{asset('mobile/assets/images/icons/blue/love.svg')}}" alt="Ozerone Wishlist" title="Add to Wishlist"/></a></div>
                        @endif
                    </div>
				</div>
				<div class="card-detail">
					<h4 class="card__title">{{ substr($product->title, 0, 55)}}</h4>
					<div style="display:flex;">
						<p class="card_price">NPR {{number_format($price)}}</p>
						<a class="card_cart" href="#" onclick="addtocart({{$product->id}}, '{{$product->title}}', {{ $price }}, '{{ $image }}')">Add to Cart</a>
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
	</div>
	<!-- PAGE END -->
	@include('mobile.includes.bottombar')
	<!-- <script src="{{asset('js/mobile.js')}}"></script> -->
    <script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
    <script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
    <script>
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
				data:{"_token": "{{ csrf_token() }}",id:id, title:title, price:price, image:image, color:color, storage:storage},
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