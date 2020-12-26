<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Blogs and News - Ozerone Shop, Online electronics shop in Nepal</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('mobile/vendor/swiper/swiper.min.css')}}">
<link rel="stylesheet" href="{{asset('css/mobile.css')}}">
<link rel="stylesheet" href="{{asset('mobile/custom.css')}}">
</head>
<body>
	
<!-- Overlay panel -->
<div class="body-overlay"></div>
<!-- Left panel -->
<div id="panel-left">
	<!-- Main Naviagtion -->
	<div class="panel panel--left" id="main-navigation">
		<!-- Slider -->
		<div class="panel__navigation">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="user-details">
						<div class="user-details__thumb">
							<img src="logo/logo-long.png" max-width="200" alt="Ozerone Logo">
						</div>
					</div>
					<nav class="main-nav">
						<ul>
							<li><a href="./"><img src="mobile/assets/images/icons/blue/home.svg" alt="" title="" /><span>Home</span></a></li>							
							@foreach($elect_categories as $elect_category)
								@if($elect_category->parent_id == 0)
								<li><a href="#"><img src="img/electronics/{{$elect_category->image}}" alt="" title="" /><span>{{$elect_category->title}}</span></a></li>
								@endif
							@endforeach
							<li><a href="/blog-news"><img src="mobile/assets/images/icons/blue/news.svg" alt="" title="" /><span>Blog-News</span></a></li>							
							<li><a href="/faqs"><img src="mobile/assets/images/icons/blue/question.svg" alt="" title="" /><span>FAQs</span></a></li>
							<li><a href="/about"><img src="mobile/assets/images/icons/blue/user.svg" alt="" title="" /><span>About</span></a></li>
							<li><a href="/contact"><img src="mobile/assets/images/icons/blue/contact.svg" alt="" title="" /><span>Contact</span></a></li>
							<li class="divider"></li>
							@if (Route::has('login'))
									@auth
										<li><a href="/dashboard"><img src="mobile/assets/images/icons/blue/settings.svg" alt="" title="" /><span>Account</span></a></li>
										<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="mobile/assets/images/icons/blue/logout.svg" alt="" title="" /><span>Logout</span></a></li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									@else
										<li><a href="{{ route('login') }}"><img src="mobile/assets/images/icons/blue/logout.svg" alt="" title="" /><span>Login</span></a></li>
										@if (Route::has('register'))
											<li><a href="{{ route('register') }}"><img src="mobile/assets/images/icons/blue/logout.svg" alt="" title="" /><span>Register</span></a></li>
										@endif
									@endif
							@endif
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Right panel -->
<div id="panel-right-cart">
	<div class="panel panel--right">
		<div class="cart">
			<h3 class="cart__title">Your Shopping Cart</h3>
			<div class="swiper-container slider-init-swipe cart__item" id="item0">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="mobile/assets/img/product1.jpg" alt="" title=""/></a></div>
						<h4 class="cart__item-title">Note10 <span>NPR 49,999</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity1" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity1" value="1" class="quantity__input" />
								<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity1" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="0"><img src="mobile/assets/images/icons/blue/more.svg" alt="" title=""/></div>
					</div>
					<div class="swiper-slide cart__item-delete"><a href="#" class="delete-item" data-delete-item="0">REMOVE</a></div>
				</div>
			</div>
			
			<div class="swiper-container slider-init-swipe cart__item" id="item1">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="mobile/assets/img/product2.jpg" alt="" title=""/></a></div>
						<h4 class="cart__item-title">Galaxy A51<span>NPR 39,999</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity2" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity2" value="1" class="quantity__input" />
								<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity2" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="1"><img src="mobile/assets/images/icons/blue/more.svg" alt="" title=""/></div>
					</div>
					<div class="swiper-slide cart__item-delete"><a href="#" class="delete-item" data-delete-item="1">REMOVE</a></div>
				</div>
			</div>
			
			<div class="swiper-container slider-init-swipe cart__item" id="item2">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="mobile/assets/img/product3.jpg" alt="" title=""/></a></div>
						<h4 class="cart__item-title">Galaxy A71 <span>NPR 49,999</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity3" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity3" value="1" class="quantity__input" />
								<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity3" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="2"><img src="mobile/assets/images/icons/blue/more.svg" alt="" title=""/></div>
					</div>
					<div class="swiper-slide cart__item-delete"><a href="#" class="delete-item" data-delete-item="2">REMOVE</a></div>
				</div>
			</div>
			<div class="cart__total">
			  	<div class="d-flex align-items-center justify-space pb-10">
					<span>CART TOTAL</span>  <b>NPR 1,59,000</b>
			  	</div>
			  	<div class="d-flex align-items-center justify-space pb-10">
					<span>VAT (10%)</span>  <b>NPR 1,59,0</b>
			  	</div>
			  	<div class="total d-flex align-items-center justify-space pb-10">
					<span>TOTAL</span> <strong>NPR 1,61,000</strong>
			  	</div>
			</div>
			<div class="buttons buttons--centered mt-20">
				<a href="#" class="button button--main button--full">PROCEED TO CHECKOUT</a>
			</div>
		</div>
	</div>
