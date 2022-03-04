@extends('frontend.index')
@section('seo')
    <title>Giỏ hàng</title>
    <meta name="description" content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords" content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">
    
@endsection
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST" name="admin-form" id="admin-form">
       
        @if (!empty($carts))
        <section class="cart-section section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table cart-table table-responsive-xs">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sách</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col"></th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                        $price = $product->sale_off != 0 ? $product->sale_off : $product->price;
                                        $priceEnd = $price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                    <tr>
                                        <td>
                                            <a
                                                href="/san-pham/{{ $product->slug_product }}.html"><img
                                                    src="{{ 'upload/images/thumb/'. $product->image }}" alt="{{ $product->name }}"></a>
                                        </td>
                                        <td><a
                                                href="/san-pham/{{ $product->slug_product }}.html">{{ $product->name }}</a>
                                            <div class="mobile-cart-content row">
                                                <div class="col-xs-3">
                                                    <div class="qty-box">
                                                        <div class="input-group">
                                                            <input type="number" name="qty[{{ $product->id }}]" value="1"
                                                                class="form-control input-number" id="quantity-10" min="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h2 class="td-color text-lowercase">{{ number_format($price) }} đ</h2>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h2 class="td-color text-lowercase">
                                                        <a href="#" class="icon"><i
                                                                class="ti-close"></i></a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h2 class="text-lowercase">{{ number_format($price) }} đ</h2>
                                        </td>
                                        <td>
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" name="qty[{{ $product->id }}]"
                                                        value="{{ $carts[$product->id] }}"
                                                        class="form-control input-number" id="quantity-10" min="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="/delete-cart/{{ $product->id }}" class="icon"><i
                                                    class="ti-close"></i></a></td>
                                        <td>
                                            <h2 class="td-color text-lowercase">{{ number_format($priceEnd) }} đ</h2>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <table class="table cart-table table-responsive-md">
                            <tfoot>
                                <tr>
                                    <td>Tổng :</td>
                                    <td>
                                        <h2 class="text-lowercase">{{ number_format($total) }} đ</h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @csrf
                <div class="row cart-buttons">
                    <div class="col-6"><input type="submit" formaction="/update-carts" class="btn btn-solid"
                            value="Cập nhật giỏ hàng"></div>
                    <div class="col-6"><a href="/dat-hang.html" type="submit" class="btn btn-solid">Đặt hàng</a></div>
                </div>
            </div>
        </section>

        @else
            <section class="p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="error-section">
                                <svg width="100" height="119" viewBox="0 0 100 119" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.85938 119H94.1406C97.3717 119 100 116.372 100 113.141V21.4844C100 20.4056 99.1257 19.5312 98.0469 19.5312H84.375C84.375 8.7616 75.6134 0 64.8438 0C54.0512 0 45.3125 8.73032 45.3125 19.5312H30.4688C29.39 19.5312 28.5156 20.4056 28.5156 21.4844V54.1406H1.95312C0.874328 54.1406 0 55.015 0 56.0938V113.141C0 116.372 2.62833 119 5.85938 119ZM3.90625 113.141V97.1094H49.2188V113.141C49.2188 114.218 48.3429 115.094 47.2656 115.094H5.85938C4.7821 115.094 3.90625 114.218 3.90625 113.141ZM94.1406 115.094H52.7893C53.006 114.483 53.125 113.826 53.125 113.141V97.1094H96.0938V113.141C96.0938 114.218 95.2179 115.094 94.1406 115.094ZM64.8438 3.90625C73.4596 3.90625 80.4688 10.9154 80.4688 19.5312H49.2188C49.2188 10.8963 56.2035 3.90625 64.8438 3.90625ZM32.4219 23.4375H45.3125V32.4219H43.3594C42.2806 32.4219 41.4062 33.2962 41.4062 34.375C41.4062 35.4538 42.2806 36.3281 43.3594 36.3281H51.1719C52.2507 36.3281 53.125 35.4538 53.125 34.375C53.125 33.2962 52.2507 32.4219 51.1719 32.4219H49.2188V23.4375H80.4688V32.4219H78.5156C77.4368 32.4219 76.5625 33.2962 76.5625 34.375C76.5625 35.4538 77.4368 36.3281 78.5156 36.3281H86.3281C87.4069 36.3281 88.2812 35.4538 88.2812 34.375C88.2812 33.2962 87.4069 32.4219 86.3281 32.4219H84.375V23.4375H96.0938V93.2031H53.125V56.0938C53.125 55.015 52.2507 54.1406 51.1719 54.1406H32.4219V23.4375ZM49.2188 58.0469V93.2031H3.90625V58.0469H49.2188Z" fill="currentColor"></path>
                                    <path d="M14.8438 69.7656V73.6719C14.8438 80.1462 20.0882 85.3906 26.5625 85.3906C33.0246 85.3906 38.2812 80.134 38.2812 73.6719V69.7656C39.36 69.7656 40.2344 68.8913 40.2344 67.8125C40.2344 66.7337 39.36 65.8594 38.2812 65.8594H34.375C33.2962 65.8594 32.4219 66.7337 32.4219 67.8125C32.4219 68.8913 33.2962 69.7656 34.375 69.7656V73.6719C34.375 77.9794 30.8701 81.4844 26.5625 81.4844C22.2473 81.4844 18.75 77.9871 18.75 73.6719V69.7656C19.8288 69.7656 20.7031 68.8913 20.7031 67.8125C20.7031 66.7337 19.8288 65.8594 18.75 65.8594H14.8438C13.765 65.8594 12.8906 66.7337 12.8906 67.8125C12.8906 68.8913 13.765 69.7656 14.8438 69.7656Z" fill="currentColor"></path>
                                </svg>
                                
                                <h3>Không có sản phẩm nào trong giỏ hàng của bạn</h3>
                                <a href="/trang-chu.html" class="btn btn-solid">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </form>
@endsection
