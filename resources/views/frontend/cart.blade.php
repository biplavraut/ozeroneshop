<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Cart | {{ $seo->title }}</title>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        @include('frontend.includes.meta')
        <!-- favicon icon -->
        <link rel="shortcut icon" href="{{asset('desktop/logo/favicon.png')}}">
        <link rel="apple-touch-icon" href="{{asset('desktop/logo/apple-touch-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('desktop/logo/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('desktop/logo/apple-touch-icon-114x114.png')}}">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/font-icons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/theme-vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('desktop/css/responsive.css')}}" />
    </head>
    <body data-mobile-nav-style="classic" class="body-reload" data-page="shoppingcart">
        @include('frontend.includes.header')
        <div class="main-content">
        <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-left">Shopping cart</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="/">Home</a></li>
                            <li><a href="/products/all">Shop</a></li>
                            <li>Shopping cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="wow animate__fadeIn">
            <div class="container" id="orderSummary">
                <div class="row">
                    <div class="col-lg-8 padding-70px-right lg-padding-30px-right md-padding-15px-right">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <table class="table cart-products margin-60px-bottom md-margin-40px-bottom sm-no-margin-bottom">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="alt-font"></th>
                                            <th scope="col" class="alt-font"></th>
                                            <th scope="col" class="alt-font">Product</th>
                                            <th scope="col" class="alt-font">Price</th>
                                            <th scope="col" class="alt-font">Quantity</th>
                                            <th scope="col" class="alt-font">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                    @if(Cart::count() > 0)
				                        @foreach(Cart::content() as $item)
                                        <tr> 
                                            <td class="product-remove">
                                                <a href="javascript:void(0);" onclick="removeCartProduct('{{ $item->rowId }}')" class="btn-default text-large"><i class="feather icon-feather-trash-2 text-red icon-extra-small d-xs-none"></i></a>
                                            </td>
                                            <td class="product-thumbnail"><a href="/product-detail/{{$item->model->slug}}"><img class="cart-product-image" src="{{asset('img/product/'. $item->model->slug .'/thumbs/'. $item->options->image .'')}}" alt="{{$item->model->title}} " title="{{$item->model->title}} "></a></td>
                                            <td class="product-name">
                                                <a href="/product-detail/{{$item->model->slug}}">{{$item->model->title}} </a>
                                                <span class="variation"> Additional Info: NA</span>
                                            </td>
                                            <td class="product-price" data-title="Price">NPR {{$item->price}}</td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <label class="screen-reader-text">Quantity</label>
                                                    <input type="button" onclick="decreaseQuantity('{{ $item->rowId }}')" value="-" class="qty-minus qty-btn" data-quantity="minus" data-field="quantity">
                                                    <input class="input-text qty-text" disabled type="number" name="quantity" value="{{$item->qty}}">
                                                    <input type="button" onclick="increaseQuantity('{{ $item->rowId }}')" value="+" class="qty-plus qty-btn" data-quantity="plus" data-field="quantity">
                                                </div>
                                            </td> 
                                            <td class="product-subtotal" data-title="Total">NPR {{$item->subtotal}}</td> 
                                        </tr>
                                        @php
                                            $total += $item->subtotal;
                                        @endphp
                                        @endforeach
                                        @else
                                        <tr><td><b>No Product in Cart</b></td></tr>
                                    @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-6 md-margin-50px-bottom sm-margin-20px-bottom"> 
                                <div class="coupon-code-panel">
                                    <input type="text" placeholder="Coupon code">
                                    <a href="#" class="btn apply-coupon-btn text-uppercase">Apply</a>
                                </div>
                            </div>
                            <div class="col-md-6 text-center text-md-right md-margin-50px-bottom btn-dual">
                                <a href="javascript:void(0);" onclick="removeCart()" class="btn btn-fancy btn-small btn-transparent-red"><i class="feather icon-feather-trash text-red icon-extra-small d-xs-none"></i> Empty cart</a>
                                <a href="/cart" class="btn btn-fancy btn-small btn-transparent-green mr-0"><i class="feather icon-feather-refresh-ccw text-green icon-extra-small d-xs-none"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light-gray padding-50px-all lg-padding-30px-tb lg-padding-20px-lr md-padding-20px-tb">
                            <span class="alt-font text-large text-extra-dark-gray margin-15px-bottom d-inline-block font-weight-500">Cart total</span>
                            <table class="w-100 total-price-table">
                                <tbody>
                                    <tr>
                                        <th class="w-50 font-weight-500 text-extra-dark-gray">Subtotal</th>
                                        <td class="text-extra-dark-gray"> NPR {{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr class="total-amount">
                                        <th class="font-weight-500 text-extra-dark-gray">Total</th>
                                        <td data-title="Total">
                                            <div id="promo-discount">
                                                @auth
                                                    @php
                                                    $discount_amount = 0;
                                                    if (is_numeric((int)$total)) {
                                                        # code...
                                                        $discount_amount = (int)$total*0.06;
                                                    }
                                                    $grand_total = $total - $discount_amount;
                                                    @endphp
                                                    Promo discount: {{ round($discount_amount) }}
                                                @else
                                                    <strong>Sign Up!</strong> and enter promo code to receive discount.
                                                @endif
                                            </div>
                                            <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">NPR {{round($grand_total)}}</h6>
                                            <span class="text-small text-extra-medium-gray">(Includes tax)</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div><a href="/checkout" class="btn btn-fast-blue btn-large d-block btn-fancy margin-15px-top">Proceed to checkout</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        @include('frontend.includes.bottombanner')
        </div>
        @include('frontend.includes.footer')
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
        <!-- end scroll to top -->
        <!-- javascript -->
        <script type="text/javascript" src="{{asset('desktop/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('desktop/js/theme-vendors.min.js')}}"></script>
        <script type="text/javascript" src="/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{asset('desktop/js/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('desktop/js/custom.js')}}"></script>
    </body>
</html>