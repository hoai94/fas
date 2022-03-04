@extends('backend.dashboard')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post Manager :: List</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 ">
        <a href="{{ 'backend/add-post' }}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i>
            Add New</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th style="width: 350px">Title</th>
                <th style="width: 120px">Thumb</th>
                <th style="width: 120px">Author</th>
                <th style="width: 80px">Status</th>
                <th style="width: 80px">New</th>
                <th>Update</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img src="{{ $post->thumb }}" alt="{{ $post->title }}" style="width: 80px"></td>
                    <td>
                        @foreach ($author as $auth)
                            @if ($post->user_id == $auth->id)
                                {{ $auth->name }}
                            @endif
                        @endforeach

                    </td>
                    <td>
                        @if ($post->status == 1)
                            <a href="{{route('ajax.unactive.post',['post' => $post->id])}}" class="btn btn-success btn-xs btn-status"><i class="fas fa-check"></i></a>
                        @else
                            <a href="{{route('ajax.active.post',['post' => $post->id])}}" class="btn btn-danger btn-xs btn-status"><i class="fas fa-minus"></i></a>
                        @endif
                    </td>

                    </td>
                    <td>
                        @if ($post->new == 1)
                            <a href="{{route('ajax.old.post',['post' => $post->id])}}" class="btn btn-success btn-xs btn-new"><i class="fas fa-check"></i></a>
                        @else
                            <a href="{{route('ajax.new.post',['post' => $post->id])}}" class="btn btn-danger btn-xs btn-new"><i class="fas fa-minus"></i></a>
                        @endif
                    </td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/backend/edit-post/{{ $post->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/backend/destroy-post/{{ $post->id }}" class="btn btn-danger btn-sm">
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


    $('.btn-new').on('click', function (e) {
        e.preventDefault();
        let currentBtn = $(this);
        let url = $(this).attr('href');
        $.ajax({
            url: url, 
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data.link);
                currentBtn.attr('href', data.link);
                if (data.new == 1) {
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