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
                    <form action="backend/add-menu" method="post" class="mb-0" id="admin-form" >

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label text-sm-right required">Name</label>
                            <div class="col-xs-12 col-sm-8">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control form-control-sm">
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label text-sm-right required">Parent Menu</label>
                            <div class="col-xs-12 col-sm-8">
                                <select class="form-control" name="parent_id">
                                    <option value="0"> Danh Mục Cha </option>
                                    @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label text-sm-right required">Description</label>
                            <div class="col-xs-12 col-sm-8">
                                <textarea type="text" id="description" name="description"  class="form-control form-control-sm">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label text-sm-right required">Status</label>
                            <div class="col-xs-12 col-sm-8">
                                <select id="status" name="status" class="custom-select custom-select-sm">
                                    <option value="default" selected=""> - Select Status - </option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label text-sm-right required">Is Home</label>
                            <div class="col-xs-12 col-sm-8">
                                <select id="is_home" name="is_home" class="custom-select custom-select-sm">
                                    <option value="default" selected=""> - Select Is Home - </option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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