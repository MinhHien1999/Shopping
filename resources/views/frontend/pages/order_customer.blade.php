@extends('frontend.layout.master')
@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section-title">Danh Sách Đơn Hàng</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message')==true)
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <table cellspacing="0" class="shop_table cart">
                        <thead>
                            <tr>
                                <th class="order-id">Mã đơn hàng</th>
                                <th class="order-name">Tên người nhận</th>
                                <th class="product-date">Ngày đặt hàng</th>
                                <th class="order-price">Thành Tiền</th>
                                <th class="order-price">Trạng thái</th>
                                {{-- <th class="order-price">Thao Tác</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_customer as $order)
                                <tr class="cart_item">
                                    <td class="order-id">
                                        <span style="color: blue">{{$order->id_hoadon}}</span>
                                    </td>
                                    <td class="order-name">
                                        <span style="color: blue">{{$order->hoadon_tennguoinhan}}</span>
                                    </td>
                                    <td>
                                        <span style="color: blue">{{$order->created_at}}</span>
                                    </td>
                                    <td class="order-price">
                                        <span style="color: blue">{{number_format($order->hoadon_tongtien, 0,'','.').' VNĐ'}}</span>
                                    </td>
                                    <td class="order-status">
                                        @if ($order->hoadon_trangthai == 1)
                                            <span style="color: green">Hoàn Tất</span>
                                        @else
                                            <span style="color: red">Đang chờ</span>
                                        @endif
                                    </td>
                                    <td class="order-price">
                                        <a href="{{URL('customer-order-detail/'.session('customer_id').'/'.$order->id_hoadon)}}" style="background: none repeat scroll 0 0 #5a88ca;border: medium none;color: #fff;padding: 11px 20px;text-transform: uppercase;">
                                            Xem chi tiết
                                        </a>
                                    </td>
                                    {{-- <td class="product-subtotal">
                                        <span class="amount"></span>
                                    </td> --}}
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>      
                </div>
            </div>
        </div>
    </div>
@endsection