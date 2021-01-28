<!-- Bottom Navigation -->
<div class="bottom-navigation bottom-navigation--gradient">
    <ul class="bottom-navigation__icons">
        <li><a href="/"><img src="{{asset('mobile/assets/images/icons/blue/home.svg')}}" alt="Ozerone Shop" title="Home" /><span>Home</span></a></li>
        <li><a href="/products/all"><img src="{{asset('mobile/assets/images/icons/blue/cart.svg')}}" alt="Ozerone Products" title="Products" /><span>Shop</span></a></li>
        <a href="#" class="open-popup" data-popup="notifications"><li class="centered"><img src="{{asset('mobile/assets/images/icons/blue/magnifier.svg')}}" alt="Search Products" title="Search" /></li></a>
        @auth
        <li><a href="/checkout"><img src="{{asset('mobile/assets/images/icons/blue/checkout.svg')}}" alt="Checkout" title="Checkout" /><span>Checkout</span></a></li>
        @else
        <li><a href="#" data-popup="checkout" class="open-popup"><img src="{{asset('mobile/assets/images/icons/blue/checkout.svg')}}" alt="Checkout" title="Checkout" /><span>Checkout</span></a></li>
        @endif
        
        <li><a href="/"><img src="{{asset('mobile/assets/images/icons/blue/chat.svg')}}" alt="Chat" title="Message" /><span>Chat</span></a></li>
    </ul>
</div>	
<!-- Bottom Navigation Ends -->	