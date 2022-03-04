@extends('frontend.index')
@section('seo')
    <title>{{ $title->name }}</title>
    <meta name="description" content="{{ $title->description }}">
    <meta name="keywords"
        content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">
@endsection

@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">{{ $title->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-b-space j-box ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> back</span></div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Danh mục</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <div id="load-more-menu"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="theme-card">
                            <h5 class="title-border">Sách nổi bật</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @foreach ($productsFeature as $product)
                                        <div class="media">
                                            <a href="/san-pham/{{ $product->slug_product }}.html">
                                                <img class="img-fluid blur-up lazyload"
                                                    src="{{ 'upload/images/thumb/' . $product->image }}"
                                                    alt="{{ $product->name }}"></a>
                                            <div class="media-body align-self-center">
                                                <a href="item.html" title="{{ $product->name }}">
                                                    <h6>{{ $product->name }}</h6>
                                                </a>
                                                <h4 class="text-lowercase">
                                                    {{ number_format($product->sale_off) }} đ
                                                    <del>{{ number_format($product->price) }} đ</del>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div>
                                    <div class="media">
                                        <a href="item.html">
                                            <img class="img-fluid blur-up lazyload" src="images/product.jpg"
                                                alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
                                        <div class="media-body align-self-center">
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>

                                            <a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh">
                                                <h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
                                            </a>
                                            <h4 class="text-lowercase">48,020 đ</h4>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="item.html">
                                            <img class="img-fluid blur-up lazyload" src="images/product.jpg"
                                                alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
                                        <div class="media-body align-self-center">
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>

                                            <a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh">
                                                <h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
                                            </a>
                                            <h4 class="text-lowercase">48,020 đ</h4>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="item.html">
                                            <img class="img-fluid blur-up lazyload" src="images/product.jpg"
                                                alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
                                        <div class="media-body align-self-center">
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>

                                            <a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh">
                                                <h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
                                            </a>
                                            <h4 class="text-lowercase">48,020 đ</h4>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn">
                                                        <span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li class="my-layout-view" data-number="2">
                                                                    <img src="images/icon/2.png" alt=""
                                                                        class="product-2-layout-view">
                                                                </li>
                                                                <li class="my-layout-view" data-number="3">
                                                                    <img src="images/icon/3.png" alt=""
                                                                        class="product-3-layout-view">
                                                                </li>
                                                                <li class="my-layout-view active" data-number="4">
                                                                    <img src="images/icon/4.png" alt=""
                                                                        class="product-4-layout-view">
                                                                </li>
                                                                <li class="my-layout-view" data-number="6">
                                                                    <img src="images/icon/6.png" alt=""
                                                                        class="product-6-layout-view">
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <form action="" id="sort-form" method="GET">
                                                                <select id="sort" name="sort">
                                                                    <option value="default" selected> - Sắp xếp - </option>
                                                                    <option value="asc">Giá tăng dần</option>
                                                                    <option value="desc">Giá giảm dần</option>
                                                                    <option value="new">Mới nhất</option>
                                                                </select>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (count($listProduct) > 0)
                                        <div class="product-wrapper-grid" id="my-product-list">
                                            <div class="row margin-res">
                                                @foreach ($listProduct as $product)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="lable-block">
                                                                    <span class="lable4 badge badge-danger">
                                                                        {{ number_format($product->sale_off - $product->price) }}
                                                                        đ</span>
                                                                </div>
                                                                <div class="front">
                                                                    <a href="/san-pham/{{ $product->slug_product }}.html">
                                                                        <img src="{{ 'upload/images/thumb/' . $product->image }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-info cart-wrap">
                                                                    <button class="btn-cart"
                                                                        data-url="{{ route('add.cart.ajax') }}"
                                                                        data-product_id="{{ $product->id }}"
                                                                        title="Add to cart">
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
                                                                    title="{{ $product->name }}">
                                                                    <h6>{{ $product->name }}</h6>
                                                                </a>
                                                                <p>{{ $product->description }}</p>
                                                                <h4 class="text-lowercase">
                                                                    {{ number_format($product->sale_off) }} đ
                                                                    <del>{{ number_format($product->price) }} đ</del>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="pt-5">
                                            <div class="col-xl-6 col-md-6 col-sm-12">
                                                {!! $listProduct->links() !!}
                                            </div>
                                        </div>
                                        @else
                                        <div class="product-wrapper-grid " id="my-product-list" >
                                            <div class="row margin-res pt-5 ">
                                                <h3 class="text-center">Chưa có sản phẩm nào trong danh mục</h3>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            var _token = $('input[name="_token"]').val();

            load_data('', _token);

            function load_data(id = "", _token) {
                $.ajax({
                    url: "{{ route('ajax.load.more') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_more_button').remove();
                        $('#load-more-menu').append(data);
                    }
                })
            }

            $(document).on('click', '#load_more_button', function() {
                var id = $(this).data('id');
                $('#load_more_button').html('<b>Loading...</b>');
                load_data(id, _token);
            });

        });
    </script>
@endsection
