@extends('backend.layout.index')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Danh Sách Hóa Đơn</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <form class="forms-sample" action="{{URL(('/admin/nsx/search'))}}" method="get" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="search_nsx" id="search-post" class="form-control" placeholder="Tìm kiếm Hóa đơn" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                  <button type="submit" class="btn btn-sm btn-primary" type="button">Tìm Kiếm</button>
                </div>
              </div>
            </form> --}}
            {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic tables</li> --}}
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              @if (session('message'))
                <p class="card-description text-light bg-dark pl-1">{{session('message')}}</p>
              @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="text-align: center"> ID Hóa Đơn</th>
                    <th style="text-align: center"> Tên Khách Hàng </th>
                    <th style="text-align: center"> Tổng Giá Tiền</th>
                    <th style="text-align: center"> Trạng Thái</th>
                    <th style="text-align: center"> Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order as $donhang)
                    <tr>
                      <td style="text-align: center"> {{$donhang->id_hoadon}} </td>
                      <td style="text-align: center">{{$donhang->hoadon_tennguoinhan}} </td>
                      <td style="text-align: center">{{number_format($donhang->hoadon_tongtien, 0,'','.').' VNĐ'}} </td>
                      <td style="text-align: center">
                        @if ($donhang->hoadon_trangthai==1)
                          <label for="" style="color: red">Đã Xử lý Xong</label>
                        @else
                        <label for="" style="color: black">Đang Chờ Xử Lý</label>
                        @endif
                      </td>
                      <td style="width:15%"> 
                        <a href="{{URL(('/admin/order/view-order/'.$donhang->id_hoadon))}}" title="Chỉnh sửa">
                          <button type="button" class="btn btn-dark btn-icon-text"> Xem 
                          </button>
                        </a>  
                        {{-- <a href="{{URL(('/admin/order/delete-order/'.$donhang->id_hoadon))}}" title="Xóa">
                          <button type="button" class="btn btn-danger btn-icon-text">
                            Xóa
                          </button>
                        </a>   --}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div>
        {{$order->links()}}
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
  </div>
@endsection