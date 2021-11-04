@extends('backend.layout.index')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Báo cáo tổng quát</h5>
                            {{-- <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button> --}}
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Tổng doanh thu trong {{$monthNow}} Tháng</span>
                          <h4 style="color: blue">{{number_format($doanhthu,0,'','.').' VNĐ'}}</h4>
                        </div>
                        {{-- <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div> --}}
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Số Khách Hàng Thành Viên</span>
                          <h4 style="color: blue">{{$users_count}}</h4>
                        </div>
                        {{-- <div class="inner-card-icon bg-danger">
                          <i class="icon-briefcase"></i>
                        </div> --}}
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Đơn Hàng Đã Xử Lý</span>
                          <h4 style="color: blue">{{$hoadon_daxuly_count}}</h4>
                        </div>
                        {{-- <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div> --}}
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Đơn Hàng Chưa Xử Lý</span>
                          <h4 style="color: blue">{{$hoadon_chuaxuly_count}}</h4>
                        </div>
                        {{-- <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Starts-->
            {{-- <div class="row quick-action-toolbar">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                    <div class="card-header d-block d-md-flex">
                        <h5 class="mb-0">Quick Actions</h5>
                        <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
                    </div>
                    <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Add Client</button>
                        </div>
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> Create Quote</button>
                        </div>
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i> Enter Payment</button>
                        </div>
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>Create Invoice</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
    </div>
@endsection