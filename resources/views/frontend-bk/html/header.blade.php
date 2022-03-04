@php $menusHtml = \App\Helper\Helper::menus($menus); @endphp

<header class="header">
            

    <!-- Header Container -->
    <div id="header-sticky" class="header-main">
        <div class="header-main-inner">
            <!-- Logo -->
            <div class="logo">
                <a href="index.html">
                    <img src="fashion/img/logo_black.png" alt="Philos" />
                </a>
            </div>
            <!-- End Logo -->


            <!-- Right Sidebar Nav -->
            <div class="header-rightside-nav">
                <!-- Login-Register Link -->
                <div class="header-btn-link hidden-lg-down"><a href="#" class="btn btn-sm btn-color">Buy Now</a></div>
                <!-- End Login-Register Link -->

                <!-- Sidebar Icon -->
                <div class="sidebar-icon-nav">
                    <ul class="list-none-ib">
                        <!-- Search-->
                        <li><a id="search-overlay-menu-btn"><i aria-hidden="true" class="fa fa-search"></i></a></li>

                        <!-- Whishlist-->
                        <li><a class="js_whishlist-btn"><i aria-hidden="true" class="fa fa-heart"></i><span class="countTip">10</span></a></li>

                        <!-- Cart-->
                        <li><a id="sidebar_toggle_btn">
                            <div class="cart-icon">
                                <i aria-hidden="true" class="fa fa-shopping-bag"></i>
                            </div>

                            <div class="cart-title">
                                <span class="cart-count">2</span>
                                /
                            <span class="cart-price strong">$698.00</span>
                            </div>
                        </a></li>
                    </ul>
                </div>
                <!-- End Sidebar Icon -->
            </div>
            <!-- End Right Sidebar Nav -->


            <!-- Navigation Menu -->
            <nav class="navigation-menu">
                <ul>
                    <li>
                        <a href="trang-chu">Home</a>
                    </li>
                    {{-- <li class="menu-dropdown-icon">
                                <a href="shop_grid.html">Brand</a>
                                <!-- Drodown Menu ------->
                                <ul class="nav-dropdown js-nav-dropdown" style="display: none;">
                                    <li class="container">
                                        <ul class="row">
                                            <!--Grid 1-->
                                            <li class="nav-dropdown-grid">
                                                <ul>
                                                    <li><a href="#">A&amp;C Signature</a></li>
                                                </ul>
                                            </li>     

                                        </ul>
                                    </li>
                                </ul>
                                <!-- End Drodown Menu -->
                            <div class="dropworn-arrow" style="display: none;"></div>
                        </li> --}}
                    {!! $menusHtml !!}
                </ul>
            </nav>
            <!-- End Navigation Menu -->

        </div>
    </div>
    <!-- End Header Container -->
</header>