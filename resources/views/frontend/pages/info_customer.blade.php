@extends('frontend.layout.master')
@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section-title">Thông Tin Tài Khoản</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message_customer_info_update')==true)
                        <div class="alert alert-success">
                            {{session('message_customer_info_update')}}
                        </div>
                    @endif
                    @if (session()->has('customer_id'))
                        <form action="{{URL('/info-update')}}" method="POST">
                            @csrf
                                <input type="hidden" name="id_user" class="form-control" id="exampleInputEmail1" value="{{$info_user->id_khachhang}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email: {{$info_user->khachhang_email}}</label>
                                {{-- <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value="{{$info_user->khachhang_email}}"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu </label>
                                    <input type="password" name="matkhau" class="form-control" id="exampleInputPassword1" placeholder="Mật Khẩu">
                                    <input type="hidden" name="matkhau_temp" class="form-control" id="exampleInputPassword1" placeholder="Mật Khẩu" value="{{$info_user->khachhang_matkhau}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                                    <input type="text" name="ten" class="form-control" id="exampleInputPassword1" placeholder="Tên" value="{{$info_user->khachhang_tenkhachhang}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                                    <input type="text" name="diachi" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ" value="{{$info_user->khachhang_diachi}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện thoại <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                                    <input type="tel" name="sdt" class="form-control" id="exampleInputPassword1" placeholder="Số Điện Thoại" maxlength="10" mixlength="10" value="0{{$info_user->khachhang_sdt}}">
                                </div>
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </form>    
                    @else
                        <form action="{{URL('/sign-up')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu</label>
                                <input type="password" name="matkhau" class="form-control" id="exampleInputPassword1" placeholder="Mật Khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên</label>
                                <input type="text" name="ten" class="form-control" id="exampleInputPassword1" placeholder="Tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa chỉ</label>
                                <input type="text" name="diachi" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại</label>
                                <input type="tel" name="sdt" class="form-control" id="exampleInputPassword1" placeholder="Số Điện Thoại" min="10">
                            </div>
                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </form>  
                    @endif      
                </div>
            </div>
        </div>
    </div>
@endsection