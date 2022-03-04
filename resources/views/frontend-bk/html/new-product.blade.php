<section class="section-padding">
    <div class="container">
        <h2 class="page-title">New Tranding</h2>
    </div>
    <div class="container">
        <div id="new-tranding" class="product-item-4 owl-carousel owl-theme nf-carousel-theme1">
            @foreach ($products as $product)
            <div class="product-item">
                <div class="product-item-inner">
                    <div class="product-img-wrap">
                        <img src="{{$product->image}}" alt="{{$product->name}}" height="110">
                    </div>
                    <div class="product-button">
                        <a href="#" class="js_tooltip" data-mode="top" data-tip="Add To Cart"><i class="fa fa-shopping-bag"></i></a>
                        <a href="#" class="js_tooltip" data-mode="top" data-tip="Quick&nbsp;View"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
                <div class="product-detail">
                    <a class="tag" href="#">Men Fashion</a>
                    <p class="product-title"><a href="product_detail.html">{{$product->name}}</a></p>
                    <p class="product-description">
                        {{$product->description}}
                    </p>
                    <h5 class="item-price">$ {{$product->price}}</h5>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>