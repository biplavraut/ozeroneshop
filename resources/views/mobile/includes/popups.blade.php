<div class="popup popup--half popup--social">
      <div class="popup__close"><a href="#" class="close-popup" data-popup="social"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
      <h2 class="popup__title">Share</h2>
      <nav class="social-nav">
		  <ul>
		  <li><a href="#"><img src="../../assets/images/icons/blue/twitter.svg" alt="" title="" /><span>TWITTER</span></a></li>
		  <li><a href="#"><img src="../../assets/images/icons/blue/facebook.svg" alt="" title="" /><span>FACEBOOK</span></a></li>
		  <li><a href="#"><img src="../../assets/images/icons/blue/instagram.svg" alt="" title="" /><span>INSTAGRAM</span></a></li>
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