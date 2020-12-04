<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Ozerone Shop, Online electronics shop in Nepal</title>
<link rel="stylesheet" href="{{asset('mobile/vendor/swiper/swiper.min.css')}}">
<link rel="stylesheet" href="{{asset('mobile/main/css/style.css')}}">
<link rel="stylesheet" href="{{asset('mobile/custom.css')}}">
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">  
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet"> 
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
							<li><a href="#"><img src="mobile/assets/images/icons/blue/user.svg" alt="" title="" /><span>About</span></a></li>
							<li class="subnav opensubnav"><img src="mobile/assets/images/icons/blue/checked.svg" alt="" title="" /><span>Categories</span><i><img src="mobile/assets/images/icons/blue/arrow-right.svg" alt="" title="" /></i></li>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/news.svg" alt="" title="" /><span>Blog-News</span></a></li>	
							<li class="divider"></li>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/settings.svg" alt="" title="" /><span>Account</span></a></li>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/contact.svg" alt="" title="" /><span>Contact</span></a></li>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/logout.svg" alt="" title="" /><span>Logout</span></a></li>
						</ul>
					</nav>
				</div>	
				<div class="swiper-slide">		
					<div class="subnav-header backtonav"><img src="mobile/assets/images/icons/blue/arrow-left.svg" alt="" title="" /><span>BACK</span></div>
					<nav class="main-nav">
						<ul>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/slider.svg" alt="" title="" /><span>Smart TV</span></a></li>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/blocks.svg" alt="" title="" /><span>Smart Phone</span></a></li>
							<li><a href="#"><img src="mobile/assets/images/icons/blue/tables.svg" alt="" title="" /><span>Tablets</span></a></li>
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
								<input type="text" name="quantity1" value="1" class="quantity__input" />
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
								<input type="text" name="quantity2" value="1" class="quantity__input" />
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
								<input type="text" name="quantity3" value="1" class="quantity__input" />
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
      	<div class="popup__close"><a href="#" class="close-popup" data-popup="notifications"><img src="mobile/assets/images/icons/white/close.svg" alt="" title=""/></a></div>
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
	<div class="swiper-container slider-simple slider-simple slider-simple--vw-width slider-simple--full-height slider-init mb-20" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
		<div class="swiper-wrapper">
			<div class="swiper-slide slider-simple__slide" style="background-image:linear-gradient(#29293560 0%, rgba(0, 0, 0, 0.6) 100%), url(mobile/assets/img/tv.jpg); background-color: rgba(0,0,0,0.5);">
				<div class="slider-simple__caption caption caption--centered">
					<div class="caption__content">
						<h2 class="caption__title caption__title--centered">THE COLLECTION OF PERFECT <span>TELEVISION</span> FOR YOUR HOME</h2>
						<a href="#" class="button button--main button--ex-small">View The Collection</a>
					</div>
				</div>
			</div> 
			<div class="swiper-slide slider-simple__slide" style="background-image:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(mobile/assets/img/phone.jpg);">
				<div class="slider-simple__caption caption caption--centered">
					<div class="caption__content">
						<h2 class="caption__title caption__title--centered">Latest <span>SMART PHONE</span> for your daily use and work management.</h2>
						<a href="#" class="button button--main button--ex-small">View The Collection</a>
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-pagination slider-simple__pagination"></div>

	</div>
	<!-- <div class="search__form mb-20">
		<form>
			<input type="text" class="search__input" id="" name="" value="" placeholder="SEARCH" />
			<input type="submit" class="search__submit" value="Send" />
		</form>		
	</div> -->
	<!-- <div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
		<div class="swiper-wrapper">
			<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
				<div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="#"><img src="mobile/assets/images/icons/blue/television.svg" alt="" title=""/></a></div>
				<div class="slider-thumbs__caption caption">
					<div class="caption__content">
						<h2 class="caption__title caption__title--smaller caption__title--centered">TV</h2>
					</div>
				</div>
			</div> 
			<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
				<div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="#"><img src="mobile/assets/images/icons/blue/electronics.svg" alt="" title=""/></a></div>
				<div class="slider-thumbs__caption caption">
					<div class="caption__content">
						<h2 class="caption__title caption__title--smaller caption__title--centered">Phones</h2>
					</div>
				</div>
			</div>
			<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
				<div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="#"><img src="mobile/assets/images/icons/blue/smart-refrigerator.svg" alt="" title=""/></a></div>
				<div class="slider-thumbs__caption caption">
					<div class="caption__content">
						<h2 class="caption__title caption__title--smaller caption__title--centered">Refrigerator</h2>
					</div>
				</div>
			</div> 
			
			<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
				<div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="#"><img src="mobile/assets/images/icons/blue/home.svg" alt="" title=""/></a></div>
				<div class="slider-thumbs__caption caption">
					<div class="caption__content">
						<h2 class="caption__title caption__title--smaller caption__title--centered">Home Appliances</h2>
					</div>
				</div>
			</div>
			<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
				<div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="#"><img src="mobile/assets/images/icons/blue/gifts.svg" alt="" title=""/></a></div>
				<div class="slider-thumbs__caption caption">
					<div class="caption__content">
						<h2 class="caption__title caption__title--smaller caption__title--centered">Gifts Offers</h2>
					</div>
				</div>
			</div> 
			<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4">
				<div class="slider-thumbs__icon slider-thumbs__icon--round-corners"><a href="#"><img src="mobile/assets/images/icons/blue/sport.svg" alt="" title=""/></a></div>
				<div class="slider-thumbs__caption caption">
					<div class="caption__content">
						<h2 class="caption__title caption__title--smaller caption__title--centered">Sport Gadgets</h2>
					</div>
				</div>
			</div> 
		</div>
		<div class="swiper-pagination slider-thumbs__pagination"></div>
	</div> -->

		<div class="page__title-bar">
			<h2>Featured Products</h2>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- Top featured products -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="#"><img src="mobile/assets/img/prod1.jpg" alt="" title=""/></a>
					<div class="slider-thumbs__discount"><span>-20%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__rating">
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star"></span>
							</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Samsung Galaxy Note10 Lite</h2>
							<a class="caption__price" href="#"><span> NPR 59,999</span> <br> NPR 49,999 </a>
							<a class="caption__cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="#"><img src="mobile/assets/img/prod4.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__rating">
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star"></span>
							</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Samsung Galaxy A51</h2>
							<a class="caption__price" href="#">NPR 49,999</a>
							<a class="caption__cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="#"><img src="mobile/assets/img/prod3.jpg" alt="" title=""/></a>	
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__rating">
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star"></span>
							</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Samsung Galaxy A71</h2>
							<a class="caption__price" href="#">NPR 39,999</a>
							<a class="caption__cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="#"><img src="mobile/assets/img/prod2.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__rating">
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star"></span>
							</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Samsung Phone</h2>
							<a class="caption__price" href="#">NPR 59,999</a>
							<a class="caption__cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
						</div>
					</div>
				</div> 
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
	
		</div>
		<!-- SLIDER THUMBS 4 round -->
		
		<div class="page__title-bar">
			<h2>Latest News</h2>
		</div>
			<div class="card card--style-thumb card--border-bottom mb-20">
				<div class="brand-line">
					<img src="mobile/assets/images/icons/brands/samsung.svg" alt="" title=""/>
					<span><strong>Samsung Galaxy Note 10 Lite</strong></span>
				</div>
				<!-- SLIDER SIMPLE -->
				<div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
					<div class="swiper-wrapper">
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/prod3.jpg);">
						</div> 
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/prod2.jpg);">
						</div>
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/prod1.jpg);">
						</div>
					</div>
					<div class="swiper-pagination slider-simple__pagination"></div>
				</div>
				  <a href="#"><h4 class="card__text">Samsung Galaxy Note10 · 6.3" 1080x2280 pixels · 12MP 2160p · 8GB RAM Exynos 9825 · 3500mAh Li-Ion. </h4></a>
				  <div class="d-flex align-center mb-10">
					  <div class="card__likes">NPR 28k</div>
					  <div class="card__comments ml-20 open-popup" data-popup="comments">23 Sales</div>
				  </div>
			</div>
			<div class="card card--style-thumb card--border-bottom mb-20">
				<div class="brand-line">
					<img src="mobile/assets/images/icons/brands/apple.svg" alt="" title=""/>
					<span><strong>iPhone 11</strong></span>
				</div>
				<!-- SLIDER SIMPLE -->
				<div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
					<div class="swiper-wrapper">
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/apple1.jpg);">
						</div> 
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/apple2.jpg);">
						</div>
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/apple3.jpg);">
						</div>
					</div>
					<div class="swiper-pagination slider-simple__pagination"></div>
				</div>
				  <h4 class="card__text">Liquid Retina HD display · 6.1‑inch (diagonal) all-screen LCD Multi-Touch display with IPS technology · 1792‑by‑828‑pixe </h4>
				  <div class="d-flex align-center mb-10">
					  <div class="card__likes">NPR 70k</div>
					  <div class="card__comments ml-20 open-popup" data-popup="comments">10 sales</div>
				  </div>
			</div>
			<div class="card card--style-thumb card--border-bottom mb-20">
				<div class="brand-line">
					<img src="mobile/assets/images/icons/brands/xiaomi.svg" alt="" title=""/>
					<span><strong>Xiaomi MI TV</strong></span>
				</div>
				<!-- SLIDER SIMPLE -->
				<div class="swiper-container slider-simple slider-simple--round-corners slider-init mb-10" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
					<div class="swiper-wrapper">
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/mi1.jpg);">
						</div> 
						<div class="swiper-slide slider-simple__slide" style="background-image:url(mobile/assets/img/mi2.jpg);">
						</div>
					</div>
					<div class="swiper-pagination slider-simple__pagination"></div>
				</div>
				  <h4 class="card__text">Virtually frameless. We use one of the best panels from Samsung and LG to create a 47” 1920x1080 Full HD television with a super slim profile </h4>
				  <div class="d-flex align-center mb-10">
					  <div class="card__likes">NPR 50k</div>
					  <div class="card__comments ml-20 open-popup" data-popup="comments">5 sales</div>
				  </div>
			</div>

			<div class="page__title-bar">
				<h3>Smart Phones</h3>
			</div>
			<div class="product-view cards cards--12" id="loadlist-shop">
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners">
                    <a href="#"><img src="mobile/assets/img/product3.jpg" alt="" title=""/></a>
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
                        <div class="card_wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
                    </div>
                </div>
                <h4 class="card__title">Samsung Galaxy</h4>
                <div style="display:flex;">
                    <p class="card_price">NPR 49,999</p>
                    <a class="card_cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners">
                    <a href="#"><img src="mobile/assets/img/prod2.jpg" alt="" title=""/></a>
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
                        <div class="card_wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
                    </div>
                </div>
                <h4 class="card__title">Samsung Galaxy Note 10 Lite</h4>
                <div style="display:flex;">
                    <p class="card_price">NPR 49,999</p>
                    <a class="card_cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners">
                    <a href="#"><img src="mobile/assets/img/product2.jpg" alt="" title=""/></a>
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
                        <div class="card_wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
                    </div>
                </div>
                <h4 class="card__title">Samsung Galaxy A51</h4>
                <div style="display:flex;">
                    <p class="card_price">NPR 49,999</p>
                    <a class="card_cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
            <div class="card card--style-thumb">
                <div class="card__thumb card__thumb--round-corners">
                    <a href="#"><img src="mobile/assets/img/prod3.jpg" alt="" title=""/></a>
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
                        <div class="card_wishlist"><a href="#"><img src="mobile/assets/images/icons/black/love.svg" alt="" title=""/></a></div>
                    </div>
                </div>
                <h4 class="card__title">Samsung Galaxy A51</h4>
                <div style="display:flex;">
                    <p class="card_price">NPR 49,999</p>
                    <a class="card_cart addtocart" href="#"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
        </div>
	      <div class="buttons buttons--centered" style="margin-bottom:80px">
			<div id="loadMore" class="button button--more">View more</div>
			<div id="showLess" class="button button--disabled">Search your products</div> 
	      </div>
	</div>
	<!-- PAGE END -->

	<!-- Bottom Navigation -->
	<div class="bottom-navigation bottom-navigation--gradient">
		<ul class="bottom-navigation__icons">
			<li><a href="./"><img src="mobile/assets/images/icons/blue/home.svg" alt="" title="" /><span>Home</span></a></li>
			<li><a href="./shop"><img src="mobile/assets/images/icons/blue/cart.svg" alt="" title="" /><span>Shop</span></a></li>
			<a href="#" class="open-popup" data-popup="notifications"><li class="centered"><img src="mobile/assets/images/icons/white/search.svg" alt="" title="" /></li></a>
			<li><a href="#"><img src="mobile/assets/images/icons/blue/user.svg" alt="" title="" /><span>Account</span></a></li>
			<li><a href="#"><img src="mobile/assets/images/icons/blue/chat.svg" alt="" title="" /><span>Chat</span></a></li>
		</ul>
	</div>	
	<!-- Bottom Navigation Ends -->	
	<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
	<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
	<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>