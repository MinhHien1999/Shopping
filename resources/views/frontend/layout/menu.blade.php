<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{(request()->is('/') == true) ? 'active' : ''}}"><a href="{{URL('')}}">Trang Chủ</a></li>
                    @foreach ($nsx as $nsx)
                        <li class="{{(request()->segment(1).'/'.request()->segment(2) == 'nsx/'.$nsx->id_nsx) ? 'active': ''}}"><a href="{{URL('/nsx/'.$nsx->id_nsx)}}">{{$nsx->nsx_tennsx}}</a></li>
                    @endforeach
                    <li class="{{(request()->segment(1) == 'product' && request()->segment(2) == null) ? 'active' : ''}}"><a href="{{URL('/product')}}">Toàn bộ sản phẩm</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div> <!-- End mainmenu area -->
