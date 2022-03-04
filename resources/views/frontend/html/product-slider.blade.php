<section class="section-b-space p-t-0 j-box ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    @foreach ($productsIsHome as $product)
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    <span class="lable4 badge badge-danger"> {{number_format($product->sale_off - $product->price )}} đ</span>
                                </div>
                                <div class="front">
                                    <a href="/san-pham/{{$product->slug_product}}.html">
                                        <img src="{{'upload/images/thumb/' .$product->image}}" class="img-fluid blur-up lazyload bg-img"
                                            alt="{{$product->name}}">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button class="btn-cart" data-url="{{ route('add.cart.ajax')}}"
                                        data-product_id="{{ $product->id }}" title="Add to cart">
                                        <i class="ti-shopping-cart">
                                        </i>
                                    </button>
                                    <button title="Quick View" class="quick_views" data-id="{{ $product->id }}"
                                        data-toggle="modal"
                                           data-target="#quick-view">
                                           <i class="ti-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-detail">
                                <a href="/san-pham/{{ $product->slug_product }}.html"
                                    title="{{$product->name}}">
                                    <h6>{{$product->name}}</h6>
                                </a>
                                <h4 class="text-lowercase">{{ number_format($product->sale_off)}} đ <del>{{number_format($product->price)}} đ</del></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>