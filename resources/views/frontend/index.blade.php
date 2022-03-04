<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.html.head')
        @yield('seo')
    </head>
<body>
    <div class="loader_skeleton">
        <div class="typography_section">
            <div class="typography-box">
                <div class="typo-content loader-typo">
                    <div class="pre-loader"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- header start -->
    @include('frontend.html.header')
    <!-- header end -->

   @yield('content')

    <!-- Quick-view modal popup start-->
    @include('frontend.html.quick-view')
    <!-- Quick-view modal popup end-->

    <!-- footer -->
    @include('frontend.html.footer')
     <!-- footer end -->

    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->
   
    @include('frontend.html.script')
    @yield('js')
</body>

</html>