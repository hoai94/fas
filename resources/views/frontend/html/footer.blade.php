<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon">
    <div class="phonering-alo-ph-circle"></div>
    <div class="phonering-alo-ph-circle-fill"></div>
    <a href="tel:0905744470" class="pps-btn-img" title="Liên hệ">
        <div class="phonering-alo-ph-img-circle"></div>
    </a>
</div>

<footer class="footer-light mt-5">
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>Giới thiệu</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo">
                            <h2 style="color: #5fcbc4">BestBuy</h2>
                        </div>
                        <p>Tự hào là website bán hàng trực tuyến lớn nhất Việt Nam, cung cấp đầy đủ các sản phẩm thời trang
                            , đặc biệt với những bộ sưu tập độc quyền trong nước và quốc tế</p>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Danh mục nổi bật</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                @foreach ($menus as $item)
                                    @if ($item->is_home == 0)
                                    <li><a href="/danh-muc/{{$item->slug}}">{{$item->name}}</a></li>
                                    @endif
                                
                                @endforeach
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Chính sách</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="/lien-he.html">Liên hệ</a></li>
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Hợp tác phát hành</a></li>
                                <li><a href="#">Phương thức vận chuyển</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Thông tin</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-phone"></i>Hotline 1: <a href="tel:19001900">1900 1900</a></li>
                                <li><i class="fa fa-phone"></i>Hotline 2: <a href="tel:19001900">1900 1900</a></li>
                                <li><i class="fa fa-envelope-o"></i>Email: <a href="mailto:bestbuy@contact.com" class="text-lowercase">bestbuy@contact.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 BestBuy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>