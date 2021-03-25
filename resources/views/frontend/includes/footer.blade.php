<!-- start footer -->
<footer class="landing-page-footer bg-white background-position-center-top padding-five-top padding-one-bottom md-padding-7-rem-tb footer-sticky" style="background-image: url('/desktop/images/litho-landing-page-banner-img-01.jpg');">
    <div class="container">
        <div class="row">
            <!-- start footer column -->
            <div class="col-12 col-md-3 col-sm-6 sm-margin-40px-bottom xs-margin-25px-bottom">
                <span class="alt-font font-weight-500 d-block text-black text-uppercase margin-15px-bottom xs-margin-10px-bottom">Company</span>
                <ul>
                    <li><a href="/about">About company</a></li>
                    <li><a href="/about">Our services</a></li>
                    <li><a href="/career">Job opportunities</a></li>
                    <li><a href="/contact">Contact us</a></li>
                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                    <li><a href="/terms-of-service">Terms of Service</a></li>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-md-3 col-sm-6 sm-margin-40px-bottom xs-margin-25px-bottom">
                <span class="alt-font font-weight-500 d-block text-black text-uppercase margin-15px-bottom xs-margin-10px-bottom">Customer</span>
                <ul>                           
                    <li><a href="/support">Client support</a></li>
                    <li><a href="/faqs">FAQs</a></li>
                    <li><a href="/about">Company story</a></li>
                    <li><a href="/blog-news">Latest news</a></li>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-md-3 col-sm-6 xs-margin-25px-bottom">
                <span class="alt-font font-weight-500 d-block text-black text-uppercase margin-15px-bottom xs-margin-10px-bottom">Brands</span>
                <ul>  
                    @foreach($brands as $brand)
                        @if($brand->parent_id == 0)
                        <li><a href="/brand/{{$brand->slug}}">{{$brand->title}}</a></li>
                        @endif
                    @endforeach          
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-md-3 col-sm-6">
                <span class="alt-font font-weight-500 d-block text-black text-uppercase margin-15px-bottom xs-margin-10px-bottom">Categories</span>
                <ul>
                    @foreach($elect_categories as $elect_category)
                        @if($elect_category->parent_id == 0)
                        <li><a href="/products/{{$elect_category->slug}} ">{{$elect_category->title}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- end footer column -->
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-block padding-two-all text-center text-medium">
                    
                    <a href="#" target="_blank"><img src="{{asset('desktop/logo/logo-primary.png')}}" data-at2x="{{asset('desktop/logo/logo-primary@2x.png')}}" width= "200px" alt="Ozerone Shop Logo"/></a>
                    <p> <small> The word Ozerone is derived from combining the two binary
                        digits zero and one to symbolize we work with digital products. Our brand mark represents a circle/rounded imaginary zero formed
                            by collections of ones. The two variant colors on the logo represents
                            that we do great works both online and offline. Combining word mark and our brand mark we present you with
                                this aesthetically beautiful and calm logo.</small></p>
                    <p> <small> We are grateful that you are here. If you have arrived here chances
                        are you are here for the same resaons that gets us out of bed every
                        day - to empower PEOPLE with the help of technology and do great
                        things together. Here at Ozerone, we firmly believe that we can put a dent in the
                            universe. Inspired by big tech houses like Apple, Alibaba, Amazon,
                            etc. We strive to bring change wherever we go by informing, educating
                            and entertaining everyone we touch. We strive to provide better products
                            at affordable prices that help people be more productive and help make
                            their daily life easy. Let’s do great things together.</small> </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center">
                <div class="social-icon-style-10 ">
                    <ul class="large-icon">
                        <li><a class="facebook text-fast-black" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i><span></span></a></li>
                        <li><a class="youtube text-fast-black" href="http://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i><span></span></a></li>
                        <li><a class="linkedin text-fast-black" href="http://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                        <li><a class="instagram text-fast-black" href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i><span></span></a></li>
                        <li><a class="twitter text-fast-black" href="http://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i><span></span></a></li>
                    </ul>
                </div>
                <p class="alt-font text-small text-slate-blue-light text-uppercase m-0">&copy; 2021 Ozerone Shop</p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->