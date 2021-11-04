@extends('backend.layout.index')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Thống kê </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <form class="forms-sample" action="{{URL(('/admin/nsx/search'))}}" method="get" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="search_nsx" id="search-post" class="form-control" placeholder="Tìm kiếm nhà sản xuất" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                    <th style="text-align: center"> Tháng </th>
                    <th style="text-align: center"> Doanh Thu </th>
                    {{-- <th style="text-align: center"> Thao Tác</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $thang => $value)
                    <tr>
                      <td style="text-align: center"> <b style="font-size: 18px">{{$thang}}</b> </td>
                      <td style="text-align: center"><b style="font-size: 18px;color:blue">{{number_format($value['tongdoanhthu'], 0,'','.').' VNĐ'}}</b> </td>
                      {{-- <td style="text-align: center">
                        @if ($nsx->nsx_trangthai==1)
                            Bật
                        @else
                            Tắt 
                        @endif
                      </td> --}}
                      {{-- <td style="width:15%"> 
                        <a href="{{URL(('/admin/nsx/edit/'))}}" title="Chỉnh sửa">
                          <button type="button" class="btn btn-dark btn-icon-text"> Cập Nhật 
                          </button>
                        </a>  
                        <a href="javascript:void(0)" title="Xóa">
                          <button type="button" class="btn btn-danger btn-icon-text" onclick="deleteNsxItem()">
                            Xóa
                          </button>
                        </a>  
                      </td> --}}
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div>
        {{-- {{$Nsx->links()}} --}}
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
  </div>
@endsection