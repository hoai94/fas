@extends('backend.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slider Manager :: Edit</h1>
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
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                            placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu">Giá Gốc</label>
                                        <input type="number" name="price" value="{{ $product->price }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu">Giá Giảm</label>
                                        <input type="number" name="sale_off" value="{{ $product->sale_off }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-file">
                                        <label for="menu">Ảnh Sản Phẩm</label>
                                        <input type="file" class="form-control" name="image" id="upload">
                                    </div>
                                    
                                </div>
                                <div class="col-md-3"><div  id="image_show">
                                    <a href="{{ $product->image }}" target="_blank">
                                        <img src="{{ 'upload/images/thumb/' . $product->image }}" width="150px"
                                            alt="{{ $product->name }}">
                
                                    </a>
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                </div></div>
                            </div>
                    
                          
                    
                            <div class="form-group">
                                <label>Mô Tả </label>
                                <textarea name="description" class="form-control">{{ $product->description}}</textarea>
                            </div>
                    
                            <div class="form-group">
                                <label>Mô Tả Chi Tiết</label>
                                <textarea name="content" id="content"
                                    class="form-control">{{ $product->content }}</textarea>
                            </div>
                    
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="form-check">
                                            @php
                                                $arrMenus = [];
                                                foreach ($product->menus as $m) {
                                                    $arrMenus[] = $m->id;
                                                }
                                            @endphp
                                            <div class="custom-control custom-checkbox ">
                                                    @foreach ($menus as $menu)
                                                    <input  @if (in_array($menu->id, $arrMenus))
                                                    {{ 'checked' }}
                                        @endif class="form-check-input " name="menu_id[]" type="checkbox" value="{{ $menu->id }}">
                                                    <label class="form-check-label">{{ $menu->name }} | </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kích Hoạt</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="status" name="status"
                                                {{ $product->status == 1 ? ' checked=""' : '' }}>
                                            <label for="status" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio" id="no_status" name="status"
                                                {{ $product->status == 0 ? ' checked=""' : '' }}>
                                            <label for="no_status" class="custom-control-label">Không</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Is Home</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="is_home" name="is_home"
                                                {{ $product->is_home == 1 ? ' checked=""' : '' }}>
                                            <label for="is_home" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio" id="no_is_home" name="is_home"
                                                {{ $product->is_home == 0 ? ' checked=""' : '' }}>
                                            <label for="no_is_home" class="custom-control-label">Không</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>New</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="new" name="new"
                                                {{ $product->new == 1 ? ' checked=""' : '' }}>
                                            <label for="new" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio" id="no_new" name="new"
                                                {{ $product->new == 0 ? ' checked=""' : '' }}>
                                            <label for="no_new" class="custom-control-label">Không</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
                        </div>
                        @csrf
                    </form>
            </div>


        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
