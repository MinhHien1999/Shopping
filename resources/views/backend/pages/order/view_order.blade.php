@extends('backend.layout.index')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Chi tiết Đơn Hàng </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
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
              <h4 style="text-align: center">Thông Tin Khách Hàng</h4>
              
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="text-align: center"> Tên Khách Hàng </td>
                    <td style="text-align: center"> Địa Chỉ Giao Hàng </td>
                  </tr>
                  <tr style="background-color: #dddddd;">
                    <td style="text-align: center;color: blue"> {{$order->hoadon_tennguoinhan}} </td>
                    <td style="text-align: center;color: blue"> {{$order->hoadon_diachi}} </td>
                  </tr>
                  <tr>
                    <td style="text-align: center"> Email </td>
                    <td style="text-align: center"> Số Điện Thoại Liên Hệ </td>
                  </tr>
                  <tr style="background-color: #dddddd;">
                    <td style="text-align: center;color: blue"> {{$order->hoadon_email}} </td>
                    <td style="text-align: center;color: blue"> 0{{$order->hoadon_sdt}} </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center"> Ghi chú </td>
                  </tr>
                  <tr style="background-color: #dddddd;">
                    <td colspan="2" style="text-align: center;color: blue"> {{$order->hoadon_ghichu}} </td>
                  </tr>
                </tbody>
              </table>
              <br><br>
              <h4 style="text-align: center">Sản Phẩm Đặt Hàng</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="text-align: center"> Tên Sản Phẩm</th>
                    <th style="text-align: center"> Số Lượng </th>
                    <th style="text-align: center"> Tổng Tiền</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($OrderDetail as $chitietdonhang)
                    <tr style="background-color: #dddddd;">
                      <td style="text-align: center"> {{$chitietdonhang->sanpham_ten}} </td>
                      <td style="text-align: center">{{$chitietdonhang->chitiethd_soluong}} </td>
                      <td style="text-align: center">{{number_format($chitietdonhang->chitiethd_gia, 0,'','.').' VNĐ'}} </td>
                    </tr>
                  @endforeach
                    <tr>
                        <td colspan="2"><h5 style="text-align: center">Tổng Tiền</h5></td>
                        <td colspan="1"><h5 style="text-align: center; color: blue">{{number_format($order->hoadon_tongtien, 0,'','.').' VNĐ'}}</h5></td>
                    </tr>
                    <tr>
                      <td colspan="3">{{$OrderDetail->links()}}</td>
                    </tr>
                </tbody>
              </table>
              <br>
              <h4 style="text-align: center">Trạng Thái</h4>
                <form class="forms-sample" action="{{URL(('/admin/order/order-status'))}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <input type="hidden" name="id_hoadon" value="{{$order->id_hoadon}}">
                    </div>
                    <div class="form-group">
                        <select name="trangthai" class="form-control form-control-lg" id="exampleFormControlSelect1" style="color: black">
                            @if ($order->hoadon_trangthai == 1)
                              <option value="{{$order->hoadon_trangthai}}" selected >Đã Được Xử Lý</option>
                              <option value="0">Đang Chờ Xử lý</option>  
                            @else
                              <option value="1">Đã Được Xử Lý</option>
                              <option value="{{$order->hoadon_trangthai}}" selected >Đang Chờ Xử lý</option>  
                            @endif
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary mr-2">Cập Nhật</button>
                      </div>
                </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
  </div>
@endsection