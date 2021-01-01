<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Checkout - Ozerone Shop, Online electronics shop in Nepal</title>
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
		<h2 class="page__title mt-20">Your Details</h2>
		<div class="fieldset">
			<div class="tabs">
				<input type="radio" name="login" class="tabs__radio" id="tab1" checked="checked">
				<label class="tabs__label tabs__label--auto" for="tab1">Login</label>	
				
				<div class="tabs__content">
					<div class="form">
						<form id="LoginForm" method="post" action="checkout.html">
							<div class="form__row">
								<input type="text" name="Username" value="" class="form__input required" placeholder="Username" />
							</div>
							<div class="form__row">
								<input type="password" name="password" value="" class="form__input required" placeholder="Password" />
							</div>
							<div class="form__row">
								<input type="submit" name="submit" class="form__submit button button--main button--full" id="submit" value="LOGIN" />
							</div>
						</form>
					</div>
				</div>

				<input type="radio" name="login" class="tabs__radio" id="tab2">
				<label class="tabs__label tabs__label--auto" for="tab2">Order without account</label>
				
				<div class="tabs__content">
					<div class="form">
						<form id="LoginForm" method="post" action="checkout.html">
							<div class="form__row">
								<input type="text" name="Name" value="" class="form__input required" placeholder="Name" />
							</div>
							<div class="form__row">
								<input type="text" name="Email" value="" class="form__input email required" placeholder="Email" />
							</div>
							<div class="form__row">
								<input type="text" name="Phone" value="" class="form__input required" placeholder="Phone" />
							</div>
							<div class="form__row">
								<textarea name="Adddress" class="form__textarea required" placeholder="Address"></textarea>
							</div>
						</form>
					</div>
				</div>   
			</div>
		</div>
		<h2 class="page__title">Your Order</h2>
		
		<div class="fieldset">
			<div class="cart cart--page">
				@if(Cart::count() > 0)
				@foreach(Cart::content() as $item)
				<div class="swiper-container slider-init-swipe cart__item" id="item{{ $loop->index }}">
					<div class="swiper-wrapper">
						<div class="swiper-slide cart__item-details">
							<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="shop-details.html"><img src="{{asset('img/product/'. $item->model->slug .'/thumbs/'. $item->options->image .'')}}" alt="{{$item->model->title}} " title="{{$item->model->title}} "/></a></div>
							<h4 class="cart__item-title">{{$item->model->title}} <span>NPR {{$item->model->price}}</span></h4>
							<div class="cart__item-qty">
								<form id="myform" method="POST" action="#" class="quantity quantity--small quantity--page">
									<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity{{ $loop->index }}" />
									<input type="text" name="quantity{{ $loop->index }}" value="{{$item->qty}}" class="quantity__input" />
									<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity{{ $loop->index }}" />
								</form>
							</div>
							<div class="cart__item-more" data-swipe-item="{{ $loop->index }}"><img src="{{asset('mobile/assets/images/icons/blue/more.svg')}}" alt="" title=""/></div>
						</div>
						<div class="swiper-slide cart__item-delete"><a href="#" class="delete-item" data-delete-item="{{ $loop->index }}">REMOVE</a></div>
					</div>
				</div>
				@endforeach
				@endif
			 </div>
		</div>
		<h2 class="page__title">Select Payment</h2>
		<div class="fieldset">
			<div class="radio-option radio-option--full">
				<input type="radio" name="payment" id="op4" value="paypal" /><label for="op4">Bank Transfer</span></label>
			</div>
			<div class="option-hidden" id="show-paypal-info">
                <h6>Account Detail</h6>
                <p><b>Bank Name:</b> Abc Bank</p>
                <p><b>Account No.:</b> 01 2522 52252569471</p>
                <p><b>Account Name:</b> Ozerone Shop Pvt. Ltd.</p>
                <p><b>Branch:</b> Kathmandu</p>
            </div>
			
			<div class="radio-option radio-option--full">
				<input type="radio" name="payment" id="op8" value="eSewa" /><label for="op8">eSewa</label>
            </div>
            
			<div class="radio-option radio-option--full mb-0">
				<input type="radio" name="payment" id="op6" value="pickup" /><label for="op6">Cash On Delivery</label>
			</div>
		</div>	
		<h2 class="page__title">Your Total</h2> 
		<div class="cart__total cart__total--page">
			<div class="d-flex align-items-center justify-space pb-10">
				<span>CART TOTAL</span> @if(Cart::count() > 0) <b>NPR {{$item->total}}</b> @endif
			</div>
			<!-- <div class="d-flex align-items-center justify-space pb-10">
				<span>VAT (10%)</span>  <b>$ 95.00</b>
			</div> -->
			<div class="d-flex align-items-center justify-space pb-10">
				<span>SHIPPING</span>  <b>NPR 200.00</b>
			</div>
			<div class="total d-flex align-items-center justify-space pb-10">
				<span>TOTAL</span> @if(Cart::count() > 0)<strong>NPR {{$item->total+200}}</strong> @endif
			</div>
		</div>
		<div class="buttons buttons--centered mb-40">
			<a href="#" data-popup="success" class="button button--main button--full open-popup">Order</a>
		</div>
		 
		
	</div>
			  



</div>
<!-- PAGE END --> 
@include('mobile.includes.bottombar')

<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/jquery/jquery.validate.min.js')}}" ></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>