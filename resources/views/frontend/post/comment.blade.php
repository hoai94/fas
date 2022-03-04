{{-- @extends('frontend.index')

@section('content') --}}
    @foreach ($comments as $comment)
        <div class="row section-b-space">
            <div class="col-sm-12">
                <div class="media">
                    <img class="mr-3" src="upload/images/icon/images.png" width="50"
                        alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">{{$comment->user->name}}</h5>
                        <p>{{$comment->content}}</p>
                        {{-- <form class="form-reply-{{$comment->id}}">
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Nội dung bình luận</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form> --}}
                        <form class="theme-form form-reply form-reply-{{$comment->id}}" style="display: none" >
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <label for="content-comment">Nội dung</label>
                                    <textarea class="form-control" placeholder="Nội dung bình luận ..."
                                        id="content-reply-{{$comment->id}}" rows="4"></textarea>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-outline-info btn-sm btn-reply-comment" data-id="{{$comment->id}}">Trả lời</button>
                        @foreach ($comment->replies as $childComment)
                            <div class="media mt-3">
                                <a class="pr-3" href="#">
                                    <img src="upload/images/icon/images.png" width="50" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">{{$childComment->user->name}}</h5>
                                   <p>{{$childComment->content}}</p>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>

            </div>
        </div>
    @endforeach
{{-- 
@endsection --}}
