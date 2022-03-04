@extends('frontend.index')
@section('seo')
    <title>{{ $post->title }}</title>
    <meta name="description"
        content="Giao Hàng Nhanh Miễn Phí ✓ Bảo Hành 365 Ngày ✓ 7 Ngày Đổi Hàng Miễn Phí. Mua Online Giá Rẻ Bất Ngờ">
    <meta name="keywords"
        content="quần áo thời trang nam nữ, quần áo nam, quàn áo nữ, thời trang nam giá rẻ, thời trang nữ giá rẻ, shop thời trang nam nữ">

@endsection
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">{{ $post->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 blog-detail">
                    <h3>{{ $post->title }}</h3>
                    <ul class="post-social">
                        <li>{{ $post->created_at }}</li>
                        <li>Posted By :
                            @foreach ($post->author as $item)
                                {{ $item->name }}
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row section-b-space blog-advance">
                {!! $post->body !!}
            </div>
            @if (Auth::guard('customer')->check())
                <div class="row blog-contact">
                    <div class="col-sm-12">
                        <h3>Xin chào : {{Auth::guard('customer')->user()->name}}</h3>
                        <form class="theme-form" >
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <label for="content-comment">Nội dung</label>
                                    <textarea class="form-control" placeholder="Nội dung bình luận ..."
                                        id="content-comment" rows="4"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-solid btn-xs float-right" id="btn-send-comment" type="button">Gửi bình luận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                {{-- <h3><a href="dang-nhap.html">Vui lòng đăng nhập để bình luận.</a></h3> --}}
                <h3>Vui lòng đăng nhập để viết bình luận</h3>
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#quick-login">
                    Đăng nhập ngay
                </button>
            @endif

            <hr>
            <div id="list-comment">
                @include('frontend.post.comment',['comments'=> $post->comments])
            </div>
           
        </div>
    </section>

    <div class="modal fade" id="quick-login" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email-quick-login">Địa chỉ email</label>
                    <input type="email" class="form-control" id="email-quick-login" aria-describedby="emailHelp" placeholder="Nhập email của bạn...">
                </div>
                <div class="form-group">
                    <label for="password-quick-login">Mật khẩu</label>
                    <input type="password" class="form-control" id="password-quick-login" placeholder="Nhập mật khẩu của bạn ...">
                </div>
                <p id="error-login" class="text-danger"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button id="btn-quick-login" type="button" class="btn btn-primary">Đăng nhập</button>
            </div>
          </div>
        </div>
      </div>
    
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $( "#btn-send-comment" ).click(function(e) {
            e.preventDefault();
            let content = $('#content-comment').val();
            let url     = '{{route("ajax.comment")}}';
            let post_id = '{{ $post->id}}';
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    content:content,
                    post_id:post_id,
                },
                success:function(data){
                    content = $('#content-comment').val('');
                    $('#list-comment').html(data);
                    console.log(data);
                }
            });
        });
        $(document).on('click','.btn-reply-comment',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var formReply = '.form-reply-'+id;
            var contentReply = '#content-reply-'+id;
            let url     = '{{route("ajax.comment")}}';
            let post_id = '{{ $post->id}}';
            $('.form-reply').slideUp();
           // $(formReply).slideDown("slow");

            if ( $(formReply).first().is( ":hidden" ) ) {
                    $(formReply).slideDown( "slow" );
                } else {
                    $(formReply).hide("slow");
                }

            
            let content = $(contentReply).val();
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    content:content,
                    post_id:post_id,
                    reply_id:id,
                },
                success:function(data){
                    content = $('#content-comment').val('');
                    $('#list-comment').html(data);
                    console.log(data);
                }
            });   
        });

        $(document).on('click',"#btn-quick-login",function(e){
            e.preventDefault();
            let email = $('#email-quick-login').val();
            let password = $('#password-quick-login').val();
            let url = '{{route("ajax.login")}}';
            if (email && password) {
                $.ajax({
                method: "POST",
                url: url,
                data: {
                    email:email,
                    password:password,
                },
                success:function(data){
                    if (data.errors) {
                       $('#error-login').html(data.errors);
                    }else{
                        alert(data.messages);
                        location.reload();
                    }
                }
            });
            }else{
                $('#error-login').html('Vui lòng nhập email và mật khẩu!');
                
            }
            
            
        });

        // $("#btn-quick-login").click(function(e){
        //     e.preventDefault();
        //     let email = $('#email-quick-login').val();
        //     let password = $('#password-quick-login').val();
        //     let url = '{{route("ajax.login")}}';
        //     $.ajax({
        //         method: "POST",
        //         url: url,
        //         data: {
        //             email:email,
        //             password:password,
        //         },
        //         success:function(data){
        //             if (data.errors) {
        //                $('#error-login').html(data.errors);
        //             }else{
        //                 alert(data.messages);
        //                 location.reload();
        //             }
        //         }
        //     });
        // });
    </script>
@endsection