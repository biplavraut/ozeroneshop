<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui,user-scalable=0">
<title>About | {{ $seo->title }}</title>
@include('mobile.includes.meta')
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


<div class="page page--main" data-page="main">
	
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
        <h2 class="page__title mt-20">Welcome</h2>
        <p class="welcome">
        We firmly believe that we can put a dent in the universe if we put our mind to it. We strive to bring change wherever we go by informing, educating and entertaining everyone we touch. We strive to provide better products at affordable prices that help people be more productive and make their daily life joyful. 
        </p>
        <blockquote>To empower people with the help of technologyand achieve great things together. </blockquote>
        <h3>For OZERONE</h3>
        <ul class="custom-listing custom-listing--checked mb-20">
            <li>WHAT: the ONLY electronics ecommerce</li>
            <li>HOW: that strive to bring change wherever we go by informing, educating and entertaining </li>
            <li>WHO: the youths and go-getters</li>
            <li>WHERE: In NepalWHY: who want to achieve great things</li>
            <li>WHEN: in an era of political uncertainty and social unrest</li>
        </ul>
        <h3>Be Different</h3>
        <blockquote class="pb-0">BUSINESS HAS ONLY TWO BASIC FUNCTIONS: MARKETING AND INNOVATION.</blockquote>
        <p class="mb-20"><i> -PETER DRUCKER </i></p>
        <p>Brand-building isn’t a series of isolated activities, it is a complete system in which five disciplines combine to produce sustainable competitive advantage.</p>
        <ul class="custom-listing custom-listing--checked mb-10">
            <li>Differentiation</li>
            <li>Collaboration</li>
            <li>Innovation</li>
            <li>Validation</li>
            <li>Cultivation</li>
        </ul>
        <p>All design relies on heuristic thinking more than algorithmic thinking—meaning that there is no set path, no mathematical formula, for reaching your goal. But we still need rigor and process, other- wise we’ll drift from one thought to the next with no more hope of it making sense.</p>        
        <h3>Customer Relationship</h3> 
        <p>What type of relationship does each of our Customer Segments expect us to establish and maintain with them?  <br>
            Which ones have we established? <br>
            How are they integrated with the rest of our business model? <br>
            How costly are they?</p>
        <div class="detail-content mb-20">
            <img src="{{asset('img/about-focus.png')}}" alt="About Ozerone">
        </div>
        <p>When focus is paired with differentiation, supported by a trend, and surrounded by compelling communications, we have a basic ingredient to design our brand.</p>
		<h2 class="page__title mb-40">Thank you</h2>
	</div>
			  



</div>
<!-- PAGE END -->

@include('mobile.includes.bottombar') 

<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/jquery/jquery.validate.min.js')}}" ></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
<script src="{{asset('mobile/main/js/email.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>

</body>
</html>