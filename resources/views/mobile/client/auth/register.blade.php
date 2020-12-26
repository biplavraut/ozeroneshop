<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Register - Ozerone Shop, Online electronics shop in Nepal</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('mobile/vendor/swiper/swiper.min.css')}}">
<link rel="stylesheet" href="{{asset('css/mobile.css')}}">
<link rel="stylesheet" href="{{asset('mobile/custom.css')}}">
</head>
<body>
	
<div class="page page--login" data-page="login">

	<!-- HEADER -->
	<header class="header header--fixed">	
		<div class="header__inner">	
			<div class="header__icon"><a href="./home"><img src="{{asset('mobile/assets/images/icons/white/arrow-back.svg')}}" alt="" title=""/></a></div>	
			<div class="header__logo header__logo--text">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 30 30"><defs><style>.cls-1{fill:#4d91c6;}.cls-2{fill:#f0ede5;}</style></defs><title>logo-light</title><path class="cls-1" d="M19,12.83H15.71V3.18l-3.42,3L10.13,3.75l1.93-1.7A4.16,4.16,0,0,1,19,5.17Z"/><path class="cls-2" d="M18.78,17.82,17.15,15l8.36-4.83L21.18,8.72l1-3.09,2.44.82A4.16,4.16,0,0,1,25.41,14Z"/><path class="cls-1" d="M14.36,20.15,16,17.33l8.36,4.82-.91-4.47,3.2-.65.51,2.53A4.16,4.16,0,0,1,21,24Z"/><path class="cls-2" d="M10.13,17.49h3.26v9.65l3.42-3L19,26.56,17,28.27a4.16,4.16,0,0,1-6.91-3.12Z"/><path class="cls-1" d="M10.32,12.5,12,15.32,3.59,20.15,7.92,21.6l-1,3.09-2.44-.82a4.16,4.16,0,0,1-.76-7.54Z"/><path class="cls-2" d="M14.74,10.16,13.11,13,4.75,8.16l.91,4.48-3.2.64L2,10.76A4.16,4.16,0,0,1,8.11,6.33Z"/></svg>
			</div>
			<div class="header__icon header__icon--empty-space"></div>
		</div>
	</header>

        <div class="login">
		<div class="login__content">	
			<h2 class="login__title">Create an account</h2>
			<p class="login__text">Join us for free!</p>
				<div class="login-form">
					<form id="LoginForm" method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form__row">
							<label class="login-form__label">Name</label>
							<input id="name" type="text" name="name" value="" class="login-form__input required @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="login-form__row">
							<label class="login-form__label">Email</label>
							<input id="email" type="text" name="email" value="{{ old('email') }}" class="login-form__input required email @error('email') is-invalid @enderror" required autocomplete="email"/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="login-form__row">
							<label class="login-form__label">Password</label>
							<input id="password" type="password" name="password" value="" class="login-form__input required @error('password') is-invalid @enderror" required autocomplete="new-password"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="login-form__row">
							<label class="login-form__label">Confirm Password</label>
							<input id="password-confirm" type="password" name="password_confirmation" value="" class="login-form__input required" required autocomplete="new-password"/>
                            
                        </div>
						<div class="login-form__row">
							<input type="submit" name="submit" class="login-form__submit button button--main button--full" id="submit" value="SIGN UP" />
						</div>
					</form>	
                </div>
                <div class="splash__social-login">
				<p>- Or Register with -</p>
				<div class="splash__social-icons">
					<a href="#" class="icon icon--social"><img src="{{asset('mobile/assets/images/icons/white/facebook.svg')}}" alt="" title=""/></a>
					<a href="#" class="icon icon--social"><img src="{{asset('mobile/assets/images/icons/white/google.svg')}}" alt="" title=""/></a>
				</div>
			</div>
		</div>
        </div>
			  


</div>
<!-- PAGE END -->
   
<script src="{{asset('mobile/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('mobile/vendor/jquery/jquery.validate.min.js')}}" ></script>
<script src="{{asset('mobile/vendor/swiper/swiper.min.js')}}"></script>
<script src="{{asset('mobile/main/js/jquery.custom.js')}}"></script>
</body>
</html>