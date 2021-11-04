<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{asset('')}}">
    <title>Minh Hiền Shop</title>
</head>
<body>
    <h1 style="color: red">Thông Báo Đặt Hàng Thành Công</h1>
    <b>Chào Bạn {{$order->hoadon_tennguoinhan}}</b><br>
    <span>Cảm Ơn Bạn Đã Mua Sắm Tại <b style="color: red">Minh Hiền Shop</b></span><br><br>
    <span>Đơn hàng Của Bạn Đang Được Xử Lý</span><br>
    <span>Đơn Hàng Của Bạn Sẽ Được Giao Tới Trong Vòng 24h</span>
    <table cellspacing="0" border="1">
        <thead>
            <tr>
                <th colspan="5">
                    <h2 style="color: red">Đơn Hàng Của Bạn là #{{$order->id_hoadon}} </h2>
                </th>
            </tr>
          <tr>
            <th class="product-name">Sản Phẩm</th>
            <th class="product-price">Giá</th>
            <th class="product-quantity">Số Lượng</th>
            <th class="product-subtotal">Tổng giá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orderDetail as $orderDetails)
          <tr class="cart_item">                        
              <td class="product-name" style="text-align: center">
                <b>{{$orderDetails['product_name']}}</b>
              </td>
        
              <td class="product-price" style="text-align: center">
                <b>{{number_format($orderDetails['product_price'], 0,'','.').' VNĐ'}}</b>
              </td>
        
              <td class="product-quantity" style="text-align: center">
                <b class="soluong" style="text-align: center">{{$orderDetails['product_qty']}}</b>  
              </td>
        
              <td class="product-subtotal">
                <b class="amount"> {{number_format($orderDetails['product_price'] * $orderDetails['product_qty'], 0,'','.').' VNĐ'}}</b>
              </td>    
              {{-- @dd($orderDetail); --}}
          </tr>   
          @endforeach
          <tr>
            <td colspan="2" style="font-size: 18px;text-align: center"><b>Thành Tiền</b> </td>
              <td class="product-subtotal" colspan="3" style="font-size: 18px;text-align: center">
                <b class="total" style="color: red" >{{number_format($order->hoadon_tongtien, 0,'','.').' VNĐ'}}</b>
              </td>    
          </tr>
        </tbody>
      </table>
</body>
</html>