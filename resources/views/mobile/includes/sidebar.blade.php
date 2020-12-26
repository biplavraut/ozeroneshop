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
							<img src="{{asset('logo/logo-long.png')}}" max-width="200" alt="Ozerone Shop Logo">
						</div>
					</div>
					<nav class="main-nav">
						<ul>
							<li><a href="/home"><img src="{{asset('mobile/assets/images/icons/blue/home.svg')}}" alt="Home" title="Ozerone Shop" /><span>Home</span></a></li>							
							@foreach($elect_categories as $elect_category)
								@if($elect_category->parent_id == 0)
								<li><a href="/products/{{$elect_category->slug}} "><img src="{{asset('img/electronics/'. $elect_category->image .'')}}" alt="" title="" /><span>{{$elect_category->title}}</span></a></li>
								@endif
							@endforeach
							<li><a href="/blog-news"><img src="{{asset('mobile/assets/images/icons/blue/news.svg')}}" alt="Ozerone Blog News" title="Blog News" /><span>Blog-News</span></a></li>							
							<li><a href="/faqs"><img src="{{asset('mobile/assets/images/icons/blue/question.svg')}}" alt="FAQs" title="FAQs" /><span>FAQs</span></a></li>
							<li><a href="/about"><img src="{{asset('mobile/assets/images/icons/blue/user.svg')}}" alt="About" title="About Us" /><span>About</span></a></li>
							<li><a href="/contact"><img src="{{asset('mobile/assets/images/icons/blue/contact.svg')}}" alt="Contact" title="Contact" /><span>Contact</span></a></li>
							<li class="divider"></li>
							@if (Route::has('login'))
									@auth
										<li><a href="/dashboard"><img src="mobile/assets/images/icons/blue/settings.svg" alt="" title="" /><span>Account</span></a></li>
										<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="{{asset('mobile/assets/images/icons/blue/logout.svg')}}" alt="" title="" /><span>Logout</span></a></li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									@else
										<li><a href="{{ route('login') }}"><img src="{{asset('mobile/assets/images/icons/blue/login.svg')}}" alt="" title="" /><span>Login</span></a></li>
										@if (Route::has('register'))
											<li><a href="{{ route('register') }}"><img src="{{asset('mobile/assets/images/icons/blue/register.svg')}}" alt="" title="" /><span>Register</span></a></li>
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