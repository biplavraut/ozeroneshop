<div class="popup popup--half popup--social">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="social"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <h2 class="popup__title">Share</h2>
      <nav class="social-nav">
		  <ul>
		  <li><a href="#"><img src="{{asset('mobile/assets/images/icons/blue/twitter.svg')}}" alt="" title="" /><span>TWITTER</span></a></li>
		  <li><a href="#"><img src="{{asset('mobile/assets/images/icons/blue/facebook.svg')}}" alt="" title="" /><span>FACEBOOK</span></a></li>
		  <li><a href="#"><img src="{{asset('mobile/assets/images/icons/blue/instagram.svg')}}" alt="" title="" /><span>INSTAGRAM</span></a></li>
		  </ul>
      </nav>
</div>

<div class="popup popup--half popup--wishlist">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="wishlist"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <h2 class="popup__title">Wishlist</h2>
      <nav class="social-nav">
      <p>Please! login or Register to continue.</p>
		  <div class="splash__buttons">
				<a href="{{ route('login') }}" class="button button--full button--main">Login</a>
				<a href="{{ route('register') }}" class="button button--full button--secondary">Signup</a>
			</div>
      </nav>
</div>

<div class="popup popup--half popup--checkout">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="checkout"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <h2 class="popup__title">Checkout</h2>
      <nav class="social-nav">
      <p>Please! login or Register to continue.</p>
            <div class="splash__buttons">
                  <a href="{{ route('login') }}" class="button button--full button--main">Login</a>
                  <a href="{{ route('register') }}" class="button button--full button--secondary">Signup</a>
                  <p><small>else</small></p>
                  <a href="/checkout" class="button button--full button--main">Proceed without login</a>
            </div>
      </nav>
</div>

<div class="popup popup--centered popup--shadow popup--added">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="added"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <div class="popup__icon"><img src="{{asset('mobile/assets/images/icons/blue/checked.svg')}}" alt="" title=""/></div>
      <h2 class="popup__title">Added !</h2>
      <p class="popup__text">Product Added to Wishlist.</p>
</div>

<div class="popup popup--centered popup--shadow popup--exist">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="exist"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <div class="popup__icon"><img src="{{asset('mobile/assets/images/icons/blue/alert.svg')}}" alt="" title=""/></div>
      <h2 class="popup__title">Exist !</h2>
      <p class="popup__text">Product Exist in Wishlist.</p>
</div>

<div class="popup popup--centered popup--shadow popup--error">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="error"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <div class="popup__icon"><img src="{{asset('mobile/assets/images/icons/blue/alert.svg')}}" alt="" title=""/></div>
      <h2 class="popup__title">Error !</h2>
      <p class="popup__text">Oops! Something went wrong.</p>
</div>

<div class="popup popup--centered popup--shadow popup--less-data">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="less-data"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <div class="popup__icon"><img src="{{asset('mobile/assets/images/icons/blue/alert.svg')}}" alt="" title=""/></div>
      <h2 class="popup__title">Error !</h2>
      <p class="popup__text">Oops! Less Information to proceed.</p>
      <p class="popup__text">Shipping Phone and Address is Mandatory.</p>
</div>

@if(Session::has('order_placed'))
<div class="popup popup--centered popup--shadow popup--order-placed active">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="order-placed"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <div class="popup__icon"><img src="{{asset('mobile/assets/images/icons/blue/checked.svg')}}" alt="" title=""/></div>
      <h2 class="popup__title">Success !</h2>
      <p class="popup__text">{{ Session::get('order_placed') }}</p>
</div>
@endif
@if(Session::has('order_error'))
<div class="popup popup--centered popup--shadow popup--order-error active">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="order-error"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <div class="popup__icon"><img src="{{asset('mobile/assets/images/icons/blue/alert.svg')}}" alt="" title=""/></div>
      <h2 class="popup__title">Success !</h2>
      <p class="popup__text">{{ Session::get('order_erroar') }}</p>
</div>
@endif
