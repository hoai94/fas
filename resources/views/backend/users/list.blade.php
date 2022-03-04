@extends('backend.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Manager :: List</h1>
            </div>
        </div>
    </div>
</div>
    @can('assign')
    <div class="mb-1">
        <a href="{{URL::to('/backend/add-user')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add New</a>
    </div>
    @endcan
   
    <table class="display table " id="list-products">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên </th>
                <th>Email</th>
                <th>Created</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td> 
                        @can('assign')
                        <a class="btn btn-primary btn-sm" href="/backend/role/{{$user->id}}">
                            <i class="fas fa-user-tag"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/">
                            <i class="fas fa-edit"></i>
                        </a>
                        @endcan  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div> --}}
   
@endsection
