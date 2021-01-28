<!-- Right panel -->
<div id="panel-right-cart">
	<div class="panel panel--right">
		<div class="cart">
			<h3 class="cart__title">Your Shopping Cart</h3>
			@if(Cart::count() > 0)
			@foreach(Cart::content() as $item)
			<div class="swiper-container slider-init-swipe cart__item" id="item{{ $loop->index }}">
				<div class="swiper-wrapper">
					<div class="swiper-slide cart__item-details">
						<div class="cart__item-thumb cart__item-thumb--round-corners"><a href="#"><img src="{{asset('img/product/'. $item->model->slug .'/thumbs/'. $item->options->image .'')}}" alt="{{$item->model->title}}" title="{{$item->model->title}}"/></a></div>
						<h4 class="cart__item-title">{{$item->model->title}} <span>NPR {{$item->model->price}}</span></h4>
						<div class="cart__item-qty">
							<form id="myform" method="POST" action="#" class="quantity quantity--small">
								<input type="button" onclick="decreaseQuantity('{{ $item->rowId }}')" value="-" class="quantity__button quantity__button--minus" field="quantity{{ $loop->index }}" />
								<input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="quantity{{ $loop->index }}" value="{{$item->qty}}" class="quantity__input" />
								<input type="button" onclick="increaseQuantity('{{ $item->rowId }}')" value="+" class="quantity__button quantity__button--plus" field="quantity{{ $loop->index }}" />
							</form>
						</div>
						<div class="cart__item-more" data-swipe-item="{{ $loop->index }}"><img src="{{asset('mobile/assets/images/icons/blue/more.svg')}}" alt="" title=""/></div>
					</div>
					<div class="swiper-slide cart__item-delete"><a href="#" onclick="removeCartProduct('{{ $item->rowId }}')" class="delete-item" data-delete-item="{{ $loop->index }}">REMOVE</a></div>
				</div>
			</div>
			@endforeach
			
			<div class="cart__total">
			  	<div class="d-flex align-items-center justify-space pb-10">
					<span>SUB TOTAL</span>  <b>NPR {{Cart::subtotal()}}</b>
			  	</div>
			  	<!-- <div class="d-flex align-items-center justify-space pb-10">
					<span>TAX (10%)</span>  <b>NPR {{Cart::tax()}}</b>
			  	</div> -->
				  <div class="d-flex align-items-center justify-space pb-10">
					<span>SHIPPING</span>  <b>Free Shipping</b>
				</div>
			  	<div class="total d-flex align-items-center justify-space pb-10">
					<span>TOTAL</span> <strong>NPR {{Cart::total()}}</strong>
			  	</div>
			</div>
			<div class="buttons buttons--centered mt-20">
				@auth
				<a href="/checkout" class="button button--main button--full">PROCEED TO CHECKOUT</a>
				@else
				<a href="#" data-popup="checkout" class="button button--main button--full open-popup">PROCEED TO CHECKOUT</a>
				
				@endif
			</div>
			@else
			<strong>No Item in Cart.</strong>
			<div class="buttons buttons--centered mt-20">
				<a href="/products/all" class="button button--main button--full">Product List</a>
			</div>
			@endif
		</div>
	</div>
</div>
<script>
function increaseQuantity(rowId){
	var rowId = rowId;
	$.ajax({
		type:'POST',
		url:"{{ route('increasequantity.post') }}",
		data:{"_token": "{{ csrf_token() }}", rowId:rowId},
		success:function(data){
			console.log(data.success);
			$("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
			$("#cart-count").load(location.href + " #cart-count");

			$('.cart-items-nr').addClass('animate');
			setTimeout(function() {
				$('.cart-items-nr').removeClass('animate');
			}, 1500);				
		}
	});
};
function decreaseQuantity(rowId){
	var rowId = rowId;
	$.ajax({
		type:'POST',
		url:"{{ route('decreasequantity.post') }}",
		data:{"_token": "{{ csrf_token() }}", rowId:rowId},
		success:function(data){
			console.log(data.success);
			$("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
			$("#cart-count").load(location.href + " #cart-count");

			$('.cart-items-nr').addClass('animate');
			setTimeout(function() {
				$('.cart-items-nr').removeClass('animate');
			}, 1500);				
		}
	});
};
function removeCartProduct(rowId){
	var rowId = rowId;
	$.ajax({
		type:'POST',
		url:"{{ route('removecartproduct.post') }}",
		data:{"_token": "{{ csrf_token() }}", rowId:rowId},
		success:function(data){
			console.log(data.success);
			$("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
			$("#cart-count").load(location.href + " #cart-count");

			$('.cart-items-nr').addClass('animate');
			setTimeout(function() {
				$('.cart-items-nr').removeClass('animate');
			}, 1500);				
		}
	});
};
</script>