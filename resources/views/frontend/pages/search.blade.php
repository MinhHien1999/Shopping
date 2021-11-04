@extends('frontend.layout.master')
@section('content')


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
          <h4 class="section-title">Danh Sách Sản Phẩm Tìm Kiếm</h4>
          @if (session('message')==true)
                <div class="alert alert-danger">
                    {{session('message')}}
                </div>
            @endif
            @foreach ($ProductSearch as $sp)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{asset('public/images/product')}}/{{$sp->sanpham_hinh}}" alt="" id="hinhsp_{{$sp->id_sanpham}}" data-hinhsp="{{$sp->sanpham_hinh}}" style="width: 195px;height: 243px;">
                        </div>
                        <h2 id="idsp" data-idsp="{{$sp->id_sanpham}}" data-tensp="{{$sp->sanpham_ten}}"><a href="{{URL('product/'.$sp->id_sanpham)}}" id="tensp_{{$sp->id_sanpham}}" style="font-size: 15px">{{$sp->sanpham_ten}}</a></h2>
                        <div class="product-carousel-price">
                            <ins id="giasp_{{$sp->id_sanpham}}" data-price="{{$sp->sanpham_gia}}">{{number_format($sp->sanpham_gia, 0,'','.').' VNĐ'}}</ins>
                             {{-- <del>$999.00</del> --}}
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="javascript:void(0)" onclick="AddToCart(this)" id="add-to-cart" data-product-id="{{$sp->id_sanpham}}">Thêm vào giỏ</a>
                        </div>                       
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    {{$ProductSearch->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection