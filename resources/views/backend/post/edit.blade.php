@extends('backend.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post Manager :: Edit</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
            @endif

            @if(session('messages'))
                <div class="alert alert-success">{{session('messages')}}</div>
            @endif
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="card-body">
                
                            <div class="form-group">
                                <label for="menu">Title</label>
                                <input type="text" name="name" value="{{ $post->title }}" class="form-control"  placeholder="Enter title article...">
                            </div>
                            
                            <div class="form-group">
                                <label for="menu">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{ $post->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="menu">Thumb</label>
                                <input type="file"  class="form-control" id="upload" name = "thumb">
                                
                                <div id="image_show">
                                    <a href="{{ $post->thumb }}" target="_blank">
                                        <img src="{{ $post->thumb }}" width="100px" alt="{{$post->name}}">
                                        
                                    </a>
                                    <input type="hidden" name="thumb" value="{{$post->thumb}}">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="body" class="form-control">{{ $post->body }}</textarea>
                            </div>
                
                            <div class="form-group">
                                <label>Kích Hoạt</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="status"
                                           name="status" {{ $post->status == 1 ? 'checked=""' : '' }}>
                                    <label for="status" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_status"
                                           name="status" {{ $post->status == 0 ? 'checked=""' : '' }}>
                                    <label for="no_status" class="custom-control-label">Không</label>
                                </div>
                            </div>
                
                        </div>
                
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        @csrf
                    </form>
                </div>
               

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('body', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        });
    </script>
@endsection