@extends('frontend.layout.master')
@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section-title">Tạo Tài khoản</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message')==true)
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <form action="{{URL('/sign-up')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                            <input type="password" name="matkhau" class="form-control" id="exampleInputPassword1" placeholder="Mật Khẩu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                            <input type="text" name="ten" class="form-control" id="exampleInputPassword1" placeholder="Tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                            <input type="text" name="diachi" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại <abbr title="Bắt buộc" class="required" style="color: red">*</abbr></label>
                            <input type="tel" name="sdt" class="form-control" id="exampleInputPassword1" placeholder="Số Điện Thoại" maxlength="10" mixlength="10">
                        </div>
                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </form>          
                </div>
            </div>
        </div>
    </div>
@endsection