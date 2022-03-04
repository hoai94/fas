@extends('backend.dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product Manager :: List</h1>
            </div>
        </div>
    </div>
</div>
<div class="mb-1">
    <a href="{{URL::to('/backend/add-product')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add New</a>
</div>
    <table class="display table " id="list-products">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình ảnh</th>
                <th>Danh Mục</th>
                <th>Giá Gốc</th>
                <th>Giá Khuyến Mãi</th>
                <th>Status</th>
                <th>Sản phẩm mới</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{'upload/images/thumb/' .$product->image }}" alt="{{ $product->name }}" style="width: 80px"></td>
                    <td>
                        @foreach ($product->menus as $m)
                        {{$m->name}}</br>
                        @endforeach
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale_off }}</td>
                    <td> @if ($product->status == 1)
                        <a href="{{route('ajax.unactive',['product' => $product->id ])}}"   class="btn btn-success btn-xs btn-status"><i class="fas fa-check"></i></a>
                    @else
                        <a href="{{route('ajax.active',['product' => $product->id ])}}"  class="btn btn-danger btn-xs btn-status"><i class="fas fa-minus"></i></a>
                    @endif
                       
                    </td>
                    <td>@if ($product->new == 1)
                        <a href="{{route('ajax.old',['product' => $product->id ])}}"   class="btn btn-success btn-xs btn-new"><i class="fas fa-check"></i></a>
                    @else
                        <a href="{{route('ajax.new',['product' => $product->id ])}}"  class="btn btn-danger btn-xs btn-new"><i class="fas fa-minus"></i></a>
                    @endif</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/backend/edit-product/{{ $product->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/backend/add-gallery/{{$product->id}}">
                            <i class="fas fa-photo-video"></i>
                        </a>
                        
                        {{-- <a href="/backend/destroy-product/{{ $product->id }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a> --}}

                        <button type="button" data-id="{{$product->id}}" id="btn-delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btn-ajax-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div> --}}
    <div class="modal fade" id="btn-ajax-delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >Xóa sản phẩm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Bạn có muộn xóa sản phẩm này không ? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              <button type="button" id="delete-confirm" class="btn btn-danger">Xóa</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
<script>
    //delete product
    $(document).on('click','#btn-delete',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let url= '{{route("ajax.destroy")}}';
        $('#delete-confirm').click(function(){
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    id:id,
                },
                success:function(data){
                if (data.message) {
                    location.reload();
                }else{
                    alert(data.error);
                }
                }
            });
        });
        
    });
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
  
</script>
<script>
    $(document).ready( function () {
        $('#list-products').DataTable();
    });
</script>
@endsection