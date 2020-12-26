<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Shop, Online electronics shop in Nepal</title>
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

<div class="page page--main" data-page="products">
	
	<!-- HEADER -->
	<header class="header header--fixed header--change">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left"><span></span><span></span><span></span><span></span></a></div>
			<div class="header__logo header__logo--text">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
			</div>	
			
			<div class="header__icon header__icon--cart open-panel" data-panel="right"><img src="{{asset('mobile/assets/images/icons/white/shopping-bag.svg')}}" alt="" title=""/><span class="cart-items-nr">0</span></div>
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
                    <div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
                        <div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="/products/{{$elect_category->slug}}"><img src="{{asset('img/electronics/'. $elect_category->image .'')}}" alt="{{$elect_category->title}}" title="{{$elect_category->title}}"/></a></div>
                        <div class="slider-thumbs__caption caption">
                            <div class="caption__content">
                                <h2 class="caption__title caption__title--smaller caption__title--centered">{{$elect_category->title}}</h2>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination slider-thumbs__pagination"></div>
        </div>

        <div class="page__title-bar">
            <h2 class="page__title">All Products</h2>
            <div class="product-view">
                <ul class="product-layout">
                    <li class="selected" data-products="11"><img src="{{asset('mobile/assets/images/icons/blue/gallery-switch-11.svg')}}" alt="" title="" /></li>
                    <li data-products="12"><img src="{{asset('mobile/assets/images/icons/blue/gallery-switch-12.svg')}}" alt="" title="" /></li>
                </ul>
            </div>
        </div>
        <div class="product-view cards cards--11" id="loadlist-shop">
            @foreach($products as $product)
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners">
                    <a href="#"><img src="{{asset('mobile/assets/img/product3.jpg')}}" alt="" title=""/></a>
                    <div class="card_latest"><span>Latest</span></div>
                    <div class="card__top-right-info">
                        <div class="card__rating">
                            <span class="fas fa-star checked"></span>
                            <span class="fas fa-star checked"></span>
                            <span class="fas fa-star checked"></span>
                            <span class="fas fa-star checked"></span>
                            <span class="fas fa-star"></span>
                        </div>
                    </div>
                    <div class="card__bottom-right-info">
                        <div class="card_wishlist"><a href="#"><img src="{{asset('mobile/assets/images/icons/black/love.svg')}}" alt="" title=""/></a></div>
                    </div>
                </div>
                <h4 class="card__title">Samsung Galaxy</h4>
                <div style="display:flex;">
                    <p class="card_price">NPR 49,999</p>
                    <a class="card_cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
            
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners">
                    <a href="#"><img src="{{asset('mobile/assets/img/product2.jpg')}}" alt="" title=""/></a>
                    <div class="card_sale"><span>SALE</span></div>
                    <div class="card__top-right-info">
                            <div class="card__rating">
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star"></span>
                            </div>
                        </div>
                    <div class="card__bottom-right-info">
                        <div class="card_wishlist"><a href="#"><img src="{{asset('mobile/assets/images/icons/black/love.svg')}}" alt="" title=""/></a></div>
                    </div>
                </div>
                <h4 class="card__title">Samsung Galaxy A51</h4>
                <div style="display:flex;">
                    <p class="card_price">NPR 49,999</p>
                    <a class="card_cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
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
</body>
</html>