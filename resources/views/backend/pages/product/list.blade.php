@extends('backend.layout.index')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Danh Sách Sản Phẩm </h3>
        <h3><a href="{{URL('/admin/product/add')}}" title="Thêm">
          <button type="button" class="btn btn-danger btn-icon-text">
            Thêm Sản Phẩm
          </button>
        </a></h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <form class="forms-sample" action="{{URL(('/admin/product/search'))}}" method="get" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="search_sp" id="search-post" class="form-control" placeholder="Tìm kiếm sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                  <button type="submit" class="btn btn-sm btn-primary" type="button">Tìm Kiếm</button>
                </div>
              </div>
            </form>
            {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic tables</li> --}}
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              {{-- <h4 class="card-title">Bordered table</h4>
              <p class="card-description"> Add class <code>.table-bordered</code>
              </p> --}}
              @if (session('message'))
                <p class="card-description text-light bg-dark pl-1">{{session('message')}}</p>
              @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Tên Sản Phẩm</th>
                    <th style="text-align: center">Hinh Sản Phẩm</th>
                    <th style="text-align: center">Nhà Sản Xuất</th>
                    {{-- <th style="text-align: center">Số Lượng</th> --}}
                    <th style="text-align: center">Giá</th>
                    <th style="text-align: center">Trạng Thái Hiển Thị</th>
                    <th style="text-align: center">Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Product as $sanpham)
                    <tr>
                      <td style="text-align: center">{{$sanpham->id_sanpham}}</td>
                      <td style="text-align: center">{{$sanpham->sanpham_ten}}</td>
                      <td style="width: 90px; height:90x;">
                        <img src="{{asset('public/images/product')}}/{{$sanpham->sanpham_hinh}}" style="width: 90px; height:90px; border-radius:initial" alt="..." class="img-thumbnail">
                      </td>
                      <td style="text-align: center">{{$sanpham->nsx_tennsx}}</td>
                      {{-- <td style="text-align: center">{{$sanpham->sanpham_soluong}}</td> --}}
                      <td style="text-align: center">{{number_format($sanpham->sanpham_gia, 0,'','.').' VNĐ'}}</td>
                      <td style="text-align: center">
                        @if ($sanpham->sanpham_trangthai==1)
                          Bật
                        @else
                          Tắt 
                        @endif
                      </td>
                      <td style="width:15%"> 
                        <a href="{{URL('/admin/product/edit/'.$sanpham->id_sanpham)}}" title="Chỉnh sửa">
                          <button type="button" class="btn btn-dark btn-icon-text"> Cập Nhật 
                          </button>
                        </a>  
                        <a href="javascript:void(0)" title="Xóa">
                          <button type="button" onclick="deleteProductItem({{$sanpham->id_sanpham}})" class="btn btn-danger btn-icon-text">
                            Xóa
                          </button>
                        </a>  
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div>
          {{$Product->links()}}
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
  </div>
@endsection