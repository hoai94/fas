@extends('frontend.index')
@section('seo')
    <title>Tìm kiếm : {{$key}}</title>
    <meta name="description" content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords" content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">
@endsection
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">Tìm kiếm : {{$key}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ratio_asos j-box pets-box section-b-space" id="category">
        @if (count($products)>0)
        <div class="container">
            <div class="no-slider five-product row">
                @foreach ($products as $product)
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="/san-pham/{{ $product->slug_product }}.html"><img src="upload/images/thumb/{{$product->image}}" class="img-fluid blur-up lazyload bg-img"
                                    alt="{{$product->name}}"></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <a href="/san-pham/{{ $product->slug_product }}.html">
                            <h4>{{$product->name}}</h4>
                        </a>
                        <h4 class="text-lowercase">
                            {{ number_format($product->sale_off) }} đ
                            <del>{{ number_format($product->price) }} đ</del>
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="product-pagination">
                <div class="theme-paggination-block">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <h3>Không tìm thấy sản phẩm nào với từ khóa : {{$key}}</h3>
        </div>
        @endif
        
    </section>
@endsection
