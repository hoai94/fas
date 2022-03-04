@extends('backend.dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$countUser}}</h3>
                        <p>User</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-ios-person"></i>
                    </div>
                    <a href="{{'backend/list-user'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$countMenu}}</h3>
                        <p>Menu</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="{{'backend/list-menu'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$countProduct}}</h3>
                        <p>Product</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <a href="{{'backend/list-product'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$countSlider}}</h3>
                        <p>Slider</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{'backend/list-slider'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div>
            <h4>Order recent</h4>
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Ngày Đặt hàng</th>
                    <th style="width: 100px">Detail Order</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#detail-order" type="button" class="btn btn-primary btn-sm" id="quick-view-detail-order" data-id="{{ $customer->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>


<div class="modal fade bd-example-modal-lg" id="detail-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <div id="detail-content-order"></div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','#quick-view-detail-order',function(e){
            e.preventDefault();
            let id = $(this).data('id');
            let url = '{{route("ajax.order.detail")}}';
            $.ajax({
                method: "GET",
                url: url,
                data: {
                    id:id,
                },
                success:function(data){
                    $('#detail-content-order').html(data.carts)                    
                }
            });        
        });
    </script>
@endsection
