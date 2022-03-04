<div class="title1 section-t-space title5">
    <h2 class="title-inner1">Danh mục nổi bật</h2>
    <hr role="tournament6">
</div>
<section class="p-t-0 j-box ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <ul class="tabs tab-title">
                        @foreach ($menuIsHome as $key => $menu)
                            <li @if ($cls = $key == 0)
                                    {{ 'class = current' }}
                                @endif
                        ><a href="tab-category-{{ $menu->id }}" class="my-product-tab"
                            data-category="{{ $menu->id }}">{{ $menu->name }}</a></li>
                        @endforeach
                    </ul>
                    @foreach ($allProInMenu as $key => $item)
                        <div class="tab-content-cls">
                            <div id="tab-category-{{ $key }}" @if ($key == 1)
                                {!! 'class=" tab-content active default"' !!}

                            @else
                                {!! 'class=" tab-content "' !!}
                    @endif >
                    <div class="no-slider row tab-content-inside">
                        @foreach ($item as $key => $product)
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="lable-block">
                                        <span
                                            class="lable4 badge badge-danger">{{ number_format($product->sale_off - $product->price) }}
                                            đ</span>
                                    </div>
                                    <div class="front">
                                        <a
                                            href="/san-pham/{{ $product->slug_product }}.html">
                                            <base href="{{ asset('') }}">
                                            <img src="{{'upload/images/thumb/' . $product->image }}" class="img-fluid blur-up lazyload bg-img"
                                                alt="product">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <button class="btn-cart" data-url="{{ route('add.cart.ajax') }}"
                                            data-product_id="{{ $product->id }}" title="Add to cart">
                                            <i class="ti-shopping-cart">
                                            </i>
                                        </button>
                                        <button title="Quick View" class="quick_views"
                                            data-id="{{ $product->id }}" data-toggle="modal"
                                            data-target="#quick-view">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <a href="/san-pham/{{ $product->slug_product }}.html"
                                        title="{{ $product->description }}">
                                        <h6>{{ $product->name }}</h6>
                                    </a>
                                    <h4 class="text-lowercase">{{ number_format($product->sale_off) }} đ
                                        <del>{{ number_format($product->price) }} đ</del></h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>
    </div>
</section>
