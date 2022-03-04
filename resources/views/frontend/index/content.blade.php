@extends('frontend.index')
@section('seo')
    <title>Trang chủ | BestBuy</title>
    <meta name="description" content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords" content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">
    
@endsection
@section('content')
     <!-- Home slider -->
     @include('frontend.html.slider')
     <!-- Home slider end -->
 
     <!-- Top Collection -->
     <!-- Title-->
     <div class="title1 section-t-space title5">
         <h2 class="title-inner1">Sản phẩm nổi bật</h2>
         <hr role="tournament6">
     </div>
     <!-- Product slider -->
     @include('frontend.html.product-slider')
     <!-- Product slider end -->
     <!-- Top Collection end-->
 
     <!-- service layout -->
     @include('frontend.html.service')
     <!-- service layout  end -->
 
     <!-- Tab product -->
 
     @include('frontend.html.product-feature')
     <!-- Tab product end -->
@endsection