<!-- Right panel -->
<div id="panel-right-cart">
	<div class="panel panel--right">
		<div class="cart">
			<h3 class="cart__title">Your Shopping Cart</h3>
			<div class="swiper-container slider-init-swipe cart__item" id="item0">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="{{asset('mobile/assets/img/product1.jpg')}}" alt="" title=""/></a></div>
						<h4 class="cart__item-title">Note10 <span>NPR 49,999</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity1" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity1" value="1" class="quantity__input" />
								<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity1" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="0"><img src="{{asset('mobile/assets/images/icons/blue/more.svg')}}" alt="" title=""/></div>
					</div>
					<div class="swiper-slide cart__item-delete"><a href="#" class="delete-item" data-delete-item="0">REMOVE</a></div>
				</div>
			</div>
			
			<div class="swiper-container slider-init-swipe cart__item" id="item1">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="{{asset('mobile/assets/img/product2.jpg')}}" alt="" title=""/></a></div>
						<h4 class="cart__item-title">Galaxy A51<span>NPR 39,999</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity2" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity2" value="1" class="quantity__input" />
								<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity2" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="1"><img src="{{asset('mobile/assets/images/icons/blue/more.svg')}}" alt="" title=""/></div>
					</div>
					<div class="swiper-slide cart__item-delete"><a href="#" class="delete-item" data-delete-item="1">REMOVE</a></div>
				</div>
			</div>
			
			<div class="swiper-container slider-init-swipe cart__item" id="item2">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="{{asset('mobile/assets/img/product3.jpg')}}" alt="" title=""/></a></div>
						<h4 class="cart__item-title">Galaxy A71 <span>NPR 49,999</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" value="-" class="quantity__button quantity__button--minus" field="quantity3" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity3" value="1" class="quantity__input" />
								<input type="button" value="+" class="quantity__button quantity__button--plus" field="quantity3" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="2"><img src="{{asset('mobile/assets/images/icons/blue/more.svg')}}" alt="" title=""/></div>
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