@extends('frontend.index')
@section('seo')
    <title>Đặt hàng</title>
    <meta name="description" content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords" content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">
    
@endsection
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">Đặt hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form action="" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Thông tin nhận hàng</h3>
                                </div>
                                <div class="row check-out">
                                    @if (Auth::guard('customer')->check())
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Tên Khách Hàng</div>
                                        
                                        <input type="text" disabled name="name" value="{{Auth::guard('customer')->user()->name}}" placeholder="Nhập tên của bạn ...">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Địa chỉ email</div>
                                        <input type="text" disabled name="email" value="{{Auth::guard('customer')->user()->email}}"
                                            placeholder="Nhập địa chỉ email của bạn ...">
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Số điện thoại</div>
                                        <input type="text" disabled name="phone" value="{{Auth::guard('customer')->user()->phone}}"
                                            placeholder="Nhập số điện thoại của bạn ...">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Địa chỉ nhận hàng</div>
                                        <input type="text" disabled name="address" value="{{Auth::guard('customer')->user()->address}}"
                                            placeholder="Vui lòng nhập địa chỉ nhận hàng của bạn...">
                                    </div>
                                        
                                    @else
                                        <h4>Vui lòng đăng nhập</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Tên sản phẩm <span>Tổng</span></div>
                                        </div>
                                        @php
                                            $total = 0;
                                        @endphp
                                        <ul class="qty">
                                            @foreach ($products as $product)
                                                @php
                                                    $price = $product->sale_off != 0 ? $product->sale_off : $product->price;
                                                    $priceEnd = $price * $carts[$product->id];
                                                    $total += $priceEnd;
                                                @endphp
                                                <li>{{ $product->name }} × {{ $carts[$product->id] }}
                                                    <span>{{number_format($priceEnd) }} đ</span></li>
                                            @endforeach
                                        </ul>
                                        <ul class="total">
                                            <li>Tổng <span class="count">{{number_format($total)}} đ</span></li>
                                        </ul>

                                    </div>
                                    <div class="payment-box">
                                        <div class="text-end"><button type="submit" @if (!Auth::guard('customer')->check())
                                            {{'disabled'}}
                                        @endif class="btn-solid btn">Đặt hàng</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
