@extends('backend.layout.index')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Danh Sách </h3>
        <h3><a href="{{URL('/admin/slide/add')}}" title="Thêm">
          <button type="button" class="btn btn-danger btn-icon-text">
            Thêm Slide
          </button>
        </a></h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <form class="forms-sample" action="{{URL(('/admin/slide/search'))}}" method="get" enctype="multipart/form-data">
              <div class="form-group">
                {{-- <div class="input-group">
                  <input type="text" name="search_sp" id="search-post" class="form-control" placeholder="Tìm kiếm slide" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                  <button type="submit" class="btn btn-sm btn-primary" type="button">Tìm Kiếm</button>
                </div> --}}
              </div>
            </form>
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
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Tên Slide</th>
                    <th style="text-align: center">Hình</th>
                    <th style="text-align: center">Tiêu Đề</th>
                    <th style="text-align: center">Trạng Thái Hiển Thị</th>
                    <th style="text-align: center">Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($slide as $sl)
                    <tr>
                    <td style="text-align: center">{{$sl->id_slide}}</td>
                      <td style="text-align: center">{{$sl->ten_slide}}</td>
                      <td >
                        <img src="{{asset('public/images/slide/'.$sl->hinh)}}" style="width: 700px; height:200px; border-radius:initial" alt="..." class="img-thumbnail">
                      </td>
                      <td style="text-align: center">{{$sl->tieu_de}}</td>
                      <td style="text-align: center; width: 90px; height:90x;">
                        @if ($sl->trangthai==1)
                          Bật
                        @else
                          Tắt 
                        @endif
                      </td>
                      <td style="width:15%"> 
                        <a href="{{URL('/admin/slide/edit/'.$sl->id_slide)}}" title="Chỉnh sửa">
                          <button type="button" class="btn btn-dark btn-icon-text"> Cập Nhật 
                          </button>
                        </a>  
                        {{-- <a href="{{URL('/admin/slide/delete/'.$sl->id_slide)}}" title="Xóa"> --}}
                        <a href="javascript:void(0)" title="Xóa">
                          <button type="button" class="btn btn-danger btn-icon-text" onclick="deleteSlideItem({{$sl->id_slide}})">
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
      </div>
      <div>
        {{$slide->links()}}
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial -->
  </div>
@endsection