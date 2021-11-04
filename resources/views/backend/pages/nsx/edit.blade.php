@extends('backend.layout.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Cập Nhật Nhà Sản Xuất </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Cập Nhật Nhà Sản Xuất</li>
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
              <form class="forms-sample" action="{{URL(('/admin/nsx/update'))}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- @foreach($result as $nsx) --}}
                  <div class="form-group">
                    <label for="exampleInputName1">Tên Nhà sản xuất <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                    <input type="hidden" name="id_nsx" class="form-control" id="exampleInputName1" placeholder="ID Nhà Sản Xuất" value="{{$nsx->id_nsx}}" readonly>
                    <input type="text" name="tennsx" class="form-control" id="exampleInputName1" placeholder="Tên nhà sản xuất" value="{{$nsx->nsx_tennsx}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Trạng thái Hiển Thị <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                    <select name="trangthai" class="form-control form-control-lg" id="exampleFormControlSelect1">
                        @if ($nsx->nsx_trangthai == 1)
                          <option value="{{$nsx->nsx_trangthai}}" selected >Bật</option>
                          <option value="0">Tắt</option>  
                        @else
                          <option value="1">Bật</option>
                          <option value="{{$nsx->nsx_trangthai}}" selected >Tắt</option>  
                        @endif
                    </select>
                  </div>
                  {{-- @endforeach --}}
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