</div>
<div class="popup popup--notifications">
	<div class="popup__close"><a href="#" class="close-popup" data-popup="notifications"><img src="mobile/assets/images/icons/blue/close.svg" alt="" title=""/></a></div>
	<div class="search">	  
		<div class="search__form">
			<form>
				<input type="text" class="search__input" id="" name="" value="" placeholder="SEARCH" />
				<input type="submit" class="search__submit" value="Send" />
			</form>		
		</div>
		<div class="search_text">
			<a href="#">Samsung</a>
			<a href="#">Galaxy</a>
			<a href="#">Smart Phone</a>
			<a href="#">iPhone</a>
		</div>
		<div class="search__results">
			<h3>Results</h3>
			<div class="search-result">
				<div class="search-result__thumb"><img src="mobile/assets/img/prod1.jpg" alt="" title=""/></div>
				<div class="search-result__details">
					<p>NewSamsung Galaxy Note 10</a></p>
				</div>
			</div>
			<div class="search-result">
				<div class="search-result__thumb"><img src="mobile/assets/images/photos/image-2.jpg" alt="" title=""/></div>
				<div class="search-result__details">
					<p>Search Result 2</p>
				</div>
			</div>
		</div>
				
	</div>
</div>

<div class="page page--main" data-page="shop">
	
	<!-- HEADER -->
	<header class="header header--fixed header--change">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left"><span></span><span></span><span></span><span></span></a></div>
			<div class="header__logo header__logo--text">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
			</div>	
			
			<div class="header__icon header__icon--cart open-panel" data-panel="right"><img src="mobile/assets/images/icons/white/shopping-bag.svg" alt="" title=""/><span class="cart-items-nr">0</span></div>
        </div>
	</header>
	<!-- SLIDER SIMPLE -->
	<div class="page__content page__content--with-header">
		
		<div class="page__title-bar mt-20">
			<h2 class="page__title">Latest News</h2>
		</div>
		@foreach($blogs as $blog)
		<div class="card card--style-thumb card--border-bottom mb-20">
			<div class="brand-line justify-space">
				<img src="img/brand/{{$blog->getBrandRelation->image}}" alt="" title=""/>
				<span><strong>{{$blog->title}}</strong><a href="#">{{ '@'.$blog->getBrandRelation->title }}</a></span>
			</div>
			<!-- SLIDER SIMPLE -->
			<div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
				<div class="swiper-wrapper">
					<div class="swiper-slide slider-simple__slide" style="background-image:url(img/blog/{{$blog->image}});">
					</div>
				</div>
				<div class="swiper-pagination slider-simple__pagination"></div>
			</div>
				<a href="#"><h4 class="card__text">{{ substr(strip_tags($blog->excerpt), 0,100)  }}  ... <i>Read More</i> </h4></a>
				<!-- <div class="d-flex align-center mb-10">
					<div class="card__likes">NPR 28k</div>
					<div class="card__comments ml-20 open-popup" data-popup="comments">23 Sales</div>
				</div> -->
		</div>
		@endforeach
            
        </div>
	</div>
	<!-- PAGE END -->

	<!-- Bottom Navigation -->
	<div class="bottom-navigation bottom-navigation--gradient">
		<ul class="bottom-navigation__icons">
			<li><a href="./"><img src="mobile/assets/images/icons/blue/home.svg" alt="" title="" /><span>Home</span></a></li>
			<li><a href="./shop"><img src="mobile/assets/images/icons/blue/cart.svg" alt="" title="" /><span>Shop</span></a></li>
			<a href="#" class="open-popup" data-popup="notifications"><li class="centered"><img src="mobile/assets/images/icons/blue/magnifier.svg" alt="" title="" /></li></a>
			<li><a href="#"><img src="mobile/assets/images/icons/blue/user.svg" alt="" title="" /><span>Account</span></a></li>
			<li><a href="#"><img src="mobile/assets/images/icons/blue/chat.svg" alt="" title="" /><span>Chat</span></a></li>
		</ul>
	</div>	
	<!-- Bottom Navigation Ends -->	
	<!-- <script src="{{asset('js/mobile.js')}}"></script> -->
	<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
	<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>