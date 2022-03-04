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
                                <label for="menu">Tên Danh Mục</label>
                                <input type="text" name="name" value="{{ $menu->name }}" class="form-control"  placeholder="Nhập tên danh mục">
                            </div>
                
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}> Danh Mục Cha </option>
                                    @foreach($menus as $menuParent)
                                        <option value="{{ $menuParent->id }}"
                                            {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                                            {{ $menuParent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label>Mô Tả </label>
                                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
                            </div>
                
                            <div class="form-group">
                                <label>Kích Hoạt</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="status"
                                           name="status" {{ $menu->status == 1 ? 'checked=""' : '' }}>
                                    <label for="status" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_status"
                                           name="status" {{ $menu->status == 0 ? 'checked=""' : '' }}>
                                    <label for="no_status" class="custom-control-label">Không</label>
                                </div>
                            </div>
                
                        </div>
                
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
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
        CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        });
    </script>
@endsection