<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>FAQs - Ozerone Shop, Online electronics shop in Nepal</title>
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



<div class="page page--main" data-page="tabs">
	
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
	
		<h2 class="page__title mt-20">Frequently Asked Questions</h2>
		
		<p class="welcome">
            This is a list of answers to questions that people frequently ask about The Quotations Page. If you can't find your answer here, feel free to contact us by email.		</p>
		
		<h3>FAQs</h3>
		
		<div class="toggle mb-20">
            @foreach($faqs as $faq)
			<div class="toggle__item">
			  <input class="toggle__input" id="{{ $faq->slug }}" type="checkbox" name="toggle">
			  <label class="toggle__label" for="{{ $faq->slug }}"><i class="fas fa-question-circle blue"></i> {{ $faq->title }} <span></span></label>
				  <div class="toggle__content">
                  <p>{{ strip_tags($faq->excerpt) }}</p>
				  </div>
			</div>
            @endforeach
		</div>
        <h2 class="page__title">Contact Info</h2>
        <div class="fieldset">
            <ul class="custom-listing">
                <li class="address"><span>Address:</span> Ozerone Shop, Kathmandu, Nepal </li>
                <li class="email"><span>Email:</span> contact@ozeroneshop.com </li>
                <li class="phone"><span>Mobile:</span> <a href="tel:+977 9860469153">+977 9860469153 </a></li>
		    </ul> 
		</div> 
				
	</div>
			  



</div>
<!-- PAGE END -->

@include('mobile.includes.bottombar')

<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/jquery/jquery.validate.min.js')}}" ></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>