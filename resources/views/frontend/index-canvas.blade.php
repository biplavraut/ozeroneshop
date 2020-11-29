<!--
Authors: Pers Creation, Gaze Nepal Pvt. Ltd. , Biplav Raj Raut
Authors URI: www.perscreation.com, www.gazenepal.com, www.biplavrajraut.com.np
Copyright: Pers Creation, Gaze Nepal,Biplav Raj Raut.
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Biplav Raj Raut">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Ozerone Shop- Electronics</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"> 

  <link rel="stylesheet" href="{{asset('css/index.css')}}">
  <link rel="stylesheet" href="{{asset('canvas/css/swiper.css')}}">

  <link rel="stylesheet" href="{{asset('canvas/css/dark.css')}}">
  <link rel="stylesheet" href="{{asset('canvas/css/fonts.css')}}">
  <link rel="stylesheet" href="{{asset('canvas/css/font-icons.css')}}">
  <link rel="stylesheet" href="{{asset('canvas/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('canvas/css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{asset('canvas/css/shop.css')}}">
  <link rel="stylesheet" href="{{asset('canvas/css/custom.css')}}">
  <link rel="stylesheet" href="canvas/css/colors.php?color=f8ab16" type="text/css" />
</head>

<body class="stretched">
  <!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">
	<!-- Top Bar
		============================================= -->
		<!-- <div id="top-bar" class="dark" style="background-color: #f8ab16;">
			<div class="container">

				<div class="row justify-content-between align-items-center">

					<div class="col-12 col-lg-auto">
						<p class="mb-0 d-flex justify-content-center justify-content-lg-start py-3 py-lg-0 black"><strong>Free Shipping inside Kathmandu Valley. Easy Returns.</strong></p>
					</div>

					<div class="col-12 col-lg-auto d-none d-lg-flex">
						<div class="top-links">
							<ul class="top-links-container">
								<li class="top-links-item"><a href="#" style="color: #fafafa">About</a></li>
								<li class="top-links-item"><a href="#" style="color: #fafafa">FAQS</a></li>
								<li class="top-links-item"><a href="#" style="color: #fafafa">Contact</a></li>
							</ul>
						</div>
						<ul id="top-social">
							<li><a href="#" class="si-facebook" style="color: #fafafa"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<li><a href="#" class="si-instagram" style="color: #fafafa"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							<li><a href="tel:+977-9860469153" class="si-call" style="color: #fafafa"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+977-9860469153</span></a></li>
							<li><a href="mailto:info@ozerone.shop" class="si-email3" style="color: #fafafa"><span class="ts-icon"><i class="icon-envelope-alt"></i></span><span class="ts-text">info@ozerone.shop</span></a></li>
						</ul>

					</div>
				</div>

			</div>
		</div> -->

		<!-- Header
			============================================= -->
    <header id="header" class="full-header transparent-header semi-transparent dark header-size-md">
      <div id="header-wrap">
        <div class="container">
          <div class="header-row justify-content-lg-between">
		  	<div id="primary-menu-trigger">
              	<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
            </div>
          <!-- Logo
            ============================================= -->
            <div id="logo" class="mr-lg-4">
              <a href="./" class="standard-logo"><img src="logo/logo@2x.png" alt="Ozerone Logo"></a>
              <a href="./" class="retina-logo"><img src="img/favicon.png" alt="Ozerone Logo"></a>
            </div><!-- #logo end -->

            <div class="header-misc">
				<!-- Top Search
				============================================= -->
				<div id="top-search" class="header-misc-icon">
					<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
				</div><!-- #top-search end -->
				<!-- Top Cart
				============================================= -->
				<div id="top-cart" class="header-misc-icon">
					<a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i>
					<!-- <span class="top-cart-number">5</span> -->
					</a>
					<div class="top-cart-content">
						<div class="top-cart-title">
							<h4>Shopping Cart</h4>
						</div>
						<div class="top-cart-items">
							<div class="top-cart-item">
								<div class="top-cart-item-image">
									<a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round" /></a>
								</div>
								<div class="top-cart-item-desc">
									<div class="top-cart-item-desc-title">
										<a href="#">Blue Round-Neck</a>
										<span class="top-cart-item-price d-block">$19.99</span>
									</div>
									<div class="top-cart-item-quantity">x 2</div>
								</div>
							</div>
							<div class="top-cart-item">
								<div class="top-cart-item-image">
									<a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue" /></a>
								</div>
								<div class="top-cart-item-desc">
									<div class="top-cart-item-desc-title">
										<a href="#">Light Blue </a>
										<span class="top-cart-item-price d-block">$24.99</span>
									</div>
									<div class="top-cart-item-quantity">x 3</div>
								</div>
							</div>
						</div>
						<div class="top-cart-action">
							<span class="top-checkout-price">$114.95</span>
							<a href="#" class="button button-3d button-small m-0">View Cart</a>
						</div>
					</div>
				</div><!-- #top-cart end -->
            

            </div>

          <!-- Primary Navigation
            ============================================= -->
            <nav class="primary-menu with-arrows mr-lg-auto">

              <ul class="menu-container">
                <li class="menu-item current"><a class="menu-link" href="#"><div>Home</div></a></li>
                <li class="menu-item "><a class="menu-link" href="#"><div>Smart TV</div></a></li>
                <li class="menu-item"><a class="menu-link" href="#"><div>Smart Phone</div></a></li>
                <li class="menu-item"><a class="menu-link" href="#"><div>Dashain Dhamaka</div></a></li>
                <li class="menu-item"><a class="menu-link" href="#"><div>Featured</div></a></li>
                <li class="menu-item"><a class="menu-link" href="#"><div>Accessories</div></a></li>
                <li class="menu-item"><a class="menu-link" href="#"><div>Gadgets</div></a></li>
              </ul>

            </nav><!-- #primary-menu end -->

            <form class="top-search-form" action="search.html" method="get">
              <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
            </form>

          </div>
        </div>
      </div>
      <div class="header-wrap-clone"></div>
    </header><!-- #header end -->
    <!-- Slider
	============================================= -->
	<section id="slider" class="slider-element boxed-slider bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div id="oc-slider" class="owl-carousel carousel-widget" data-margin="0" data-items="1" data-animate-in="zoomIn" data-speed="450" data-animate-out="fadeOut">
						<a href="#"><img src="img/slider/slide-1.png" alt="Slider"></a>
						<a href="#"><img src="img/slider/slide-1.png" alt="Slider"></a>
					</div>
				</div>
				<div class="col-md-4">
				<div class="topmargin clearfix">
					<div class="heading-block border-bottom-0 bottommargin center">
						<h3 style="font-size: 20px;">Shop By Categories</h3>
					</div>
					<div class="row col-mb-50">
						<div class="col">
							<div class="feature-box fbox-center">
								<div class="fbox-content">
									<h3 class="font-weight-normal ls1">Laptop</h3>
								</div>
								<div class="fbox-image imagescalein">
									<a href="#"><img src="demos/ecommerce/images/icons/2.png" alt="Image"></a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="feature-box fbox-center">
								<div class="fbox-content">
									<h3 class="font-weight-normal ls1">Hand Bag</h3>
								</div>
								<div class="fbox-image imagescalein">
									<a href="#"><img src="demos/ecommerce/images/icons/3.png" alt="Image"></a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="feature-box fbox-center">
								<div class="fbox-content">
									<h3 class="font-weight-normal ls1">Backpack</h3>
								</div>
								<div class="fbox-image imagescalein">
									<a href="#"><img src="demos/ecommerce/images/icons/4.png" alt="Image"></a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="feature-box fbox-center">
								<div class="fbox-content">
									<h3 class="font-weight-normal ls1">Duffle</h3>
								</div>
								<div class="fbox-image imagescalein">
									<a href="#"><img src="demos/ecommerce/images/icons/5.png" alt="Image"></a>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="feature-box fbox-center">
								<div class="fbox-content">
									<h3 class="font-weight-normal ls1">Trolley</h3>
								</div>
								<div class="fbox-image imagescalein">
									<a href="#"><img src="demos/ecommerce/images/icons/6.png" alt="Image"></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				</div>				
			</div>		

		</div>

	</section>
		<!-- Content
			============================================= -->
			<section id="content">
				<div class="content-wrap">
					<div class="container clearfix">

					<!-- Shop Categories
						============================================= -->
						<div class="fancy-title title-border title-center mb-4">
							<h4>Shop popular categories</h4>
						</div>

						<div class="row shop-categories clearfix">
							<div class="col-lg-7">
								<a href="#" style="background: url('canvas/img/b1.jpg') no-repeat right center; background-size: cover;">
									<div class="vertical-middle dark center">
										<div class="heading-block m-0 border-0">
											<h3 class="nott font-weight-semibold ls0">Smart TV</h3>
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-5">
								<a href="#" style="background: url('canvas/img/b2.jpg') no-repeat center right; background-size: cover;">
									<div class="vertical-middle dark center">
										<div class="heading-block m-0 border-0">
											<h3 class="nott font-weight-semibold ls0">Smart Phone</h3>
										</div>
									</div>
								</a>
							</div>

							<div class="col-lg-4">
								<a href="#" style="background: url('canvas/img/b4.jpg') no-repeat center center; background-size: cover;">
								<!-- <div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="nott font-weight-semibold ls0">Featured Deals</h3>
										<small class="button bg-white text-dark button-light button-mini">Browse Now</small>
									</div>
								</div> -->
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('canvas/img/s1.png') no-repeat center center; background-size: cover;">
									<!-- <div class="vertical-middle dark center">
										<div class="heading-block m-0 border-0">
											<h3 class="nott font-weight-semibold ls0">Popular Products</h3>
											<small class="button bg-white text-dark button-light button-mini">Shop Now</small>
										</div>
									</div> -->
								</a>
							</div>
							<div class="col-lg-4">
								<a href="#" style="background: url('canvas/img/b5.jpg') no-repeat center center; background-size: cover;">
									<!-- <div class="vertical-middle dark center">
										<div class="heading-block m-0 border-0">
											<h3 class="nott font-weight-semibold ls0">Dashain Hungama</h3>
											<small class="button bg-white text-dark button-light button-mini">Shop Now</small>
										</div>
									</div> -->
								</a>
							</div>
						</div>

					<!-- Featured Carousel
						============================================= -->
						<div class="fancy-title title-border mt-4 title-center">
							<h4>Weekly Featured Items</h4>
						</div>

						<div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true" data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">

						<!-- Shop Item 1
							============================================= -->
							<div class="oc-item">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Round Neck T-shirts"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Round Neck T-shirts"></a>
										<div class="sale-flash badge badge-danger p-2">Sale!</div>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><del class="mr-1">NPR 24.99</del> <ins>NPR 12.49</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 2
							============================================= -->
							<div class="oc-item">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Navy Blue Dress"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Navy Blue Dress"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 19.99</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 3
							============================================= -->
							<div class="oc-item">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Shoes"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Shoes"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="include/ajax/shop-item-no-stock.html" class="btn btn-dark" data-lightbox="ajax">Quick View</a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="sale-flash badge badge-secondary p-2">Out of Stock!</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 35.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 4
							============================================= -->
							<div class="oc-item">
								<div class="product">
									<div class="product-image">
										<div class="fslider" data-arrows="false" data-autoplay="4500">
											<div class="flexslider">
												<div class="slider-wrap">
													<div class="slide"><a href="#"><img src="canvas/img/p1.jpg" alt="T-shirts"></a></div>
													<div class="slide"><a href="#"><img src="canvas/img/p1.jpg" alt="T-shirts"></a></div>
													<div class="slide"><a href="#"><img src="canvas/img/p1.jpg" alt="T-shirts"></a></div>
													<div class="slide"><a href="#"><img src="canvas/img/p1.jpg" alt="T-shirts"></a></div>
												</div>
											</div>
										</div>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="sale-flash badge badge-danger p-2">Sale!</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><del class="mr-1">NPR 27.99</del> <ins>NPR 21.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 5
							============================================= -->
							<div class="oc-item">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="T-shirts"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 13.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- Features Section
						============================================= -->
						<div class="container-fluid topmargin promo-light p-4 p-md-5 mb-5">
							<div class="container">
								<div class="row clearfix">

									<div class="col-lg-4 col-md-6">

										<div class="heading-block border-bottom-0">
											<h2 class="nott ls0" style="font-size: 30px; line-height: 1">Get the New Redmi Note 9 Pro Max </h2>
										</div>
										<span style="color: #BBB;">Pro Cameras, Max Performance

											64MP Quad Camera Array
											32MP In-Display Selfie Camera
											Qualcomm® Snapdragon™ 720G
											33W Fast Charger In-Box
										From ₹ 16,999</span>
										<div class="clear"></div>
										<a href="#" class="button button-rounded button-black button-dark ml-0 topmargin-sm clearfix">Buy Now</a>

									</div>

									<div class="col-lg-4 d-md-none d-lg-block center">
										<img src="canvas/img/Redmi_Note_9_Pro_Max.png" alt="Car">
									</div>

									<div class="col-lg-4 col-md-6 topmargin bottommargin-sm">
										<div class="feature-box fbox-plain topmargin">
											<!-- <div class="fbox-icon">
												<i class="icon-ok"></i>
											</div> -->
											<div class="fbox-content">
												<h3>8MP <small>119° Ultra-Wide Angle</small></h3>
											</div>
										</div>

										<div class="feature-box fbox-plain topmargin">
											<div class="fbox-content">
												<h3>64MP <small>Primary Camers</small></h3>
											</div>
										</div>
										<div class="feature-box fbox-plain topmargin">
											<div class="fbox-content">
												<h3>5MP <small>Macro camera</small></h3>
											</div>
										</div>

										<div class="feature-box fbox-plain topmargin">
											<div class="fbox-content">
												<h3>2MP <small>Depth Censor</small></h3>
											</div>
										</div>

										<!-- <div class="feature-box fbox-plain topmargin">
											<div class="fbox-icon">
												<a href="#"><i class="icon-car-pump"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Petrol, Diesel &amp; LPG</h3>
												<p>Change your Website's Primary Scheme instantly by simply adding the dark class.</p>
											</div>
										</div> -->
									</div>
								</div>
							</div>							
						</div>
						<!-- Features Area End -->
						<div class="clear"></div>

				<!-- New Arrivals Men
					============================================= -->
					<div class="container clearfix">

						<div class="fancy-title title-border topmargin-sm mb-4 title-center">
							<h4>New Arrivals: SMART PHONE</h4>
						</div>

						<div class="row grid-6">

						<!-- Shop Item 1
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 1"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 1"></a>
										<div class="sale-flash badge badge-danger p-2">Sale!</div>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><del class="mr-1">NPR 24.99</del> <ins>NPR 12.49</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 2
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 2"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 2"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 19.99</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 3
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 3"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="sale-flash badge badge-danger p-2">Sale!</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><del class="mr-1">NPR 41.99</del> <ins>NPR 35.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 4
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<div class="fslider" data-arrows="false" data-autoplay="4500">
											<div class="flexslider">
												<div class="slider-wrap">
													<div class="slide"><a href="#"><img src="canvas/img/p1.jpg" alt="Image 4"></a></div>
													<div class="slide"><a href="#"><img src="canvas/img/p1.jpg" alt="Image 4"></a></div>
												</div>
											</div>
										</div>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 21.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 5
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 5"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 5"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 31.49</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 6
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 6"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="sale-flash badge badge-danger p-2">Sale!</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><del class="mr-1">NPR 41.99</del> <ins>NPR 35.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 7
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 7"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 49.49</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 8
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 8"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><ins>NPR 39.99</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
										</div>
									</div>
								</div>
							</div>

						<!-- Shop Item 9
							============================================= -->
							<div class="col-lg-2 col-md-3 col-6 px-2">
								<div class="product">
									<div class="product-image">
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 9"></a>
										<a href="#"><img src="canvas/img/p1.jpg" alt="Image 3"></a>
										<div class="bg-overlay">
											<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
												<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
												<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
											</div>
											<div class="bg-overlay-bg bg-transparent"></div>
										</div>
									</div>
									<div class="sale-flash badge badge-danger p-2">Sale!</div>
									<div class="product-desc">
										<div class="product-title mb-1"><h3><a href="#">Redmi Note 9 Pro Max </a></h3></div>
										<div class="product-price font-primary"><del class="mr-1">NPR 21.99</del> <ins>NPR 15.00</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>


				</div>
			</section>
		</div>
		
					<div class="section mb-0">
						<div class="container">

							<div class="row col-mb-50">
								<div class="col-sm-6 col-lg-3">
									<div class="feature-box fbox-plain fbox-dark fbox-sm">
										<div class="fbox-icon">
											<i class="icon-thumbs-up2"></i>
										</div>
										<div class="fbox-content">
											<h3>100% Original</h3>
											<p class="mt-0">We guarantee you the sale of Original Brands.</p>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-lg-3">
									<div class="feature-box fbox-plain fbox-dark fbox-sm">
										<div class="fbox-icon">
											<i class="icon-credit-cards"></i>
										</div>
										<div class="fbox-content">
											<h3>Payment Options</h3>
											<p class="mt-0">We accept Cash on Delivery.</p>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-lg-3">
									<div class="feature-box fbox-plain fbox-dark fbox-sm">
										<div class="fbox-icon">
											<i class="icon-truck2"></i>
										</div>
										<div class="fbox-content">
											<h3>Free Shipping</h3>
											<p class="mt-0">Free Delivery inside Kathmandu Valley. +NPR 150 around Nepal.</p>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-lg-3">
									<div class="feature-box fbox-plain fbox-dark fbox-sm">
										<div class="fbox-icon">
											<i class="icon-undo"></i>
										</div>
										<div class="fbox-content">
											<h3>30-Days Returns</h3>
											<p class="mt-0">Return or exchange items purchased within 30 days.</p>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row col-mb-30">

						<div class="col-md-6 text-center text-md-left">
							Copyrights &copy; 2020 All Rights Reserved by Ozerone Shop.<br>
							<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
						</div>

						<div class="col-md-6 text-center text-md-right">
							<div class="d-flex justify-content-center justify-content-md-end">
								<a href="#" class="social-icon si-small si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								
								<a href="#" class="social-icon si-small si-borderless si-instagram">
									<i class="icon-instagram2"></i>
									<i class="icon-instagram2"></i>
								</a>
							</div>

							<div class="clear"></div>

							<i class="icon-envelope2"></i> info@ozerone.shop <span class="middot">&middot;</span> <i class="icon-headphones"></i> +977-9860469153
						</div>

					</div>

				</div>
			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	<!-- Go To Top
		============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>
  <script src="{{asset('js/index.js')}}"></script>
  <script src="canvas/js/plugins.min.js"></script>

	<!-- Footer Scripts
		============================================= -->
		<script src="canvas/js/functions.js"></script>
  <!-- Argon Scripts -->
</body>

</html>
