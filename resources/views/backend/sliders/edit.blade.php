@extends('backend.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Menu Manager :: Edit</h1>
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
            
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @else
            <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Tiêu Đề</label>
                                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Đường Dẫn</label>
                                        <input type="text" name="url" value="{{ $slider->url }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="menu">Ảnh Sản Phẩm</label>
                                <input type="file"  class="form-control" id="upload" name="image">
                                <div id="image_show">
                                    <a href="">
                                        <img src="{{ $slider->image }}" width="100px">
                                    </a>
                                    <input type="hidden" name="image" value="{{ $slider->image }}">
                                </div>
                                
                            </div>
                
                
                            <div class="form-group">
                                <label for="menu">Sắp Xếp</label>
                                <input type="number" name="sort_by" value="{{ $slider->sort_by }}" class="form-control" >
                            </div>
                
                            <div class="form-group">
                                <label>Kích Hoạt</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="status" name="status"
                                        {{ $slider->status == 1 ? 'checked' : '' }}>
                                    <label for="status" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_status" name="status"
                                        {{ $slider->status == 0 ? 'checked' : '' }}>
                                    <label for="no_status" class="custom-control-label">Không</label>
                                </div>
                            </div>
                
                        </div>
                
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập Nhật Slider</button>
                        </div>
                        @csrf
                    </form>
                </div>
               

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection