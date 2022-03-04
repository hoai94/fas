@extends('backend.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Slider Manager :: List</h1>
            </div>
        </div>
    </div>
</div>
<div class="mb-1">
    <a href="{{URL::to('/backend/add-slider')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add New</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th style="width: 50px">ID</th>
        <th>Tiêu Đề</th>
        <th>Link</th>
        <th>Ảnh</th>
        <th>Trang Thái</th>
        <th>Cập Nhật</th>
        <th style="width: 100px">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sliders as $key => $slider)
        <tr>
            <td>{{ $slider->id }}</td>
            <td>{{ $slider->name }}</td>
            <td>{{ $slider->url }}</td>
            <td><a href="{{ $slider->image }}" target="_blank">
                    <img src="{{ $slider->image }}" height="40px">
                </a>
            </td>
            <td>@if ($slider->status == 1)
                <a href="{{route('ajax.unactive.slider',['slider' => $slider->id ])}}"   class="btn btn-success btn-xs btn-status"><i class="fas fa-check"></i></a>
            @else
                <a href="{{route('ajax.active.slider',['slider' => $slider->id ])}}"  class="btn btn-danger btn-xs btn-status"><i class="fas fa-minus"></i></a>
            @endif</td>
            <td>{{ $slider->updated_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/backend/edit-slider/{{ $slider->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm"
                   onclick="removeRow({{ $slider->id }}, '/backend/destroy-slider')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $sliders->links() !!}
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

</script>
@endsection