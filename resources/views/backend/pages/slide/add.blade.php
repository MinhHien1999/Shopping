@extends('backend.layout.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Thêm Slide</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Thêm Slide</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            @error('tenslide')
            <p class="card-description text-light bg-dark pl-1">{{$message}}</p>
            @enderror
            @error('hinh')
            <p class="card-description text-light bg-dark pl-1">{{$message}}</p>
            @enderror
            <div class="card-body">
              {{-- <h4 class="card-title">Basic form elements</h4>
              <p class="card-description"> Basic form elements </p> --}}
              <form class="forms-sample" action="{{URL(('/admin/slide/save'))}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Tên Slide <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                  <input type="text" name="tenslide" class="form-control" id="exampleInputName1" placeholder="Tên Slide">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tiêu đề</label>
                    <input type="text" name="tieude" class="form-control" id="exampleInputName1" placeholder="Nội Dung">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Hình <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                    <input name="hinh" type="file" class="form-control-file" id="exampleFormControlFile1">
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