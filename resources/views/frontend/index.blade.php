@extends('frontend.layout.master')
@section('content')
    
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h4 class="section-title">Sản Phẩm Mới Nhất</h4>
                    <div class="product-carousel">
                        @foreach ($product as $sp)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('public/images/product')}}/{{$sp->sanpham_hinh}}" id="hinhsp_{{$sp->id_sanpham}}" alt="" data-hinhsp="{{$sp->sanpham_hinh}}" style="width:226px; height: 275px;">
                                    <div class="product-hover">
                                        <a href="javascript:void(0)" onclick="AddToCart(this)" class="add-to-cart-link" id="add-to-cart" data-product-id="{{$sp->id_sanpham}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                        <a href="{{URL('product/'.$sp->id_sanpham)}}" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                    </div>
                                </div>
                                
                            <h2 id="idsp" data-idsp="{{$sp->id_sanpham}}" data-tensp="{{$sp->sanpham_ten}}"><a href="{{URL('product/'.$sp->id_sanpham)}}" id="tensp_{{$sp->id_sanpham}}">{{$sp->sanpham_ten}}</a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins id="giasp_{{$sp->id_sanpham}}" data-price="{{$sp->sanpham_gia}}"><?php echo number_format($sp->sanpham_gia, 0,'','.')." VNĐ" ?></ins> 
                                    {{-- <del>$100.00</del> --}}
                                </div> 
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->
{{-- <div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h4 class="section-title">Sản Phẩm Mới Nhất</h4>
                    <div class="product-carousel">
                        @foreach ($product as $sp)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('public/images/product')}}/{{$sp->sanpham_hinh}}" id="hinhsp_{{$sp->id_sanpham}}" alt="" data-hinhsp="{{$sp->sanpham_hinh}}" style="width:226px; height: 275px;">
                                    <div class="product-hover">
                                        <a href="javascript:void(0)" onclick="AddToCart(this)" class="add-to-cart-link" id="add-to-cart" data-product-id="{{$sp->id_sanpham}}"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="{{URL('product/'.$sp->id_sanpham)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                            <h2 id="idsp" data-idsp="{{$sp->id_sanpham}}" data-tensp="{{$sp->sanpham_ten}}"><a href="{{URL('product/'.$sp->id_sanpham)}}" id="tensp_{{$sp->id_sanpham}}">{{$sp->sanpham_ten}}</a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins id="giasp_{{$sp->id_sanpham}}" data-price="{{$sp->sanpham_gia}}"><?php echo number_format($sp->sanpham_gia, 0,'','.')." VNĐ" ?></ins> 
                                </div> 
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
