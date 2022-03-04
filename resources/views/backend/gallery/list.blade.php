@extends('backend.dashboard')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Bo suu tap</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th style="width: 150px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 80px"></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/backend/edit-product/{{ $product->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/backend/add-product/{{ $product->id }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-photo-video"></i>
                            </a>
                            <a href="/backend/destroy-product/{{ $product->id }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
