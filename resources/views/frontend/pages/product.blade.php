@extends('frontend.layout.master')
@section('content')

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
        @foreach ($Detailproduct as $sp)
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h3 class="sidebar-title" style="text-align: center">Thông số kỹ thuật</h3>
                    <ul>
                        <li style="text-align: center">Hệ Điều Hành: {{$sp->chitietsp_hedieuhanh}}</li>
                        <li style="text-align: center">Camera Trước: {{$sp->chitietsp_camera_truoc}}</li>
                        <li style="text-align: center">Camera Sau: {{$sp->chitietsp_camera_sau}}</li>
                        <li style="text-align: center">CPU: {{$sp->chitietsp_cpu}}</li>
                        <li style="text-align: center">RAM: {{$sp->chitietsp_ram}}</li>
                        <li style="text-align: center">Bộ Nhớ: {{$sp->chitietsp_dungluongbonho}}</li>
                        <li style="text-align: center">Pin: {{$sp->chitietsp_dungluongpin}}</li>
                    </ul>
                </div>
            </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                    <img src="{{asset('public/images/product')}}/{{$sp->sanpham_hinh}}" alt="" id="hinhsp_{{$sp->id_sanpham}}" data-hinhsp="{{$sp->sanpham_hinh}}">
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name" id="idsp" data-idsp="{{$sp->id_sanpham}}"><a href="{{URL('product/'.$sp->id_sanpham)}}" id="tensp_{{$sp->id_sanpham}}">{{$sp->sanpham_ten}}</a></h2>
                                    <div class="product-inner-price">
                                        <ins id="giasp_{{$sp->id_sanpham}}" data-price="{{$sp->sanpham_gia}}">{{number_format($sp->sanpham_gia, 0,'','.').' VNĐ'}}</ins>
                                        
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        {{-- <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div> --}}
                                        <a class="add_to_cart_button" href="javascript:void(0)" onclick="AddToCartProduct(this)" id="add-to-cart" data-product-id="{{$sp->id_sanpham}}">Thêm vào giỏ</a>
                                    </form>   
                                    
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                                            {{-- <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li> --}}
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>{{$sp->chitietsp_mota}}</h2>  
                                                <p></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Sản Phẩm Liên Quan</h2>
                            <div class="related-products-carousel">
                                @foreach ($relatedProduct as $sp_lien_quan)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{asset('public/images/product')}}/{{$sp_lien_quan->sanpham_hinh}}" id="hinhsp_{{$sp_lien_quan->id_sanpham}}" alt="" data-hinhsp="{{$sp_lien_quan->sanpham_hinh}}" style="width:226px; height: 275px;">
                                            <div class="product-hover">
                                                <a href="javascript:void(0)" onclick="AddToCart(this)" class="add-to-cart-link" id="add-to-cart" data-product-id="{{$sp_lien_quan->id_sanpham}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                <a href="{{URL('product/'.$sp_lien_quan->id_sanpham)}}" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                            </div>
                                        </div>
                                        
                                    <h2 id="idsp" data-idsp="{{$sp_lien_quan->id_sanpham}}" data-tensp="{{$sp_lien_quan->sanpham_ten}}"><a href="{{URL('product/'.$sp_lien_quan->id_sanpham)}}" id="tensp_{{$sp_lien_quan->id_sanpham}}">{{$sp_lien_quan->sanpham_ten}}</a></h2>
                                        
                                        <div class="product-carousel-price">
                                            <ins id="giasp_{{$sp_lien_quan->id_sanpham}}" data-price="{{$sp_lien_quan->sanpham_gia}}"><?php echo number_format($sp_lien_quan->sanpham_gia, 0,'','.')." VNĐ" ?></ins> 
                                            {{-- <del>$100.00</del> --}}
                                        </div> 
                                    </div>
                                @endforeach        
                            </div>
                        </div>
                    </div>                    
                </div>
        @endforeach
        </div>
    </div>
</div>

@endsection