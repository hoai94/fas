@extends('backend.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Menu Manager :: List</h1>
            </div>
        </div>
    </div>
</div>
    <div class="mb-1">
        <a href="{{URL::to('/backend/add-menu')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Status</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
         @php
            $urlUnactive    =  'backend/unactive-menu';
            $urlActive  = 'backend/active-menu';
         @endphp
        <tbody>
           @foreach ($menus as $menu)
           @php
               if($menu->parent_id == 0) {
                    $char = '';
               }else {
                    $char ='|--';
               }
           @endphp 
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $char . $menu->name }}</td>
                <td>{{ $menu->slug }}</td>
                <td>{{ $menu->description }}</td>
                <td> @if ($menu->status == 1)
                    <a href="{{route('ajax.unactive.menu',['menu' => $menu->id ])}}"   class="btn btn-success btn-xs btn-status"><i class="fas fa-check"></i></a>
                @else
                    <a href="{{route('ajax.active.menu',['menu' => $menu->id ])}}"  class="btn btn-danger btn-xs btn-status"><i class="fas fa-minus"></i></a>
                @endif</td>
                <td>{{ $menu->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/backend/edit-menu/{{$menu->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                        onclick="removeRow(' . $menu->id . ', \'/backend/destroy-menu\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
@endsection

@section('script')
<script>
    //change status

    $('.btn-status').on('click', function (e) {
        e.preventDefault();
        let currentBtn = $(this);
        let url = $(this).attr('href');
        console.log(url);
        $.ajax({
            url: url, 
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                currentBtn.attr('href', data.link);
                if (data.status == 1) {
                    currentBtn.removeClass('btn-danger');
                    currentBtn.addClass('btn-success');
                    currentBtn.find('i').attr('class', 'fa fa-check');
                } else {
                    currentBtn.removeClass('btn-success');
                    currentBtn.addClass('btn-danger');
                    currentBtn.find('i').attr('class', 'fa fa-minus');
                }
            },
        });
    });

</script>
@endsection