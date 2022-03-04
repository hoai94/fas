@extends('frontend.index')
@section('seo')
    <title>Liên hệ</title>
    <meta name="description" content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords" content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">
    
@endsection
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Liên hệ</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-page section-b-space">
    <div class="container">
        <div class="row section-b-space">
            <div class="col-lg-7 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15674.686595933472!2d106.82963755!3d10.83642045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1635858904299!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-lg-5">
                <div class="contact-right">
                    <ul>
                        <li>
                            <div class="contact-icon"><img src="../theme_frontend/images/icon/phone.png" alt="Generic placeholder image">
                                <h6>Hotline</h6>
                            </div>
                            <div class="media-body">
                                <p>+1900-1900</p>
                                <p>+1900-1909</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h6>Địa chỉ</h6>
                            </div>
                            <div class="media-body">
                                <p>108 Nguyễn xiển P.Long thạnh mỹ Q.9 TP.HCM</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"><img src="../theme_frontend/images/icon/email.png" alt="Generic placeholder image">
                                <h6>Email hỗ trợ</h6>
                            </div>
                            <div class="media-body">
                                <p>support@bestbuy.com</p>
                                <p>info@bestbuy.com</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form class="theme-form">
                    <div class="form-row row">
                        <div class="col-md-6">
                            <label for="name">Họ tên </label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập họ tên của bạn ..." required="">
                        </div>
                        <div class="col-md-6">
                            <label for="review">Số điện thoại</label>
                            <input type="text" class="form-control" id="review" placeholder="Số điện thoại của bạn ..." required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Địa chỉ email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email của bạn ..." required="">
                        </div>
                        <div class="col-md-12">
                            <label for="review">Nội dung</label>
                            <textarea class="form-control" placeholder="Nhập nội dung ..." id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-solid" type="submit">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection