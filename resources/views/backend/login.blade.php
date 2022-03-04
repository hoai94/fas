<!DOCTYPE html>
<html>

<head>
    @include('backend.html.head')
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập trang quản trị</p>

                <form action="{{route('login')}}" method="post" id="form-login"
                >
                    <!-- USERNAME -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <!-- PASSWORD -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- TOKEN -->
                    @csrf
                    <button type="submit" class="btn btn-info btn-block">Đăng nhập</button>
                    <!-- /.col -->
                </form>
            </div>

        </div>
        <!-- /.login-card-body -->
    </div>
    <!-- script -->
    @include('backend.html.script')
</body>

</html>
© 2021 GitHub, Inc.
Terms