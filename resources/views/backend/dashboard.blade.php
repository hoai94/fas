<!DOCTYPE html>
<html>

<head>
    @include('backend.html.head')
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <!-- Navbar -->
        @include('backend.html.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
       @include('backend.html.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      
    </div>
    <!-- ./wrapper -->

    <!-- script -->
    @include('backend.html.script')
    @yield('script')
</body>

</html>