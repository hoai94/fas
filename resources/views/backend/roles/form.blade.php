@extends('backend.dashboard')
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
                    <form action="backend/add-role" method="post" class="mb-0" id="admin-form" >

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input  class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" >
                            
                        </div>

                        <div class="form-group">
                            <label>Slug </label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
            
                        <div class="form-group">
                            <label>Permission</label>
                           
                            <textarea name="permission" class="form-control">{{ old('permission') }}</textarea>
                        </div>
                        @csrf
                        <div class="card-footer">
                            <div class="col-12 col-sm-8 offset-sm-2">
                                <button type="submit" class="btn btn-sm btn-success mr-1"> Save</button>
                                <a href="backend/list-role" class="btn btn-sm btn-danger mr-1"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
               

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection