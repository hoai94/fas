@extends('backend.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Manager :: Add</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            {{-- @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
            @endif

            @if(session('messages'))
                <div class="alert alert-success">{{session('messages')}}</div>
            @endif --}}

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
                    <form action="backend/add-user" method="post" class="mb-0" id="admin-form" >

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label text-sm-right required">Name</label>
                            <div class="col-xs-12 col-sm-8">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control form-control-sm">
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label text-sm-right required">Email</label>
                            <div class="col-xs-12 col-sm-8">
                                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label text-sm-right required">Password</label>
                            <div class="col-xs-12 col-sm-8">
                                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        @csrf
                        <div class="card-footer">
                            <div class="col-12 col-sm-8 offset-sm-2">
                                <button type="submit" class="btn btn-sm btn-success mr-1"> Save</button>
                                <a href="backend/list-user" class="btn btn-sm btn-danger mr-1"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
               

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection