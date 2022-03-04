
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <p class="h3">Xin chào {{$customer->name}}</p>
          <p class="h3">Bạn có một đơn hàng từ Besbuy.</p>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Chi tiết đặt hàng của bạn</h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Tên sản phẩm </th>
                    <th>Số lượng</th>
                    <th>Giá </th>
                  </tr>
                </thead>
                <tbody>
                    @php
                            $total = 0;
                        @endphp
                        @foreach ($products as $product)
                            @php
                                $price = $product->sale_off != 0 ? $product->sale_off : $product->price;
                                $priceEnd = $price * $carts[$product->id];
                                $total += $priceEnd;
                            @endphp
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{$carts[$product->id]}}</td>
                                <td>{{number_format($price)}} VNĐ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" >Tổng tiền :</td>
                            <td colspan="3" >
                                <b>{{number_format($total)}} VNĐ</b></td>
                        </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
       
      </div>
      
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>