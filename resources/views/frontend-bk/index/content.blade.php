@extends('frontend.main')
@section('content')

    <div class="page-content-wraper">
        <!-- Intro -->
        @include('frontend.html.slider')
        <!-- End Intro -->

        <!-- Promo Box -->
        @include('frontend.html.promo-box')
        <!-- End Promo Box -->


        <!-- Product (Tab with Slider) -->
        @include('frontend.html.product-tab')
        <!-- End Product (Tab with Slider) -->

        <!-- Categories -->
        @include('frontend.html.category-home')
        <!-- End Categories -->

        <!-- New Product -->
        @include('frontend.html.new-product')
        <!-- End New Product -->

        <!-- Like & Share Banner -->
        <section id="like-share" class="like-share">
            <div class="container">
                <div class="like-share-inner overlay-black40">
                    <h3>Like And Share Our Page for one time <span class="color">10%</span> Off</h3>
                    <ul class="social-icon">
                        <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="https://pinterest.com/" target="_blank"><i class="fa fa-pinterest-p"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Like & Share Banner -->

        <!-- Blog & News -->
        @include('frontend.html.blog')
        <!-- End Blog & News -->

        <!-- Newsletter -->

        <section class="section-padding dark-bg container-fluid bg-image text-center overlay-black40"
            data-background-img="fashion/img/bg/bg_7.jpg" data-bg-position-x="center top">
            <div class="container newsletter section-padding-b">
                <h2 class="page-title">Subscribe To Newsletter</h2>
                <form name="form-newsletter" class="newsletter-from" id="form-newsletter" method="post">
                    <div class="form-input">
                        <input class="input-lg" name="frmemail" id="frmemail" placeholder="Enter Email Address..."
                            title="Enter Email Address..." type="text">
                    </div>
                    <button class="btn btn-lg btn-color">Sing Up</button>
                </form>
                <p class="italic">Sign up For Exclusive Updates, New Arrivals And Insider-Only Discount.</p>
            </div>
        </section>

        <!-- Newsletter -->

        <!-- About blocks -->
        <section class="">
            <div class="container container-margin-minus-t">
                <div class="home-about-blocks">
                    <div class="col-12 about-blocks-wrap">
                        <div class="row">
                            <!--Customer Say-->
                            <div class="col-sm-6 col-md-6 customer-say">
                                <div class="about-box-inner">
                                    <h4 class="mb-25">Customer Say</h4>

                                    <!--Customer Carousel-->
                                    <div class="testimonials-carousel owl-carousel owl-theme nf-carousel-theme1">
                                        <div class="product-item">
                                            <p class="large quotes">I think when we use 'stress', we are often using a
                                                kind of dummy word to try to fit many different things into one big category
                                            </p>
                                            <h6 class="quotes-people">- Jeff Dunham (Apple)</h6>
                                        </div>
                                        <div class="product-item">
                                            <p class="large quotes">It's true, you can never eat a pet you name. And
                                                anyway, it would be like a ventriloquist eating his dummy</p>
                                            <h6 class="quotes-people">- George Lois (microsoft)</h6>
                                        </div>
                                    </div>
                                    <!--End Customer Carousel-->
                                </div>
                            </div>

                            <!--About Shop-->
                            <div class="col-sm-6 col-md-6 about-shop">
                                <div class="about-box-inner">
                                    <h4 class="mb-25">About Philos</h4>
                                    <p class="mb-20">Welcome to <b class="black">Philos</b> - RandomText
                                        is a tool designers and developers can use to quickly grab dummy text in either
                                        Lorem Ipsum or Gibberish format.</p>
                                    <a href="#" class="btn btn-xs btn-black">More <i
                                            class="fa fa-angle-right right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About blocks -->

        <!-- Brnad Logo -->
        @include('frontend.html.logo-brand')
        <!-- End Brnad Logo -->
    </div>

@endsection
