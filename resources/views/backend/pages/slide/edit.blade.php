@extends('backend.layout.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Cập Nhật Slide </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Cập Nhật Slide</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            @error('tenslide')
            <p class="card-description text-light bg-dark pl-1">{{$message}}</p>
            @enderror
            <div class="card-body">
              {{-- <h4 class="card-title">Basic form elements</h4>
              <p class="card-description"> Basic form elements </p> --}}
              <form class="forms-sample" action="{{URL(('/admin/slide/update'))}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                    <label for="exampleInputName1">Tên Slide <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                    <input type="hidden" name="idslide" class="form-control" id="exampleInputName1" placeholder="Tên Slide" value="{{$slideEdit->id_slide}}">
                    <input type="text" name="tenslide" class="form-control" id="exampleInputName1" placeholder="Tên Slide" value="{{$slideEdit->ten_slide}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tiêu đề</label>
                        <input type="text" name="tieude" class="form-control" id="exampleInputName1" placeholder="Nội Dung" value="{{$slideEdit->tieu_de}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Hình <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                        <input name="hinh_temp" type="hidden" class="form-control-file" id="image" value="{{$slideEdit->hinh}}">
                        <input name="hinh" type="file" class="form-control-file" id="exampleFormControlFile1">
                        <p><strong>Ghi Chú:</strong> Nếu không thêm hình mới, hình cũ sẽ được giữ sử dụng</p>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlFile1">Trạng thái Hiển Thị <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                    <select name="trangthai" class="form-control form-control-lg" id="exampleFormControlSelect1">
                        @if ($slideEdit->trangthai == 1)
                          <option value="{{$slideEdit->trangthai}}" selected >Bật</option>
                          <option value="0">Tắt</option>  
                        @else
                          <option value="1">Bật</option>
                          <option value="{{$slideEdit->trangthai}}" selected >Tắt</option>  
                        @endif
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cập Nhật</button>
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