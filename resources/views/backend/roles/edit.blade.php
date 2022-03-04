@extends('backend.dashboard')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Role Manager :: Edit</h1>
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
                                <label for="role">Tên Role</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                            </div>                
                            <div class="form-group">
                                <label>Slug </label>
                                <input type="text" name="slug" value="{{ $role->slug }}" class="form-control">
                            </div>
                
                            <div class="form-group">
                                <label>Permission</label>
                                @php
                                    $per =implode(',',json_decode($role->permission));
                                    
                                   
                                @endphp
                                <textarea name="permission" class="form-control">{{  $per }}</textarea>
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
