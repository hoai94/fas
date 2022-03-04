@extends('frontend.index')
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">{{ $detailProduct->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            @foreach ($detailProduct->gallery as $item)
                            <div><img src="{{$item->image}}" alt=""
                                class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            @endforeach
                           
                            
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    @foreach ($detailProduct->gallery as $item)
                                    <div><img src="{{$item->image}}" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            
                            <h2 class="mb-2">{{ $detailProduct->name }}</h2>
                            
                            <h4><del>{{ number_format($detailProduct->sale_off) }} đ</del></h4>
                                        <h3>{{ number_format($detailProduct->price) }} đ</h3>
                            <ul class="color-variant">
                                <li class="bg-light0 active"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                            <form action="/add-cart" method="post">
                                <div class="product-description border-product">
                                    <h6 class="product-title">Số lượng</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="ti-angle-left"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="qty" class="form-control input-number"
                                                value="1">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="ti-angle-right"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="product-buttons">
                                    <button type="submit" class="btn btn-solid ml-0"><i
                                            class="fa fa-cart-plus"></i> Chọn
                                        mua</button>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $detailProduct->id }}">
                                @csrf
                            </form>
                            
                            <div class="border-product">
                                <h6 class="product-title">shipping info</h6>
                                <ul class="shipping-info">
                                    <li>100% Original Products</li>
                                    <li>Free Delivery on order above Rs. 799</li>
                                    <li>Pay on delivery is available</li>
                                    <li>Easy 30 days returns and exchanges</li>
                                </ul>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <section class="section-b-space j-box ratio_asos pb-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 product-related">
                                    <h2>Sản phẩm liên quan</h2>
                                </div>
                            </div>
                            <div class="row search-product">
                                @foreach ($productRelate as $relatePro)
                                    <div class="col-xl-2 col-md-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="lable-block">
                                                    <span
                                                        class="lable4 badge badge-danger">{{ number_format($relatePro->sale_off - $relatePro->price) }}
                                                        đ%</span>
                                                </div>
                                                <div class="front">
                                                    <a
                                                        href="/san-pham/{{ $relatePro->id }}-{{ Str::Slug($relatePro->name, '-') }}.html">
                                                        <img src="{{ $relatePro->image }}"
                                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                                    </a>
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                    <a href="#" title="Quick View"><i class="ti-search"
                                                            data-toggle="modal" data-target="#quick-view"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <a href="/san-pham/{{ $relatePro->id }}-{{ Str::Slug($relatePro->name, '-') }}.html"
                                                    title="{{ $relatePro->name }}">
                                                    <h6>{{ $relatePro->name }}</h6>
                                                </a>
                                                <h4 class="text-lowercase">{{ number_format($relatePro->sale_off) }} đ
                                                    <del>{{ number_format($relatePro->price) }} đ</del>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </section>
                    <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1"
                        role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body modal1">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="modal-bg addtocart">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="media">
                                                        <a href="#">
                                                            <img class="img-fluid blur-up lazyload pro-img" src="" alt="">
                                                        </a>
                                                        <div class="media-body align-self-center text-center">
                                                            <a href="#">
                                                                <h6>
                                                                    <i class="fa fa-check"></i>Sản phẩm
                                                                    <span class="font-weight-bold">Chờ Đến Mẫu Giáo Thì
                                                                        Đã Muộn</span>
                                                                    <span> đã được thêm vào giỏ hàng!</span>
                                                                </h6>
                                                            </a>
                                                            <div class="buttons">
                                                                <a href="../gio-hang.html"
                                                                    class="view-cart btn btn-solid">Xem giỏ hàng</a>
                                                                <a href="#" class="continue btn btn-solid"
                                                                    data-dismiss="modal">Tiếp tục mua sắm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
