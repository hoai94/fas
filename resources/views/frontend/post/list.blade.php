@extends('frontend.index')
@section('seo')
    <title>Tin tức</title>
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
                        <h2 class="py-2">Tin tức</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-b-space blog-page ratio2_3">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12"> --}}
                    <div class="col-xl-9 col-lg-8 col-md-7">
                    @foreach ($post as $item)
                        <div class="row blog-media">
                            <div class="col-xl-6">
                                <div class="blog-left">
                                    <a href="/tin-tuc/{{ $item->slug }}" class="bg-size blur-up lazyloaded"
                                        style="background-image: url(&quot;{{ $item->thumb }}&quot;); background-size: cover; background-position: center center; display: block;"><img
                                            src="{{ $item->thumb }}" class="img-fluid blur-up lazyload bg-img" alt=""
                                            style="display: none;"></a>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="blog-right">
                                    <div>
                                        <h6>{{ $item->create_at }}</h6> <a href="/tin-tuc/{{ $item->slug }}">
                                            <h4>{{ $item->title }}</h4>
                                        </a>
                                        <ul class="post-social">

                                            <li>Author:
                                                @foreach ($author as $auth)
                                                    @if ($item->user_id == $auth->id)
                                                        {{ $auth->name }}
                                                    @endif
                                                @endforeach
                                            </li>
                                            <li>Published:
                                                {{ \Carbon\Carbon::create($item->created_at)->diffForHumans(\Carbon\Carbon::now()) }}
                                            </li>
                                            <li><i class="fa fa-eye"></i> {{ $item->reads }}</li>
                                            <li><i class="fa fa-comments"></i> {{ $item->countComments() }} Comment</li>
                                        </ul>
                                        <p>{{ Str::limit($item->description,255) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="blog-sidebar">
                            <div class="theme-card">
                                <h4>Recent Post</h4>
                                <ul class="recent-blog">
                                    @foreach ($postNew as $post)
                                    <li>
                                        <div class="media">
                                            <a href="/tin-tuc/{{ $item->slug }}" > 
                                            <img class="img-fluid blur-up lazyloaded"
                                                src="{{$post->thumb}}" alt="Generic placeholder image"></a>
                                            
                                            <div class="media-body align-self-center">
                                                <a href="/tin-tuc/{{ $item->slug }}" > <h6>{{Str::limit( $post->title,30)}}</h6></a>
                                                <p>{{$post->reads}} Views</p>
                                            </div>
                                        
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                    
                                </ul>
                            </div>
                            <div class="theme-card">
                                <h4>Popular Post</h4>
                                <ul class="recent-blog">
                                    @foreach ($postPopular as $post)
                                    <li>
                                        <div class="media">
                                            <a href="/tin-tuc/{{ $item->slug }}" ><img class="img-fluid blur-up lazyloaded"
                                                src="{{$post->thumb}}" alt="Generic placeholder image"></a>
                                            <div class="media-body align-self-center">
                                                <a href="/tin-tuc/{{ $item->slug }}" ><h6>{{Str::limit( $post->title,30)}}</h6></a>
                                                <h6>{{$post->created_at}}</h6>
                                                <p>{{$post->reads}} Views</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
    </section>



@endsection

