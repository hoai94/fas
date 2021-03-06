
@extends('frontend.index')
@section('seo')
    <title>Đăng nhập</title>
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
                        Đăng nhập </h2>
                </div>
            </div>
        </div>
    </div>
</div>
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Đăng nhập</h3>
                    <div class="theme-card">
                        <form action="" method="post" id="admin-form" class="theme-form">
                            <div class="form-group">
                                <label for="email" class="required">Email</label>
                                <input type="email"  name="email" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password" class="required">Mật khẩu</label>
                                <input type="password" name="password" value="" class="form-control">
                            </div>
                            @csrf
                            <button type="submit" id="submit" name="submit" value="Đăng nhập" class="btn btn-solid">Đăng nhập</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>Khách hàng mới</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Đăng ký tài khoản</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p>
                        <a href="dang-ky.html" class="btn btn-solid">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection