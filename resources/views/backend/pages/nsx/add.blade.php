@extends('backend.layout.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Thêm Nhà Sản Xuất </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Thêm Nhà Sản Xuất</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            @error('tennsx')
            <p class="card-description text-light bg-dark pl-1">{{$message}}</p>
            @enderror
            <div class="card-body">
              {{-- <h4 class="card-title">Basic form elements</h4>
              <p class="card-description"> Basic form elements </p> --}}
              <form class="forms-sample" action="{{URL(('/admin/nsx/save'))}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Tên Nhà sản xuất <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <input type="text" name="tennsx" class="form-control" id="exampleInputName1" placeholder="Tên nhà sản xuất">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Trạng thái Hiển Thị <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <select name="trangthai" class="form-control form-control-lg" id="exampleFormControlSelect1">
                  <option value="1">Bật</option>
                  <option value="0">Tắt</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Thêm</button>
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