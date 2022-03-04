@extends('backend.dashboard')

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
                                {{ $item->name }}
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
                                   
                                    @foreach ($roles as $role)
                                        {{-- @foreach ( $user->roles as $item)
                                            @if ($role->id != $item->id) --}}
                                                <div>
                                                    <input type="checkbox" name="role[]" id="" value="{{$role->id}}"> 
                                                    <label for="">{{$role->name}} </label>
                                                </div>
                                            {{-- @endif
                                        @endforeach                                        --}}
                                    @endforeach
                                </div>
                            </div>
                            @csrf
                            <div class="card-footer">
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
