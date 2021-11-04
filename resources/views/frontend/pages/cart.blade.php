@extends('frontend.layout.master')
@section('content')

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Các Sản phẩm khác</h2>
                    {{-- @php
                    echo '<pre>';
                        print_r(session()->get('cart'));
                    echo '</pre>';
                    
                @endphp --}}
                    @foreach ($product as $sanphamkhac)
                        <div class="thubmnail-recent">
                            <img src="{{asset('public/images/product/'.$sanphamkhac->sanpham_hinh)}}" class="recent-thumb" alt="">
                            <h2><a href="{{URL('product/'.$sanphamkhac->id_sanpham)}}">{{$sanphamkhac->sanpham_ten}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>{{number_format($sanphamkhac->sanpham_gia, 0,'','.').' VNĐ'}}</ins> 
                                {{-- <del>$800.00</del> --}}
                            </div>                             
                        </div>
                    @endforeach
                </div>
                
                <div class="single-sidebar">
                    {{-- <h2 class="sidebar-title">Recent Posts</h2> --}}
                    <ul>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                @php
                    if(session()->get('cart') == null){
                        session()->forget('cart');
                    }
                @endphp
                <?php
                $message = session()->get('message');
                  if(isset($message)){
                    echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
                    session()->put('message',null);
                  }
                ?>
                <div class="product-content-right">
                    <div class="woocommerce">
                        @if (session()->has('cart'))
                        <form method="post" action="{{URL('cart/update')}}">
                            @csrf
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Hình Ảnh</th>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-price">giá</th>
                                        <th class="product-quantity">số Lượng</th>
                                        <th class="product-subtotal">Tổng tiền</th>
                                        <th class="product-remove"><input type="checkbox" id="selectAll"></th>
                                    </tr>
                                </thead>
                                <tbody id="cart">
                                        @php
                                            $total = 0;
                                        @endphp
                                    
                                        @foreach (session()->get('cart') as $cart_sp)
                                            @php
                                                $subtotal = $cart_sp['product_price'] * $cart_sp['product_qty'];
                                                $total += $subtotal;
                                            @endphp
                                            <tr class="cart_item_sp" id="item-{{$cart_sp['session_id']}}">
                                                <td class="product-thumbnail">
                                                    <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{asset('public/images/product/'.$cart_sp['product_image'])}}"></a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="{{URL('product/'.$cart_sp['product_id'])}}">{{$cart_sp['product_name']}}</a> 
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount">{{number_format($cart_sp['product_price'], 0,'','.').' VNĐ'}}</span> 
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        {{-- <input type="button" class="minus" value="-"> --}}
                                                        <input type="number" size="4" style="width: 70px;" class="input-text qty text update_cart" title="Qty" data-session-id="{{$cart_sp['session_id']}}" value="{{$cart_sp['product_qty']}}" name="product_qty[{{$cart_sp['session_id']}}]" min="1" max="50" step="1">
                                                        {{-- <input type="button" class="plus" value="+"> --}}
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount">{{number_format($subtotal, 0,'','.').' VNĐ'}}</span> 
                                                </td>
                                                <td class="product-remove">
                                                    {{-- <a title="Remove this item" class="remove" href="#">×</a>  --}}
                                                    <input type="checkbox" name="product_checkbox[]" id="" class="product_checkbox" value="{{$cart_sp['session_id']}}">
                                                </td>
                                            </tr>
                                        @endforeach
                                            <tr class="cart_item">
                                                <td colspan="2">
                                                    <label style="">Tổng tiền</label>
                                                </td>
                                                <td class="price" colspan="4">
                                                    <label class="total" style="">{{number_format($total, 0,'','.').' VNĐ'}}</label>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td colspan="3">   
                                                        <a href="{{URL('checkout')}}" style="background: none repeat scroll 0 0 #5a88ca;border: medium none;color: #fff;padding: 11px 20px;text-transform: uppercase;">
                                                            Thanh Toán
                                                        </a>
                                                    {{-- <div class="coupon">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                        <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                    </div> --}}
                                                </td>
                                                <td colspan="3">
                                                <button type="button" onclick="DeleteToCart()" name="delete_product" id="delete_product" class="button" style="background: none repeat scroll 0 0 #5a88ca;border: medium none;color: #fff;padding: 11px 20px;text-transform: uppercase;">Xóa</button>
                                                    {{-- <input type="submit" value="Update Cart" name="update_cart" class="button"> --}}
                                                    <input type="submit" value="Cập Nhật" name="proceed" class="checkout-button button alt wc-forward">
                                                </td>
                                            </tr>       
                                            </tbody>
                            </table>
                                    <div class="cart-collaterals">
                        </form>
                                    @else
                                        <div class="product-content-right">
                                            <div class="woocommerce">
                                                <p class="text-center">
                                                    Không có sản phẩm nào trong giỏ hàng!
                                                </p>
                                                <p class="text-center"><a href="{{URL('/product')}}">
                                                    <i class="fa fa-reply"></i> Quay lại trang chủ</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>
@endsection