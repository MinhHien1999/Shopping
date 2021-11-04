<div class="header-area">
    <div class="container">
        <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        @if (session()->has('customer_id'))
                            <ul>
                                <li>
                                    {{-- <a href="{{URL('/info/'.session('customer_id'))}}" style="font-size: 15px;color:black"> --}}
                                        <b>
                                            {{session('customer_name')}}
                                        </b>
                                    {{-- </a> --}}
                                </li>
                                <li><a href="{{URL('/info/'.session('customer_id'))}}">Sửa thông tin</a></li>
                                <li><a href="{{URL('/customer-order/'.session('customer_id'))}}">lịch sử giao dịch</a></li>
                                <li><a href="{{URL('/log-out')}}">Đăng xuất</a></li>
                                @if (session('message')==true)
                                    <li>
                                        <div class="alert alert-danger">
                                            {{session('message')}}
                                        </div>
                                    </li>
                                @endif
                                @if (session('message_checkout_success')==true)
                                    <li>
                                        <div class="alert alert-success">
                                            {{session('message_checkout_success')}}
                                        </div>
                                    </li>
                                @endif
                            </ul>
                            </div>
                        </div>
                        @else
                            <ul>
                                <form action="{{URL('/log-in')}}" method="POST">
                                    @csrf
                                    <li><i class=""></i> Email </li>
                                    <li><input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Email"></li>
                                    <li><i class=""></i> Mật Khẩu </li>
                                    <li><input type="password" class="form-control" name="matkhau" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mật khẩu"></li>
                                    <li><button type="submit" class="btn btn-primary" style="padding: 0.80rem 1.0rem;">Đăng nhập</button></li>
                                        @if (session('message_login')==true)
                                            <li>
                                                <div class="alert alert-danger">
                                                    {{session('message_login')}}
                                                </div>
                                            </li>
                                        @endif
                                        @if (session('message_checkout_success')==true)
                                        <li>
                                            <div class="alert alert-success">
                                                {{session('message_checkout_success')}}
                                            </div>
                                        </li>
                                        @endif
                                </form>
                            </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="user-menu">
                        <ul>
                            <li><a href="{{URL('/signup')}}"><i class="fa fa-user"></i> Tạo tải khoản</a></li>
                        </ul>
                    </div>
                </div>
                @endif
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo">
                    <h1><a href="{{URL((''))}}">
                        <img src="public/asset/img/logo.png">
                    </a></h1>
                </div>
            </div>
            <div class="col-sm-4">
                <form action="{{URL(('/search'))}}" method="get">
                    <input type="text" placeholder="Tìm Kiếm Sản Phẩm" name="search_sp" style="margin-top: 39px; width: 300px;">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    {{-- <input type="submit" value="Search"> --}}
                </form>
            </div>
            <div class="col-sm-4">
                <div class="shopping-item">
                        {{-- @php
                            if(session()->has('cart')&& session('cart')!=null){
                                echo 'co cart';
                            }else{
                                echo 'khong co cart';
                            }
                        @endphp --}}
                        <a href="{{URL('cart')}}">Giỏ Hàng<span class="cart-amunt"> </span><i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->