@php $menusHtml = \App\Helper\Helper::menus($menus); @endphp

<header class="my-header sticky">
    <div class="mobile-fix-option"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="/trang-chu.html">
                                <h2 class="mb-0" style="color: #5fcbc4">BestBuy</h2>
                            </a>
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="/trang-chu.html" class="my-menu-link active">Trang chủ</a></li>
                                    {{-- <li><a href="list.html">Sách</a></li>
                                    <li>
                                        <a href="category.html">Danh mục</a>
                                        <ul>
                                            <li><a href="list.html">Bà mẹ - Em bé</a></li>
                                        </ul>
                                    </li> --}}
                                    {!! $menusHtml !!}
                                    <li><a href="/tin-tuc.html" class="my-menu-link ">Tin tức</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="top-header">
                            <ul class="header-dropdown">
                                <li class="onhover-dropdown mobile-account">
                                    <img src="theme_frontend/images/avatar.png" alt="avatar">
                                    <ul class="onhover-show-div">
                                        @if (Auth::guard('customer')->check())
                                            <li><a href="">Tài khoản</a></li>
                                            <li><a href="dang-xuat.html">Đăng xuất</a></li>
                                        @else
                                            <li><a href="dang-nhap.html">Đăng nhập</a></li>
                                            <li><a href="dang-ky.html">Đăng ký</a></li>
                                        @endif
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <div>
                                            <img src="theme_frontend/images/search.png" onclick="openSearch()"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <i class="ti-search" onclick="openSearch()"></i>
                                        </div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div>
                                                <span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form action="/tim-kiem.html" method="GET">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            name="key" id="search-input"
                                                                            placeholder="Tìm kiếm sản phẩm...">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div>
                                            <a href="/gio-hang.html" id="cart" class="position-relative">
                                                <img src="theme_frontend/images/cart.png" class="img-fluid blur-up lazyload"
                                                    alt="cart">
                                                <i class="ti-shopping-cart"></i>
                                                <span class="badge badge-warning" id="cart_item"><?php
                                                    $total = session('carts') ? session('carts') : [];
                                                    echo $total = count($total);
                                                    ?></span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>