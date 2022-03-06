@extends('backend.dashboard')
@section('css')
    <link rel="stylesheet" href="theme_admin/css/select2.css">   
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Menu Manager :: Add</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('messages'))
                <div class="alert alert-success">{{ session('messages') }}</div>
            @endif
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Tên Sản Phẩm</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                            placeholder="Nhập tên sản phẩm">
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Danh Mục</label>
                                        <select class="form-control" name="menu_id">
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <label for="menu">Ảnh Sản Phẩm</label>
                                        <input type="file" class="form-control" name="image" id="upload">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Giá Gốc</label>
                                        <input type="number" name="price" value="{{ old('price') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Giá Giảm</label>
                                        <input type="number" name="sale_off" value="{{ old('sale_off') }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô Tả </label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Mô Tả Chi Tiết</label>
                                <textarea name="content" id="content"
                                    class="form-control">{{ old('content') }}</textarea>
                            </div>
                                {{-- <div class="form-group">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <div class="custom-control custom-checkbox ">
                                                    @foreach ($menus as $menu)
                                                    <input class="form-check-input " name="menu_id[]" type="checkbox" value="{{ $menu->id }}">
                                                    <label class="form-check-label">{{ $menu->name }} | </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                </div>
                                            </div>
                                    </div>
                                </div> --}}
                            <div class="form-group">
                                <select class="form-control menu-select" name="menu_id[]" multiple="multiple" >
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kích Hoạt</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="status"
                                                name="status" checked="">
                                            <label for="status" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio" id="no_status"
                                                name="status">
                                            <label for="no_status" class="custom-control-label">Không</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Is Home</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="is_home"
                                                name="is_home" checked="">
                                            <label for="is_home" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio" id="no_is_home"
                                                name="is_home">
                                            <label for="no_is_home" class="custom-control-label">Không</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>New</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="new" name="new"
                                                checked="">
                                            <label for="new" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio" id="no_new"
                                                name="new">
                                            <label for="no_new" class="custom-control-label">Không</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
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
    <script src="theme_admin/js/select2.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-select').select2({
                placeholder: "Select a menu",
            });
        });
    </script>
@endsection