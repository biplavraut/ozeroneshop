<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Contact - Ozerone Shop, Online electronics shop in Nepal</title>
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
<div id="panel-left"></div>
<!-- Right panel -->
<div id="panel-right"></div>


<div class="page page--main" data-page="contact">
	
	<header class="header header--page header--fixed">	
		<div class="header__inner">	
            <div class="header__icon"><a href="#" onclick="history.back();"><img src="{{asset('mobile/assets/images/icons/white/arrow-back.svg')}}" alt="" title=""/></a></div>
            <div class="header__logo header__logo--text">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
            </div>
            <div class="header__icon header__icon--empty-space"></div>			
			
        </div>
	</header>
	
	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-header">
		<h2 class="page__title mt-20">Feel free to Contact Us</h2>
              <p class="welcome">
                Our customer care team is available 24/7 to solve your issue and will respond you as soon as posible.
              </p>	  
		<div class="fieldset">
			<h2 id="Note"></h2>
			<div class="form">
				<form class="" id="ContactForm" method="post" action="">
					<div class="form__row">
						<input type="text" name="ContactName" value="" class="form__input required" placeholder="Name" />
					</div>
					<div class="form__row">
						<input type="text" name="ContactEmail" value="" class="form__input email required" placeholder="Email" />
					</div>
					<div class="form__row">
						<div class="form__select">
							<select name="ContactSelect" class="required">
								<option value="" disabled selected>Select options</option>
								<option value="product">Product</option>
								<option value="order">Order</option>
								<option value="return">Return</option>
								<option value="complain">Complain</option>
								<option value="other">Other</option>
							</select>
						</div>
					</div>	
					<div class="form__row">
						<textarea name="ContactComment" class="form__textarea required" placeholder="TextArea"></textarea>
					</div>	

					<div class="form__row mt-20">
						<input type="submit" name="submit" class="form__submit button button--main button--full" id="submit" value="SUBMIT" />
						<input class="" type="hidden" name="to"  value="youremail@website.com" />
						<input class="" type="hidden" name="ContactSubject" value="Contacf form message" />
						<label id="loader" style="display:none;"><div id="loader-animation"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></label>
					</div>
				</form>
			</div>
		</div>
		<h2 class="page__title">Location Map Example</h2>
		<div class="fieldset">
		  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193578.74109041138!2d-73.97968099999997!3d40.70331274999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York+NYC%2C+New+York%2C+Statele+Unite+ale+Americii!5e0!3m2!1sro!2s!4v1425027721891" width="100%" height="200" frameborder="0" style="border:0"></iframe> 
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


<!-- Social Icons Popup -->
<div id="popup-social"></div>
 
<!-- Alert --> 
<div id="popup-success"></div>  

<!-- Notifications --> 
<div id="popup-notifications"></div>  

<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/jquery/jquery.validate.min.js')}}" ></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/swiper-init-swipe.js')}}"></script>
<script src="{{asset('mobile/main/js/email.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>

</body>
</html>