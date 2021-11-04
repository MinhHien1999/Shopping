@extends('frontend.layout.master')
@section('content')

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
               
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Các Sản phẩm khác</h2>
                    @foreach ($product as $sanphamkhac)
                        <div class="thubmnail-recent">
                            <img src="{{asset('public/images/product/'.$sanphamkhac->sanpham_hinh)}}" class="recent-thumb" alt="">
                            <h2><a href="{{URL('product/'.$sanphamkhac->id_sanpham)}}">{{$sanphamkhac->sanpham_ten}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>{{number_format($sanphamkhac->sanpham_gia, 0,'','.').' VNĐ'}}</ins> 
                            </div>                             
                        </div>
                    @endforeach
                </div>
                
                <div class="single-sidebar">
                    {{-- <h2 class="sidebar-title">Recent Posts</h2> --}}
                    {{-- @php
                    echo '<pre>';
                        print_r(session()->get('cart'));
                    echo '</pre>';
                    
                @endphp --}}
                    <ul>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        @if (session()->has('cart'))
                        <h3 id="order_review_heading">Giỏ hàng của bạn</h3>
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Hình Ảnh</th>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-subtotal">Tổng giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach (session()->get('cart') as $cart_sp)
                                    @php
                                        $subtotal = $cart_sp['product_price'] * $cart_sp['product_qty'];
                                        $total += $subtotal;
                                    @endphp                                        
                                    <tr class="cart_item">
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
                                            <span class="soluong" style="font-size: 18px;">{{$cart_sp['product_qty']}}</span>  
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">{{number_format($subtotal, 0,'','.').' VNĐ'}}</span>
                                        </td>
                                    </tr>   
                                    @endforeach
                                    <tr class="cart_item">
                                       <tr>
                                           <td colspan="3"><span class="amount" style="font-size: 18px;">Thành Tiền</span></td>
                                            {{-- <input type="hidden" value="{{$total}}" name="total" readonly> --}}
                                           <td colspan="2"><span class="amount" style="font-size: 18px;">{{number_format($total, 0,'','.').' VNĐ'}}</span></td>
                                       </tr>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            
                        @endif
                        <form enctype="multipart/form-data" action="checkout" class="checkout" method="post" name="checkout">
                            @csrf
                            <div id="customer_details" class="col2-set" style="margin-left: 0px;">
                                <div class="col-3">
                                    <div class="woocommerce-billing-fields">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $err)
                                                <label>{{$err}}</label>
                                            @endforeach
                                        </div>
                                        @endif
                                        @if (session('message_checkout_error')==true)
                                                <div class="alert alert-danger">
                                                    {{session('message_checkout_error')}}
                                                </div>
                                        @endif
                                        <h3>thông Tin Giao Hàng</h3>
                                        @if (session()->has('customer_id'))
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Tên Khách Hàng <abbr title="required" class="required">*</abbr>
                                                </label>
                                            <input type="text" value="{{session('customer_name')}}" placeholder="Tên Khách Hàng" id="billing_first_name" name="khachhang_tenkhachhang" class="input-text">
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa Chỉ <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="{{session('customer_diachi')}}" placeholder="Địa Chỉ" id="billing_address_1" name="khachhang_diachi" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                {{-- <label class="" for="billing_email">Email <abbr title="required" class="required">*</abbr>
                                                </label> --}}
                                                <input type="hidden" value="{{session('customer_email')}}" placeholder="Email" id="billing_email" name="khachhang_email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Số Điện Thoại <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="tel" value="0{{session('customer_sdt')}}" placeholder="Số Điện Thoại" id="billing_phone" name="khachhang_sdt" min="10" class="input-text" style="width: 100%;margin-bottom: 10px;padding: 10px;">
                                            </p>
                                            <div class="clear"></div>
                                            <div>
                                                <p id="order_comments_field" class="form-row notes">
                                                    <label class="" for="order_comments">Ghi chú</label>
                                                    <textarea cols="5" rows="2" placeholder="Ghi chú" id="order_comments" class="input-text " name="khachhang_ghichu"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div id="order_review" style="position: relative;">
                                    <div id="payment">
    
                                        <div class="form-row place-order">
    
                                            <input type="submit" data-value="Place order" value="Thanh Toán" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
    
    
                                        </div>
    
                                        <div class="clear"></div>
    
                                    </div>
                                </div>
                                        @else
                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Tên Khách Hàng <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Tên Khách Hàng" id="billing_first_name" name="khachhang_tenkhachhang" class="input-text" value="{{session('customer_name')}}">
                                        </p>
                                        <div class="clear"></div>
                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Địa Chỉ <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Địa Chỉ" id="billing_address_1" name="khachhang_diachi" class="input-text ">
                                        </p>

                                        <div class="clear"></div>

                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                            <label class="" for="billing_email">Email <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Email" id="billing_email" name="khachhang_email" class="input-text ">
                                        </p>

                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                            <label class="" for="billing_phone">Số Điện Thoại <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="tel" value="" placeholder="Số Điện Thoại" id="billing_phone" name="khachhang_sdt" min="10" class="input-text" style="width: 100%;margin-bottom: 10px;padding: 10px;">
                                        </p>
                                        <div class="clear"></div>
                                        <div>
                                            <p id="order_comments_field" class="form-row notes">
                                                <label class="" for="order_comments">Ghi chú</label>
                                                <textarea cols="5" rows="2" placeholder="Ghi chú" id="order_comments" class="input-text " name="khachhang_ghichu"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="order_review" style="position: relative;">
                                <div id="payment">

                                    <div class="form-row place-order">

                                        <input type="submit" data-value="Place order" value="Đặt Hàng" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                    </div>

                                    <div class="clear"></div>

                                </div>
                            </div>
                                        @endif
                                        
                        </form>

                    </div>                       
                </div>                    
            </div>
        </div>
    </div>
</div>
@endsection