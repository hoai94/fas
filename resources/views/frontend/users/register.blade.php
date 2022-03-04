@extends('frontend.index')
@section('seo')
    <title>Đăng ký</title>
    <meta name="description"
        content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords"
        content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">

@endsection
@section('content')
    <div class="breadcrumb-section" style="margin-top: 107px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">
                            Đăng ký </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="login-page section-b-space">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Đăng ký</h3>
                        <div class="theme-card">
                            <form action="" method="post" id="admin-form" class="theme-form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="required">Tên</label>
                                        <input type="text"  name="name" value="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="required">Email</label>
                                        <input type="email"  name="email" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone" class="required">Số điện thoại</label>
                                        <input type="number"  name="phone" value="" class="form-control">
                                    </div>
        
                                    <div class="form-group col-md-6">
                                        <label for="password" class="required">Mật khẩu</label>
                                        <input type="password" name="password" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address" class="required">Địa chỉ</label>
                                        <input type="text" name="address" value="" class="form-control">
                                    </div>
                                </div>
                                @csrf
                                <button type="submit" id="submit" name="submit" value="Đăng nhập" class="btn btn-solid">Đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
