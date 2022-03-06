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
                    <h1 class="m-0 text-dark">Assign Roles</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card card-info card-outline">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th style="width: 70px">Name</th>
                            <th style="width: 70px">Email</th>
                            <th style="width: 70px">Role</th>
                            <th style="width: 70px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ( $user->roles as $item)
                                    <span class="badge badge-success">{{ $item->name }}</span>
                                @endforeach
                            </td>
                           
                        </tr>
                    </tbody>
                </table>
                <div class="card-body">          
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="menu">List roles</label>                                 
                                    <select class="form-control role-select" name="role[]" multiple="multiple" >
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @csrf
                            <div class="card-footer mt-3">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <a href="/backend/list-product" class="btn btn-primary">Quay lại</a>
                            </div>
                        </div>
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
            $('.role-select').select2({
                placeholder: "Select a role",
            });
        });
    </script>
@endsection