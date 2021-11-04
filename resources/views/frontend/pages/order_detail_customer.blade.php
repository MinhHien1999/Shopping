@extends('frontend.layout.master')
@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section-title">Chi Tiết Đơn Hàng #{{request()->segment(3)}}</h4>
                    {{-- {{dd($orderDetails)}} --}}
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
                                <th class="order-id">Tên Sản Phẩm</th>
                                <th class="order-name">số lượng đặt hàng</th>
                                <th class="product-date">Tổng giá sản phẩm</th>
                                {{-- <th class="order-price">Thành Tiền</th>
                                <th class="order-price">Trạng thái</th> --}}
                                {{-- <th class="order-price">Thao Tác</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $Details)
                                <tr class="cart_item">
                                    <td class="order-id">
                                        <span style="color: blue">{{$Details->sanpham_ten}}</span>
                                    </td>
                                    <td class="order-name">
                                        <span style="color: blue">{{$Details->chitiethd_soluong}}</span>
                                    </td>
                                    <td class="order-price">
                                        <span style="color: blue">{{number_format($Details->chitiethd_gia, 0,'','.').' VNĐ'}}</span>
                                    </td>
                                    {{-- <td class="order-status">
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
                                    </td> --}}
                                    {{-- <td class="product-subtotal">
                                        <span class="amount"></span>
                                    </td> --}}
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    <div class="product-pagination text-center">{{$orderDetails->links()}}</div>      
                </div>
            </div>
        </div>
    </div>
@endsection