@extends('backend.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slider Manager :: Add</h1>
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

            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Tiêu Đề</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Đường Dẫn</label>
                                        <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="menu">Ảnh Sản Phẩm</label>
                                <input type="file"  class="form-control" name="image">                        
                            </div>


                            <div class="form-group">
                                <label for="menu">Sắp Xếp</label>
                                <input type="number" name="sort_by" value="1" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Kích Hoạt</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="status" name="status" checked="">
                                    <label for="status" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_status" name="status" >
                                    <label for="no_status" class="custom-control-label">Không</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Banner</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="banner" name="banner" checked="">
                                    <label for="banner" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_banner" name="banner" >
                                    <label for="no_banner" class="custom-control-label">Không</label>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm Slider</button>
                        </div>
                        @csrf
                    </form>
                </div>
               

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection