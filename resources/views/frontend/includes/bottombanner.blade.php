<!-- start section -->
<section class="cover-background wow animate__fadeIn" style="background: url('{{asset('desktop/materials/footer-background.svg')}}'); background-position: left bottom !important;">
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-12 col-xl-6 col-lg-7 wow animate__fadeIn">
            </div>
            <div class="col-12 col-xl-6 col-lg-7 wow animate__fadeIn">
                
                <h1 class="alt-font text-white font-weight-900 margin-15px-bottom" style="letter-spacing: 0.5px;">Enhance Your <br>Lifestyle</h1>
                <div class="margin-25px-bottom text-white opacity-6 alt-font" style="letter-spacing: 2.5px; font-size: 22px;">SHOP SMART, LIVE EASY.</div>
                <a href="mailto:info@yourdomain.com" class="btn btn-large btn-expand-ltr text-white lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr">info@ozeroneshop.com<span class="bg-transparent-black"></span></a>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
<!-- Bottom Navigation -->
<div class="bottom-navigation fixed-bottom-bar">
    <ul class="bottom-navigation__icons">
        <li><a href="/"><img src="{{asset('mobile/assets/images/icons/blue/home.svg')}}" alt="Ozerone Shop" title="Home" /><span>Home</span></a></li>
        <li><a href="/products/all"><img src="{{asset('mobile/assets/images/icons/blue/cart.svg')}}" alt="Ozerone Products" title="Products" /><span>Shop</span></a></li>
        @auth
        <li><a href="/checkout"><img src="{{asset('mobile/assets/images/icons/blue/checkout.svg')}}" alt="Checkout" title="Checkout" /><span>Checkout</span></a></li>
        @else
        <li><a href="#" data-popup="checkout" class="open-popup"><img src="{{asset('mobile/assets/images/icons/blue/checkout.svg')}}" alt="Checkout" title="Checkout" /><span>Checkout</span></a></li>
        @endif
        
        <li><a href="/"><img src="{{asset('mobile/assets/images/icons/blue/chat.svg')}}" alt="Chat" title="Message" /><span>Chat</span></a></li>
    </ul>
</div>	
<!-- Bottom Navigation Ends -->	
