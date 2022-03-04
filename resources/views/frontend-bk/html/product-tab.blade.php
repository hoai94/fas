<section class="section-padding-b">
    <div class="container">
        <h2 class="page-title">Top Interesting</h2>
    </div>
    <div class="container">
        <ul class="product-filter nav" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#latest" role="tab" data-toggle="tab">New Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#best-sellar" role="tab" data-toggle="tab">Best Sellar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#features" role="tab" data-toggle="tab">Features</a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Tab1 - Latest Product -->
            <div id="latest" role="tabpanel" class="tab-pane fade in active">
                <div id="new-product" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
                    @foreach ($productsNew as $product)
                    <div class="product-item">
                        <div class="product-item-inner">
                            <div class="product-img-wrap">
                                <img src="{{$product->image}}" alt="">
                            </div>
                            <div class="product-button">
                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Cart"><i class="fa fa-shopping-bag"></i></a>
                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Quick&nbsp;View"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a class="tag" href="#">{{$product->name}}</a>
                            <p class="product-title"><a href="product_detail.html">{{$product->name}}</a></p>
                            <p class="product-description">
                                {{$product->name}}                            </p>
                            <h5 class="item-price">${{$product->price}}</h5>
                        </div>
                    </div>
                    @endforeach
                   

                </div>
            </div>

            <!-- Tab2 - Best Sellar -->
            <div id="best-sellar" role="tabpanel" class="tab-pane fade">
                <div id="popular-product" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
                    @foreach ($products as $product)
                    <div class="product-item">
                        <div class="product-item-inner">
                            <div class="product-img-wrap">
                                <img src="{{$product->image}}" alt="">
                            </div>
                            <div class="product-button">
                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Cart"><i class="fa fa-shopping-bag"></i></a>
                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Quick&nbsp;View"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a class="tag" href="#">{{$product->name}}</a>
                            <p class="product-title"><a href="product_detail.html">{{$product->name}}</a></p>
                            <p class="product-description">
                                {{$product->name}}                            </p>
                            <h5 class="item-price">${{$product->price}}</h5>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Tab3 - Features -->
            <div id="features" role="tabpanel" class="tab-pane fade">
                <div id="features-product" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
                    @foreach ($productsNew as $product)
                    <div class="product-item">
                        <div class="product-item-inner">
                            <div class="product-img-wrap">
                                <img src="{{$product->image}}" alt="">
                            </div>
                            <div class="product-button">
                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Cart"><i class="fa fa-shopping-bag"></i></a>
                                <a href="#" class="js_tooltip" data-mode="top" data-tip="Quick&nbsp;View"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a class="tag" href="#">{{$product->name}}</a>
                            <p class="product-title"><a href="product_detail.html">{{$product->name}}</a></p>
                            <p class="product-description">
                                {{$product->name}}                            </p>
                            <h5 class="item-price">${{$product->price}}</h5>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>