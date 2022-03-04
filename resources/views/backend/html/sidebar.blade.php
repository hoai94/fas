@php
    $userName = Auth::user()->name;
@endphp
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="theme_admin/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Clothes-Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="theme_admin/images/default-user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$userName}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/backend" class="nav-link" data-active="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{'backend/list-user'}}" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{'backend/add-user'}}" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Product<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{'backend/list-product'}}" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{'backend/add-product'}}" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>Menu<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{'backend/list-menu'}}" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{'backend/add-menu'}}" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Slider<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{'backend/list-slider'}}" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{'backend/add-slider'}}" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blogs<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{'backend/list-post'}}" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{'backend/add-post'}}" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Order<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{'backend/customers'}}" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
