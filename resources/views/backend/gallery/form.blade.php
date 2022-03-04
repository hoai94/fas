@extends('backend.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gallery Manager :: Add</h1>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 150px">ID</th>
                            <th>Tên</th>
                            <th>Hình ảnh chính</th>
                            <th>Bộ sưu tập</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td><img src="{{'upload/images/thumb/' .$product->image }}" alt="{{ $product->name }}" style="width: 80px"></td>
                                <td>
                                    @foreach ($gallery as $item)
                                        <img src="{{ $item }}" alt="" style="width: 80px">
                                    @endforeach
                                </td>
                            </tr>
                    </tbody>
                </table>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="menu">Thêm hình vào bộ sưu tập</label>
                                    <input multiple type="file"  class="form-control" name="image[]">                        
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="/backend/list-product" class="btn btn-primary">Quay lại</a>
                        </div>
                       
                        @csrf
                    </form>
                </div>
               

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection