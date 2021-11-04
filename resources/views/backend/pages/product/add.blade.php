@extends('backend.layout.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Thêm Sản Phẩm </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
          </ol>
        </nav>
      </div>
      <form action="{{URL(('/admin/product/save'))}}" method="post" enctype="multipart/form-data" class="forms-sample">
      <div class="row">
        <div class="col-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              @if (session('message'))
                <p class="card-description text-light bg-dark pl-1">{{session('message')}}</p>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
              @endif
              {{-- <h4 class="card-title">Basic form elements</h4>
              <p class="card-description"> Basic form elements </p> --}}

                  @csrf                
                <div class="form-group">
                  <label for="exampleInputName1">Tên Sản Phẩm <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <input name="tensp" type="text" class="form-control" id="exampleInputName1" placeholder="Tên nhà sản phẩm">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Nhà sản xuất <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <select name="id_nsx" class="form-control form-control-lg" id="exampleFormControlSelect1">
                    @foreach ($Nsx as $nsx)
                      <option value="{{$nsx->id_nsx}}">{{$nsx->nsx_tennsx}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Hình <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <input name="hinh" type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Giá <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <input name="gia" type="number" class="form-control" id="exampleInputName1" placeholder="Giá Sản Phẩm">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Số lượng <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <input name="soluong" type="number" class="form-control" id="exampleInputName1" placeholder="Số lượng" min="1" value="1">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Trạng Thái Hiển Thị <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <select name="trangthai" class="form-control form-control-lg" id="exampleFormControlSelect1">
                  <option value="1">Bật</option>
                  <option value="0">Tắt</option>
                </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Hệ Điều Hành</label>
                  <input name="hedieuhanh" type="text" class="form-control" id="exampleInputName1" placeholder="Chi tiết Hệ Điều Hành" >
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Camera Trước</label>
                  <input name="camera_truoc" type="text" class="form-control" id="exampleInputName1" placeholder="Chi tiết Camera Trước" >
                </div>
            </div>
          </div>
        </div>
        <div class="col-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Camera Sau</label>
                <input name="camera_sau" type="text" class="form-control" id="exampleInputName1" placeholder="Chi tiết Camera Sau" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">CPU</label>
                <input name="cpu" type="text" class="form-control" id="exampleInputName1" placeholder="Chi tiết CPU" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">RAM</label>
                <input name="ram" type="text" class="form-control" id="exampleInputName1" placeholder="Chi tiết RAM" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Dung Lượng </label>
                <input name="dungluongbonho" type="text" class="form-control" id="exampleInputName1" placeholder="Dung Lượng Bộ Nhớ" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Dung Lượng Pin</label>
                <input name="pin" type="text" class="form-control" id="exampleInputName1" placeholder="Dung Lượng Pin" >
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Mô tả</label>
                <textarea name="mota" class="form-control" id="exampleTextarea1" rows="4"></textarea>
              </div>
              <button name="submit" type="submit" class="btn btn-primary mr-2">Thêm</button>
              {{-- <button class="btn btn-light">Hủy</button> --}}
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