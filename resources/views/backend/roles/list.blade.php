@extends('backend.dashboard')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th style="width: 100px">Name</th>
                <th style="width: 100px">Slug</th>
                <th style="width: 450px">Permission</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($list as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @php
                        $per =json_decode($role->permission);
                        echo implode(' - ',$per);
                        @endphp
                        
                    </td>
                    <td>{{ $role->updated_at }}</td>
                    <td>
                        @can('assign')
                            <a class="btn btn-primary btn-sm" href="/backend/edit-role/{{$role->id}}">
                                <i class="fas fa-edit"></i>
                            </a>  
                            <a href="" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endcan
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection